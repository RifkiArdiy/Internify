<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $primaryKey = 'kategori_id';

    protected $fillable = ['name'];

    public function lowongans(): HasMany
    {
        return $this->hasMany(LowonganMagang::class, 'kategori_id', 'kategori_id');
    }
}
