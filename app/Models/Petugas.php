<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Fillable([
    'role',
    'unit_kerja',
    'nama',
    'email',
    'password',
    'reset_token',
    'reset_token_expiry',
    'status_akun',
])]
#[Hidden(['password', 'reset_token'])]
class Petugas extends Authenticatable
{
    protected $table = 'petugas';

    protected $primaryKey = 'id_petugas';

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'reset_token_expiry' => 'datetime',
        ];
    }

    // Relasi ke pengajuan yang diverifikasi
    public function pengajuanDiverifikasi(): HasMany
    {
        return $this->hasMany(
            Pengajuan::class,
            'id_petugas_verifikator',
            'id_petugas'
        );
    }

    // Relasi ke kuota yang diinput
    public function kuotaDiinput(): HasMany
    {
        return $this->hasMany(
            KuotaPeriode::class,
            'id_petugas_input',
            'id_petugas'
        );
    }

    // Relasi ke jadwal wawancara
    public function jadwalWawancara(): HasMany
    {
        return $this->hasMany(
            JadwalWawancara::class,
            'id_petugas',
            'id_petugas'
        );
    }

    // Relasi ke hasil seleksi yang diinput
    public function hasilSeleksiDiinput(): HasMany
    {
        return $this->hasMany(
            HasilSeleksi::class,
            'id_petugas_input',
            'id_petugas'
        );
    }

    // Relasi ke surat penerimaan yang diunggah
    public function suratPenerimaanDiunggah(): HasMany
    {
        return $this->hasMany(
            SuratPenerimaan::class,
            'id_petugas_unggah',
            'id_petugas'
        );
    }

    // Relasi ke penilaian yang diinput
    public function penilaianDiinput(): HasMany
    {
        return $this->hasMany(
            Penilaian::class,
            'id_petugas_input',
            'id_petugas'
        );
    }

    // Relasi ke sertifikat yang diunggah
    public function sertifikatDiunggah(): HasMany
    {
        return $this->hasMany(
            SertifikatMagang::class,
            'id_petugas_unggah',
            'id_petugas'
        );
    }

    // Relasi ke notifikasi
    public function notifikasi(): HasMany
    {
        return $this->hasMany(
            Notifikasi::class,
            'id_petugas',
            'id_petugas'
        );
    }
}
