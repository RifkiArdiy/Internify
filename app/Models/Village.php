<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = ['district_id', 'name'];

    public $timestamps = false;

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function lowonganMagangs()
    {
        return $this->hasMany(LowonganMagang::class);
    }
}
