<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'name', 'username', 'email', 'password', 'no_telp', 'alamat', 'image'];

    protected $hidden = ['password'];

    protected $cast = ['password' => 'hashed'];

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id', 'level_id');
    }

    public function mahasiswa(): HasOne
    {
        return $this->hasOne(Mahasiswa::class, 'user_id', 'user_id');
    }

    public function dosen(): HasOne
    {
        return $this->hasOne(Dosen::class, 'user_id', 'user_id');
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'user_id', 'user_id');
    }

    public function profilAkademik(): HasOne
    {
        return $this->hasOne(ProfilAkademik::class, 'user_id', 'user_id');
    }

    public function getRoleName(): string
    {
        return $this->level->level_nama;
    }

    public function hasRole($role): bool
    {
        return $this->level->level_nama == $role;
    }

    public function getRole()
    {
        return $this->level->level_nama;
    }
}
