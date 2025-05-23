<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\LowonganMagang;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lowongans = LowonganMagang::with('company', 'period')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        $companies = Company::withCount('lowongans', 'user')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
        return view('home.welcome', compact('companies', 'lowongans'));
    }
}
