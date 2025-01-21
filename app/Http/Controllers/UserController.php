<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Divisi;
use App\Models\Bagian;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $users = User::paginate(10);
        $divisis = Divisi::all();
        $bagians = Bagian::all();
        $jabatans = Jabatan::all();

        return view('main.pages.user', compact('users', 'divisis', 'bagians', 'jabatans'));
    }

    public function addUser(Request $request)
    {
        try {
            request()->validate([
                'username' => 'required|string|unique:user,username',
                'password' => 'required|string|min:8',
                'nama' => 'required|string',
                'no_pegawai' => 'required|string|unique:user,no_pegawai',
                'email' => 'nullable|string|email|unique:user,email',
                'divisi_id' => 'required|exists:divisi,id',
                'bagian_id' => 'required|exists:bagian,id',
                'jabatan_id' => 'required|exists:jabatan,id'
            ], [
                'username.unique' => 'Username sudah digunakan',
                'password.min' => 'Password minimal 8 karakter',
                'no_pegawai.unique' => 'Nomor pegawai sudah digunakan',
                'email.unique' => 'Email sudah digunakan',
            ]);

            DB::beginTransaction();

            $userData = [
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'nama' => $request->nama,
                'no_pegawai' => $request->no_pegawai,
                'email' => $request->email,
                'divisi_id' => $request->divisi_id,
                'bagian_id' => $request->bagian_id,
                'jabatan_id' => $request->jabatan_id,
                'token' => Str::random(60),
                'status_aktivasi' => false,
            ];

            $user = User::create($userData);

            DB::commit();

            return redirect()->route('maintenance.user')->with('success', 'User berhasil ditambahkan');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function editUser(Request $request)
    {
        try {
            request()->validate([
                'id' => 'required|exists:user,id',
                'username' => 'required|string|unique:user,username,' . $request->id,
                'nama' => 'required|string',
                'no_pegawai' => 'required|string|unique:user,no_pegawai,' . $request->id,
                'email' => 'nullable|string|email|unique:user,email,' . $request->id,
                'divisi_id' => 'required|exists:divisi,id',
                'bagian_id' => 'required|exists:bagian,id',
                'jabatan_id' => 'required|exists:jabatan,id'
            ], [
                'username.unique' => 'Username sudah ada.',
                'no_pegawai.unique' => 'Nomor pegawai sudah ada.',
                'email.unique' => 'Email sudah ada.'
            ]);

            DB::beginTransaction();

            $user = User::find($request->id);
            $user->username = $request->username;
            $user->nama = $request->nama;
            $user->no_pegawai = $request->no_pegawai;
            $user->email = $request->email;
            $user->divisi_id = $request->divisi_id;
            $user->bagian_id = $request->bagian_id;
            $user->jabatan_id = $request->jabatan_id;
            $user->save();

            DB::commit();

            return redirect()->route('maintenance.user')->with('success', 'User berhasil diubah');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function deleteUser($id)
    {
        try {
            DB::beginTransaction();

            $user = User::findOrfail($id);

            $user->delete();

            DB::commit();

            return redirect()->route('maintenance.user')->with('success', 'User berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
