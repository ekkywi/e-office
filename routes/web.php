<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Doctrine\Common\Lexer\Token;

// Main Controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\BagianController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\AktivasiController;

//Aset Controller
use App\Http\Controllers\Aset\AsetController;
use App\Http\Controllers\Aset\StatusAsetController;
use App\Http\Controllers\Aset\KategoriAsetController;

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


// Controller Halaman Auth
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


// Controller Halaman Dashboard-Menu
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/aplikasi', [DashboardController::class, 'aplikasi'])->name('aplikasi');
    Route::get('/pengaturan', [DashboardController::class, 'pengaturan'])->name('pengaturan');
    Route::get('/bantuan', [DashboardController::class, 'bantuan'])->name('bantuan');
    Route::get('/maintenance', [DashboardController::class, 'maintenance'])->name('maintenance');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Route Halaman Maintenance
Route::prefix('maintenance')->name('maintenance.')->middleware('auth')->group(function () {
    // Route Bagian
    Route::get('/divisi', [DivisiController::class, 'divisi'])->name('divisi');
    Route::post('/divisi', [DivisiController::class, 'addDivisi'])->name('divisi.add');
    Route::post('/divisi/edit', [DivisiController::class, 'editDivisi'])->name('divisi.edit');
    Route::post('divisi/delete/{id}', [DivisiController::class, 'deleteDivisi'])->name('divisi.delete');

    // Route Bagian
    Route::get('/bagian', [BagianController::class, 'bagian'])->name('bagian');
    Route::post('/bagian', [BagianController::class, 'addBagian'])->name('bagian.add');
    Route::post('/bagian/edit', [BagianController::class, 'editBagian'])->name('bagian.edit');
    Route::post('/bagian/delete/{id}', [BagianController::class, 'deleteBagian'])->name('bagian.delete');

    // Route Jabatan
    Route::get('/jabatan', [JabatanController::class, 'jabatan'])->name('jabatan');
    Route::post('/jabatan', [JabatanController::class, 'addJabatan'])->name('jabatan.add');
    Route::post('/jabatan/edit', [JabatanController::class, 'editJabatan'])->name('jabatan.edit');
    Route::post('/jabatan/delete/{id}', [JabatanController::class, 'deleteJabatan'])->name('jabatan.delete');

    // Route User
    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::post('/user', [UserController::class, 'addUser'])->name('user.add');
    Route::post('/user/edit', [UserController::class, 'editUser'])->name('user.edit');
    Route::post('/user/delete/{id}', [UserController::class, 'deleteUser'])->name('user.delete');

    // Route Token
    Route::get('/token', [TokenController::class, 'tokenIndex'])->name('token.index');
    Route::post('/token', [TokenController::class, 'generateToken'])->name('token.generate');

    // Route Aktivasi
    Route::get('/aktivasi', [AktivasiController::class, 'aktivasi'])->name('aktivasi');
    Route::post('/aktivasi', [AktivasiController::class, 'aktivasiUser'])->name('aktivasi.user');
});


// Route Aplikasi IT Asset Management
Route::prefix('itam')->name('itam.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AsetController::class, 'dashboard'])->name('dashboard');

    // Route Aplikasi IT Asset Management - Pengaturan
    Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
        Route::get('/status-aset', [StatusAsetController::class, 'statusAset'])->name('status-aset');
        Route::get('/kategori-aset', [KategoriAsetController::class, 'kategoriAset'])->name('kategori-aset');
    });
});
