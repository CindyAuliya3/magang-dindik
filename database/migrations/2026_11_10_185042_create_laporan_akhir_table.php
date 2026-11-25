
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan_akhir', function (Blueprint $table) {
            $table->integer('id_laporan')->primary()->autoIncrement();

            $table->integer('id_pengajuan')->unique();
            $table->string('nama_berkas');
            $table->string('file_path');
            $table->integer('ukuran_berkas')->nullable();
            $table->dateTime('tanggal_unggah');

            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan_akhir');
    }
};
