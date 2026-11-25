<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';

    protected $primaryKey = 'id_notifikasi';

    public $timestamps = false;

    protected $fillable = [
        'id_pengajuan',
        'id_peserta',
        'id_petugas',
        'email_tujuan',
        'jenis_notifikasi',
        'isi_pesan',
        'tanggal_kirim',
        'status_kirim',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_kirim' => 'datetime',
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

    public function peserta(): BelongsTo
    {
        return $this->belongsTo(
            PesertaMagang::class,
            'id_peserta',
            'id_peserta'
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
