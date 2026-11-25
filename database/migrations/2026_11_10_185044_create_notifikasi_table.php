
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->integer('id_notifikasi')->primary()->autoIncrement();

            $table->integer('id_pengajuan')->nullable();
            $table->integer('id_peserta')->nullable();
            $table->integer('id_petugas')->nullable();

            $table->string('email_tujuan');

            $table->enum('jenis_notifikasi', [
                'Pengajuan Baru',
                'Hasil Verifikasi',
                'Jadwal Wawancara',
                'Konfirmasi Kehadiran',
                'Hasil Seleksi',
                'Surat Penerimaan Tersedia',
                'Sertifikat Tersedia',
                'Reset Password',
            ]);

            $table->text('isi_pesan')->nullable();
            $table->dateTime('tanggal_kirim')->nullable();

            $table->enum('status_kirim', [
                'Terkirim',
                'Gagal',
            ])->nullable();

            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');

            $table->foreign('id_peserta')
                ->references('id_peserta')
                ->on('peserta_magang');

            $table->foreign('id_petugas')
                ->references('id_petugas')
                ->on('petugas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
