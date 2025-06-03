<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MagangApplication extends Model
{
    use HasFactory;

    protected $table = 'magang_applications';

    protected $primaryKey = 'magang_id';

    protected $fillable = ['mahasiswa_id', 'lowongan_id', 'status'];

    public function mahasiswas(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'mahasiswa_id');
    }

    public function lowongans(): BelongsTo
    {
        return $this->belongsTo(LowonganMagang::class, 'lowongan_id', 'lowongan_id');
    }
}
