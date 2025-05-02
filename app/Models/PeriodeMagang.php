<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeMagang extends Model
{
    use HasFactory;

    protected $table = 'periode_magangs';

    protected $primaryKey = 'period_id';

    protected $fillable = ['name', 'start_date', 'end_date'];

    public function lowongans()
    {
        return $this->hasMany(LowonganMagang::class, 'period_id');
    }
}
