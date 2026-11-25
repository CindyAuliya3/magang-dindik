<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokumen extends Model
{
    protected $table = 'dokumen';

    protected $primaryKey = 'id_dokumen';

    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan',
        'jenis_dokumen',
        'file_path',
        'tanggal_unggah',
    ];

    protected function casts(): array
    {
        return [
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
}
