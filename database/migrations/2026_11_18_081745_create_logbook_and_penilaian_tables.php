
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel logbook
        Schema::create('logbook', function (Blueprint $table) {
            $table->integer('id_logbook')->autoIncrement()->primary();

            $table->integer('id_pengajuan')->unique();
            $table->string('nama_berkas');
            $table->string('file_path');
            $table->integer('ukuran_berkas')->nullable();
            $table->dateTime('tanggal_unggah');

            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');
        });

        // Tabel penilaian
        Schema::create('penilaian', function (Blueprint $table) {
            $table->integer('id_penilaian')->autoIncrement()->primary();

            $table->integer('id_pengajuan')->unique();
            $table->integer('id_petugas_input');
            $table->decimal('nilai_akhir', 5, 2);

            $table->enum('predikat', [
                'A (Sangat Baik)',
                'B (Baik)',
                'C (Cukup)',
                'D (Kurang)',
            ]);

            $table->text('catatan_penilai')->nullable();
            $table->dateTime('tanggal_input');

            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');

            $table->foreign('id_petugas_input')
                ->references('id_petugas')
                ->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
        Schema::dropIfExists('logbook');
    }
};
