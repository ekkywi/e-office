<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusAsetController extends Controller
{
    public function statusAset()
    {
        return view('aset.pages.status-aset');
    }
}
