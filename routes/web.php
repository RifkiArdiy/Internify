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
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('/lowongan', [ListingController::class, 'lowongan'])->name('list.lowongan');
Route::get('/perusahaan', [ListingController::class, 'perusahaan'])->name('list.perusahaan');

Route::middleware(['auth'])->group(function () {


    Route::prefix('admin')->middleware('role:Administrator')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard');
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::prefix('prodi')->group(function () {
            Route::get('/', [ProgramStudiController::class, 'index'])->name('prodi.index');
            Route::get('/create', [ProgramStudiController::class, 'create'])->name('prodi.create');
            Route::post('/store', [ProgramStudiController::class, 'store'])->name('prodi.store');
            Route::get('/show/{id}', [ProgramStudiController::class, 'show'])->name('prodi.show');
            Route::get('/edit/{id}', [ProgramStudiController::class, 'edit'])->name('prodi.edit');
            Route::put('/{id}', [ProgramStudiController::class, 'update'])->name('prodi.update');
            Route::get('/{id}', [ProgramStudiController::class, 'destroy'])->name('prodi.destroy');
        });

        Route::prefix('periodeMagang')->group(callback: function () {
            Route::get('/', [PeriodeMagangController::class, 'index'])->name('periodeMagang.index');
            Route::get('/create', [PeriodeMagangController::class, 'create'])->name('periodeMagang.create');
            Route::post('/store', [PeriodeMagangController::class, 'store'])->name('periodeMagang.store');
            Route::get('/show/{id}', [PeriodeMagangController::class, 'show'])->name('periodeMagang.show');
            Route::get('/edit/{id}', [PeriodeMagangController::class, 'edit'])->name('periodeMagang.edit');
            Route::put('/{id}', [PeriodeMagangController::class, 'update'])->name('periodeMagang.update');
            Route::get('/{id}', [PeriodeMagangController::class, 'destroy'])->name('periodeMagang.destroy');
        });
        Route::prefix('lowonganMagang')->group(callback: function () {
            Route::get('/', [LowonganMagangController::class, 'index'])->name('lowonganMagang.index');
            Route::get('/create', [LowonganMagangController::class, 'create'])->name('lowonganMagang.create');
            Route::post('/store', [LowonganMagangController::class, 'store'])->name('lowonganMagang.store');
            Route::get('/show/{id}', [LowonganMagangController::class, 'show'])->name('lowonganMagang.show');
            Route::get('/edit/{id}', [LowonganMagangController::class, 'edit'])->name('lowonganMagang.edit');
            Route::put('/{id}', [LowonganMagangController::class, 'update'])->name('lowonganMagang.update');
            Route::delete('/{id}', [LowonganMagangController::class, 'destroy'])->name('lowonganMagang.destroy');
        });
        Route::prefix('magangApplication')->group(callback: function () {
            Route::get('/', [MagangApplicationController::class, 'index'])->name('admin.magangApplication.index');
            Route::get('/create', [MagangApplicationController::class, 'create'])->name('admin.magangApplication.create');
            Route::post('/store', [MagangApplicationController::class, 'store'])->name('admin.magangApplication.store');
            Route::get('/show/{id}', [MagangApplicationController::class, 'show'])->name('admin.magangApplication.show');
            Route::get('/edit/{id}', [MagangApplicationController::class, 'edit'])->name('admin.magangApplication.edit');
            Route::put('/{id}', [MagangApplicationController::class, 'update'])->name('admin.magangApplication.update');
            Route::get('/{id}', [MagangApplicationController::class, 'destroy'])->name('admin.magangApplication.destroy');
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
    });

    Route::prefix('mahasiswa')->middleware('role:Mahasiswa')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexMahasiswa'])->name('mahasiswa.dashboard');

        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
        Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');
        Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
        Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
        Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
        Route::get('/laporan/show/{id}', [LaporanController::class, 'show'])->name('laporan.show');

        
        Route::get('/profile', [ProfileController::class, 'index'])->name('mahasiswa.profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('mahasiswa.profile.edit');
        Route::post('/profile/update', [ProfileController::class, 'update'])->name('mahasiswa.profile.update');
        Route::prefix('lowongan')->group(function () {
            Route::get('/', [LowonganMagangController::class, 'indexMhs'])->name('lowonganMagang.indexMhs');
            Route::get('/show/{id}', [LowonganMagangController::class, 'show'])->name('lowonganMagang.show');
        });
        Route::prefix('lamaran')->group(function () {
            Route::get('/', [MagangApplicationController::class, 'indexMhs'])->name('lamaran');
            Route::post('/buatLamaran', [MagangApplicationController::class, 'store'])->name('buatLamaran');
            Route::delete('/{id}/hapusLamaran', [MagangApplicationController::class, 'destroy'])->name('hapusLamaran');

            Route::get('/{id}/lihat', [MagangApplicationController::class, 'show'])->name('lihatLamaran');

            Route::post('/lamar/store', [MagangApplicationController::class, 'storeMhs'])->name('magangApplication.storeMhs');;
            Route::post('/lamar/{id}', [MagangApplicationController::class, 'store'])->name('magangApplication.storeMhs')->middleware('auth');;
        });
        Route::prefix('profilAkademik')->group(function () {
            Route::get('/', [ProfilAkademikController::class, 'index'])->name('profilAkademik.index');
            Route::get('/create', [ProfilAkademikController::class, 'create'])->name('profilAkademik.create');
            Route::get('/edit', [ProfilAkademikController::class, 'edit'])->name('profilAkademik.edit');
            Route::post('/store', [ProfilAkademikController::class, 'store'])->name('profilAkademik.store');
            Route::put('/{id}', [ProfilAkademikController::class, 'update'])->name('profilAkademik.update');
            Route::delete('/{id}/delete', [ProfilAkademikController::class, 'destroy'])->name('profilAkademik.destroy');

            // Route::get('/{id}/lihat', [ProfilAkademikController::class, 'show'])->name('lihatLamaran');

            // Route::post('/lamar/{id}', [ProfilAkademikController::class, 'store'])->name('magangApplication.storeMhs')->middleware('auth');;
        });
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
