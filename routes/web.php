<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\LowonganMagangController;
use App\Http\Controllers\MagangApplicationController;
use App\Http\Controllers\PeriodeMagangController;
use App\Models\MagangApplication;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\EvaluasiMagangController;
use App\Http\Controllers\ProfilAkademikController;
use App\Http\Controllers\MonitoringController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/home', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/lowongan', [ListingController::class, 'lowongan'])->name('list.lowongan');
Route::get('/{id}/lowongan', [ListingController::class, 'showLowongan'])->name('show.lowongan');
Route::get('/perusahaan', [ListingController::class, 'perusahaan'])->name('list.perusahaan');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::prefix('admin')->middleware('role:Administrator')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard');
        Route::prefix('prodi')->group(function () {
            Route::get('/', [ProgramStudiController::class, 'index'])->name('prodi.index');
            Route::get('/create', [ProgramStudiController::class, 'create'])->name('prodi.create');
            Route::post('/store', [ProgramStudiController::class, 'store'])->name('prodi.store');
            Route::get('/show/{id}', [ProgramStudiController::class, 'show'])->name('prodi.show');
            Route::get('/edit/{id}', [ProgramStudiController::class, 'edit'])->name('prodi.edit');
            Route::put('/{id}', [ProgramStudiController::class, 'update'])->name('prodi.update');
            Route::get('/{id}', [ProgramStudiController::class, 'destroy'])->name('prodi.destroy');
        });

        Route::prefix('periode-magang')->group(callback: function () {
            Route::get('/', [PeriodeMagangController::class, 'index'])->name('periode-magang.index');
            Route::get('/create', [PeriodeMagangController::class, 'create'])->name('periode-magang.create');
            Route::post('/store', [PeriodeMagangController::class, 'store'])->name('periode-magang.store');
            Route::get('/show/{id}', [PeriodeMagangController::class, 'show'])->name('periode-magang.show');
            Route::get('/edit/{id}', [PeriodeMagangController::class, 'edit'])->name('periode-magang.edit');
            Route::put('/{id}', [PeriodeMagangController::class, 'update'])->name('periode-magang.update');
            Route::get('/{id}', [PeriodeMagangController::class, 'destroy'])->name('periode-magang.destroy');
        });

        Route::prefix('lowongan-magang')->group(callback: function () {
            Route::get('/', [LowonganMagangController::class, 'index'])->name('lowongan-magang.index');
            Route::get('/create', [LowonganMagangController::class, 'create'])->name('lowongan-magang.create');
            Route::post('/store', [LowonganMagangController::class, 'store'])->name('lowongan-magang.store');
            Route::get('/show/{id}', [LowonganMagangController::class, 'show'])->name('lowongan-magang.show');
            Route::get('/edit/{id}', [LowonganMagangController::class, 'edit'])->name('lowongan-magang.edit');
            Route::put('/{id}', [LowonganMagangController::class, 'update'])->name('lowongan-magang.update');
            Route::delete('/{id}', [LowonganMagangController::class, 'destroy'])->name('lowongan-magang.destroy');
        });

        Route::prefix('pengajuan-magang')->group(callback: function () {
            Route::get('/', [MagangApplicationController::class, 'index'])->name('pengajuan-magang.index');
            Route::get('/show/{id}', [MagangApplicationController::class, 'show'])->name('pengajuan-magang.show');
            Route::get('/edit/{id}', [MagangApplicationController::class, 'edit'])->name('pengajuan-magang.edit');
            Route::put('/{id}', [MagangApplicationController::class, 'update'])->name('pengajuan-magang.update');
            Route::get('/{id}', [MagangApplicationController::class, 'destroy'])->name('pengajuan-magang.destroy');
        });

        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('user.index');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
            Route::get('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        });

        Route::prefix('mahasiswa')->group(function () {
            Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
            Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
            Route::post('/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
            Route::get('/show/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
            Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
            Route::put('/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
            Route::get('/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
        });

        Route::prefix('dosen')->group(function () {
            Route::get('/', [DosenController::class, 'index'])->name('dosen.index');
            Route::get('/create', [DosenController::class, 'create'])->name('dosen.create');
            Route::post('/store', [DosenController::class, 'store'])->name('dosen.store');
            Route::get('/edit/{id}', [DosenController::class, 'edit'])->name('dosen.edit');
            Route::get('/show/{id}', [DosenController::class, 'show'])->name('dosen.show');
            Route::put('/{id}', [DosenController::class, 'update'])->name('dosen.update');
            Route::get('/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');
        });

        Route::prefix('prodi')->group(function () {
            Route::get('/', [ProgramStudiController::class, 'index'])->name('prodi.index');
            Route::get('/create', [ProgramStudiController::class, 'create'])->name('prodi.create');
            Route::post('/store', [ProgramStudiController::class, 'store'])->name('prodi.store');
            Route::get('/edit/{id}', [ProgramStudiController::class, 'edit'])->name('prodi.edit');
            Route::get('/show/{id}', [ProgramStudiController::class, 'show'])->name('prodi.show');
            Route::put('/{id}', [ProgramStudiController::class, 'update'])->name('prodi.update');
            Route::get('/{id}', [ProgramStudiController::class, 'destroy'])->name('prodi.destroy');
        });

        Route::prefix('companies')->group(function () {
            Route::get('/', [CompanyController::class, 'index'])->name('companies.index');
            Route::get('/create', [CompanyController::class, 'create'])->name('companies.create');
            Route::post('/store', [CompanyController::class, 'store'])->name('companies.store');
            Route::get('/show/{id}', [CompanyController::class, 'show'])->name('companies.show');
            Route::get('/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
            Route::put('/{id}', [CompanyController::class, 'update'])->name('companies.update');
            Route::delete('/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
        });

        Route::prefix('monitoring')->group(function () {
            Route::get('/', [MonitoringController::class, 'index'])->name('monitoring.index');
            Route::get('/create', [MonitoringController::class, 'create'])->name('monitoring.create');
            Route::post('/store', [MonitoringController::class, 'store'])->name('monitoring.store');
            Route::get('/show/{id}', [MonitoringController::class, 'show'])->name('monitoring.show');
            Route::get('/{id}/edit', [MonitoringController::class, 'edit'])->name('monitoring.edit');
            Route::put('/{id}', [MonitoringController::class, 'update'])->name('monitoring.update');
            Route::delete('/{id}', [MonitoringController::class, 'destroy'])->name('monitoring.destroy');
        });
    });


    Route::prefix('mahasiswa')->middleware('role:Mahasiswa')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexMahasiswa'])->name('mahasiswa.dashboard');

        Route::prefix('laporan')->group(function () {
            Route::get('', [LaporanController::class, 'index'])->name('laporan');
            Route::get('/create', [LaporanController::class, 'create'])->name('laporan.create');
            Route::post('/store', [LaporanController::class, 'store'])->name('laporan.store');
            Route::get('/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
            Route::put('/{id}', [LaporanController::class, 'update'])->name('laporan.update');
            Route::delete('/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
            Route::get('/show/{id}', [LaporanController::class, 'show'])->name('laporan.show');
        });

        Route::prefix('lowongan')->group(function () {
            Route::get('/', [LowonganMagangController::class, 'indexMhs'])->name('lowongan-magang.indexMhs');
            Route::get('/show/{id}', [LowonganMagangController::class, 'show'])->name('lowonganMagang.show');
        });

        Route::prefix('pengajuan-magang')->group(function () {
            Route::get('/', [MagangApplicationController::class, 'indexMhs'])->name('lamaran');
            Route::post('/buatLamaran', [MagangApplicationController::class, 'store'])->name('buatLamaran');
            Route::delete('/{id}/hapusLamaran', [MagangApplicationController::class, 'destroy'])->name('hapusLamaran');
            Route::get('/{id}/lihat', [MagangApplicationController::class, 'show'])->name('lihatLamaran');
            Route::post('/lamar/store', [MagangApplicationController::class, 'storeMhs'])->name('pengajuan-magang.storeMhs');;
        });

        Route::prefix('profil-akademik')->group(function () {
            Route::get('/', [ProfilAkademikController::class, 'index'])->name('profil-akademik.index');
            Route::get('/create', [ProfilAkademikController::class, 'create'])->name('profil-akademik.create');
            Route::get('/edit', [ProfilAkademikController::class, 'edit'])->name('profil-akademik.edit');
            Route::post('/store', [ProfilAkademikController::class, 'store'])->name('profil-akademik.store');
            Route::put('/{id}', [ProfilAkademikController::class, 'update'])->name('profil-akademik.update');
            Route::delete('/{id}/delete', [ProfilAkademikController::class, 'destroy'])->name('profil-akademik.destroy');
        });

        Route::prefix('evaluasi')->group(function () {
            Route::get('/', [EvaluasiMagangController::class, 'indexMhs'])->name('evaluasi-index');
            Route::get('/create', [EvaluasiMagangController::class, 'create'])->name('evaluasi-create');
            Route::post('/store', [EvaluasiMagangController::class, 'store'])->name('evaluasi-store');
            Route::get('/show/{id}', [EvaluasiMagangController::class, 'showMhs'])->name('evaluasi-show');
            Route::get('/{id}/edit', [EvaluasiMagangController::class, 'edit'])->name('evaluasi-edit');
            Route::put('/{id}', [EvaluasiMagangController::class, 'update'])->name('evaluasi-update');
            Route::delete('/{id}', [EvaluasiMagangController::class, 'destroy'])->name('evaluasi-destroy');
        });

        // Route::prefix('profilAkademik')->group(function () {
        //     Route::get('/', [ProfilAkademikController::class, 'index'])->name('profilAkademik.index');
        //     Route::get('/create', [ProfilAkademikController::class, 'create'])->name('profilAkademik.create');
        //     Route::get('/edit', [ProfilAkademikController::class, 'edit'])->name('profilAkademik.edit');
        //     Route::post('/store', [ProfilAkademikController::class, 'store'])->name('profilAkademik.store');
        //     Route::put('/{id}', [ProfilAkademikController::class, 'update'])->name('profilAkademik.update');
        //     Route::delete('/{id}/delete', [ProfilAkademikController::class, 'destroy'])->name('profilAkademik.destroy');
        // });
    });

    Route::prefix('dosen')->middleware('role:Dosen')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexDosen'])->name('dosen.dashboard');
        Route::get('/verifikasi', [DosenController::class, 'indexVerifikasi'])->name('dosen.verifikasi');
        Route::get('/profile', [ProfileController::class, 'index'])->name('dosen.profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('dosen.profile.edit');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('dosen.profile.update');

        Route::get('/evaluasi', [EvaluasiMagangController::class, 'index'])->name('evaluasi.index');
        Route::get('/evaluasi/create', [EvaluasiMagangController::class, 'create'])->name('evaluasi.create');
        Route::post('/evaluasi/store', [EvaluasiMagangController::class, 'store'])->name('evaluasi.store');
        Route::get('/evaluasi/{id}/edit', [EvaluasiMagangController::class, 'edit'])->name('evaluasi.edit');
        Route::put('/evaluasi/{id}', [EvaluasiMagangController::class, 'update'])->name('evaluasi.update');
        Route::delete('/evaluasi/{id}', [EvaluasiMagangController::class, 'destroy'])->name('evaluasi.destroy');

        Route::get('/verifikasi', [DosenController::class, 'indexVerifikasi'])->name('dosen.verifikasi');
        Route::put('/verifikasi/{id}', [DosenController::class, 'updateVerifikasi'])->name('dosen.verifikasi.update');
        Route::get('/verifikasi/show/{id}', [DosenController::class, 'showLaporan'])->name('dosen.verifikasi.show');
    });

    Route::prefix('company')->middleware('role:Company')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexCompany'])->name('company.dashboard');
        Route::get('/profile', [ProfileController::class, 'index'])->name('company.profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('company.profile.edit');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('company.profile.update');
        Route::get('/verifikasi', [CompanyController::class, 'indexVerifikasi'])->name('company.verifikasi');
        Route::put('/verifikasi/{id}', [CompanyController::class, 'updateVerifikasi'])->name('company.verifikasi.update');
        Route::get('/verifikasi/show/{id}', [CompanyController::class, 'showLaporan'])->name('company.verifikasi.show');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
