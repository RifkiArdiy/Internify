<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\FeedbackMagang;
use App\Models\LowonganMagang;
use App\Models\MagangApplication;
use App\Models\PeriodeMagang;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function lowongan()
    {
        $periodeBerjalan = PeriodeMagang::whereDate('end_date', '>', Carbon::today())->pluck('period_id');
        $lowongan = LowonganMagang::with('company', 'period')
            ->whereIn('period_id', $periodeBerjalan)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('listing.job.index', compact('lowongan'));
    }

    public function showLowongan(string $id)
    {
        $lowongan = LowonganMagang::with(['company.user'])->findOrFail($id);

        $jobcount = optional($lowongan->company)->lowongans()->count() ?? 0;

        $periodeBerjalan = PeriodeMagang::whereDate('end_date', '>', Carbon::today())->pluck('period_id');

        $recent = LowonganMagang::where('kategori_id', $lowongan->kategori_id)
            ->where('lowongan_id', '!=', $lowongan->lowongan_id)
            ->whereIn('period_id', $periodeBerjalan)
            ->latest()
            ->take(3)
            ->get();

        $hasProfilAkademik = false;

        if (Auth::check()) {
            $user = Auth::user();
            $mahasiswa = $user->mahasiswa;

            if ($mahasiswa && $mahasiswa->profil_akademik) {
                $hasProfilAkademik = !empty($mahasiswa->profil_akademik->ipk) && !empty($mahasiswa->profil_akademik->etika);
            }
        }

        $company = Company::with(['user', 'lowongans.kategori'])->findOrFail($lowongan->company_id);

        $lowonganIds = $company->lowongans->pluck('lowongan_id');

        $magangIds = MagangApplication::whereIn('lowongan_id', $lowonganIds)->pluck('magang_id');

        $feedbacks = FeedbackMagang::whereIn('magang_id', $magangIds)->get();

        $averageRating = number_format($feedbacks->avg('rating') ?? 0, 2);

        $sudahMelamar = false;

        if (Auth::check() && Auth::user()->level->level_nama === 'Mahasiswa') {
            $mahasiswa = Auth::user()->mahasiswa;
            if ($mahasiswa) {
                $sudahMelamar = MagangApplication::where('mahasiswa_id', $mahasiswa->mahasiswa_id)
                    ->where('lowongan_id', $lowongan->lowongan_id)
                    ->exists();
            }
        }


        return view('listing.job.show', compact('lowongan', 'jobcount', 'recent', 'hasProfilAkademik', 'averageRating', 'sudahMelamar'));
    }


    public function perusahaan()
    {
        $companies = Company::withCount('lowongans', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        $currPage = 'perusahaan';

        return view('listing.company.index', compact('companies', 'currPage'));
    }

    public function showPerusahaan($id)
    {
        $company = Company::with(['user', 'lowongans.kategori'])->findOrFail($id);

        $lowonganIds = $company->lowongans->pluck('lowongan_id');

        $magangIds = MagangApplication::whereIn('lowongan_id', $lowonganIds)->pluck('magang_id');

        $feedbacks = FeedbackMagang::whereIn('magang_id', $magangIds)->get();

        $averageRating = number_format($feedbacks->avg('rating') ?? 0, 2);

        return view('listing.company.show', compact('company', 'averageRating'));
    }


    public function searchLowongan(Request $request)
    {
        $query = LowonganMagang::with(['company.user', 'period', 'kategori']);

        if ($request->filled('q')) {
            $q = $request->q;
            $periodeBerjalan = PeriodeMagang::whereDate('end_date', '>', Carbon::today())->pluck('period_id');

            $query->whereIn('period_id', $periodeBerjalan)
                ->where(function ($sub) use ($q) {
                    $sub->where('title', 'like', '%' . $q . '%')
                        ->orWhereHas('company.user', function ($user) use ($q) {
                            $user->where('name', 'like', '%' . $q . '%');
                        });
                });
        }

        if ($request->filled('perusahaan_id')) {
            $query->where('company_id', $request->perusahaan_id);
        }

        $lowongan = $query->latest()->get();

        $currPage = 'lowongan';

        return view('listing.job.index', compact('lowongan', 'currPage'));
    }

    public function searchCompany(Request $request)
    {
        $query = Company::with(['user'])->withCount('lowongans');

        if ($request->filled('q')) {
            $keyword = $request->q;

            $query->where(function ($q) use ($keyword) {
                $q->whereHas('user', function ($u) use ($keyword) {
                    $u->where('name', 'like', '%' . $keyword . '%');
                })->orWhere('about_company', 'like', '%' . $keyword . '%');
            });
        }

        $companies = $query->latest()->get();

        $currPage = 'perusahaan';

        return view('listing.company.index', compact('companies', 'currPage'));
    }
}
