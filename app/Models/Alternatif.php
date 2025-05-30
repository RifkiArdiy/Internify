<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';
    protected $primaryKey = 'alternatif_id';
    protected $fillable = ['mahasiswa_id', 'lowongan_id'];

    public function nilaiAlternatif()
    {
        return $this->hasMany(NilaiAlternatif::class, 'alternatif_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function lowongan()
    {
        return $this->belongsTo(LowonganMagang::class, 'lowongan_id');
    }
}
