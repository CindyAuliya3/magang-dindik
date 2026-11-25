
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kapasitas_unit', function (Blueprint $table) {
            $table->integer('id_kapasitas')->primary()->autoIncrement();

            $table->integer('id_periode');

            $table->enum('unit_tujuan', [
                'UPT TIKP',
                'Dinas Pusat',
            ]);

            $table->string('sub_unit');
            $table->integer('kuota_penerimaan');
            $table->integer('id_petugas_input');

            $table->unique([
                'id_periode',
                'unit_tujuan',
                'sub_unit',
            ]);

            $table->foreign('id_periode')
                ->references('id_periode')
                ->on('periode_penerimaan');

            $table->foreign('id_petugas_input')
                ->references('id_petugas')
                ->on('petugas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kapasitas_unit');
    }
};
