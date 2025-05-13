<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosens';

    protected $primaryKey = 'dosen_id';

    protected $fillable = ['user_id', 'nip'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function logs()
    {
        return $this->hasMany(Log::class, 'dosen_id', 'dosen_id');
    }
}
