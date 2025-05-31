<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManajemenBimbingan extends Model
{
    use HasFactory;

    protected $table = 'manajemen_bimbingans';
    protected $primaryKey = 'manajemen_bimbingan_id';

    protected $fillable = [
        'mahasiswa_id',
        'company',
        'position',
        'description',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'mahasiswa_id');
    }
}
