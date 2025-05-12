<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\LowonganMagang;
use Database\Seeders\LowonganMagangSeeder;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $companies = Company::withCount('lowongans', 'user')->get();
        $lowongans = LowonganMagang::with('company', 'period')->get();
        return view('home.welcome', compact('companies', 'lowongans'));
    }
}
