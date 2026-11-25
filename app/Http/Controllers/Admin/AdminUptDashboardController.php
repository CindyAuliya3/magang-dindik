<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalWawancara;
use App\Models\Pengajuan;
use App\Models\PeriodePenerimaan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUptDashboardController extends Controller
{
    public function index(Request $request): View
    {
        // Mengambil akun petugas yang sedang login.
        $admin = auth('petugas')->user();

        // Mengambil seluruh daftar periode penerimaan.
        $daftarPeriode = PeriodePenerimaan::query()
            ->get()
            ->sortBy(function ($periode) {
                return match ($periode->status_tampilan) {
                    'Berjalan' => 1,
                    'Akan Datang' => 2,
                    'Selesai' => 3,
                    default => 4,
                };
            })
            ->values();

        /*
         * Menentukan periode yang sedang berlangsung
         * berdasarkan tanggal hari ini.
         *
         * Tidak menggunakan status_periode dari database
         * karena status tersebut hanya menyimpan
         * Berjalan dan Selesai.
         */
        $periodeAktif = PeriodePenerimaan::query()
            ->whereDate('tanggal_mulai', '<=', today())
            ->whereDate('tanggal_selesai', '>=', today())
            ->orderByDesc('tanggal_mulai')
            ->first();

        // Mengambil periode yang dipilih melalui filter.
        $periodeId = $request->query('periode');

        /*
         * Jika filter kosong atau ID periode tidak ditemukan,
         * gunakan periode yang sedang berlangsung.
         */
        if (
            !$periodeId ||
            !$daftarPeriode->contains('id_periode', (int) $periodeId)
        ) {
            $periodeId = $periodeAktif?->id_periode;
        } else {
            $periodeId = (int) $periodeId;
        }

        // Menentukan periode yang sedang dipilih pada filter.
        $periodeTerpilih = $daftarPeriode->firstWhere(
            'id_periode',
            $periodeId
        );

        // Filter jenjang pendidikan.
        $jenjang = $request->query('jenjang', 'SEMUA');

        if (!in_array($jenjang, ['SEMUA', 'MAHASISWA', 'SMK'], true)) {
            $jenjang = 'SEMUA';
        }

        /*
         * Query dasar pengajuan khusus UPT TIKP.
         * Filter periode dan jenjang digunakan bersama
         * oleh seluruh ringkasan dashboard.
         */
        $buatQueryPengajuan = function () use ($periodeId, $jenjang) {
            $query = Pengajuan::query()
                ->where('tujuan_magang', 'UPT TIKP');

            if ($periodeId) {
                $query->where('id_periode', $periodeId);
            } else {
                // Jika belum ada periode yang berlangsung,
                // jangan tampilkan pengajuan dari semua periode.
                $query->whereRaw('1 = 0');
            }

            if ($jenjang !== 'SEMUA') {
                $query->whereHas('peserta', function ($peserta) use ($jenjang) {
                    $peserta->where('jenjang_pendidikan', $jenjang);
                });
            }

            return $query;
        };

        $totalPengajuan = $buatQueryPengajuan()->count();

        $pengajuanMenunggu = $buatQueryPengajuan()
            ->where('status_pengajuan', 'Diajukan')
            ->count();

        $berkasDiteruskan = $buatQueryPengajuan()
            ->whereIn('status_pengajuan', [
                'Terverifikasi',
                'Wawancara',
                'Diterima',
                'Ditolak',
            ])
            ->count();

        $antreanWawancara = $buatQueryPengajuan()
            ->where('status_pengajuan', 'Terverifikasi')
            ->count();

        $jadwalWawancara = $buatQueryPengajuan()
            ->where('status_pengajuan', 'Wawancara')
            ->count();

        $pesertaDiterima = $buatQueryPengajuan()
            ->where('status_pengajuan', 'Diterima')
            ->count();

        $pesertaDitolak = $buatQueryPengajuan()
            ->where('status_pengajuan', 'Ditolak')
            ->count();

        $distribusiBidang = $buatQueryPengajuan()
            ->selectRaw("
                COALESCE(sub_unit_penempatan, 'Belum Ditentukan')
                as nama_sub_unit,
                COUNT(*) as total_pendaftar
            ")
            ->groupBy('sub_unit_penempatan')
            ->orderByDesc('total_pendaftar')
            ->get();

        $komposisiJenjang = [
            'MAHASISWA' => $buatQueryPengajuan()
                ->whereHas('peserta', function ($peserta) {
                    $peserta->where('jenjang_pendidikan', 'MAHASISWA');
                })
                ->count(),

            'SMK' => $buatQueryPengajuan()
                ->whereHas('peserta', function ($peserta) {
                    $peserta->where('jenjang_pendidikan', 'SMK');
                })
                ->count(),
        ];

        $jadwalTerdekat = JadwalWawancara::query()
            ->where('status_pelaksanaan', 'Dijadwalkan')
            ->whereDate('tanggal', '>=', today())
            ->whereHas('pengajuan', function ($pengajuan) use (
                $periodeId,
                $jenjang
            ) {
                $pengajuan->where('tujuan_magang', 'UPT TIKP');

                if ($periodeId) {
                    $pengajuan->where('id_periode', $periodeId);
                } else {
                    $pengajuan->whereRaw('1 = 0');
                }

                if ($jenjang !== 'SEMUA') {
                    $pengajuan->whereHas('peserta', function ($peserta) use ($jenjang) {
                        $peserta->where('jenjang_pendidikan', $jenjang);
                    });
                }
            })
            ->with([
                'pengajuan.peserta',
            ])
            ->orderBy('tanggal')
            ->orderBy('waktu')
            ->limit(5)
            ->get();

        $totalDiputuskan = $pesertaDiterima + $pesertaDitolak;

        $persentaseDiterima = $totalDiputuskan > 0
            ? round(($pesertaDiterima / $totalDiputuskan) * 100)
            : 0;


        $jam = now()->hour;

        $sapaan = match (true) {
            $jam >= 4 && $jam < 11 => 'Pagi',
            $jam >= 11 && $jam < 15 => 'Siang',
            $jam >= 15 && $jam < 18 => 'Sore',
            default => 'Malam',
        };


        return view('admin.upt.dashboard', compact(
            'admin',
            'daftarPeriode',
            'periodeAktif',
            'periodeTerpilih',
            'periodeId',
            'jenjang',
            'totalPengajuan',
            'pengajuanMenunggu',
            'berkasDiteruskan',
            'antreanWawancara',
            'jadwalWawancara',
            'pesertaDiterima',
            'pesertaDitolak',
            'distribusiBidang',
            'komposisiJenjang',
            'jadwalTerdekat',
            'totalDiputuskan',
            'persentaseDiterima',
            'sapaan'
        ));
    }
}
