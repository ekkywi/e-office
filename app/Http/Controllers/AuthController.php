<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use App\Models\Bagian;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan form login
    public function showLoginForm()
    {
        return view('auth.pages.login');
    }


    // Fungsi untuk menangani login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Login gagal. Silahkan periksa kembali data yang Anda masukkan.');
        }

        try {
            DB::beginTransaction();

            $user = User::where('username', $request->username)->first();

            if (!$user->status_aktivasi) {
                return redirect()->back()->with('error', 'Akun Anda belum diaktivasi. Silahkan aktivasi akun Anda terlebih dahulu.');
            }

            if (!$user || !Hash::check($request->password, $user->password)) {
                return redirect()->back()->with('error', 'Username atau password salah.');
            }

            Auth::login($user);

            DB::commit();

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat login. Silahkan coba lagi.');
        }
    }


    // Fungsi untuk menampilkan form register
    public function showRegisterForm()
    {
        $divisis = Divisi::all();
        $bagians = Bagian::all();
        $jabatans = Jabatan::all();

        return view('auth.pages.register', compact('divisis', 'bagians', 'jabatans'));
    }


    // Fungsi untuk menangani register
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|confirmed',
            'no_pegawai' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'divisi' => 'required|exists:divisi,id',
            'bagian' => 'required|exists:bagian,id',
            'jabatan' => 'required|exists:jabatan,id',
            'agree' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Registrasi gagal. Silahkan periksa kembali data yang Anda masukkan.');
        }

        try {
            DB::beginTransaction();

            $user = User::where('username', $request->username)
                ->orWhere('no_pegawai', $request->no_pegawai)
                ->orWhere('email', $request->email)
                ->first();

            if ($user) {
                return redirect()->back()->with('error', 'Username, No Pegawai, atau Email sudah digunakan.');
            }

            if (strlen($request->password) < 8) {
                return redirect()->back()->with('error', 'Password minimal 8 karakter.');
            }

            if (request('password') !== request('password_confirmation')) {
                return redirect()->back()->with('error', 'Konfirmasi password tidak sama.');
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

            DB::commit();

            return redirect()->route('auth.register')->with('success', 'Registrasi berhasil. Silahkan aktivasi akun Anda.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat registrasi. Silahkan coba lagi.');
        }
    }


    // Fungsi untuk menampilkan form reset password
    public function showResetForm()
    {
        return view('auth.pages.reset');
    }


    // Fungsi untuk menangani reset password
    public function reset(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'token' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Reset password gagal. Silahkan periksa kembali data yang Anda masukkan.');
        }

        try {
            DB::beginTransaction();

            $user = User::where('username', $request->username)->first();

            if ($user->status_aktivasi === false) {
                return redirect()->back()->with('error', 'Akun Anda belum diaktivasi. Silahkan aktivasi akun Anda terlebih dahulu.');
            }

            if (!$user || $user->token !== $request->token) {
                return redirect()->back()->with('error', 'Username atau token tidak valid.');
            }

            if (request('password') !== request('password_confirmation')) {
                return redirect()->back()->with('error', 'Password tidak sama.');
            }

            if (strlen($request->password) < 8) {
                return redirect()->back()->with('error', 'Password minimal 8 karakter.');
            }

            $user->password = Hash::make($request->password);
            $user->token = Str::random(60);
            $user->save();

            DB::commit();

            return redirect()->route('auth.reset')->with('success', 'Password berhasil direset');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mereset password. Silahkan coba lagi.');
        }
    }


    // Fungsi untuk menampilkan form aktivasi
    public function showActivationForm()
    {
        return view('auth.pages.activation');
    }


    // Fungsi untuk menangani aktivasi
    public function activateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'token' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Aktivasi gagal. Silahkan periksa kembali data yang Anda masukkan.');
        }

        try {
            DB::beginTransaction();

            $user = User::where('username', $request->username)->first();

            if ($user->status_aktivasi === true) {
                return redirect()->back()->with('error', 'Akun Anda sudah diaktivasi. Silahkan login.');
            }

            if (!$user || $user->token !== $request->token) {
                return redirect()->back()->with('error', 'Username atau token tidak valid.');
            }

            $user->status_aktivasi = true;
            $user->token = Str::random(60);
            $user->save();

            DB::commit();

            return redirect()->route('auth.activation')->with('success', 'Akun Anda berhasil diaktivasi. Silahkan login.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat aktivasi akun. Silahkan coba lagi.');
        }
    }
}
