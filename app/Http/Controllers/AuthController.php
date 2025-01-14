<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use App\Models\Bagian;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.pages.login');
    }

    public function showRegisterForm()
    {
        $divisis = Divisi::all();
        $bagians = Bagian::all();
        $jabatans = Jabatan::all();

        return view('auth.pages.register', compact('divisis', 'bagians', 'jabatans'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed',
            'no_pegawai' => 'required|string|max:255|unique:user',
            'email' => 'nullable|string|email|max:255|unique:user',
            'divisi' => 'required|exists:divisi,id',
            'bagian' => 'required|exists:bagian,id',
            'jabatan' => 'required|exists:jabatan,id',
            'agree' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Registerasi gagal. Silhkan periksa kembali data yang Anda masukkan.');
        }

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'no_pegawai' => $request->no_pegawai,
            'email' => $request->email,
            'divisi_id' => $request->divisi,
            'bagian_id' => $request->bagian,
            'jabatan_id' => $request->jabatan,
            'token' => Str::random(60),
            'status_aktivasi' => false,
        ]);

        return redirect()->route('register')->with('success', 'Registerasi berhasil. Silahkan aktivasi akun Anda.');
    }

    public function activateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|exists:user,username',
            'token' => 'required|string|exists:user,token',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Aktivasi gagal. Silahkan periksa kembali data yang Anda masukkan.');
        }

        // Cari user berdasarkan username dan token
        $user = User::where('username', $request->username)
            ->where('token', $request->token)
            ->first();

        // Jika user tidak ditemukan atau sudah diaktivasi
        if (!$user || $user->status_aktivasi) {
            return redirect()->back()->with('error', 'Token tidak valid atau akun sudah diaktivasi.');
        }

        // Aktivasi user
        $user->status_aktivasi = true;
        $user->token = Str::random(60);
        $user->save();

        return redirect()->route('activation')->with('success', 'Akun Anda berhasil diaktivasi. Silahkan login.');
    }

    public function showResetForm()
    {
        return view('auth.pages.reset');
    }

    public function showActivationForm()
    {
        return view('auth.pages.activation');
    }
}
