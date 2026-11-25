
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_wawancara', function (Blueprint $table) {
            $table->integer('id_jadwal')->primary()->autoIncrement();

            $table->integer('id_pengajuan');
            $table->integer('id_petugas');

            $table->date('tanggal');
            $table->time('waktu');

            $table->text('catatan_instruksi')->nullable();

            $table->enum('status_kehadiran', [
                'Belum Dikonfirmasi',
                'Terkonfirmasi',
            ])->default('Belum Dikonfirmasi');

            $table->dateTime('tanggal_konfirmasi')->nullable();

            $table->enum('status_pelaksanaan', [
                'Dijadwalkan',
                'Terlaksana',
                'Dibatalkan',
            ])->default('Dijadwalkan');

            // Index sesuai ERD
            $table->index('id_pengajuan');
            $table->index(['tanggal', 'waktu']);

            // Relasi foreign key
            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');

            $table->foreign('id_petugas')
                ->references('id_petugas')
                ->on('petugas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_wawancara');
    }
};
