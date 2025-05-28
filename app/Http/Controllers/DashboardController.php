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
        $mitras = Company::all()->sortByDesc(function ($mitra) {
            return $mitra->getRating($mitra->company_id);
        });
        $lowongans = LowonganMagang::all();
        return view('admin.dashboard.admin', compact('users', 'breadcrumb', 'unreviewedLamarans', 'mitras', 'lowongans'));
    }

    public function indexMahasiswa()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();
        $magang = MagangApplication::where('mahasiswa_id', $mahasiswa->mahasiswa_id)->first();
        if ($magang) {
            $today = Carbon::today();
            $endDate = Carbon::parse($magang->lowongans->period->end_date);
            if ($mahasiswa->status !== 'is_magang') {
                $status = 'Lamaran Anda Sedang Diproses...';
            } elseif ($today->greaterThan($endDate)) {
                $status = 'Magang Anda Selesai';
            } else {
                $status = 'Anda Sedang Melaksanakan Magang';
            }
        } else {
            $status = 'Anda Belum Magang';
        }
        return view('mahasiswa.dashboard.mahasiswa', compact('breadcrumb', 'status', 'magang', 'mahasiswa'));
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
        $companyId = Company::where('user_id', Auth::user()->user_id)->value('company_id');

        $unreviewedLamarans = MagangApplication::with(['mahasiswas', 'lowongans'])
            ->where('status', 'pending')
            ->whereHas('lowongans', function ($query) use ($companyId) {
                $query->where('company_id', $companyId);
            })
            ->get();
            

        return view('company.dashboard.company', compact('breadcrumb', 'unreviewedLamarans'));
    }
}
