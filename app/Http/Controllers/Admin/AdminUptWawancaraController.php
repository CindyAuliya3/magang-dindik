<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalWawancara;
use App\Models\Pengajuan;
use App\Models\PeriodePenerimaan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminUptWawancaraController extends Controller
{
    /**
     * Menampilkan daftar pengajuan untuk seleksi wawancara.
     */
    public function index(Request $request): View
    {
        $admin = auth('petugas')->user();

        // Mengambil periode penerimaan yang sedang aktif.
        $periodeAktif = PeriodePenerimaan::query()
            ->whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->first();

        // Mengambil seluruh daftar periode untuk filter.
        $daftarPeriode = PeriodePenerimaan::query()
            ->orderByDesc('tanggal_mulai')
            ->get();

        // Nilai filter dari request.
        $periodeId = $request->filled('periode')
            ? $request->periode
            : ($periodeAktif?->id_periode);

        $jenjang = $request->input('jenjang', 'SEMUA');
        $status = $request->input('status', 'SEMUA');
        $cari = trim($request->input('cari', ''));

        /*
         * QUERY DASAR
         * Hanya mengambil pengajuan untuk UPT TIKP
         * yang sudah diverifikasi Admin Pusat atau sedang wawancara.
         */
        $queryDasar = Pengajuan::query()
            ->where('tujuan_magang', 'UPT TIKP')
            ->whereIn('status_pengajuan', [
                'Terverifikasi',
                'Wawancara',
            ]);

        // Filter periode.
        if ($periodeId) {
            $queryDasar->where('id_periode', $periodeId);
        }

        // Filter jenjang pendidikan.
        if (in_array($jenjang, ['SMK', 'MAHASISWA'], true)) {
            $queryDasar->whereHas('peserta', function ($peserta) use ($jenjang) {
                $peserta->where('jenjang_pendidikan', $jenjang);
            });
        }

        /*
         * RINGKASAN KANDIDAT
         * Ringkasan mengikuti filter periode dan jenjang,
         * tetapi tidak terpengaruh pencarian maupun filter status tabel.
         */

        // Total kandidat yang siap mengikuti wawancara.
        $totalSiapWawancara = (clone $queryDasar)->count();

        // Kandidat yang belum memiliki jadwal aktif.
        $belumDijadwalkan = (clone $queryDasar)
            ->where('status_pengajuan', 'Terverifikasi')
            ->whereDoesntHave('jadwalWawancara', function ($jadwal) {
                $jadwal->where('status_pelaksanaan', 'Dijadwalkan');
            })
            ->count();

        // Kandidat yang sudah mengonfirmasi jadwal wawancara.
        $jadwalTerkonfirmasi = (clone $queryDasar)
            ->where('status_pengajuan', 'Wawancara')
            ->whereHas('jadwalWawancara', function ($jadwal) {
                $jadwal->where('status_pelaksanaan', 'Dijadwalkan')
                    ->where('status_kehadiran', 'Terkonfirmasi');
            })
            ->count();

        /*
         * QUERY TABEL
         * Menggunakan query dasar agar filter periode dan jenjang
         * tetap diterapkan.
         */
        $queryTabel = clone $queryDasar;

        // Filter status tabel.
        if ($status === 'MENUNGGU_JADWAL') {
            $queryTabel
                ->where('status_pengajuan', 'Terverifikasi')
                ->whereDoesntHave('jadwalWawancara', function ($jadwal) {
                    $jadwal->where('status_pelaksanaan', 'Dijadwalkan');
                });
        } elseif ($status === 'SUDAH_TERJADWAL') {
            $queryTabel
                ->where('status_pengajuan', 'Wawancara')
                ->whereHas('jadwalWawancara', function ($jadwal) {
                    $jadwal->where('status_pelaksanaan', 'Dijadwalkan');
                });
        }

        // Pencarian berdasarkan nama peserta atau nama instansi.
        if ($cari !== '') {
            $queryTabel->whereHas('peserta', function ($peserta) use ($cari) {
                $peserta->where(function ($subQuery) use ($cari) {
                    $subQuery->where('nama', 'like', "%{$cari}%")
                        ->orWhere('nama_instansi', 'like', "%{$cari}%");
                });
            });
        }

        // Mengambil data peserta dan jadwal aktif.
        $daftarPeserta = $queryTabel
            ->with([
                'peserta',
                'jadwalWawancara' => function ($jadwal) {
                    $jadwal->where('status_pelaksanaan', 'Dijadwalkan')
                        ->orderByDesc('tanggal');
                },
            ])
            ->orderByDesc('tanggal_pengajuan')
            ->paginate(10)
            ->withQueryString();

        return view('admin.upt.seleksi-wawancara', compact(
            'admin',
            'periodeAktif',
            'daftarPeriode',
            'periodeId',
            'jenjang',
            'status',
            'cari',
            'daftarPeserta',
            'totalSiapWawancara',
            'belumDijadwalkan',
            'jadwalTerkonfirmasi'
        ));
    }


    /**
     * Menampilkan detail peserta dan jadwal wawancara.
     */
    public function detail(int $id): View
    {
        $admin = auth('petugas')->user();

        // Mengambil pengajuan yang sudah masuk tahap wawancara.
        $pengajuan = Pengajuan::query()
            ->where('id_pengajuan', $id)
            ->where('tujuan_magang', 'UPT TIKP')
            ->where('status_pengajuan', 'Wawancara')
            ->with([
                'peserta',
                'periode',
                'dokumen',
            ])
            ->firstOrFail();

        // Mengambil jadwal wawancara aktif milik pengajuan tersebut.
        $jadwal = $pengajuan->jadwalWawancara()
            ->with('petugas')
            ->where('status_pelaksanaan', 'Dijadwalkan')
            ->orderByDesc('tanggal')
            ->orderByDesc('id_jadwal')
            ->firstOrFail();

        return view('admin.upt.detail-wawancara', compact(
            'admin',
            'pengajuan',
            'jadwal'
        ));
    }


    /**
     * Menampilkan halaman form pengaturan jadwal wawancara.
     */
    public function create(int $id): View
    {
        $admin = auth('petugas')->user();

        $pengajuan = Pengajuan::query()
            ->where('id_pengajuan', $id)
            ->where('tujuan_magang', 'UPT TIKP')
            ->where('status_pengajuan', 'Terverifikasi')
            ->with([
                'peserta',
                'dokumen',
            ])
            ->firstOrFail();

        return view('admin.upt.atur-jadwal-wawancara', compact(
            'admin',
            'pengajuan'
        ));
    }


    /**
     * Menyimpan jadwal wawancara.
     */
    public function store(Request $request, int $id): RedirectResponse
    {
        $admin = auth('petugas')->user();

        // Validasi input jadwal.
        $validated = $request->validate([
            'tanggal' => [
                'required',
                'date',
                'after_or_equal:today',
            ],
            'waktu' => [
                'required',
                'date_format:H:i',
            ],
            'catatan_instruksi' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        DB::transaction(function () use ($id, $admin, $validated) {

            // Pastikan pengajuan masih berstatus Terverifikasi.
            $pengajuan = Pengajuan::query()
                ->where('id_pengajuan', $id)
                ->where('tujuan_magang', 'UPT TIKP')
                ->where('status_pengajuan', 'Terverifikasi')
                ->lockForUpdate()
                ->firstOrFail();

            // Simpan jadwal wawancara.
            JadwalWawancara::create([
                'id_pengajuan' => $pengajuan->id_pengajuan,
                'id_petugas' => $admin->id_petugas,
                'tanggal' => $validated['tanggal'],
                'waktu' => $validated['waktu'],
                'catatan_instruksi' => $validated['catatan_instruksi'] ?? null,
                'status_kehadiran' => 'Belum Dikonfirmasi',
                'status_pelaksanaan' => 'Dijadwalkan',
            ]);

            // Ubah status pengajuan setelah jadwal berhasil disimpan.
            $pengajuan->update([
                'status_pengajuan' => 'Wawancara',
            ]);
        });

        return redirect()
            ->route('admin-upt.wawancara')
            ->with('success', 'Jadwal wawancara berhasil disimpan.');
    }
}
