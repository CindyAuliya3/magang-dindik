<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\HasilSeleksi;
use App\Models\SuratPenerimaan;
use App\Models\PeriodePenerimaan;
use App\Models\KuotaPeriode;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KepalaUptDashboardController extends Controller
{
    /**
     * Dashboard Kepala UPT TIKP.
     */
    public function index(Request $request): View
    {
        // 1. Mengambil daftar periode penerimaan
        $daftarPeriode = PeriodePenerimaan::query()
            ->orderByDesc('tanggal_mulai')
            ->get();

        // 2. Menentukan periode aktif berdasarkan tanggal
        $periodeAktif = $daftarPeriode->first(function ($periode) {
            return today()->between(
                $periode->tanggal_mulai,
                $periode->tanggal_selesai
            );
        });

        // 3. Menentukan periode yang dipilih
        $periodeId = $request->query('periode');

        if ($periodeId && $daftarPeriode->contains('id_periode', $periodeId)) {
            $periodeTerpilih = $daftarPeriode->firstWhere(
                'id_periode',
                $periodeId
            );
        } else {
            $periodeTerpilih = $periodeAktif ?? $daftarPeriode->first();
        }

        $periodeId = $periodeTerpilih?->id_periode;

        // 4. Query dasar pengajuan khusus UPT TIKP
        $queryPengajuan = Pengajuan::query()
            ->where('tujuan_magang', 'UPT TIKP');

        if ($periodeId) {
            $queryPengajuan->where('id_periode', $periodeId);
        }

        // 5. Ringkasan pengajuan
        $totalPengajuan = (clone $queryPengajuan)->count();

        $totalDiterima = (clone $queryPengajuan)
            ->whereHas('hasilSeleksi', function ($query) {
                $query->where('status', 'Diterima');
            })
            ->count();

        $totalDitolak = (clone $queryPengajuan)
            ->whereHas('hasilSeleksi', function ($query) {
                $query->where('status', 'Ditolak');
            })
            ->count();

        $totalBelumDitetapkan = (clone $queryPengajuan)
            ->whereDoesntHave('hasilSeleksi')
            ->count();

        // 6. Data kuota per sub-unit
        $daftarKuota = collect();

        if ($periodeId) {
            $daftarKuota = KuotaPeriode::query()
                ->where('id_periode', $periodeId)
                ->where('unit_tujuan', 'UPT TIKP')
                ->orderBy('sub_unit')
                ->get()
                ->map(function ($kuota) use ($queryPengajuan) {

                    $jumlahDiterima = (clone $queryPengajuan)
                        ->where('sub_unit_penempatan', $kuota->sub_unit)
                        ->whereHas('hasilSeleksi', function ($query) {
                            $query->where('status', 'Diterima');
                        })
                        ->count();

                    return [
                        'sub_unit' => $kuota->sub_unit,
                        'kuota' => $kuota->kuota_penerimaan,
                        'diterima' => $jumlahDiterima,
                        'sisa' => max(
                            0,
                            $kuota->kuota_penerimaan - $jumlahDiterima
                        ),
                        'persentase' => $kuota->kuota_penerimaan > 0
                            ? round(
                                ($jumlahDiterima / $kuota->kuota_penerimaan) * 100,
                                1
                            )
                            : 0,
                    ];
                });
        }

        // 7. Keputusan seleksi terbaru
        $keputusanTerbaru = HasilSeleksi::query()
            ->with(['pengajuan.peserta', 'petugasInput'])
            ->whereHas('pengajuan', function ($query) use ($periodeId) {
                $query->where('tujuan_magang', 'UPT TIKP');

                if ($periodeId) {
                    $query->where('id_periode', $periodeId);
                }
            })
            ->orderByDesc('tanggal_penetapan')
            ->limit(5)
            ->get();

        // 8. Surat penerimaan terbaru
        $suratTerbaru = SuratPenerimaan::query()
            ->with(['pengajuan.peserta', 'petugasUnggah'])
            ->whereHas('pengajuan', function ($query) use ($periodeId) {
                $query->where('tujuan_magang', 'UPT TIKP');

                if ($periodeId) {
                    $query->where('id_periode', $periodeId);
                }
            })
            ->orderByDesc('tanggal_terbit')
            ->limit(5)
            ->get();

        // 9. Menghitung seluruh surat penerimaan yang sudah terbit
        $totalSuratTerbit = SuratPenerimaan::query()
            ->whereHas('pengajuan', function ($query) use ($periodeId) {
                $query->where('tujuan_magang', 'UPT TIKP');

                if ($periodeId) {
                    $query->where('id_periode', $periodeId);
                }
            })
            ->count();

        // 10. Mengirim data ke halaman Dashboard Kepala UPT
        return view('kepala.upt.dashboard', compact(
            'daftarPeriode',
            'periodeTerpilih',
            'totalPengajuan',
            'totalDiterima',
            'totalDitolak',
            'totalBelumDitetapkan',
            'daftarKuota',
            'keputusanTerbaru',
            'suratTerbaru',
            'totalSuratTerbit'
        ));
    }

    /**
     * Halaman Monitoring Seleksi Kepala UPT TIKP.
     * Halaman ini hanya menampilkan data (read-only).
     */
    public function monitoring(Request $request): View
    {
        // 1. Mengambil daftar periode
        $daftarPeriode = PeriodePenerimaan::query()
            ->orderByDesc('tanggal_mulai')
            ->get();

        // 2. Menentukan periode aktif
        $periodeAktif = $daftarPeriode->first(function ($periode) {
            return today()->between(
                $periode->tanggal_mulai,
                $periode->tanggal_selesai
            );
        });

        // 3. Menentukan periode yang dipilih
        $periodeId = $request->query('periode');

        if (
            $periodeId &&
            $daftarPeriode->contains('id_periode', $periodeId)
        ) {
            $periodeTerpilih = $daftarPeriode->firstWhere(
                'id_periode',
                $periodeId
            );
        } else {
            $periodeTerpilih = $periodeAktif ?? $daftarPeriode->first();
        }

        $periodeId = $periodeTerpilih?->id_periode;

        // 4. Mengambil parameter pencarian dan filter
        $keyword = trim($request->query('cari', ''));

        $tab = $request->query('tab', 'semua');

        $statusFilter = $request->query('status', '');

        // 5. Query dasar pengajuan UPT TIKP
        $query = Pengajuan::query()
            ->with([
                'peserta',
                'periode',
                'hasilSeleksi',
                'jadwalWawancara',
            ])
            ->where('tujuan_magang', 'UPT TIKP');

        // Filter periode
        if ($periodeId) {
            $query->where('id_periode', $periodeId);
        }

        // 6. Filter berdasarkan tab
        if ($tab === 'seleksi') {
            $query->whereIn('status_pengajuan', [
                'Diajukan',
                'Terverifikasi',
                'Wawancara',
            ]);
        } elseif ($tab === 'selesai') {
            $query->whereIn('status_pengajuan', [
                'Diterima',
                'Ditolak',
            ]);
        } else {
            $tab = 'semua';
        }

        // 7. Pencarian nama, email, atau nama instansi
        if ($keyword !== '') {
            $query->whereHas('peserta', function ($peserta) use ($keyword) {
                $peserta->where('nama', 'like', "%{$keyword}%")
                    ->orWhere('email', 'like', "%{$keyword}%")
                    ->orWhere('nama_instansi', 'like', "%{$keyword}%");
            });
        }

        // 8. Filter status
        $daftarStatus = [
            'Diajukan',
            'Terverifikasi',
            'Wawancara',
            'Diterima',
            'Ditolak',
        ];

        if (in_array($statusFilter, $daftarStatus, true)) {
            $query->where('status_pengajuan', $statusFilter);
        } else {
            $statusFilter = '';
        }

        // 9. Menghitung ringkasan berdasarkan periode
        $queryRingkasan = Pengajuan::query()
            ->where('tujuan_magang', 'UPT TIKP');

        if ($periodeId) {
            $queryRingkasan->where('id_periode', $periodeId);
        }

        $totalSemua = (clone $queryRingkasan)->count();

        $totalSeleksi = (clone $queryRingkasan)
            ->whereIn('status_pengajuan', [
                'Diajukan',
                'Terverifikasi',
                'Wawancara',
            ])
            ->count();

        $totalSelesai = (clone $queryRingkasan)
            ->whereIn('status_pengajuan', [
                'Diterima',
                'Ditolak',
            ])
            ->count();

        // 10. Mengambil data dengan pagination
        $daftarPengajuan = $query
            ->orderByDesc('tanggal_pengajuan')
            ->orderByDesc('id_pengajuan')
            ->paginate(10)
            ->withQueryString();

        // 11. Mengirim data ke halaman Monitoring Seleksi
        return view('kepala.upt.monitoring-seleksi', compact(
            'daftarPeriode',
            'periodeTerpilih',
            'keyword',
            'tab',
            'statusFilter',
            'daftarStatus',
            'daftarPengajuan',
            'totalSemua',
            'totalSeleksi',
            'totalSelesai'
        ));
    }

    /**
     * Halaman Keputusan & Surat Kepala UPT TIKP.
     * Halaman ini hanya digunakan untuk memantau data (read-only).
     */
    public function keputusanSurat(Request $request): View
    {
        // 1. Mengambil daftar periode
        $daftarPeriode = PeriodePenerimaan::query()
            ->orderByDesc('tanggal_mulai')
            ->get();

        // 2. Menentukan periode aktif
        $periodeAktif = $daftarPeriode->first(function ($periode) {
            return today()->between(
                $periode->tanggal_mulai,
                $periode->tanggal_selesai
            );
        });

        // 3. Menentukan periode yang dipilih
        $periodeId = $request->query('periode');

        if ($periodeId && $daftarPeriode->contains('id_periode', $periodeId)) {
            $periodeTerpilih = $daftarPeriode->firstWhere(
                'id_periode',
                $periodeId
            );
        } else {
            $periodeTerpilih = $periodeAktif ?? $daftarPeriode->first();
        }

        $periodeId = $periodeTerpilih?->id_periode;

        // 4. Query keputusan seleksi khusus UPT TIKP
        $queryKeputusan = HasilSeleksi::query()
            ->with([
                'pengajuan.peserta',
                'pengajuan.periode',
                'petugasInput',
            ])
            ->whereHas('pengajuan', function ($query) use ($periodeId) {
                $query->where('tujuan_magang', 'UPT TIKP');

                if ($periodeId) {
                    $query->where('id_periode', $periodeId);
                }
            });

        // 5. Ringkasan keputusan
        $totalKeputusan = (clone $queryKeputusan)->count();

        $totalDiterima = (clone $queryKeputusan)
            ->where('status', 'Diterima')
            ->count();

        $totalDitolak = (clone $queryKeputusan)
            ->where('status', 'Ditolak')
            ->count();

        // 6. Daftar keputusan dengan pagination
        $daftarKeputusan = (clone $queryKeputusan)
            ->orderByDesc('tanggal_penetapan')
            ->paginate(10, ['*'], 'halaman_keputusan')
            ->withQueryString();

        // 7. Query surat penerimaan khusus UPT TIKP
        $querySurat = SuratPenerimaan::query()
            ->with([
                'pengajuan.peserta',
                'pengajuan.periode',
                'petugasUnggah',
            ])
            ->whereHas('pengajuan', function ($query) use ($periodeId) {
                $query->where('tujuan_magang', 'UPT TIKP');

                if ($periodeId) {
                    $query->where('id_periode', $periodeId);
                }
            });

        // 8. Ringkasan surat
        $totalSurat = (clone $querySurat)->count();

        // 9. Daftar surat dengan pagination
        $daftarSurat = $querySurat
            ->orderByDesc('tanggal_terbit')
            ->paginate(10, ['*'], 'halaman_surat')
            ->withQueryString();

        // 10. Mengirim data ke halaman Keputusan & Surat
        return view('kepala.upt.keputusan-surat', compact(
            'daftarPeriode',
            'periodeTerpilih',
            'totalKeputusan',
            'totalDiterima',
            'totalDitolak',
            'daftarKeputusan',
            'totalSurat',
            'daftarSurat'
        ));
    }
}
