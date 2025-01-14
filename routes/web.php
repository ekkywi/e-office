<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
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
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('auth.login');
    }
});

Route::prefix('auth')->name('auth.')->middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/reset', [AuthController::class, 'showResetForm'])->name('reset');
    Route::post('/reset', [AuthController::class, 'reset'])->name('reset.submit');
    Route::get('/activation', [AuthController::class, 'showActivationForm'])->name('activation');
    Route::post('/activate', [AuthController::class, 'activateUser'])->name('activate.user');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/aplikasi', [DashboardController::class, 'aplikasi'])->name('aplikasi');
    Route::get('/pengaturan', [DashboardController::class, 'pengaturan'])->name('pengaturan');
    Route::get('/bantuan', [DashboardController::class, 'bantuan'])->name('bantuan');
    Route::get('/maintenance', [DashboardController::class, 'maintenance'])->name('maintenance');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('maintenance')->name('maintenance.')->middleware('auth')->group(function () {});
