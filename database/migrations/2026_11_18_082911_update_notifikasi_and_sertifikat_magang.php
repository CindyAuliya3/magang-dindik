
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Menambahkan tiga jenis notifikasi baru.
        DB::statement("
            ALTER TABLE notifikasi
            MODIFY jenis_notifikasi ENUM(
                'Pengajuan Baru',
                'Hasil Verifikasi',
                'Jadwal Wawancara',
                'Konfirmasi Kehadiran',
                'Hasil Seleksi',
                'Surat Penerimaan Tersedia',
                'Logbook Masuk',
                'Laporan Akhir Masuk',
                'Nilai Diinput',
                'Sertifikat Tersedia',
                'Reset Password'
            ) NOT NULL
        ");

        // Menambahkan ukuran berkas pada sertifikat.
        Schema::table('sertifikat_magang', function (Blueprint $table) {
            $table->integer('ukuran_berkas')
                ->nullable()
                ->after('file_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus kolom ukuran berkas sertifikat.
        Schema::table('sertifikat_magang', function (Blueprint $table) {
            $table->dropColumn('ukuran_berkas');
        });

        // Mengembalikan daftar jenis notifikasi sebelumnya.
        DB::statement("
            ALTER TABLE notifikasi
            MODIFY jenis_notifikasi ENUM(
                'Pengajuan Baru',
                'Hasil Verifikasi',
                'Jadwal Wawancara',
                'Konfirmasi Kehadiran',
                'Hasil Seleksi',
                'Surat Penerimaan Tersedia',
                'Sertifikat Tersedia',
                'Reset Password'
            ) NOT NULL
        ");
    }
};
