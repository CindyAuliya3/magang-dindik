<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PeriodePenerimaan extends Model
{
    protected $table = 'periode_penerimaan';

    protected $primaryKey = 'id_periode';

    public $timestamps = false;

    protected $fillable = [
        'nama_periode',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_periode',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
        ];
    }

    /**
     * Status periode berdasarkan tanggal hari ini.
     * Tidak mengubah nilai status_periode di database.
     */
    protected function statusTampilan(): Attribute
    {
        return Attribute::get(function (): string {
            $hariIni = today();

            if ($hariIni->lt($this->tanggal_mulai)) {
                return 'Akan Datang';
            }

            if ($hariIni->gt($this->tanggal_selesai)) {
                return 'Selesai';
            }

            return 'Berjalan';
        });
    }

    public function pengajuan(): HasMany
    {
        return $this->hasMany(
            Pengajuan::class,
            'id_periode',
            'id_periode'
        );
    }

    public function kuotaPeriode(): HasMany
    {
        return $this->hasMany(
            KuotaPeriode::class,
            'id_periode',
            'id_periode'
        );
    }

    public static function cariAtauBuatBerdasarkanTanggal($tanggal)
    {
        $tanggal = \Carbon\Carbon::parse($tanggal);

        $tahun = $tanggal->year;

        if ($tanggal->month <= 6) {
            $tanggalMulai = \Carbon\Carbon::create($tahun, 1, 1);
            $tanggalSelesai = \Carbon\Carbon::create($tahun, 6, 30);

            $namaPeriode = "Januari–Juni {$tahun}";
        } else {
            $tanggalMulai = \Carbon\Carbon::create($tahun, 7, 1);
            $tanggalSelesai = \Carbon\Carbon::create($tahun, 12, 31);

            $namaPeriode = "Juli–Desember {$tahun}";
        }

        return self::firstOrCreate(
            [
                'tanggal_mulai' => $tanggalMulai->toDateString(),
                'tanggal_selesai' => $tanggalSelesai->toDateString(),
            ],
            [
                'nama_periode' => $namaPeriode,
                'status_periode' => 'Berjalan',
            ]
        );
    }
}
