<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $timestamps = false;

    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }

    public function lowonganMagangs()
    {
        return $this->hasMany(LowonganMagang::class);
    }
}
