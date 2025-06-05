<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bimbingan extends Model
{
    use HasFactory;
    protected $primaryKey = 'bimbingan_id';

    protected $fillable = [
        'magang_id',
        'dosen_id',
        'dokumen_bimbingan',
        'dokumen_perusahaan',
        'status',
        'tanggal_disetujui',
    ];

    public function magang(): BelongsTo
    {
        return $this->belongsTo(MagangApplication::class, 'magang_id', 'magang_id');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_id', 'user_id');
    }


    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'magang_id', 'magang_id')->withDefault();
    }
}
