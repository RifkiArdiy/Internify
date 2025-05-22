<?php

namespace App\Http\Controllers;

use App\Models\MagangApplication;
use App\Models\Company;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
use App\Models\User;
use Database\Seeders\MahasiswaSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



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
        $mahasiswa_id = Mahasiswa::where('user_id', Auth::user()->user_id)->value('mahasiswa_id');
        $magang = MagangApplication::where('mahasiswa_id', $mahasiswa_id)->first();
        if ($magang) {
            $today = Carbon::today();
            $endDate = Carbon::parse($magang->lowongans->period->end_date);
            if ($today->greaterThan($endDate)) {
                $status = 'Magang Anda Selesai';
            } else {
                $status = 'Anda Sedang Melaksanakan Magang';
            }
        } else {
            $status = 'Anda Belum Magang';
        }
        return view('mahasiswa.dashboard.mahasiswa', compact('breadcrumb', 'status', 'magang'));
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
