<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AdminUptSertifikatController extends Controller
{
    public function index(Request $request)
    {
        // Dasar data: pengajuan khusus UPT TIKP
        // yang sudah diterima oleh pimpinan.
        $baseQuery = Pengajuan::query()
            ->where('tujuan_magang', 'UPT TIKP')
            ->whereHas('hasilSeleksi', function ($query) {
                $query->where('status', 'Diterima')
                    ->where('keputusan_pimpinan', 'Disetujui / ACC');
            });

        // Statistik halaman
        $totalPesertaAktif = (clone $baseQuery)->count();

        $totalLaporanTerunggah = (clone $baseQuery)
            ->whereHas('laporanAkhir')
            ->count();

        $totalBelumMengunggah = (clone $baseQuery)
            ->whereDoesntHave('laporanAkhir')
            ->count();

        $totalSertifikatDiterbitkan = (clone $baseQuery)
            ->whereHas('sertifikatMagang')
            ->count();

        // Query daftar peserta
        $pengajuanQuery = (clone $baseQuery)
            ->with([
                'peserta',
                'periode',
                'laporanAkhir',
                'penilaian',
                'sertifikatMagang',
            ]);

        // Pencarian nama peserta atau instansi
        if ($request->filled('cari')) {
            $cari = $request->cari;

            $pengajuanQuery->whereHas('peserta', function ($query) use ($cari) {
                $query->where('nama', 'like', "%{$cari}%")
                    ->orWhere('nama_instansi', 'like', "%{$cari}%");
            });
        }

        // Filter jenjang pendidikan
        if ($request->filled('jenjang')) {
            $pengajuanQuery->whereHas('peserta', function ($query) use ($request) {
                $query->where('jenjang_pendidikan', $request->jenjang);
            });
        }

        // Filter kategori
        $kategori = $request->kategori ?? 'semua';

        if ($kategori === 'menunggu_laporan') {
            $pengajuanQuery->whereDoesntHave('laporanAkhir');
        } elseif ($kategori === 'siap_diterbitkan') {
            $pengajuanQuery->whereHas('laporanAkhir')
                ->whereDoesntHave('sertifikatMagang');
        } elseif ($kategori === 'sertifikat_terbit') {
            $pengajuanQuery->whereHas('sertifikatMagang');
        }

        $daftarPengajuan = $pengajuanQuery
            ->orderByDesc('tanggal_pengajuan')
            ->paginate(10)
            ->withQueryString();

        return view('admin.upt.penerbitan-sertifikat', compact(
            'daftarPengajuan',
            'totalPesertaAktif',
            'totalLaporanTerunggah',
            'totalBelumMengunggah',
            'totalSertifikatDiterbitkan',
            'kategori'
        ));
    }
}
