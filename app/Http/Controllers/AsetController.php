<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function dashboard()
    {
        return view('aset.pages.dashboard');
    }
}
