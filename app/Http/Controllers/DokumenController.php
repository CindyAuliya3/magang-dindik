<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DokumenController extends Controller
{
    private const JENIS_DOKUMEN = [
        'Surat Pengantar',
        'Proposal',
        'CV',
        'Transkrip Nilai / Rapor',
    ];

    /**
     * Lokasi penanda bahwa pengajuan sudah dikirim.
     * Penanda disimpan pada private storage, bukan database.
     */
    private function pathPenandaPengiriman(int $idPengajuan): string
    {
        return "status-pengajuan/{$idPengajuan}/terkirim.flag";
    }

    /**
     * Memeriksa apakah pengajuan sudah dikirim.
     */
    private function pengajuanSudahDikirim(int $idPengajuan): bool
    {
        return Storage::disk('private')->exists(
            $this->pathPenandaPengiriman($idPengajuan)
        );
    }

    /**
     * Mengambil pengajuan terbaru milik peserta.
     */
    private function ambilPengajuanPeserta($peserta): ?Pengajuan
    {
        return Pengajuan::where('id_peserta', $peserta->id_peserta)
            ->where('tujuan_magang', 'UPT TIKP')
            ->latest('id_pengajuan')
            ->first();
    }

    /**
     * Menampilkan halaman dokumen peserta.
     */
    public function index()
    {
        $peserta = auth('peserta')->user();

        $pengajuan = $this->ambilPengajuanPeserta($peserta);

        if (!$pengajuan) {
            return redirect()
                ->route('peserta.pengajuan.create')
                ->with('error', 'Silakan mengisi pengajuan magang terlebih dahulu.');
        }

        $dokumenTersimpan = Dokumen::where(
            'id_pengajuan',
            $pengajuan->id_pengajuan
        )->get();

        // Ambil dokumen terbaru untuk setiap jenis dokumen.
        $dokumenTerbaru = $dokumenTersimpan
            ->groupBy('jenis_dokumen')
            ->map(function ($items) {
                return $items->sortByDesc('id_dokumen')->first();
            });

        $dokumen = collect(self::JENIS_DOKUMEN)->map(function ($jenis) use ($dokumenTerbaru) {
            $file = $dokumenTerbaru->get($jenis);

            $nama = match ($jenis) {
                'Surat Pengantar' => 'Surat Pengantar Kampus / Sekolah',
                'Proposal' => 'Proposal Rencana Magang',
                'CV' => 'Curriculum Vitae (CV) Terkini',
                'Transkrip Nilai / Rapor' => 'Transkrip Nilai / Rapor Terakhir',
            };

            $icon = match ($jenis) {
                'Surat Pengantar' => 'surat',
                'Proposal' => 'proposal',
                'CV' => 'cv',
                'Transkrip Nilai / Rapor' => 'transkrip',
            };

            $ukuran = null;

            if (
                $file &&
                Storage::disk('private')->exists($file->file_path)
            ) {
                $ukuran = Storage::disk('private')->size($file->file_path);
            }

            return [
                'jenis' => $jenis,

                'key' => match ($jenis) {
                    'Surat Pengantar' => 'surat_pengantar',
                    'Proposal' => 'proposal',
                    'CV' => 'cv',
                    'Transkrip Nilai / Rapor' => 'transkrip',
                },

                'nama' => $nama,
                'icon' => $icon,
                'max' => $jenis === 'Proposal' ? 5 : 2,

                'file' => $file ? basename($file->file_path) : null,

                // Ukuran dalam byte.
                'ukuran' => $ukuran,
                'size' => $ukuran,

                'url' => $file
                    ? route('peserta.dokumen.lihat', $file->id_dokumen)
                    : null,

                'id_dokumen' => $file?->id_dokumen,
            ];
        });

        $jumlahTerunggah = $dokumen->whereNotNull('id_dokumen')->count();

        $sudahDikirim = $this->pengajuanSudahDikirim(
            $pengajuan->id_pengajuan
        );

        // Mengambil jadwal wawancara terbaru milik pengajuan.
        $jadwalWawancara = $pengajuan->jadwalWawancara()
            ->orderByDesc('tanggal')
            ->orderByDesc('waktu')
            ->first();

        return view('peserta.dokumen', compact(
            'peserta',
            'pengajuan',
            'dokumen',
            'jumlahTerunggah',
            'sudahDikirim',
            'jadwalWawancara'
        ));
    }

    /**
     * Mengunggah atau mengganti dokumen.
     */
    public function store(Request $request)
    {
        $peserta = auth('peserta')->user();

        $pengajuan = $this->ambilPengajuanPeserta($peserta);

        if (!$pengajuan) {
            return redirect()
                ->route('peserta.pengajuan.create')
                ->with('error', 'Pengajuan magang belum tersedia.');
        }

        // Dokumen tidak boleh diganti setelah pengajuan dikirim.
        if ($this->pengajuanSudahDikirim($pengajuan->id_pengajuan)) {
            return redirect()
                ->route('peserta.dokumen.index')
                ->with(
                    'error',
                    'Pengajuan sudah dikirim. Dokumen tidak dapat diganti lagi.'
                );
        }

        $validated = $request->validate([
            'jenis_dokumen' => [
                'required',
                Rule::in(self::JENIS_DOKUMEN),
            ],

            'file' => [
                'required',
                'file',
                'mimes:pdf',
                'max:' . (
                    $request->input('jenis_dokumen') === 'Proposal'
                        ? 5120
                        : 2048
                ),
            ],
        ], [
            'jenis_dokumen.required' => 'Jenis dokumen harus dipilih.',
            'jenis_dokumen.in' => 'Jenis dokumen tidak valid.',
            'file.required' => 'Silakan pilih berkas PDF.',
            'file.mimes' => 'Berkas harus berformat PDF.',
            'file.max' => 'Ukuran berkas melebihi batas maksimal.',
        ]);

        // Simpan file baru di private storage.
        $pathBaru = $request->file('file')->store(
            'dokumen-magang/' . $pengajuan->id_pengajuan,
            'private'
        );

        $dokumenLama = Dokumen::where(
            'id_pengajuan',
            $pengajuan->id_pengajuan
        )
            ->where('jenis_dokumen', $validated['jenis_dokumen'])
            ->latest('id_dokumen')
            ->first();

        if ($dokumenLama) {
            $pathLama = $dokumenLama->file_path;

            $dokumenLama->update([
                'file_path' => $pathBaru,
                'tanggal_unggah' => now(),
            ]);

            // Hapus file lama setelah file baru berhasil disimpan.
            if ($pathLama !== $pathBaru) {
                Storage::disk('private')->delete($pathLama);
            }
        } else {
            Dokumen::create([
                'id_pengajuan' => $pengajuan->id_pengajuan,
                'jenis_dokumen' => $validated['jenis_dokumen'],
                'file_path' => $pathBaru,
                'tanggal_unggah' => now(),
            ]);
        }

        return redirect()
            ->route('peserta.dokumen.index')
            ->with('success', 'Dokumen berhasil diunggah.');
    }

    /**
     * Mengirim pengajuan setelah seluruh dokumen wajib lengkap.
     */
    public function kirim()
    {
        $peserta = auth('peserta')->user();

        $pengajuan = $this->ambilPengajuanPeserta($peserta);

        if (!$pengajuan) {
            return redirect()
                ->route('peserta.pengajuan.create')
                ->with('error', 'Pengajuan magang belum tersedia.');
        }

        if ($this->pengajuanSudahDikirim($pengajuan->id_pengajuan)) {
            return redirect()
                ->route('peserta.dokumen.index')
                ->with('error', 'Pengajuan ini sudah pernah dikirim.');
        }

        $dokumenTersimpan = Dokumen::where(
            'id_pengajuan',
            $pengajuan->id_pengajuan
        )->get();

        $dokumenTerbaru = $dokumenTersimpan
            ->groupBy('jenis_dokumen')
            ->map(function ($items) {
                return $items->sortByDesc('id_dokumen')->first();
            });

        // Periksa seluruh dokumen wajib dan keberadaan file fisiknya.
        foreach (self::JENIS_DOKUMEN as $jenis) {
            $file = $dokumenTerbaru->get($jenis);

            if (
                !$file ||
                !Storage::disk('private')->exists($file->file_path)
            ) {
                return redirect()
                    ->route('peserta.dokumen.index')
                    ->with(
                        'error',
                        "Dokumen {$jenis} belum lengkap atau berkasnya tidak ditemukan."
                    );
            }
        }

        // Buat penanda pengiriman pada private storage.
        $pathPenanda = $this->pathPenandaPengiriman(
            $pengajuan->id_pengajuan
        );

        Storage::disk('private')->put(
            $pathPenanda,
            now()->toDateTimeString()
        );

        return redirect()
            ->route('peserta.dashboard')
            ->with(
                'success',
                'Pengajuan berhasil dikirim. Dokumen sekarang terkunci dan menunggu pemeriksaan admin.'
            );
    }

    /**
     * Melihat dokumen milik peserta yang sedang login.
     */
    public function lihat($id)
    {
        $peserta = auth('peserta')->user();

        $dokumen = Dokumen::where('id_dokumen', $id)
            ->whereHas('pengajuan', function ($query) use ($peserta) {
                $query->where('id_peserta', $peserta->id_peserta);
            })
            ->firstOrFail();

        abort_unless(
            Storage::disk('private')->exists($dokumen->file_path),
            404
        );

        return Storage::disk('private')->response(
            $dokumen->file_path
        );
    }
}
