<?php

use Illuminate\Support\Facades\Route;

// ======================================================
// CONTROLLERS AUTENTIKASI
// ======================================================

use App\Http\Controllers\Auth\PesertaAuthController;
use App\Http\Controllers\Auth\PetugasAuthController;

// ======================================================
// CONTROLLERS PESERTA
// ======================================================

use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PendaftarDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratKeteranganController;

// ======================================================
// CONTROLLERS ADMIN
// ======================================================

use App\Http\Controllers\Admin\AdminPusatDashboardController;
use App\Http\Controllers\Admin\AdminPusatVerifikasiController;
use App\Http\Controllers\Admin\AdminMonitoringUptController;
use App\Http\Controllers\Admin\AdminUptDashboardController;
use App\Http\Controllers\Admin\AdminUptWawancaraController;
use App\Http\Controllers\Admin\AdminUptSuratPenerimaanController;
use App\Http\Controllers\Admin\AdminUptSertifikatController;
use App\Http\Controllers\Admin\AdminUptRiwayatController;

// ======================================================
// CONTROLLERS KEPALA
// ======================================================

use App\Http\Controllers\Kepala\KepalaUptDashboardController;


// ======================================================
// HALAMAN UTAMA
// ======================================================

Route::get('/', function () {
    return redirect()->route('login');
});


// ======================================================
// AUTENTIKASI PESERTA
// ======================================================

