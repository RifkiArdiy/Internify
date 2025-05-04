<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::get('companies/', [CompanyController::class, 'index']); 
Route::get('companies/show/{id}', [CompanyController::class, 'show'])->name('companies.show');
Route::resource('companies', CompanyController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/lamaran', function () {
        return view('lamaran');
    })->name('lamaran.form');

    
});

