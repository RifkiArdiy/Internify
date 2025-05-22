<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;

    protected $table = 'benefits';

    protected $primaryKey = 'benefit_id';

    protected $fillable = ['name'];

    public function lowongans()
    {
        return $this->belongsToMany(LowonganMagang::class, 'lowongan_benefit', 'benefit_id', 'lowongan_id');
    }
}
