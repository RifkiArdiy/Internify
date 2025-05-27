<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\LowonganMagang;
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
        return view('listing.job.show', compact('lowongan', 'jobcount', 'recent'));
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

        return view('listing.company.show', compact('company'));
    }

    public function searchLowongan(Request $request)
    {
        $query = LowonganMagang::with(['company.user', 'period', 'kategori']);

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($sub) use ($q) {
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

        return view('listing.job.index', compact('lowongan'));
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

        return view('listing.company.index', compact('companies'));
    }
}
