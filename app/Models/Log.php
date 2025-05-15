<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $primaryKey = 'log_id';

    protected $fillable = ['mahasiswa_id', 'dosen_id','company_id', 'report_text', 'file_path', 'verif_dosen', 'verif_company'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function evaluasi()
    {
        return $this->hasOne(EvaluasiMagang::class, 'evaluasi_id', 'evaluasi_id');
    }

}
