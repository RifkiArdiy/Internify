<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LowonganMagang extends Model
{
    use HasFactory;

    protected $table = 'lowongan_magangs';

    protected $primaryKey = 'lowongan_id';

    protected $fillable = ['company_id', 'period_id', 'title', 'description', 'requirements', 'location'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
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
