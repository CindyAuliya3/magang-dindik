<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JadwalWawancara extends Model
{
    protected $table = 'jadwal_wawancara';

    protected $primaryKey = 'id_jadwal';

    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan',
        'id_petugas',
        'tanggal',
        'waktu',
        'catatan_instruksi',
        'status_kehadiran',
        'tanggal_konfirmasi',
        'status_pelaksanaan',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'tanggal_konfirmasi' => 'datetime',
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

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(
            Petugas::class,
            'id_petugas',
            'id_petugas'
        );
    }
}
