<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Dokumen;
use App\Models\Notifikasi;
use App\Models\PeriodePenerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminPusatVerifikasiController extends Controller
{
    /**
     * Daftar pengajuan yang perlu diperiksa Admin Pusat.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
            'status' => [
                'nullable',
                'in:semua,Diajukan,Terverifikasi,Ditolak',
            ],
        ]);

        $status = $request->query('status', 'semua');
        $kataKunci = $request->query('q');

        $query = Pengajuan::with([
            'peserta',
            'periode',
            'dokumen' => function ($query) {
                $query->orderByDesc('tanggal_unggah')
                    ->orderByDesc('id_dokumen');
            },
        ])->where('tujuan_magang', 'UPT TIKP');

        if ($status !== 'semua') {
            $query->where('status_pengajuan', $status);
        }

        if ($kataKunci) {
            $query->whereHas('peserta', function ($q) use ($kataKunci) {
                $q->where('nama', 'like', "%{$kataKunci}%")
                    ->orWhere('email', 'like', "%{$kataKunci}%")
                    ->orWhere('nama_instansi', 'like', "%{$kataKunci}%")
                    ->orWhere('nomor_induk', 'like', "%{$kataKunci}%");
            });
        }

        $daftarPengajuan = $query
            ->orderByDesc('tanggal_pengajuan')
            ->paginate(10)
            ->withQueryString();

        $totalAntrean = Pengajuan::where('tujuan_magang', 'UPT TIKP')
            ->where('status_pengajuan', 'Diajukan')
            ->count();

        $belumDiperiksa = $totalAntrean;

        $verifikasiHariIni = Pengajuan::where('tujuan_magang', 'UPT TIKP')
            ->whereDate('tanggal_verifikasi', today())
            ->count();

        return view('admin.pusat.verifikasi-berkas', compact(
            'daftarPengajuan',
            'totalAntrean',
            'belumDiperiksa',
            'verifikasiHariIni',
            'status',
            'kataKunci'
        ));
    }

    /**
     * Detail pengajuan dan dokumen peserta.
     */
    public function detail($id)
    {
        $pengajuan = Pengajuan::with([
            'peserta',
            'periode',
            'dokumen' => function ($query) {
                $query->orderByDesc('tanggal_unggah')
                    ->orderByDesc('id_dokumen');
            },
        ])
            ->where('tujuan_magang', 'UPT TIKP')
            ->findOrFail($id);

        return view('admin.pusat.detail-berkas', compact(
            'pengajuan'
        ));
    }

    /**
     * Melihat dokumen peserta.
     */
    public function lihatDokumen($id)
    {
        $dokumen = Dokumen::with('pengajuan')
            ->whereHas('pengajuan', function ($query) {
                $query->where('tujuan_magang', 'UPT TIKP');
            })
            ->findOrFail($id);

        abort_unless(
            Storage::disk('private')->exists($dokumen->file_path),
            404,
            'File dokumen tidak ditemukan.'
        );

        return Storage::disk('private')->response(
            $dokumen->file_path
        );
    }

    /**
     * Menyetujui hasil pemeriksaan berkas.
     */
    public function verifikasi(Request $request, $id)
    {
        $request->validate([
            'catatan_verifikasi' => ['nullable', 'string', 'max:2000'],
        ]);

        $petugas = auth('petugas')->user();

        abort_unless($petugas, 403, 'Petugas tidak ditemukan.');

        DB::transaction(function () use ($request, $id, $petugas) {
            $pengajuan = Pengajuan::where('tujuan_magang', 'UPT TIKP')
                ->lockForUpdate()
                ->findOrFail($id);

            if ($pengajuan->status_pengajuan !== 'Diajukan') {
                throw ValidationException::withMessages([
                    'status' => 'Pengajuan ini sudah pernah diproses.',
                ]);
            }

            // Jenis dokumen wajib sesuai DBML v1.6.
            $dokumenWajib = [
                'CV',
                'Surat Pengantar',
                'Proposal',
                'Transkrip Nilai / Rapor',
            ];

            $dokumenTerbaru = $pengajuan->dokumen()
                ->orderByDesc('tanggal_unggah')
                ->orderByDesc('id_dokumen')
                ->get()
                ->unique('jenis_dokumen');

            $jenisTersedia = $dokumenTerbaru
                ->pluck('jenis_dokumen')
                ->all();

            $dokumenKurang = array_diff(
                $dokumenWajib,
                $jenisTersedia
            );

            if (!empty($dokumenKurang)) {
                throw ValidationException::withMessages([
                    'dokumen' => 'Belum semua dokumen wajib tersedia: '
                        . implode(', ', $dokumenKurang),
                ]);
            }

            $pengajuan->update([
                'status_pengajuan' => 'Terverifikasi',
                'id_petugas_verifikator' => $petugas->id_petugas,
                'catatan_verifikasi' => $request->catatan_verifikasi,
                'tanggal_verifikasi' => now(),
            ]);

            // Mencatat notifikasi untuk peserta.
            // Email belum dikirim, sehingga tanggal_kirim dan
            // status_kirim dibiarkan NULL.
            Notifikasi::create([
                'id_pengajuan' => $pengajuan->id_pengajuan,
                'id_peserta' => $pengajuan->id_peserta,
                'id_petugas' => null,
                'email_tujuan' => $pengajuan->peserta->email,
                'jenis_notifikasi' => 'Hasil Verifikasi',
                'isi_pesan' => 'Selamat, berkas pengajuan magang Anda telah lolos verifikasi Admin Pusat dan diteruskan ke Admin UPT TIKP untuk proses selanjutnya.',
                'tanggal_kirim' => null,
                'status_kirim' => null,
            ]);
        });

        return redirect()
            ->route('admin-pusat.verifikasi-berkas.detail', $id)
            ->with('success', 'Berkas berhasil diverifikasi dan diteruskan ke Admin UPT TIKP.');
    }

    /**
     * Menolak pengajuan pada tahap verifikasi berkas.
     */
    public function tolak(Request $request, $id)
    {
        $request->validate([
            'catatan_verifikasi' => ['required', 'string', 'max:2000'],
        ]);

        $petugas = auth('petugas')->user();

        abort_unless($petugas, 403, 'Petugas tidak ditemukan.');

        DB::transaction(function () use ($request, $id, $petugas) {
            $pengajuan = Pengajuan::where('tujuan_magang', 'UPT TIKP')
                ->lockForUpdate()
                ->findOrFail($id);

            if ($pengajuan->status_pengajuan !== 'Diajukan') {
                throw ValidationException::withMessages([
                    'status' => 'Pengajuan ini sudah pernah diproses.',
                ]);
            }

            $pengajuan->update([
                'status_pengajuan' => 'Ditolak',
                'id_petugas_verifikator' => $petugas->id_petugas,
                'catatan_verifikasi' => $request->catatan_verifikasi,
                'tanggal_verifikasi' => now(),
            ]);

            // Mencatat pemberitahuan penolakan untuk peserta.
            // Tidak diteruskan ke Admin UPT TIKP.
            Notifikasi::create([
                'id_pengajuan' => $pengajuan->id_pengajuan,
                'id_peserta' => $pengajuan->id_peserta,
                'id_petugas' => null,
                'email_tujuan' => $pengajuan->peserta->email,
                'jenis_notifikasi' => 'Hasil Verifikasi',
                'isi_pesan' => 'Mohon maaf, pengajuan magang Anda belum lolos verifikasi Admin Pusat. Catatan: '
                    . $request->catatan_verifikasi,
                'tanggal_kirim' => null,
                'status_kirim' => null,
            ]);
        });

        return redirect()
            ->route('admin-pusat.verifikasi-berkas.detail', $id)
            ->with('success', 'Pengajuan berhasil ditolak. Hasil pemeriksaan dicatat untuk peserta.');
    }

    /**
     * Riwayat pemeriksaan berkas Admin Pusat.
     */
    public function riwayat(Request $request)
    {
        $request->validate([
            'periode' => [
                'nullable',
                'integer',
                'exists:periode_penerimaan,id_periode',
            ],
            'status' => [
                'nullable',
                'in:semua,Terverifikasi,Ditolak',
            ],
        ]);

        $daftarPeriode = PeriodePenerimaan::orderByDesc('tanggal_mulai')
            ->get();

        $periodeTerpilih = $request->query('periode')
            ?? $daftarPeriode->first()?->id_periode;

        $queryDasar = Pengajuan::with([
            'peserta',
            'periode',
            'dokumen' => function ($query) {
                $query->orderByDesc('tanggal_unggah')
                    ->orderByDesc('id_dokumen');
            },
        ])->where('tujuan_magang', 'UPT TIKP');

        if ($periodeTerpilih) {
            $queryDasar->where('id_periode', $periodeTerpilih);
        }

        $totalBerkas = (clone $queryDasar)->count();

        $diteruskanKeUpt = (clone $queryDasar)
            ->where('status_pengajuan', 'Terverifikasi')
            ->count();

        $menungguVerifikasi = (clone $queryDasar)
            ->where('status_pengajuan', 'Diajukan')
            ->count();

        $ditolak = (clone $queryDasar)
            ->where('status_pengajuan', 'Ditolak')
            ->count();

        $status = $request->query('status', 'semua');

        $queryRiwayat = clone $queryDasar;

        if ($status !== 'semua') {
            $queryRiwayat->where('status_pengajuan', $status);
        }

        $daftarRiwayat = $queryRiwayat
            ->orderByDesc('tanggal_verifikasi')
            ->orderByDesc('tanggal_pengajuan')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pusat.riwayat', compact(
            'daftarPeriode',
            'periodeTerpilih',
            'totalBerkas',
            'diteruskanKeUpt',
            'menungguVerifikasi',
            'ditolak',
            'status',
            'daftarRiwayat'
        ));
    }
}