// Registrasi
Route::get('/register', [PesertaAuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [PesertaAuthController::class, 'register'])
    ->name('register.store');

// Login
Route::get('/login', [PesertaAuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [PesertaAuthController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [PesertaAuthController::class, 'logout'])
    ->middleware('auth:peserta')
    ->name('logout');


// ======================================================
// DASHBOARD PESERTA
// ======================================================

Route::get('/dashboard/pendaftar', [PendaftarDashboardController::class, 'index'])
    ->middleware('auth:peserta')
    ->name('peserta.dashboard');


// ======================================================
// PENGAJUAN MAGANG PESERTA
// ======================================================

Route::middleware('auth:peserta')->group(function () {

    Route::get('/pengajuan', [PengajuanController::class, 'create'])
        ->name('peserta.pengajuan.create');

    Route::post('/pengajuan', [PengajuanController::class, 'store'])
        ->name('peserta.pengajuan.store');

    Route::get('/pengajuan/kuota', [PengajuanController::class, 'cekKuota'])
        ->name('peserta.pengajuan.kuota');

    Route::post(
        '/pengajuan/{id}/konfirmasi-wawancara',
        [PendaftarDashboardController::class, 'konfirmasiKehadiran']
    )->name('peserta.wawancara.konfirmasi');

    // Halaman Surat Keterangan Peserta
    Route::get('/surat-keterangan', [SuratKeteranganController::class, 'index'])
        ->name('peserta.surat-keterangan');

    // Upload rekap logbook
    Route::post('/surat-keterangan/logbook', [SuratKeteranganController::class, 'uploadLogbook'])
        ->name('peserta.surat-keterangan.logbook');

    // Upload laporan akhir
    Route::post('/surat-keterangan/laporan-akhir', [SuratKeteranganController::class, 'uploadLaporan'])
        ->name('peserta.surat-keterangan.laporan');

    // Lihat dokumen
    Route::get('/surat-keterangan/dokumen/{jenis}', [SuratKeteranganController::class, 'lihat'])
        ->whereIn('jenis', [
            'surat-penerimaan',
            'logbook',
            'laporan-akhir',
            'sertifikat',
        ])
        ->name('peserta.surat-keterangan.lihat');

});


// ======================================================
// DOKUMEN DAN PROFIL PESERTA
// ======================================================

Route::middleware('auth:peserta')->group(function () {

    // Dokumen magang
    Route::get('/dokumen-magang', [DokumenController::class, 'index'])
        ->name('peserta.dokumen.index');

    Route::post('/dokumen-magang', [DokumenController::class, 'store'])
        ->name('peserta.dokumen.store');

    Route::get('/dokumen-magang/{id}/lihat', [DokumenController::class, 'lihat'])
        ->name('peserta.dokumen.lihat');

    Route::post('/dokumen-magang/kirim', [DokumenController::class, 'kirim'])
        ->name('peserta.dokumen.kirim');


    // Profil peserta
    Route::get('/profil', [ProfileController::class, 'index'])
        ->name('peserta.profil');

    Route::post('/profil', [ProfileController::class, 'update'])
        ->name('peserta.profil.update');

    Route::post('/profil/password', [ProfileController::class, 'updatePassword'])
        ->name('peserta.profil.password');

    Route::post('/profil/foto', [ProfileController::class, 'updateFoto'])
        ->name('peserta.profil.foto');

    Route::post('/profil/foto/hapus', [ProfileController::class, 'hapusFoto'])
        ->name('peserta.profil.foto.hapus');

});


// ======================================================
// AUTENTIKASI PETUGAS
// ======================================================

// Login
Route::get('/petugas/login', [PetugasAuthController::class, 'showLogin'])
    ->name('petugas.login');

Route::post('/petugas/login', [PetugasAuthController::class, 'login'])
    ->name('petugas.login.process');

// Logout
Route::post('/petugas/logout', [PetugasAuthController::class, 'logout'])
    ->middleware('auth:petugas')
    ->name('petugas.logout');


// ======================================================
// ADMIN PUSAT
// ======================================================

Route::middleware([
    'auth:petugas',
    'petugas.role:Admin Pusat',
])->prefix('admin-pusat')->name('admin-pusat.')->group(function () {

    // Pilih unit kerja
    Route::get('/pilih-unit', function () {
        return view('admin.pusat.pilih-unit');
    })->name('pilih-unit');

    // Dashboard Admin Pusat
    Route::get('/dashboard', [AdminPusatDashboardController::class, 'index'])
        ->name('dashboard');

    // Dashboard Monitoring UPT TIKP khusus Admin Pusat
    Route::get('/monitoring-upt', [AdminMonitoringUptController::class, 'index'])
        ->name('upt-tikp');

    // Verifikasi berkas
    Route::get('/verifikasi-berkas', [AdminPusatVerifikasiController::class, 'index'])
        ->name('verifikasi-berkas');

    // Detail berkas pengajuan
    Route::get('/verifikasi-berkas/{id}', [AdminPusatVerifikasiController::class, 'detail'])
        ->name('verifikasi-berkas.detail');

    // Proses verifikasi berkas
    Route::post(
        '/verifikasi-berkas/{id}/verifikasi',
        [AdminPusatVerifikasiController::class, 'verifikasi']
    )->name('verifikasi-berkas.verifikasi');

    // Proses penolakan berkas
    Route::post(
        '/verifikasi-berkas/{id}/tolak',
        [AdminPusatVerifikasiController::class, 'tolak']
    )->name('verifikasi-berkas.tolak');

    // Lihat dokumen peserta
    Route::get('/verifikasi-berkas/dokumen/{id}/lihat', [AdminPusatVerifikasiController::class, 'lihatDokumen'])
        ->name('verifikasi-berkas.dokumen');

    // Riwayat
    Route::get('/riwayat', [AdminPusatVerifikasiController::class, 'riwayat'])
        ->name('riwayat');

});


// ======================================================
// ADMIN UPT TIKP
// ======================================================

Route::middleware([
    'auth:petugas',
    'petugas.role:Admin UPT TIKP',
])->prefix('admin-upt')->name('admin-upt.')->group(function () {

    // Dashboard operasional Admin UPT
    Route::get('/dashboard', [AdminUptDashboardController::class, 'index'])
        ->name('dashboard');

    // Seleksi wawancara
    Route::get('/seleksi-wawancara', [AdminUptWawancaraController::class, 'index'])
        ->name('wawancara');

    // Atur jadwal wawancara
    Route::get('/seleksi-wawancara/{id}/atur-jadwal', [AdminUptWawancaraController::class, 'create'])
        ->name('wawancara.atur-jadwal');

    Route::post('/seleksi-wawancara/{id}/atur-jadwal', [AdminUptWawancaraController::class, 'store'])
        ->name('wawancara.simpan-jadwal');


    // Surat penerimaan
    Route::get('/surat-penerimaan', [AdminUptSuratPenerimaanController::class, 'index'])
        ->name('surat-penerimaan');

    Route::get('/surat-penerimaan/{id}/kelola', [AdminUptSuratPenerimaanController::class, 'create'])
        ->name('surat-penerimaan.create');

    Route::post('/surat-penerimaan/{id}/kelola', [AdminUptSuratPenerimaanController::class, 'store'])
        ->name('surat-penerimaan.store');


    // Penerbitan sertifikat
    Route::get('/penerbitan-sertifikat', [AdminUptSertifikatController::class, 'index'])
        ->name('sertifikat');

    Route::get(
        '/seleksi-wawancara/{id}/detail',
        [AdminUptWawancaraController::class, 'detail']
    )->name('wawancara.detail');

    // Riwayat
    Route::get('/riwayat', [AdminUptRiwayatController::class, 'index'])
        ->name('riwayat');

    Route::get('/riwayat/export', [AdminUptRiwayatController::class, 'export'])
        ->name('riwayat.export');

});


// ======================================================
// KEPALA DINAS
// ======================================================

Route::middleware([
    'auth:petugas',
    'petugas.role:Kepala Dinas',
])->prefix('kepala-dinas')->name('kepala-dinas.')->group(function () {

    Route::get('/dashboard', function () {
        return 'Dashboard Kepala Dinas';
    })->name('dashboard');

});


// ======================================================
// KEPALA UPT TIKP
// ======================================================

Route::middleware([
    'auth:petugas',
    'petugas.role:Kepala UPT TIKP',
])->prefix('kepala-upt')->name('kepala-upt.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [KepalaUptDashboardController::class, 'index'])
        ->name('dashboard');

    // Monitoring seleksi
    Route::get('/monitoring-seleksi', [KepalaUptDashboardController::class, 'monitoring'])
        ->name('monitoring');

    // Keputusan dan surat
    Route::get('/keputusan-surat', [KepalaUptDashboardController::class, 'keputusanSurat'])
        ->name('keputusan-surat');

});
