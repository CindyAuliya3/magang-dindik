
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->integer('id_pengajuan')->primary()->autoIncrement();
            $table->integer('id_peserta');
            $table->integer('id_periode');

            $table->enum('tujuan_magang', [
                'UPT TIKP',
                'Dinas Pusat',
            ]);

            $table->string('sub_unit_tujuan')->nullable();
            $table->string('sub_unit_penempatan')->nullable();

            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            $table->text('form_administrasi')->nullable();

            $table->dateTime('tanggal_pengajuan');

            $table->enum('status_pengajuan', [
                'Diajukan',
                'Terverifikasi',
                'Wawancara',
                'Diterima',
                'Ditolak',
            ])->default('Diajukan');

            $table->integer('id_petugas_verifikator')->nullable();
            $table->text('catatan_verifikasi')->nullable();
            $table->dateTime('tanggal_verifikasi')->nullable();

            // Index sesuai ERD
            $table->index('id_peserta');
            $table->index('status_pengajuan');
            $table->index(['tujuan_magang', 'status_pengajuan']);
            $table->index(['id_periode', 'status_pengajuan']);

            // Relasi foreign key
            $table->foreign('id_peserta')
                ->references('id_peserta')
                ->on('peserta_magang');

            $table->foreign('id_periode')
                ->references('id_periode')
                ->on('periode_penerimaan');

            $table->foreign('id_petugas_verifikator')
                ->references('id_petugas')
                ->on('petugas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
