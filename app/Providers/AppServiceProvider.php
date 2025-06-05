<?php

namespace App\Providers;

use App\Models\LowonganMagang;
use App\Models\MagangApplication;
use App\Models\Company;
use Illuminate\Support\ServiceProvider;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Carbon\CarbonInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

public function boot(): void
{
    if (app()->runningInConsole()) {
        return;
    }

    View::composer('*', function ($view) {
        if (Auth::check()) {
            // If Mahasiswa
            if (Auth::user()->getRole() === 'Mahasiswa') {
                $m_id = Mahasiswa::where('user_id', Auth::id())->value('mahasiswa_id');
                $applications = MagangApplication::where('mahasiswa_id', $m_id)
                    ->orderByDesc('updated_at')->get();

                if ($applications->isNotEmpty()) {
                    $notifications = $applications->map(function ($app) {
                        $updatedTime = Carbon::parse($app->updated_at);
                        $diff = $updatedTime->diffForHumans([
                            'parts' => 1,
                            'short' => true,
                            'syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW
                        ]);

                        $lowongan = LowonganMagang::find($app->lowongan_id);
                        $company = $lowongan ? Company::find($lowongan->company_id) : null;
                        $companyUser = $company ? User::find($company->user_id) : null;

                        return [
                            'm_status' => $app->status,
                            'm_company_name' => $companyUser?->name ?? 'Unknown',
                            'm_time' => $diff,
                        ];
                    });

                    $view->with('notif_magang_list', $notifications);
                } else {
                    $view->with('notif_magang_list', collect());
                }
            }

            // If Company
elseif (Auth::user()->getRole() === 'Company') {
    $c_id = Company::where('user_id', Auth::id())->value('company_id');
    $lowongan = LowonganMagang::where('company_id', $c_id)->get()->keyBy('lowongan_id');

    $l_ids = $lowongan->keys(); // Get only the lowongan IDs
    $m_pending = MagangApplication::whereIn('lowongan_id', $l_ids)
        ->where('status', 'Pending')->get();

    if ($m_pending->isNotEmpty()) {
        $mahasiswa_ids = $m_pending->pluck('mahasiswa_id');
        $mahasiswa_map = Mahasiswa::whereIn('mahasiswa_id', $mahasiswa_ids)
            ->get()
            ->keyBy('mahasiswa_id');

        $user_ids = $mahasiswa_map->pluck('user_id');
        $user_map = User::whereIn('user_id', $user_ids)
            ->get()
            ->keyBy('user_id');

        $notifications = $m_pending->map(function ($app) use ($mahasiswa_map, $user_map, $lowongan) {
            $mahasiswa = $mahasiswa_map[$app->mahasiswa_id] ?? null;
            $user = $user_map[$mahasiswa->user_id] ?? null;
            $job = $lowongan[$app->lowongan_id] ?? null;

            return [
                'application_id' => $app->id,
                'c_mahasiswa_name' => $user?->name ?? 'Unknown',
                'lowongan_id' => $app->lowongan_id,
                'c_lowongan_title' => $job?->title ?? 'Unknown',
                'c_created_at' => $app->created_at->diffForHumans(),
                'status' => $app->status,
            ];
        });

        $view->with('notif_pending_list', $notifications);
    } else {
        $view->with('notif_magang_list', collect());
        $view->with('notif_pending_list', collect());
    }
}
        }
    });
}
}