<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function indexAdmin()
    {
        return view('dashboard.admin');
    }

    public function indexMahasiswa()
    {
        return view('dashboard.mahasiswa');
    }

    public function indexDosen()
    {
        return view('dashboard.dosen');
    }

    public function index()
    {
        return view('dashboard');
    }
}
