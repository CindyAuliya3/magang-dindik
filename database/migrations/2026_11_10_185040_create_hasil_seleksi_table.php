
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hasil_seleksi', function (Blueprint $table) {
            $table->integer('id_hasil')->primary()->autoIncrement();

            $table->integer('id_pengajuan')->unique();
            $table->integer('id_petugas_input');

            $table->enum('keputusan_pimpinan', [
                'Disetujui / ACC',
                'Ditolak',
            ]);

            $table->text('catatan_disposisi')->nullable();

            $table->enum('status', [
                'Diterima',
                'Ditolak',
            ]);

            $table->date('tanggal_penetapan');

            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');

            $table->foreign('id_petugas_input')
                ->references('id_petugas')
                ->on('petugas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hasil_seleksi');
    }
};
