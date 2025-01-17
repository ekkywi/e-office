<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;


use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function jabatan()
    {
        $jabatans = Jabatan::all();
        return view('main.pages.jabatan', compact('jabatans'));
    }

    public function addJabatan(Request $request)
    {
        try {
            request()->validate([
                'nama_jabatan' => 'required|string|unique:jabatan,nama_jabatan',
            ], [
                'nama_jabatan.unique' => 'Jabatan sudah ada.'
            ]);

            DB::beginTransaction();

            Jabatan::create([
                'nama_jabatan' => $request->nama_jabatan,
            ]);

            DB::commit();

            return redirect()->route('maintenance.jabatan')->with('success', 'Jabatan berhasil ditambahkan');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan jabatan');
        }
    }

    public function editJabatan(Request $request)
    {
        try {
            request()->validate([
                'id' => 'required|exists:jabatan,id',
                'nama_jabatan' => 'required|string|unique:jabatan,nama_jabatan,' . $request->id,
            ], [
                'nama_jabatan.unique' => 'Jabatan sudah ada.'
            ]);

            DB::beginTransaction();

            $jabatan = Jabatan::find($request->id);
            $jabatan->nama_jabatan = $request->nama_jabatan;
            $jabatan->save();

            DB::commit();

            return redirect()->route('maintenance.jabatan')->with('success', 'Jabatan berhasil diubah');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah jabatan');
        }
    }

    public function deleteJabatan($id)
    {
        try {
            DB::beginTransaction();

            $jabatan = Jabatan::findOrFail($id);

            $usersCount = User::where('jabatan_id', $id)->count();

            if ($usersCount > 0) {
                DB::rollBack();
                return redirect()->back()
                    ->with('error', 'Jabatan tidak dapat dihapus karena masih memiliki ' . $usersCount . ' user');
            }

            $jabatan->delete();

            DB::commit();
            return redirect()->route('maintenance.jabatan')
                ->with('success', 'Jabatan berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting jabatan: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus jabatan');
        }
    }
}
