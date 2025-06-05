<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use HasFactory;

    protected $table = 'logs';

    protected $primaryKey = 'log_id';

    protected $fillable = ['mahasiswa_id', 'dosen_id', 'company_id', 'report_title', 'report_text', 'file_path', 'verif_dosen', 'verif_company'];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'mahasiswa_id');
    }

    public function dosen(): BelongsTo
    {
        return $this->belongsTo(Dosen::class, 'dosen_id', 'dosen_id');
    }

    public function companies(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'company_id');
    }

    public function evaluasi()
    {
        return $this->hasOne(EvaluasiMagang::class, 'evaluasi_id', 'evaluasi_id');
    }
}
