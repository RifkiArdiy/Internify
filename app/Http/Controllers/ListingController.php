<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\FeedbackMagang;
use App\Models\LowonganMagang;
use App\Models\MagangApplication;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function lowongan()
    {
        $lowongan = LowonganMagang::with('company', 'period')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('listing.job.index', compact('lowongan'));
    }

    public function showLowongan(string $id)
    {
        $lowongan = LowonganMagang::with(['company.user']) // Memuat company dan user di dalamnya
            ->findOrFail($id);

        $jobcount = $lowongan->company->lowongans()->count(); // Ini yang benar

        $recent = LowonganMagang::where('kategori_id', $lowongan->kategori_id)
            ->where('lowongan_id', '!=', $lowongan->lowongan_id)
            ->latest()
            ->take(3)
            ->get();
        
        $logang = LowonganMagang::with('benefits', 'kategori')->findOrFail($id);

        $company = Company::with(['user', 'lowongans.kategori'])->findOrFail($id);
        $lowongans = LowonganMagang::where('company_id', $company->company_id)->get();
        $lowonganIds = $lowongans->pluck('lowongan_id');
        $magangs = MagangApplication::whereIn('lowongan_id', $lowonganIds)->get();
        $magangIds = $magangs->pluck('magang_id');
        $ratings = FeedbackMagang::whereIn('magang_id', $magangIds)->get();
        $averageRating = number_format($ratings->avg('rating') ?? 0, 2);


        return view('listing.job.show', compact('lowongan', 'jobcount', 'recent', 'logang', 'ratings', 'averageRating'));
    }

    public function perusahaan()
    {
        $companies = Company::withCount('lowongans', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('listing.company.index', compact('companies'));
    }

    public function showPerusahaan($id)
    {
        $company = Company::with(['user', 'lowongans.kategori'])->findOrFail($id);
        $lowongans = LowonganMagang::where('company_id', $company->company_id)->get();
        $lowonganIds = $lowongans->pluck('lowongan_id');
        $magangs = MagangApplication::whereIn('lowongan_id', $lowonganIds)->get();
        $magangIds = $magangs->pluck('magang_id');
        $ratings = FeedbackMagang::whereIn('magang_id', $magangIds)->get();
        $averageRating = number_format($ratings->avg('rating') ?? 0, 2);


        return view('listing.company.show', compact('company', 'averageRating'));
    }
}
