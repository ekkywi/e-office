<?php

namespace App\Http\Controllers\Aset;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriAsetController extends Controller
{
    public function kategoriAset()
    {
        return view('aset.pages.kategori-aset');
    }
}
