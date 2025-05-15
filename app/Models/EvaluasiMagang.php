<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiMagang extends Model
{
    use HasFactory;

    protected $table = 'evaluasi_magang';
    protected $primaryKey = 'evaluasi_id';

    protected $fillable = ['mahasiswa_id', 'company_id', 'evaluasi', 'log_id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function logs()
    {
        return $this->belongsTo(Log::class, 'log_id');
    }
}
