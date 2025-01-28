<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerkAsetController extends Controller
{
    public function merkAset()
    {
        return view('aset.pages.merk-aset');
    }
}
