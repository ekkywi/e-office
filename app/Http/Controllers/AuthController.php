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
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Method untuk menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.pages.login');
    }


    // Fungsi untuk menangani login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        try {

            $user = User::where('username', $request->username)->first();

            $throttleKey = 'login|' . ($user ? $user->username : $request->username);

            if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
                $seconds = RateLimiter::availableIn($throttleKey);
                Log::warning("Terlalu banyak percobaan login", [
                    'username' => $request->username,
                    'ip' => $request->ip(),
                ]);
                return response()->json(['error' => 'Terlalu banyak percobaan login. Silakan coba lagi dalam ' . $seconds . ' detik.'], 429);
            }

            if (!$user) {
                RateLimiter::hit($throttleKey, 60);
                Log::info("Username tidak ditemukan", [
                    'username' => $request->username,
                    'ip' => $request->ip(),
                ]);
                return response()->json(['error' => 'Username tidak ditemukan.'], 403);
            }

            if (!$user || !$user->status_aktivasi) {
                RateLimiter::hit($throttleKey, 60);
                Log::info("Akun belum diaktivasi", [
                    'username' => $request->username,
                    'ip' => $request->ip(),
                ]);
                return response()->json(['error' => 'Akun Anda belum diaktivasi. Silahkan aktivasi akun Anda terlebih dahulu.'], 403);
            }

            if (!Hash::check($request->password, $user->password)) {
                RateLimiter::hit($throttleKey, 60);
                Log::info("Password salah", [
                    'username' => $request->username,
                    'ip' => $request->ip(),
                ]);
                return response()->json(['error' => 'Username atau password salah.'], 403);
            }

            RateLimiter::clear($throttleKey);
            Auth::login($user);

            Log::info("Login berhasil", [
                'username' => $user->username,
                'ip' => $request->ip(),
            ]);

            return response()->json(['success' => 'Login berhasil.'], 200);
        } catch (\Exception $e) {
            Log::error("Terjadi kesalahan saat login", [
                'username' => $request->username,
                'ip' => $request->ip(),
                'error' => $e->getMessage(),
            ]);
            return response()->json(['error' => 'Terjadi kesalahan saat login. Silahkan coba lagi.'], 500);
        }
    }



    // Method untuk menampilkan halaman register
    public function showRegisterForm()
    {
        $divisis = Divisi::all();
        $bagians = Bagian::all();
        $jabatans = Jabatan::all();

        return view('auth.pages.register', compact('divisis', 'bagians', 'jabatans'));
    }


    public function register(Request $request)
    {
        try {
            $validated = request()->validate([
                'username' => 'required|string|unique:user,username',
                'password' => 'required|string|min:8|confirmed',
                'nama' => 'required|string',
                'no_pegawai' => 'required|string|unique:user,no_pegawai',
                'email' => 'nullable|string|email|unique:user,email',
                'divisi' => 'required|exists:divisi,id',
                'bagian' => 'required|exists:bagian,id',
                'jabatan' => 'required|exists:jabatan,id',
                'agree' => 'required|accepted',
            ], [
                'username.unique' => 'Username sudah digunakan',
                'password.min' => 'Password minimal 8 karakter',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'no_pegawai.unique' => 'Nomor pegawai sudah digunakan',
                'email.unique' => 'Email sudah digunakan',
            ]);

            DB::beginTransaction();

            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'nama' => $request->nama,
                'no_pegawai' => $request->no_pegawai,
                'email' => $request->email,
                'divisi_id' => $request->divisi,
                'bagian_id' => $request->bagian,
                'jabatan_id' => $request->jabatan,
                'token' => Str::random(60),
                'status_aktivasi' => false,
            ]);

            DB::commit();
            return redirect()->route('auth.register')
                ->with('success', 'Registrasi berhasil. Silahkan aktivasi akun Anda.');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat registrasi: ' . $e->getMessage())
                ->withInput();
        }
    }


    // Method untuk menampilkan halaman reset password
    public function showResetForm()
    {
        return view('auth.pages.reset');
    }


    // Fungsi untuk menangani reset password
    public function reset(Request $request)
    {
        request()->validate([
            'username' => 'required|string',
            'token' => 'required|string',
            'password' => 'required|string',
        ]);

        // $validator = Validator::make($request->all(), [
        //     'username' => 'required|string',
        //     'token' => 'required|string',
        //     'password' => 'required|string|confirmed',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput()
        //         ->with('error', 'Reset password gagal. Silahkan periksa kembali data yang Anda masukkan.');
        // }

        try {

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

            DB::beginTransaction();

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


    // Method untuk menampilkan halaman aktivasi
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

    // Fungsi untuk logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
