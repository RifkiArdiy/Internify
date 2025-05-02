<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganMagang extends Model
{
    use HasFactory;

    protected $table = 'lowongan_magangs';

    protected $primaryKey = 'lowongan_id';

    protected $fillable = ['company_id', 'period_id', 'title', 'description', 'requirements', 'location'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function period()
    {
        return $this->belongsTo(PeriodeMagang::class, 'period_id');
    }

    public function applications()
    {
        return $this->hasMany(MagangApplication::class, 'lowongan_id');
    }
}
