<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModelAsetController extends Controller
{
    public function modelAset()
    {
        return view('aset.pages.model-aset');
    }
}
