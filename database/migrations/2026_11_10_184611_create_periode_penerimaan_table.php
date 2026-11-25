
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('periode_penerimaan', function (Blueprint $table) {
            $table->integer('id_periode')->primary()->autoIncrement();

            $table->string('nama_periode');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');

            $table->enum('status_periode', ['Berjalan', 'Selesai'])
                ->default('Berjalan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('periode_penerimaan');
    }
};
