<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $primaryKey = 'company_id';

    protected $fillable = ['name', 'industry', 'address', 'contact'];

    public function lowongans()
    {
        return $this->hasMany(LowonganMagang::class);
    }
}
