<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanAkhir extends Model
{
    protected $table = 'laporan_akhir';

    protected $primaryKey = 'id_laporan';

    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan',
        'nama_berkas',
        'file_path',
        'ukuran_berkas',
        'tanggal_unggah',
    ];

    protected function casts(): array
    {
        return [
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
}
