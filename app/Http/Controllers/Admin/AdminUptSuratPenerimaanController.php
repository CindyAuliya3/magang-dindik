<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminUptSuratPenerimaanController extends Controller
{
    /**
     * Menampilkan daftar Surat Penerimaan peserta UPT TIKP.
     */
    public function index(Request $request)
    {
        $admin = auth('petugas')->user();

        $query = Pengajuan::with([
            'peserta',
            'periode',
            'hasilSeleksi',
            'suratPenerimaan',
        ])
            ->where('tujuan_magang', 'UPT TIKP')
            ->whereHas('hasilSeleksi');

        // Filter pencarian peserta
        if ($request->filled('cari')) {
            $cari = $request->cari;

            $query->whereHas('peserta', function ($q) use ($cari) {
                $q->where('nama', 'like', "%{$cari}%")
                    ->orWhere('nama_instansi', 'like', "%{$cari}%");
            });
        }

        // Filter jenjang pendidikan
        if ($request->filled('jenjang') && $request->jenjang !== 'SEMUA') {
            $query->whereHas('peserta', function ($q) use ($request) {
                $q->where('jenjang_pendidikan', $request->jenjang);
            });
        }

        // Filter kategori hasil seleksi
        if ($request->filled('kategori')) {
            if ($request->kategori === 'DISETUJUI') {
                $query->whereHas('hasilSeleksi', function ($q) {
                    $q->where('status', 'Diterima')
                        ->where('keputusan_pimpinan', 'Disetujui / ACC');
                });
            } elseif ($request->kategori === 'DITOLAK') {
                $query->whereHas('hasilSeleksi', function ($q) {
                    $q->where('status', 'Ditolak');
                });
            } elseif ($request->kategori === 'PERLU_SURAT') {
                $query->whereHas('hasilSeleksi', function ($q) {
                    $q->where('status', 'Diterima')
                        ->where('keputusan_pimpinan', 'Disetujui / ACC');
                })->whereDoesntHave('suratPenerimaan');
            }
        }

        $daftarPeserta = $query
            ->orderByDesc('id_pengajuan')
            ->get();

        // Ringkasan statistik
        $pengajuanDiproses = Pengajuan::where('tujuan_magang', 'UPT TIKP')
            ->whereHas('hasilSeleksi');

        $totalDiprosesPimpinan = (clone $pengajuanDiproses)->count();

        $totalDisetujui = (clone $pengajuanDiproses)
            ->whereHas('hasilSeleksi', function ($q) {
                $q->where('status', 'Diterima')
                    ->where('keputusan_pimpinan', 'Disetujui / ACC');
            })->count();

        $totalDitolak = (clone $pengajuanDiproses)
            ->whereHas('hasilSeleksi', function ($q) {
                $q->where('status', 'Ditolak');
            })->count();

        $totalDokumenAktif = (clone $pengajuanDiproses)
            ->whereHas('suratPenerimaan')
            ->count();

        $totalPerluSurat = (clone $pengajuanDiproses)
            ->whereHas('hasilSeleksi', function ($q) {
                $q->where('status', 'Diterima')
                    ->where('keputusan_pimpinan', 'Disetujui / ACC');
            })
            ->whereDoesntHave('suratPenerimaan')
            ->count();

        return view('admin.upt.surat-penerimaan', compact(
            'admin',
            'daftarPeserta',
            'totalDiprosesPimpinan',
            'totalDisetujui',
            'totalDitolak',
            'totalDokumenAktif',
            'totalPerluSurat'
        ));
    }

    /**
     * Menampilkan halaman kelola Surat Penerimaan.
     */
    public function create($id)
    {
        $pengajuan = Pengajuan::with([
            'peserta',
            'periode',
            'hasilSeleksi',
            'suratPenerimaan',
        ])
            ->where('tujuan_magang', 'UPT TIKP')
            ->whereHas('hasilSeleksi', function ($query) {
                $query->where('status', 'Diterima')
                    ->where('keputusan_pimpinan', 'Disetujui / ACC');
            })
            ->findOrFail($id);

        return view('admin.upt.kelola-surat-penerimaan', compact(
            'pengajuan'
        ));
    }

    /**
     * Menyimpan Surat Penerimaan peserta.
     */
    public function store(Request $request, $id)
    {
        $pengajuan = Pengajuan::where('tujuan_magang', 'UPT TIKP')
            ->whereHas('hasilSeleksi', function ($query) {
                $query->where('status', 'Diterima')
                    ->where('keputusan_pimpinan', 'Disetujui / ACC');
            })
            ->findOrFail($id);

        // Mencegah unggah surat lebih dari satu kali.
        if ($pengajuan->suratPenerimaan()->exists()) {
            return back()->withErrors([
                'file_surat' => 'Surat Penerimaan untuk peserta ini sudah diunggah.',
            ]);
        }

        // Validasi data dan file PDF.
        $validated = $request->validate([
            'nomor_surat' => ['required', 'string', 'max:255'],
            'tanggal_terbit' => ['required', 'date'],
            'file_surat' => ['required', 'file', 'mimes:pdf', 'max:5120'],
        ]);

        $admin = auth('petugas')->user();

        // Simpan PDF ke storage/app/public/surat-penerimaan.
        $filePath = $request->file('file_surat')->store(
            'surat-penerimaan',
            'public'
        );

        try {
            // Simpan informasi surat ke database.
            $pengajuan->suratPenerimaan()->create([
                'nomor_surat' => $validated['nomor_surat'],
                'tanggal_terbit' => $validated['tanggal_terbit'],
                'id_petugas_unggah' => $admin->id_petugas,
                'file_path' => $filePath,
                'tanggal_unggah' => now(),
            ]);
        } catch (\Throwable $e) {
            // Hapus file jika penyimpanan database gagal.
            Storage::disk('public')->delete($filePath);

            throw $e;
        }

        return redirect()
            ->route('admin-upt.surat-penerimaan')
            ->with('success', 'Surat Penerimaan berhasil diunggah.');
    }
}
