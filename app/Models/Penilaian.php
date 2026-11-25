<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    protected $table = 'penilaian';

    protected $primaryKey = 'id_penilaian';

    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan',
        'id_petugas_input',
        'nilai_akhir',
        'predikat',
        'catatan_penilai',
        'tanggal_input',
    ];

    protected function casts(): array
    {
        return [
            'nilai_akhir' => 'decimal:2',
            'tanggal_input' => 'datetime',
        ];
    }

    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(
            Pengajuan::class,
            'id_pengajuan',
            'id_pengajuan'
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
