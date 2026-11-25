<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\PeriodePenerimaan;
use Illuminate\Http\Request;

class AdminPusatDashboardController extends Controller
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

        // Mengambil periode yang dipilih
        $periodeTerpilih = $request->query('periode');

        // Mengambil seluruh daftar periode
        $daftarPeriode = PeriodePenerimaan::query()
            ->orderByDesc('tanggal_mulai')
            ->get();

        // Query dasar pengajuan
        $pengajuanDasar = Pengajuan::query()
            ->when($periodeTerpilih, function ($query) use ($periodeTerpilih) {
                $query->where('id_periode', $periodeTerpilih);
            });

        // Total seluruh pengajuan
        $totalPengajuan = (clone $pengajuanDasar)->count();

        // Pengajuan yang menunggu verifikasi
        $antreanVerifikasi = (clone $pengajuanDasar)
            ->where('status_pengajuan', 'Diajukan')
            ->count();

        // Pengajuan yang sudah terverifikasi
        $berkasTerverifikasi = (clone $pengajuanDasar)
            ->where('status_pengajuan', 'Terverifikasi')
            ->count();

        // Pengajuan yang ditolak
        $pengajuanDitolak = (clone $pengajuanDasar)
            ->where('status_pengajuan', 'Ditolak')
            ->count();

        $dataPendidikan = (clone $pengajuanDasar)
            ->with('peserta:id_peserta,jenjang_pendidikan')
            ->get();

        $komposisiPendidikan = $dataPendidikan
            ->filter(fn ($item) => $item->peserta !== null)
            ->groupBy(function ($item) {
                return $item->peserta->jenjang_pendidikan
                    ?: 'Tidak diketahui';
            })
            ->map(fn ($items) => $items->count());

        $daftarAntrean = (clone $pengajuanDasar)
            ->with(['peserta', 'periode'])
            ->where('status_pengajuan', 'Diajukan')
            ->orderByDesc('tanggal_pengajuan')
            ->limit(5)
            ->get();

        return view('admin.pusat.dashboard', compact(
            'daftarPeriode',
            'periodeTerpilih',
            'totalPengajuan',
            'antreanVerifikasi',
            'berkasTerverifikasi',
            'pengajuanDitolak',
            'komposisiPendidikan',
            'daftarAntrean'
        ));
    }
}
