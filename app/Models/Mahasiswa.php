<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $primaryKey = 'mahasiswa_id';

    protected $fillable = ['user_id', 'prodi_id', 'nim', 'status'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(ProgramStudi::class, 'prodi_id', 'prodi_id');
    }

    public function applications()
    {
        return $this->hasMany(MagangApplication::class, 'mahasiswa_id', 'mahasiswa_id');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'mahasiswa_id', 'mahasiswa_id');
    }

    public function evaluasi()
    {
        return $this->hasMany(EvaluasiMagang::class, 'evaluasi_id', 'evaluasi_id');
    }

    public function criteria()
    {
        return $this->belongsToMany(Kriteria::class, 'mahasiswa_criteria')
            ->withPivot('value')
            ->withTimestamps();
    }

    public function profil_akademik()
    {
        return $this->hasOne(ProfilAkademik::class, 'user_id', 'user_id');
    }
}
