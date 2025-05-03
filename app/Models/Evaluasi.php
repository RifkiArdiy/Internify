<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    use HasFactory;

    protected $table = 'evaluasi_magang';

    protected $primaryKey = 'evaluasi_id';

    protected $fillable = ['mahasiswa_id', 'company_id', 'evaluasi'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'mahasiswa_id');
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }
}
