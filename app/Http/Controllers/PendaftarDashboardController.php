<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;

class PendaftarDashboardController extends Controller
{
    /**
     * Dashboard peserta.
     */
    public function index(Request $request)
    {
        $peserta = auth('peserta')->user();

        // Mengambil pengajuan terbaru milik peserta.
        $pengajuan = Pengajuan::with([
            'hasilSeleksi',
            'suratPenerimaan',
            'laporanAkhir',
            'sertifikatMagang',
        ])
            ->where('id_peserta', $peserta->id_peserta)
            ->latest('id_pengajuan')
            ->first();

        // Memeriksa apakah pengajuan sudah dikirim.
        $sudahDikirim = $pengajuan
            ? Storage::disk('private')->exists(
                "status-pengajuan/{$pengajuan->id_pengajuan}/terkirim.flag"
            )
            : false;

        // Mengambil jadwal wawancara terbaru yang masih dijadwalkan.
        $jadwalWawancara = $pengajuan
            ? $pengajuan->jadwalWawancara()
                ->where('status_pelaksanaan', 'Dijadwalkan')
                ->orderByDesc('tanggal')
                ->orderByDesc('waktu')
                ->first()
            : null;

        $hasilSeleksi = $pengajuan?->hasilSeleksi;
        $suratPenerimaan = $pengajuan?->suratPenerimaan;
        $laporanAkhir = $pengajuan?->laporanAkhir;
        $sertifikat = $pengajuan?->sertifikatMagang;

        // Status konfirmasi kehadiran wawancara.
        $wawancaraTerkonfirmasi = $jadwalWawancara
            && $jadwalWawancara->status_kehadiran === 'Terkonfirmasi';

        return view('peserta.dashboard', compact(
            'peserta',
            'pengajuan',
            'jadwalWawancara',
            'hasilSeleksi',
            'suratPenerimaan',
            'laporanAkhir',
            'sertifikat',
            'sudahDikirim',
            'wawancaraTerkonfirmasi'
        ));
    }

    /**
     * Konfirmasi kehadiran wawancara oleh peserta.
     */
    public function konfirmasiKehadiran(int $id): RedirectResponse
    {
        $peserta = auth('peserta')->user();

        DB::transaction(function () use ($id, $peserta) {

            // Pastikan pengajuan benar-benar milik peserta yang login.
            $pengajuan = Pengajuan::query()
                ->where('id_pengajuan', $id)
                ->where('id_peserta', $peserta->id_peserta)
                ->where('status_pengajuan', 'Wawancara')
                ->lockForUpdate()
                ->firstOrFail();

            // Ambil jadwal wawancara terbaru yang masih aktif.
            $jadwal = $pengajuan->jadwalWawancara()
                ->where('status_pelaksanaan', 'Dijadwalkan')
                ->orderByDesc('tanggal')
                ->orderByDesc('waktu')
                ->lockForUpdate()
                ->first();

            if (!$jadwal) {
                abort(404, 'Jadwal wawancara tidak ditemukan.');
            }

            // Jangan mengubah data jika sudah dikonfirmasi.
            if ($jadwal->status_kehadiran !== 'Terkonfirmasi') {
                $jadwal->update([
                    'status_kehadiran' => 'Terkonfirmasi',
                ]);
            }
        });

        return redirect()
            ->route('peserta.dashboard')
            ->with('success', 'Kehadiran wawancara berhasil dikonfirmasi.');
    }
}
