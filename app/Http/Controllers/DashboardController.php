<?php

namespace App\Http\Controllers;

use App\Models\MagangApplication;
use App\Models\Company;
use App\Models\LowonganMagang;
use App\Models\User;
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

        $users = User::query()
            ->limit(5)
            ->get();
        $unreviewedLamarans = MagangApplication::with('mahasiswas')->where('status', 'pending')->get();
        $mitras = Company::all();
        $lowongans = LowonganMagang::all();
        return view('admin.dashboard.admin', compact('users', 'breadcrumb', 'unreviewedLamarans', 'mitras', 'lowongans'));
    }

    public function indexMahasiswa()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        return view('mahasiswa.dashboard.mahasiswa', compact('breadcrumb'));
    }

    public function indexDosen()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        return view('dosen.dashboard.dosen', compact('breadcrumb'));
    }

    public function indexCompany()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        return view('company.dashboard.company', compact('breadcrumb'));
    }
}
