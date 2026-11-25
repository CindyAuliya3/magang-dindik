<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilSeleksi extends Model
{
    protected $table = 'hasil_seleksi';

    protected $primaryKey = 'id_hasil';

    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan',
        'id_petugas_input',
        'keputusan_pimpinan',
        'catatan_disposisi',
        'status',
        'tanggal_penetapan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_penetapan' => 'date',
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
