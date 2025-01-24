<?php

namespace App\Http\Controllers\Aset;

use Illuminate\Http\Request;

class AsetController
{
    public function dashboard()
    {
        return view('aset.pages.dashboard');
    }
}
