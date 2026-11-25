
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peserta_magang', function (Blueprint $table) {
            $table->integer('id_peserta')->primary()->autoIncrement();
            $table->string('nama');
            $table->string('nik', 16)->unique();
            $table->string('no_telepon');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('provinsi')->nullable();
            $table->string('kabupaten_kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('foto_profil')->nullable();

            $table->string('jenjang_pendidikan')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('nomor_induk')->nullable();

            $table->string('reset_token')->nullable();
            $table->dateTime('reset_token_expiry')->nullable();

            $table->enum('status_akun', ['Aktif', 'Nonaktif'])
                ->default('Aktif');

            $table->dateTime('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peserta_magang');
    }
};
