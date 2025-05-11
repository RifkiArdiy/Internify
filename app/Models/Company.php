<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $primaryKey = 'company_id';

    protected $fillable = ['name', 'industry', 'address', 'contact'];

    public function lowongans(): HasMany
    {
        return $this->hasMany(LowonganMagang::class, 'company_id', 'company_id');
    }

    public function evaluasis()
    {
        return $this->hasMany(Evaluasi::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
