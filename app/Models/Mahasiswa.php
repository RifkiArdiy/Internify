<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $primaryKey = 'mahasiswa_id';

    protected $fillable = ['user_id', 'prodi_id', 'nim'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prodi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function applications()
    {
        return $this->hasMany(MagangApplication::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
