<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\PeriodePenerimaan;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminUptRiwayatController extends Controller
{
    /**
     * Mengambil data arsip dokumen UPT TIKP.
     */
    private function ambilDataArsip(Request $request)
    {
        $query = Pengajuan::with([
            'peserta',
            'periode',
            'hasilSeleksi',
            'suratPenerimaan',
        ])
            ->where('tujuan_magang', 'UPT TIKP')
            ->whereHas('hasilSeleksi', function ($q) {
                $q->whereIn('keputusan_pimpinan', [
                    'Disetujui / ACC',
                    'Ditolak',
                ]);
            });

        // Filter periode
        if ($request->filled('periode')) {
            $query->where('id_periode', $request->periode);
        }

        $pengajuan = $query->get();

        // Membentuk data arsip berdasarkan dokumen/keputusan.
        $arsip = $pengajuan->map(function ($item) {
            $hasil = $item->hasilSeleksi;
            $surat = $item->suratPenerimaan;

            if (!$hasil) {
                return null;
            }

            // Pengajuan diterima hanya masuk arsip jika
            // surat penerimaan sudah diterbitkan.
            if ($hasil->keputusan_pimpinan === 'Disetujui / ACC') {
                if (!$surat) {
                    return null;
                }

                return [
                    'id_pengajuan' => $item->id_pengajuan,
                    'nama' => $item->peserta->nama ?? '-',
                    'instansi' => $item->peserta->nama_instansi ?? '-',
                    'jenjang' => $item->peserta->jenjang_pendidikan ?? '-',
                    'jurusan' => $item->peserta->jurusan ?? '-',
                    'periode' => $item->periode->nama_periode ?? '-',
                    'jenis_dokumen' => 'Surat Penerimaan Magang',
                    'nomor_dokumen' => $surat->nomor_surat ?? '-',
                    'tanggal_terbit' => $surat->tanggal_terbit,
                    'status' => 'Diterima',
                    'file_path' => $surat->file_path,
                ];
            }

            // Data penolakan berasal dari hasil seleksi.
            if ($hasil->keputusan_pimpinan === 'Ditolak') {
                return [
                    'id_pengajuan' => $item->id_pengajuan,
                    'nama' => $item->peserta->nama ?? '-',
                    'instansi' => $item->peserta->nama_instansi ?? '-',
                    'jenjang' => $item->peserta->jenjang_pendidikan ?? '-',
                    'jurusan' => $item->peserta->jurusan ?? '-',
                    'periode' => $item->periode->nama_periode ?? '-',
                    'jenis_dokumen' => 'Keputusan Penolakan',
                    'nomor_dokumen' => '-',
                    'tanggal_terbit' => $hasil->tanggal_penetapan,
                    'status' => 'Ditolak',
                    'file_path' => null,
                ];
            }

            return null;
        })->filter()->values();

        // Pencarian nama, instansi, dan ID pengajuan.
        if ($request->filled('cari')) {
            $cari = strtolower($request->cari);

            $arsip = $arsip->filter(function ($item) use ($cari) {
                return str_contains(strtolower($item['nama']), $cari)
                    || str_contains(strtolower($item['instansi']), $cari)
                    || str_contains(
                        strtolower((string) $item['id_pengajuan']),
                        $cari
                    );
            })->values();
        }

        // Filter jenis dokumen.
        if ($request->filled('jenis_dokumen')) {
            $arsip = $arsip->filter(function ($item) use ($request) {
                return $item['jenis_dokumen'] === $request->jenis_dokumen;
            })->values();
        }

        // Filter jenjang pendidikan.
        if ($request->filled('jenjang')) {
            $arsip = $arsip->filter(function ($item) use ($request) {
                return $item['jenjang'] === $request->jenjang;
            })->values();
        }

        // Urutkan berdasarkan tanggal terbaru.
        return $arsip->sortByDesc(function ($item) {
            return $item['tanggal_terbit']?->timestamp ?? 0;
        })->values();
    }

    /**
     * Menampilkan halaman riwayat.
     */
    public function index(Request $request)
    {
        // Statistik mengikuti periode yang dipilih,
        // tetapi tidak terpengaruh pencarian dan filter tabel.
        $requestStatistik = new Request();

        if ($request->filled('periode')) {
            $requestStatistik->merge([
                'periode' => $request->periode,
            ]);
        }

        $dataStatistik = $this->ambilDataArsip($requestStatistik);

        $totalDokumenDiproses = $dataStatistik->count();

        $totalSuratDiterbitkan = $dataStatistik
            ->where('status', 'Diterima')
            ->count();

        $totalPengajuanDitolak = $dataStatistik
            ->where('status', 'Ditolak')
            ->count();

        // Data tabel mengikuti semua filter.
        $dataArsip = $this->ambilDataArsip($request);

        // Pagination 7 data per halaman sesuai Figma.
        $perPage = 7;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $daftarArsip = new LengthAwarePaginator(
            $dataArsip->forPage($currentPage, $perPage)->values(),
            $dataArsip->count(),
            $perPage,
            $currentPage,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );

        $daftarPeriode = PeriodePenerimaan::orderByDesc('tanggal_mulai')
            ->get();

        return view('admin.upt.riwayat', compact(
            'daftarArsip',
            'daftarPeriode',
            'totalDokumenDiproses',
            'totalSuratDiterbitkan',
            'totalPengajuanDitolak'
        ));
    }

    /**
     * Mengekspor arsip sesuai filter yang dipilih.
     */
    public function export(Request $request)
    {
        $dataArsip = $this->ambilDataArsip($request);

        $namaFile = 'arsip-dokumen-magang-upt-tikp-'
            . now()->format('Ymd-His')
            . '.csv';

        return response()->streamDownload(function () use ($dataArsip) {
            $handle = fopen('php://output', 'w');

            // BOM agar karakter CSV terbaca dengan baik di Excel.
            fwrite($handle, "\xEF\xBB\xBF");

            fputcsv($handle, [
                'No',
                'ID Pengajuan',
                'Nama Kandidat',
                'Institusi',
                'Jenjang Pendidikan',
                'Jurusan',
                'Periode Magang',
                'Jenis Dokumen',
                'Nomor Dokumen',
                'Tanggal Terbit',
                'Status',
            ], ';');

            foreach ($dataArsip as $index => $item) {
                $tanggal = $item['tanggal_terbit'];

                fputcsv($handle, [
                    $index + 1,
                    $item['id_pengajuan'],
                    $item['nama'],
                    $item['instansi'],
                    $item['jenjang'],
                    $item['jurusan'],
                    $item['periode'],
                    $item['jenis_dokumen'],
                    $item['nomor_dokumen'],
                    $tanggal ? $tanggal->format('d-m-Y') : '-',
                    $item['status'],
                ], ';');
            }

            fclose($handle);
        }, $namaFile, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
