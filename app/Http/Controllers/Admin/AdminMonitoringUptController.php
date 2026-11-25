<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\PeriodePenerimaan;
use Illuminate\Http\Request;

class AdminMonitoringUptController extends Controller
{
    public function index(Request $request)
    {
        // Validasi filter periode
        $request->validate([
            'periode' => [
                'nullable',
                'integer',
                'exists:periode_penerimaan,id_periode',
            ],
        ]);

        // Periode terpilih
        $periodeTerpilih = $request->query('periode');

        // Daftar periode
        $daftarPeriode = PeriodePenerimaan::query()
            ->orderByDesc('tanggal_mulai')
            ->get();

        // Query dasar khusus pengajuan UPT TIKP
        $pengajuanDasar = Pengajuan::query()
            ->where('tujuan_magang', 'UPT TIKP')
            ->when($periodeTerpilih, function ($query) use ($periodeTerpilih) {
                $query->where('id_periode', $periodeTerpilih);
            });

        // Total pengajuan
        $totalPengajuan = (clone $pengajuanDasar)->count();

        // Pengajuan menunggu verifikasi
        $antreanVerifikasi = (clone $pengajuanDasar)
            ->where('status_pengajuan', 'Diajukan')
            ->count();

        // Pengajuan terverifikasi
        $berkasTerverifikasi = (clone $pengajuanDasar)
            ->where('status_pengajuan', 'Terverifikasi')
            ->count();

        // Pengajuan ditolak
        $pengajuanDitolak = (clone $pengajuanDasar)
            ->where('status_pengajuan', 'Ditolak')
            ->count();

        // Komposisi jenjang pendidikan
        $dataPendidikan = (clone $pengajuanDasar)
            ->with('peserta:id_peserta,jenjang_pendidikan')
            ->get();

        $komposisiPendidikan = $dataPendidikan
            ->filter(fn ($item) => $item->peserta !== null)
            ->groupBy(fn ($item) =>
                strtoupper($item->peserta->jenjang_pendidikan ?? 'TIDAK DIKETAHUI')
            )
            ->map(fn ($items) => $items->count());

        // Daftar pengajuan yang menunggu verifikasi
        $daftarAntrean = (clone $pengajuanDasar)
            ->with(['peserta', 'periode'])
            ->where('status_pengajuan', 'Diajukan')
            ->orderByDesc('tanggal_pengajuan')
            ->limit(5)
            ->get();

        // Menyesuaikan nama variabel dengan Blade
        $jumlahBerkasMasuk = $berkasTerverifikasi;
        $ditolakGugur = $pengajuanDitolak;

        // Belum tersedia data jadwal wawancara dari query ini.
        // Jangan menyamakan antrean verifikasi dengan antrean wawancara.
        $antreanWawancara = 0;
        $daftarWawancara = collect();

        // Data yang belum memiliki query database
        $pesertaDiterima = 0;
        $persenKuota = 0;
        $daftarBagian = [];
        $detailJenjang = [];

        return view('admin.monitoring-upt.dashboard', compact(
            'daftarPeriode',
            'periodeTerpilih',
            'totalPengajuan',
            'antreanVerifikasi',
            'berkasTerverifikasi',
            'pengajuanDitolak',
            'jumlahBerkasMasuk',
            'antreanWawancara',
            'pesertaDiterima',
            'persenKuota',
            'ditolakGugur',
            'komposisiPendidikan',
            'daftarAntrean',
            'daftarWawancara',
            'daftarBagian',
            'detailJenjang'
        ));
    }
}
