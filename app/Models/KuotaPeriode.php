<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KuotaPeriode extends Model
{
    protected $table = 'kuota_periode';

    protected $primaryKey = 'id_kuota';

    public $timestamps = false;

    protected $fillable = [
        'id_periode',
        'unit_tujuan',
        'sub_unit',
        'kuota_penerimaan',
        'id_petugas_input',
    ];

    public function periode(): BelongsTo
    {
        return $this->belongsTo(
            PeriodePenerimaan::class,
            'id_periode',
            'id_periode'
        );
    }

    public function petugasInput(): BelongsTo
    {
        return $this->belongsTo(
            Petugas::class,
            'id_petugas_input',
            'id_petugas'
        );
    }
}
