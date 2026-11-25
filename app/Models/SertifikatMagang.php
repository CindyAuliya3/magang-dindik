<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SertifikatMagang extends Model
{
    protected $table = 'sertifikat_magang';

    protected $primaryKey = 'id_sertifikat';

    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan',
        'nomor_sertifikat',
        'tanggal_terbit',
        'pejabat_penandatangan',
        'id_petugas_unggah',
        'file_path',
        'ukuran_berkas',
        'tanggal_unggah',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_terbit' => 'date',
            'ukuran_berkas' => 'integer',
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
