<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackMagang extends Model
{
    use HasFactory;

    protected $table = 'feedback_magang';
    protected $primaryKey = 'feedback_id';

    protected $fillable = ['magang_id', 'mahasiswa_id', 'judul_feedback', 'feedback', 'rating'];

    public function magang()
    {
        return $this->belongsTo(MagangApplication::class, 'magang_id');
    }
    
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
