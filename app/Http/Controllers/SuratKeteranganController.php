<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\LaporanAkhir;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SuratKeteranganController extends Controller
{
    /**
     * Menampilkan halaman Surat Keterangan peserta.
     */
    public function index(): View|RedirectResponse
    {
        $peserta = auth('peserta')->user();

        $pengajuan = Pengajuan::query()
            ->with([
                'suratPenerimaan',
                'logbook',
                'laporanAkhir',
                'sertifikatMagang',
                'hasilSeleksi',
            ])
            ->where('id_peserta', $peserta->id_peserta)
            ->latest('id_pengajuan')
            ->first();

        if (!$pengajuan) {
            return redirect()
                ->route('peserta.dashboard')
                ->with('error', 'Pengajuan magang belum tersedia.');
        }

        return view('peserta.surat-keterangan', compact(
            'peserta',
            'pengajuan'
        ));
    }

    /**
     * Mengunggah satu file PDF rekap logbook.
     */
    public function uploadLogbook(Request $request): RedirectResponse
    {
        $peserta = auth('peserta')->user();

        $pengajuan = $this->ambilPengajuanPeserta($peserta->id_peserta);

        if (!$pengajuan || $pengajuan->status_pengajuan !== 'Diterima') {
            return back()->with(
                'error',
                'Logbook hanya dapat diunggah setelah peserta diterima.'
            );
        }

        $validated = $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:pdf',
                'max:5120',
            ],
        ], [
            'file.required' => 'Silakan pilih file logbook.',
            'file.mimes' => 'Logbook harus berformat PDF.',
            'file.max' => 'Ukuran file maksimal 5 MB.',
        ]);

        $file = $validated['file'];

        $pathBaru = $file->store(
            'logbook/' . $pengajuan->id_pengajuan,
            'private'
        );

        $logbookLama = Logbook::where(
            'id_pengajuan',
            $pengajuan->id_pengajuan
        )->first();

        $pathLama = $logbookLama?->file_path;

        Logbook::updateOrCreate(
            ['id_pengajuan' => $pengajuan->id_pengajuan],
            [
                'nama_berkas' => $file->getClientOriginalName(),
                'file_path' => $pathBaru,
                'ukuran_berkas' => $file->getSize(),
                'tanggal_unggah' => now(),
            ]
        );

        if ($pathLama && $pathLama !== $pathBaru) {
            Storage::disk('private')->delete($pathLama);
        }

        return back()->with(
            'success',
            'Logbook rekap kegiatan berhasil diunggah.'
        );
    }

    /**
     * Mengunggah laporan akhir magang.
     */
    public function uploadLaporan(Request $request): RedirectResponse
    {
        $peserta = auth('peserta')->user();

        $pengajuan = $this->ambilPengajuanPeserta($peserta->id_peserta);

        if (!$pengajuan || $pengajuan->status_pengajuan !== 'Diterima') {
            return back()->with(
                'error',
                'Laporan akhir hanya dapat diunggah oleh peserta yang diterima.'
            );
        }

        if (now()->toDateString() < $pengajuan->tanggal_selesai->toDateString()) {
            return back()->with(
                'error',
                'Laporan akhir belum dapat diunggah karena masa magang belum selesai.'
            );
        }

        $validated = $request->validate([
            'file' => [
                'required',
                'file',
                'mimes:pdf',
                'max:5120',
            ],
        ], [
            'file.required' => 'Silakan pilih file laporan akhir.',
            'file.mimes' => 'Laporan akhir harus berformat PDF.',
            'file.max' => 'Ukuran file maksimal 5 MB.',
        ]);

        $file = $validated['file'];

        $pathBaru = $file->store(
            'laporan-akhir/' . $pengajuan->id_pengajuan,
            'private'
        );

        $laporanLama = LaporanAkhir::where(
            'id_pengajuan',
            $pengajuan->id_pengajuan
        )->first();

        $pathLama = $laporanLama?->file_path;

        LaporanAkhir::updateOrCreate(
            ['id_pengajuan' => $pengajuan->id_pengajuan],
            [
                'nama_berkas' => $file->getClientOriginalName(),
                'file_path' => $pathBaru,
                'ukuran_berkas' => $file->getSize(),
                'tanggal_unggah' => now(),
            ]
        );

        if ($pathLama && $pathLama !== $pathBaru) {
            Storage::disk('private')->delete($pathLama);
        }

        return back()->with(
            'success',
            'Laporan akhir berhasil diunggah.'
        );
    }

    /**
     * Melihat atau mengunduh dokumen milik peserta yang sedang login.
     */
    public function lihat(string $jenis): StreamedResponse
    {
        $peserta = auth('peserta')->user();

        $pengajuan = $this->ambilPengajuanPeserta($peserta->id_peserta);

        abort_unless($pengajuan, 404);

        $dokumen = match ($jenis) {
            'surat-penerimaan' => $pengajuan->suratPenerimaan,
            'logbook' => $pengajuan->logbook,
            'laporan-akhir' => $pengajuan->laporanAkhir,
            'sertifikat' => $pengajuan->sertifikatMagang,
            default => abort(404),
        };

        abort_unless($dokumen, 404);
        abort_unless(
            Storage::disk('private')->exists($dokumen->file_path),
            404
        );

        return Storage::disk('private')->download(
            $dokumen->file_path,
            $dokumen->nama_berkas
                ?? basename($dokumen->file_path)
        );
    }

    /**
     * Mengambil pengajuan milik peserta yang sedang login.
     */
    private function ambilPengajuanPeserta(int $idPeserta): ?Pengajuan
    {
        return Pengajuan::query()
            ->where('id_peserta', $idPeserta)
            ->latest('id_pengajuan')
            ->first();
    }
}
