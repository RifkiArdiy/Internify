<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SertifikatMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'sertifikat_mahasiswa';
    protected $primaryKey = 'sertifikat_mahasiswa_id';

    protected $fillable = [
        'sertifikat_id',
        'mahasiswa_id',
        'nama_mahasiswa',
        'downloaded_at',
    ];

    // Relasi ke SertifikatMagang
    public function sertifikat()
    {
        return $this->belongsTo(SertifikatMagang::class, 'sertifikat_id');
    }

    // Relasi ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
