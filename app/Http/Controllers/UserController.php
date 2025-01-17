<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use App\Models\Bagian;
use App\Models\Jabatan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $users = User::all();
        $divisis = Divisi::all();
        $bagians = Bagian::all();
        $jabatans = Jabatan::all();

        return view('main.pages.user', compact('users', 'divisis', 'bagians', 'jabatans'));
    }

    public function addUser (Request $request)
    {
        try {

            request()->validate([
                'username' => 'required|string|unique:user,username',
                'password' => 'required|string|min:8|confirmed',
                'nama' => 'required|string',
                'no_pegawai' => 'required|string|unique:user,no_pegawai',
                'email' => 'nullable|string|email|unique:user,email',
                'divisi' => 'required|exists:divisi,id',
                'bagian' => 'required|exists:bagian,id',
                'jabatan' => 'required|exists:jabatan,id',
            ], [
                
        }
    }
}
