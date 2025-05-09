<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgramStudiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MagangApplicationController;
use App\Http\Controllers\EvaluasiMagangController;
use App\Models\MagangApplication;

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
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->group(function () {
       });

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
            Route::get('/{id}', [CompanyController::class, 'show'])->name('companies.show');
            Route::get('/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
            Route::put('/{id}', [CompanyController::class, 'update'])->name('companies.update');
            Route::delete('/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');
        });
    });

    Route::prefix('mahasiswa')->middleware('role:Mahasiswa')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexMahasiswa'])->name('mahasiswa.dashboard');

        Route::get('/lamaran', [MagangApplicationController::class, 'index'])->name('lamaran');
    });

    Route::prefix('dosen')->middleware(['auth', 'role:Dosen'])->name('dosen.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexDosen'])->name('dashboard');
    
        // Halaman profil dosen
        Route::get('/profil', [DosenController::class, 'profilSaya'])->name('profil');
        Route::put('/profil', [DosenController::class, 'updateProfilSaya'])->name('profil.update');
    
        // Halaman evaluasi magang
        Route::prefix('evaluasi')->name('evaluasi.')->group(function () {
            Route::get('/', [EvaluasiMagangController::class, 'index'])->name('index');
            Route::get('/create', [EvaluasiMagangController::class, 'create'])->name('create');
            Route::post('/', [EvaluasiMagangController::class, 'store'])->name('store');
            Route::get('/{evaluasi}/edit', [EvaluasiMagangController::class, 'edit'])->name('edit');
            Route::put('/{evaluasi}', [EvaluasiMagangController::class, 'update'])->name('update');
            Route::delete('/{evaluasi}', [EvaluasiMagangController::class, 'destroy'])->name('destroy');
        });        
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');