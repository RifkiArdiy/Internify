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

    protected $fillable = [
        'company_id',
        'period_id',
        'kategori_id',
        'title',
        'description',
        'requirements',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
    ];

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

    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'lowongan_benefit', 'lowongan_id', 'benefit_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }
    
    public function jumlahPelamar()
    {
        return $this->applications()->count();
    }

    public function sertifikats()
    {
        return $this->hasOne(SertifikatMagang::class, 'lowongan_id', 'lowongan_id');
    }
}
