<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\PeriodePenerimaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PengajuanController extends Controller
{
    /**
     * Menampilkan halaman pilih tujuan magang.
     */
    public function create()
    {
        return view('peserta.pilih-tujuan');
    }

    /**
     * Mengecek kuota UPT TIKP berdasarkan periode tanggal mulai magang.
     */
    public function cekKuota(Request $request)
    {
        $validated = $request->validate([
            'tanggal_mulai' => ['required', 'date'],
        ]);

        $tanggalMulai = Carbon::parse($validated['tanggal_mulai']);

        // Menentukan periode penerimaan enam bulanan.
        $periode = PeriodePenerimaan::cariAtauBuatBerdasarkanTanggal(
            $tanggalMulai
        );

        $kuotaMaksimal = 40;

        // Menghitung pengajuan yang sudah diterima pada periode tersebut.
        $kuotaTerpakai = Pengajuan::where(
            'id_periode',
            $periode->id_periode
        )
            ->where('tujuan_magang', 'UPT TIKP')
            ->where('status_pengajuan', 'Diterima')
            ->count();

        $sisaKuota = max(0, $kuotaMaksimal - $kuotaTerpakai);

        return response()->json([
            'nama_periode' => $periode->nama_periode,
            'kuota_maksimal' => $kuotaMaksimal,
            'kuota_terpakai' => $kuotaTerpakai,
            'sisa_kuota' => $sisaKuota,
            'kuota_penuh' => $kuotaTerpakai >= $kuotaMaksimal,
        ]);
    }

    /**
     * Memproses dan menyimpan pengajuan magang.
     *
     * Satu peserta hanya boleh memiliki satu pengajuan
     * dalam satu periode penerimaan.
     */
    public function store(Request $request)
    {
        // Peserta hanya boleh memilih UPT TIKP.
        $validated = $request->validate([
            'tujuan_magang' => [
                'required',
                Rule::in(['UPT TIKP']),
            ],

            'tanggal_mulai' => [
                'required',
                'date',
            ],

            'tanggal_selesai' => [
                'required',
                'date',
                'after:tanggal_mulai',
            ],
        ]);

        // Mengambil data peserta yang sedang login.
        $peserta = auth('peserta')->user();

        if (!$peserta) {
            return redirect()->route('login');
        }

        // Mengambil tanggal mulai dan selesai.
        $tanggalMulai = Carbon::parse($validated['tanggal_mulai']);
        $tanggalSelesai = Carbon::parse($validated['tanggal_selesai']);

        // Memastikan durasi magang antara 2 sampai 6 bulan.
        $batasMinimal = $tanggalMulai->copy()->addMonthsNoOverflow(2);
        $batasMaksimal = $tanggalMulai->copy()->addMonthsNoOverflow(6);

        if (
            $tanggalSelesai->lt($batasMinimal) ||
            $tanggalSelesai->gt($batasMaksimal)
        ) {
            return back()
                ->withErrors([
                    'tanggal_selesai' => 'Durasi magang harus antara 2 sampai 6 bulan.',
                ])
                ->withInput();
        }

        // Menentukan periode penerimaan berdasarkan tanggal mulai.
        $periode = PeriodePenerimaan::cariAtauBuatBerdasarkanTanggal(
            $tanggalMulai
        );

        // Memeriksa pengajuan ganda dan kuota dalam transaksi.
        $hasil = DB::transaction(function () use (
            $peserta,
            $periode,
            $tanggalMulai,
            $tanggalSelesai
        ) {
            // Mengunci baris periode selama pemeriksaan.
            $periodeTerkunci = PeriodePenerimaan::where(
                'id_periode',
                $periode->id_periode
            )
                ->lockForUpdate()
                ->firstOrFail();

            // Mengunci baris peserta untuk mencegah pengajuan
            // ganda ketika formulir dikirim secara bersamaan.
            $pesertaTerkunci = $peserta::where(
                'id_peserta',
                $peserta->id_peserta
            )
                ->lockForUpdate()
                ->firstOrFail();

            // Memeriksa apakah peserta sudah pernah mengajukan
            // pada periode yang sama.
            $sudahMengajukan = Pengajuan::where(
                'id_peserta',
                $pesertaTerkunci->id_peserta
            )
                ->where('id_periode', $periodeTerkunci->id_periode)
                ->exists();

            if ($sudahMengajukan) {
                return [
                    'status' => 'duplicate',
                ];
            }

            $kuotaMaksimal = 40;

            // Menghitung peserta yang sudah diterima.
            $kuotaTerpakai = Pengajuan::where(
                'id_periode',
                $periodeTerkunci->id_periode
            )
                ->where('tujuan_magang', 'UPT TIKP')
                ->where('status_pengajuan', 'Diterima')
                ->count();

            // Menghentikan proses jika kuota penuh.
            if ($kuotaTerpakai >= $kuotaMaksimal) {
                return [
                    'status' => 'quota_full',
                ];
            }

            // Menyimpan pengajuan magang.
            $pengajuan = Pengajuan::create([
                'id_peserta' => $pesertaTerkunci->id_peserta,
                'id_periode' => $periodeTerkunci->id_periode,
                'tujuan_magang' => 'UPT TIKP',
                'sub_unit_penempatan' => null,
                'tanggal_mulai' => $tanggalMulai->toDateString(),
                'tanggal_selesai' => $tanggalSelesai->toDateString(),
                'tanggal_pengajuan' => now(),
                'status_pengajuan' => 'Diajukan',
            ]);

            return [
                'status' => 'success',
                'pengajuan' => $pengajuan,
            ];
        });

        // Jika peserta sudah pernah mengajukan pada periode yang sama.
        if ($hasil['status'] === 'duplicate') {
            return back()
                ->withErrors([
                    'tujuan_magang' => 'Kamu sudah memiliki pengajuan magang pada periode ini. Silakan menunggu proses pengajuan sebelumnya.',
                ])
                ->withInput();
        }

        // Jika kuota penuh.
        if ($hasil['status'] === 'quota_full') {
            return back()
                ->withErrors([
                    'tujuan_magang' => 'Kuota UPT TIKP untuk periode tersebut sudah penuh.',
                ])
                ->withInput();
        }

        // Jika pengajuan berhasil dibuat.
        return redirect()
            ->route('peserta.dokumen.index')
            ->with('success', 'Pengajuan berhasil dibuat. Silakan lengkapi seluruh dokumen persyaratan.');
    }
}