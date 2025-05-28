<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kriteria extends Model
{
    protected $primaryKey = 'kriteria_id';
    protected $fillable = ['kode', 'nama', 'weight', 'jenis'];

    public function skorKriterias()
    {
        return $this->hasMany(SkorKriteria::class, 'kriteria_id');
    }

    public function nilaiAlternatifs()
    {
        return $this->hasMany(NilaiAlternatif::class, 'kriteria_id');
    }
}
