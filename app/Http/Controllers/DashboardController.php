<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    // Method untuk menampilkan halaman dashboard
    public function index()
    {
        return view('main.pages.dashboard');
    }

    // Method untuk menampilkan halaman aplikasi
    public function aplikasi()
    {
        return view('main.pages.aplikasi');
    }

    // Method untuk menampilkan halaman pengaturan
    public function pengaturan()
    {
        return view('main.pages.pengaturan');
    }

    // Method untuk menampilkan halaman bantuan
    public function bantuan()
    {
        return view('main.pages.bantuan');
    }

    // Method untuk menampilkan halaman maintenance
    public function maintenance()
    {
        return view('main.pages.maintenance');
    }
}
