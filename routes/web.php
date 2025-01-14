<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/reset', [AuthController::class, 'showResetForm'])->name('reset');
    Route::post('/reset', [AuthController::class, 'reset'])->name('reset.submit');
    Route::get('/activation', [AuthController::class, 'showActivationForm'])->name('activation');
    Route::post('/activate', [AuthController::class, 'activateUser'])->name('activate.user');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
