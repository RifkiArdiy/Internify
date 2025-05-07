<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\Mahasiswa;
use App\Http\Controllers\EvaluasiMagangController;
use Illuminate\Support\Facades\Route;

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
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/update', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/delete', [AdminController::class, 'destroy'])->name('admin.destroy');
    });

        Route::get('/dashboard', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard');

        Route::prefix('mahasiswa')->group(function () {
            Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
            Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
            Route::post('/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
            Route::get('/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
            Route::put('/update', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
            Route::get('/delete', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
        });
    });

    Route::prefix('mahasiswa')->middleware('role:mahasiswa')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexMahasiswa'])->name('mahasiswa.dashboard');
    });

    Route::prefix('dosen')->middleware('role:dosen')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'indexDosen'])->name('dosen.dashboard');
    });

    // routes/web.php
    Route::preficx('admin')->middleware('role:admin')->group(function () {
        Route::resource('evaluasi_magang', EvaluasiMagangController::class);
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

