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
        $lowongan = LowonganMagang::find($id);
        return view('listing.job.show', compact('lowongan'));
    }

    public function perusahaan()
    {
        $companies = Company::withCount('lowongans', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('listing.company.index', compact('companies'));
    }
}
