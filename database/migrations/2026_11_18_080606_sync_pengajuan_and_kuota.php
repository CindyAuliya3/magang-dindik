
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Menghapus kolom sub_unit_tujuan dari pengajuan.
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->dropColumn('sub_unit_tujuan');
        });

        // 2. Membatasi tujuan magang hanya untuk UPT TIKP.
        DB::statement("
            ALTER TABLE pengajuan
            MODIFY tujuan_magang ENUM('UPT TIKP') NOT NULL
        ");

        // 3. Mengubah nama tabel kapasitas_unit menjadi kuota_periode.
        Schema::rename('kapasitas_unit', 'kuota_periode');

        // 4. Mengubah nama primary key id_kapasitas menjadi id_kuota.
        Schema::table('kuota_periode', function (Blueprint $table) {
            $table->renameColumn('id_kapasitas', 'id_kuota');
        });

        // 5. Membatasi unit tujuan kuota hanya untuk UPT TIKP.
        DB::statement("
            ALTER TABLE kuota_periode
            MODIFY unit_tujuan ENUM('UPT TIKP') NOT NULL
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Mengembalikan enum unit tujuan kuota.
        DB::statement("
            ALTER TABLE kuota_periode
            MODIFY unit_tujuan ENUM('UPT TIKP', 'Dinas Pusat') NOT NULL
        ");

        // 2. Mengembalikan nama primary key.
        Schema::table('kuota_periode', function (Blueprint $table) {
            $table->renameColumn('id_kuota', 'id_kapasitas');
        });

        // 3. Mengembalikan nama tabel.
        Schema::rename('kuota_periode', 'kapasitas_unit');

        // 4. Mengembalikan enum tujuan magang.
        DB::statement("
            ALTER TABLE pengajuan
            MODIFY tujuan_magang ENUM('UPT TIKP', 'Dinas Pusat') NOT NULL
        ");

        // 5. Mengembalikan kolom sub_unit_tujuan.
        Schema::table('pengajuan', function (Blueprint $table) {
            $table->string('sub_unit_tujuan')->nullable()->after('tujuan_magang');
        });
    }
};
