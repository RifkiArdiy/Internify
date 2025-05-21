<?php

namespace App\Http\Controllers;

use App\Models\MagangApplication;
use App\Models\Company;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
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
        $unreviewedLamarans = MagangApplication::with('mahasiswas')->where('status', 'pending')->get();
        $mitras = Company::all();
        $lowongans = LowonganMagang::all();
        return view('dashboard.admin', compact('breadcrumb', 'unreviewedLamarans', 'mitras', 'lowongans'));
    }

    public function indexMahasiswa()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => ['Welcome to Dashboard Internify']
        ];
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();
        $magang = MagangApplication::where('mahasiswa_id', $mahasiswa->mahasiswa_id)->first();
        if($magang){
            $today = Carbon::today();
            $endDate = Carbon::parse($magang->lowongans->period->end_date);
            if($mahasiswa->status!=='is_magang'){
                $status = 'Lamaran Anda Sedang Diproses...';
            }elseif($today->greaterThan($endDate)){
                $status = 'Magang Anda Selesai';
            }else{
                $status = 'Anda Sedang Melaksanakan Magang';
            }
        }else{
            $status = 'Anda Belum Magang';
        }
        return view('dashboard.mahasiswa', compact('breadcrumb', 'status', 'magang', 'mahasiswa'));
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
