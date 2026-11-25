<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratPenerimaan extends Model
{
    protected $table = 'surat_penerimaan';

    protected $primaryKey = 'id_surat';

    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan',
        'nomor_surat',
        'tanggal_terbit',
        'id_petugas_unggah',
        'file_path',
        'tanggal_unggah',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_terbit' => 'date',
            'tanggal_unggah' => 'datetime',
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

    public function petugasUnggah(): BelongsTo
    {
        return $this->belongsTo(
            Petugas::class,
            'id_petugas_unggah',
            'id_petugas'
        );
    }
}
