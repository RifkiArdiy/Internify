<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
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
            'subtitle' => 'Welcome to Dashboard Internify'
        ];

        $users = User::query()
            ->limit(5)
            ->get();
        $unreviewedLamarans = MagangApplication::with('mahasiswas')->where('status', 'pending')->get();
        // $mitras = Company::all()->sortByDesc(function ($mitra) {
        //     return $mitra->getRating($mitra->company_id);
        // });
        $mitras = Company::all();
        $lowongans = LowonganMagang::query()->limit(5)->get();
        return view('admin.dashboard.admin', compact('users', 'breadcrumb', 'unreviewedLamarans', 'mitras', 'lowongans'));
    }

    public function indexMahasiswa()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => 'Welcome to Dashboard Internify'
        ];

        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->user_id)->first();
        $magang = MagangApplication::with('lowongans.period')->where('mahasiswa_id', $mahasiswa->mahasiswa_id)->first();

        $periodeMagang = null;
        $sisaWaktuMagang = null;
        $isAkhirPeriode = false;
        $status = 'Anda Belum Magang';

        $profilAkademik = $mahasiswa->profil_akademik;
        $isProfilLengkap = false;

        if ($profilAkademik) {
            $isProfilLengkap = !empty($profilAkademik->etika) && !empty($profilAkademik->ipk);
        }

        $bimbinganDisetujui = false;
        if ($magang) {
            $bimbinganDisetujui = Bimbingan::where('magang_id', $magang->magang_id)
                ->where('status', 'Disetujui')
                ->exists();
        }

        if ($magang && $magang->lowongans && $magang->lowongans->period) {
            $startDate = Carbon::parse($magang->lowongans->period->start_date);
            $endDate = Carbon::parse($magang->lowongans->period->end_date);
            $today = Carbon::today();

            if ($today->lessThanOrEqualTo($endDate)) {
                $diff = $today->diff($endDate);
                $sisaWaktuMagang = 'Kurang ' . $diff->m . ' bulan ' . $diff->d . ' hari';
            } else {
                $sisaWaktuMagang = 'Periode magang telah berakhir';
            }

            $periodeMagang = [
                'start' => $startDate->format('Y-m-d'),
                'end' => $endDate->format('Y-m-d'),
            ];

            $isAkhirPeriode = $today->greaterThanOrEqualTo($endDate);

            if ($magang->status !== 'Disetujui') {
                $status = 'Lamaran Anda Sedang Diproses...';
            } elseif ($today->greaterThan($endDate)) {
                $status = 'Magang Anda Selesai';
            } else {
                $status = 'Anda Sedang Melaksanakan Magang';
            }
        }

        $completedSteps = 0;
        $totalSteps = 4;
        if ($isProfilLengkap) $completedSteps++;
        if ($bimbinganDisetujui) $completedSteps++;
        if ($sisaWaktuMagang) $completedSteps++;
        if ($isAkhirPeriode) $completedSteps++;

        $progressPercent = round(($completedSteps / $totalSteps) * 100);

        return view('mahasiswa.dashboard.mahasiswa', compact(
            'breadcrumb',
            'status',
            'magang',
            'mahasiswa',
            'isProfilLengkap',
            'periodeMagang',
            'sisaWaktuMagang',
            'isAkhirPeriode',
            'progressPercent',
            'bimbinganDisetujui'
        ));
    }

    public function indexDosen()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => 'Welcome to Dashboard Internify'
        ];
        return view('dosen.dashboard.dosen', compact('breadcrumb'));
    }

    public function indexCompany()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => 'Welcome to Dashboard Internify'
        ];

        $company = Company::where('user_id', Auth::id())->first();

        // Data untuk cards dashboard
        $openJobs = LowonganMagang::where('company_id', $company->company_id)->count();

        $savedCandidates = MagangApplication::whereHas('lowongans', function ($query) use ($company) {
            $query->where('company_id', $company->company_id);
        })->where('status', 'Disetujui')->count();

        $pendingJobs = MagangApplication::whereHas('lowongans', function ($query) use ($company) {
            $query->where('company_id', $company->company_id);
        })->where('status', 'Pending')->count();

        // Data tambahan
        $unreviewedLamarans = MagangApplication::with(['mahasiswas', 'lowongans'])
            ->where('status', 'pending')
            ->whereHas('lowongans', fn($q) => $q->where('company_id', $company->company_id))
            ->get();

        $logang = LowonganMagang::where('company_id', $company->company_id)
            ->latest()
            ->limit(5)
            ->get();

        return view('company.dashboard.company', compact(
            'breadcrumb',
            'unreviewedLamarans',
            'logang',
            'openJobs',
            'savedCandidates',
            'pendingJobs'
        ));
    }
}
