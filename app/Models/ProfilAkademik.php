<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilAkademik extends Model
{
    use HasFactory;

    protected $table = 'profil_akademik';

    protected $primaryKey = 'profile_id';

    protected $fillable = ['user_id', 'bidang_keahlian', 'sertifikasi', 'lokasi', 'pengalaman', 'etika', 'ipk'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
