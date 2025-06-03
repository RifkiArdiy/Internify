<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorKriteria extends Model
{
    use HasFactory;

    protected $table = 'skor_kriteria';
    protected $primaryKey = 'skor_id';
    protected $fillable = ['kriteria_id', 'parameter', 'nilai'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
