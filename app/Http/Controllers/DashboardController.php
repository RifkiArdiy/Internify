<?php

namespace App\Http\Controllers;

use App\Models\MagangApplication;
use App\Models\Company;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function indexAdmin()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        $mahasiswas = Mahasiswa::all();
        $mahasiswaMagang = (object) [
            'lulus' => $mahasiswas->where('status', 'is_magang')->count(),
        ];
        $unreviewedLamarans = MagangApplication::with('mahasiswas')->where('status', 'pending')->get();
        $mitras = Company::all();
        $lowongans = LowonganMagang::all();
        return view('dashboard.admin', compact('breadcrumb', 'unreviewedLamarans', 'mitras', 'lowongans','mahasiswas','mahasiswaMagang'));
    }

    public function indexMahasiswa()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        return view('dashboard.mahasiswa', compact('breadcrumb'));
    }

    public function indexDosen()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        return view('dashboard.dosen', compact('breadcrumb'));
    }

    public function indexCompany()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        return view('dashboard.company', compact('breadcrumb'));
    }
}
