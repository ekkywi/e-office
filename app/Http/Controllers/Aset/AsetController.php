<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function dashboard()
    {
        return view('aset.pages.dashboard');
    }
}
