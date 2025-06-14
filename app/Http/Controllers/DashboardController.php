<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\MagangApplication;
use App\Models\Company;
use App\Models\FeedbackMagang;
use App\Models\LowonganMagang;
use App\Models\Mahasiswa;
use App\Models\User;
use Database\Seeders\MahasiswaSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => 'Welcome to Dashboard Internify'
        ];

        $users = User::query()->limit(5)->get();

        $unreviewedLamarans = MagangApplication::with('mahasiswas')
            ->where('status', 'pending')
            ->get();

        // Ambil semua perusahaan dan urutkan berdasarkan rating tertinggi
        $mitras = Company::with('user')
            ->select('companies.*', DB::raw('AVG(feedback_magang.rating) as avg_rating'))
            ->leftJoin('lowongan_magangs', 'companies.company_id', '=', 'lowongan_magangs.company_id')
            ->leftJoin('magang_applications', 'lowongan_magangs.lowongan_id', '=', 'magang_applications.lowongan_id')
            ->leftJoin('feedback_magang', 'magang_applications.magang_id', '=', 'feedback_magang.magang_id')
            ->groupBy('companies.company_id')
            ->orderByDesc('avg_rating')
            ->take(5)
            ->get();

        $lowongans = LowonganMagang::query()->limit(5)->get();

        $lowonganCounts = LowonganMagang::withCount('applications')->get();

        $magangStatusCounts = [];

        foreach ($lowonganCounts as $lowongan) {
            $magangStatusCounts[$lowongan->title] = $lowongan->applications_count;
        }

        $totalMahasiswa = Mahasiswa::count();

        $magangStatusCounts = LowonganMagang::withCount('applications')
            ->orderByDesc('applications_count')
            ->limit(5)
            ->get()
            ->pluck('applications_count', 'title')
            ->toArray();

        $trendData = MagangApplication::select(
            DB::raw("DATE(created_at) as date"),
            DB::raw("count(*) as total")
        )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $trendLabels = $trendData->pluck('date')->toArray();
        $trendCounts = $trendData->pluck('total')->toArray();

        return view('admin.dashboard.admin', compact(
            'users',
            'breadcrumb',
            'unreviewedLamarans',
            'mitras',
            'lowongans',
            'magangStatusCounts',
            'trendLabels',
            'trendCounts'
        ));
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

        $feedbackDikirim = false;
        if ($magang) {
            $feedbackDikirim = FeedbackMagang::where('magang_id', $magang->magang_id)->exists();
        }

        $totalSteps = 4;
        $completedSteps = 0;

        if ($isProfilLengkap) $completedSteps++;
        if ($bimbinganDisetujui) $completedSteps++;
        if ($magang && $magang->status === 'Disetujui' && !$isAkhirPeriode) $completedSteps++;
        if ($isAkhirPeriode) $completedSteps++;
        if ($feedbackDikirim) $completedSteps++; // ✅ tambahkan progress jika feedback dikirim

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
            'bimbinganDisetujui',
            'feedbackDikirim' // ✅ tambahkan ini
        ));
    }

    public function indexDosen()
    {
        $breadcrumb = (object) [
            'title' => 'Dashboard',
            'subtitle' => 'Welcome to Dashboard Internify'
        ];
        $userId = Auth::id();

        $bimbingans = Bimbingan::with(['magang.mahasiswas.profil_akademik', 'magang.lowongans.period', 'magang.lowongans.company', 'magang.mahasiswas.user'])
            ->where('dosen_id', $userId)
            ->orderByDesc('created_at')
            ->get();

        // Hitung progress per mahasiswa
        $bimbingans->map(function ($bimbingan) {
            $mhs = $bimbingan->magang->mahasiswas ?? null;
            $profil = $mhs?->profil_akademik;
            $magang = $bimbingan->magang;

            $completed = 0;
            if ($profil && !empty($profil->etika) && !empty($profil->ipk)) $completed++; // 1
            if ($bimbingan->status === 'Disetujui') $completed++; // 2
            if ($magang && $magang->status === 'Disetujui') $completed++; // 3

            $periode = $magang->lowongans->period ?? null;
            $isAkhirPeriode = false;
            if ($periode) {
                $end = \Carbon\Carbon::parse($periode->end_date);
                $isAkhirPeriode = now()->greaterThanOrEqualTo($end);
            }
            if ($isAkhirPeriode) $completed++; // 4

            $bimbingan->progress = round(($completed / 4) * 100);
            return $bimbingan;
        });

        $totalMahasiswa = $bimbingans->count();

        $belumReview = $bimbingans->filter(function ($item) {
            return $item->status === 'Pending';
        })->count();

        $selesaiMagang = $bimbingans->filter(function ($item) {
            $periode = $item->magang->lowongans->period ?? null;
            return $periode && \Carbon\Carbon::parse($periode->end_date)->isPast();
        })->count();

        return view('dosen.dashboard.dosen', compact('breadcrumb', 'bimbingans', 'totalMahasiswa', 'belumReview', 'selesaiMagang'));
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
