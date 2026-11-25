<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Fillable([
    'nama',
    'nik',
    'no_telepon',
    'email',
    'password',
    'provinsi',
    'kabupaten_kota',
    'kecamatan',
    'kelurahan',
    'alamat',
    'foto_profil',
    'jenjang_pendidikan',
    'nama_instansi',
    'jurusan',
    'nomor_induk',
    'reset_token',
    'reset_token_expiry',
    'status_akun',
    'created_at',
])]
#[Hidden(['password', 'reset_token'])]
class PesertaMagang extends Authenticatable
{
    protected $table = 'peserta_magang';

    protected $primaryKey = 'id_peserta';

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'reset_token_expiry' => 'datetime',
            'created_at' => 'datetime',
        ];
    }

    // Relasi ke pengajuan magang
    public function pengajuan(): HasMany
    {
        return $this->hasMany(
            Pengajuan::class,
            'id_peserta',
            'id_peserta'
        );
    }

    // Relasi ke notifikasi peserta
    public function notifikasi(): HasMany
    {
        return $this->hasMany(
            Notifikasi::class,
            'id_peserta',
            'id_peserta'
        );
    }
}
