<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function divisi()
    {
        $divisis = Divisi::paginate(10);
        return view('main.pages.divisi', compact('divisis'));
    }

    public function addDivisi(Request $request)
    {
        try {

            request()->validate([
                'nama_divisi' => 'required|string|unique:divisi,nama_divisi',
            ], [
                'nama_divisi.unique' => 'Divisi sudah ada.'
            ]);

            DB::beginTransaction();

            Divisi::create([
                'nama_divisi' => $request->nama_divisi,
            ]);

            DB::commit();

            return redirect()->route('maintenance.divisi')->with('success', 'Divisi berhasil ditambahkan');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan divisi');
        }
    }

    public function editDivisi(Request $request)
    {
        try {
            request()->validate([
                'id' => 'required|exists:divisi,id',
                'nama_divisi' => 'required|string|unique:divisi,nama_divisi,' . $request->id,
            ], [
                'nama_divisi.unique' => 'Divisi sudah ada.'
            ]);

            DB::beginTransaction();

            $divisi = Divisi::findOrFail($request->id);
            $divisi->nama_divisi = $request->nama_divisi;
            $divisi->save();

            DB::commit();

            return redirect()->route('maintenance.divisi')->with('success', 'Divisi berhasil diubah');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah divisi');
        }
    }

    public function deleteDivisi($id)
    {
        try {
            DB::beginTransaction();

            $divisi = Divisi::findOrFail($id);

            $usersCount = User::where('divisi_id', $id)->count();

            if ($usersCount > 0) {
                DB::rollBack();
                return redirect()->back()
                    ->with('error', 'Divisi tidak dapat dihapus karena masih memiliki ' . $usersCount . ' user');
            }

            $divisi->delete();

            DB::commit();
            return redirect()->route('maintenance.divisi')
                ->with('success', 'Divisi berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting divisi: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus divisi');
        }
    }
}
