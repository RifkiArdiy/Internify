<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['regency_id', 'name'];

    public $timestamps = false;

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    public function lowonganMagangs()
    {
        return $this->hasMany(LowonganMagang::class);
    }
}
