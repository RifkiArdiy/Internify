<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $primaryKey = 'company_id';

    protected $fillable = ['user_id', 'about_company'];

    public function lowongans(): HasMany
    {
        return $this->hasMany(LowonganMagang::class, 'company_id', 'company_id');
    }

    public function evaluasis()
    {
        return $this->hasMany(EvaluasiMagang::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function sertifikat()
    {
        return $this->hasMany(SertifikatMagang::class, 'company_id', 'company_id');
    }

    // public function getRating(string $id){
    //     $company = Company::with(['user', 'lowongans.kategori'])->findOrFail($id);
    //     $lowongans = LowonganMagang::where('company_id', $company->company_id)->get();
    //     $lowonganIds = $lowongans->pluck('lowongan_id');
    //     $magangs = MagangApplication::whereIn('lowongan_id', $lowonganIds)->get();
    //     $magangIds = $magangs->pluck('magang_id');
    //     $ratings = FeedbackMagang::whereIn('magang_id', $magangIds)->get();
    //     $averageRating = number_format($ratings->avg('rating') ?? 0, 2);

    //     return $averageRating;
    // }
    public function getRating($companyId)
    {
        $avg = DB::table('feedback_magang')
            ->join('magang_applications', 'feedback_magang.magang_id', '=', 'magang_applications.magang_id')
            ->join('lowongan_magangs', 'magang_applications.lowongan_id', '=', 'lowongan_magangs.lowongan_id')
            ->where('lowongan_magangs.company_id', $companyId)
            ->avg('feedback_magang.rating');

        return number_format($avg ?? 0, 1); // format seperti 4.2
    }
}
