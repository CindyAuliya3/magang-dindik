<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengajuan extends Model
{
    protected $table = 'pengajuan';

    protected $primaryKey = 'id_pengajuan';

    public $timestamps = false;

    protected $fillable = [
        'id_peserta',
        'id_periode',
        'tujuan_magang',
        'sub_unit_penempatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'form_administrasi',
        'tanggal_pengajuan',
        'status_pengajuan',
        'id_petugas_verifikator',
        'catatan_verifikasi',
        'tanggal_verifikasi',
    ];

    protected function casts(): array
    {
        return [
            'tanggal_mulai' => 'date',
            'tanggal_selesai' => 'date',
            'tanggal_pengajuan' => 'datetime',
            'tanggal_verifikasi' => 'datetime',
        ];
    }

    // Relasi ke peserta magang
    public function peserta(): BelongsTo
    {
        return $this->belongsTo(
            PesertaMagang::class,
            'id_peserta',
            'id_peserta'
        );
    }

    // Relasi ke periode penerimaan
    public function periode(): BelongsTo
    {
        return $this->belongsTo(
            PeriodePenerimaan::class,
            'id_periode',
            'id_periode'
        );
    }

    // Relasi ke petugas verifikator
    public function petugasVerifikator(): BelongsTo
    {
        return $this->belongsTo(
            Petugas::class,
            'id_petugas_verifikator',
            'id_petugas'
        );
    }

    // Relasi ke dokumen pengajuan
    public function dokumen(): HasMany
    {
        return $this->hasMany(
            Dokumen::class,
            'id_pengajuan',
            'id_pengajuan'
        );
    }

    // Relasi ke jadwal wawancara
    public function jadwalWawancara(): HasMany
    {
        return $this->hasMany(
            JadwalWawancara::class,
            'id_pengajuan',
            'id_pengajuan'
        );
    }

    // Relasi ke hasil seleksi
    public function hasilSeleksi(): HasOne
    {
        return $this->hasOne(
            HasilSeleksi::class,
            'id_pengajuan',
            'id_pengajuan'
        );
    }

    // Relasi ke surat penerimaan
    public function suratPenerimaan(): HasOne
    {
        return $this->hasOne(
            SuratPenerimaan::class,
            'id_pengajuan',
            'id_pengajuan'
        );
    }

    // Relasi ke logbook
    public function logbook(): HasOne
    {
        return $this->hasOne(
            Logbook::class,
            'id_pengajuan',
            'id_pengajuan'
        );
    }

    // Relasi ke laporan akhir
    public function laporanAkhir(): HasOne
    {
        return $this->hasOne(
            LaporanAkhir::class,
            'id_pengajuan',
            'id_pengajuan'
        );
    }

    // Relasi ke penilaian
    public function penilaian(): HasOne
    {
        return $this->hasOne(
            Penilaian::class,
            'id_pengajuan',
            'id_pengajuan'
        );
    }

    // Relasi ke sertifikat magang
    public function sertifikatMagang(): HasOne
    {
        return $this->hasOne(
            SertifikatMagang::class,
            'id_pengajuan',
            'id_pengajuan'
        );
    }

    // Relasi ke notifikasi
    public function notifikasi(): HasMany
    {
        return $this->hasMany(
            Notifikasi::class,
            'id_pengajuan',
            'id_pengajuan'
        );
    }
}
