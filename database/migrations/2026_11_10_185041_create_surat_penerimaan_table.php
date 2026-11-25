
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat_penerimaan', function (Blueprint $table) {
            $table->integer('id_surat')->primary()->autoIncrement();

            $table->integer('id_pengajuan')->unique();
            $table->string('nomor_surat');
            $table->date('tanggal_terbit');
            $table->integer('id_petugas_unggah');
            $table->string('file_path');
            $table->dateTime('tanggal_unggah')->nullable();

            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');

            $table->foreign('id_petugas_unggah')
                ->references('id_petugas')
                ->on('petugas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat_penerimaan');
    }
};
