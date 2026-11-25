
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->integer('id_petugas')->primary()->autoIncrement();

            $table->enum('role', [
                'Admin Pusat',
                'Admin UPT TIKP',
                'Kepala Dinas',
                'Kepala UPT TIKP',
            ]);

            $table->string('unit_kerja');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('reset_token')->nullable();
            $table->dateTime('reset_token_expiry')->nullable();

            $table->enum('status_akun', ['Aktif', 'Nonaktif'])
                ->default('Aktif');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
