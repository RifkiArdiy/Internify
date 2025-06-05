<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SertifikatMagang extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_magangs';
    protected $primaryKey = 'sertifikat_id';

    protected $fillable = [
        'company_id',
        'lowongan_id',
        'judul',
        'deskripsi',
    ];

    // Relasi ke perusahaan
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Relasi ke sertifikat_mahasiswa
    public function sertifikatMahasiswa()
    {
        return $this->hasMany(SertifikatMahasiswa::class, 'sertifikat_id');
    }

    // Relasi ke lowongan magang
    public function lowongans()
    {
        return $this->belongsTo(LowonganMagang::class, 'lowongan_id', 'lowongan_id');
    }
}
