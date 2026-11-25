
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumen', function (Blueprint $table) {
            $table->integer('id_dokumen')->primary()->autoIncrement();
            $table->integer('id_pengajuan');

            $table->enum('jenis_dokumen', [
                'Surat Pengantar',
                'Proposal',
                'CV',
                'Transkrip Nilai / Rapor',
            ]);

            $table->string('file_path');
            $table->dateTime('tanggal_unggah')->nullable();

            // Index sesuai ERD
            $table->index(['id_pengajuan', 'jenis_dokumen']);

            // Relasi foreign key
            $table->foreign('id_pengajuan')
                ->references('id_pengajuan')
                ->on('pengajuan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumen');
    }
};
