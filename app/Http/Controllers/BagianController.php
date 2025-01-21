<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

class BagianController extends Controller
{
    public function bagian()
    {
        $bagians = Bagian::paginate(10);
        return view('main.pages.bagian', compact('bagians'));
    }

    public function addBagian(Request $request)
    {

        try {

            request()->validate([
                'nama_bagian' => 'required|string|unique:bagian,nama_bagian',
            ], [
                'nama_bagian.unique' => 'Bagian sudah ada.'
            ]);

            DB::beginTransaction();

            Bagian::create([
                'nama_bagian' => $request->nama_bagian,
            ]);

            DB::commit();

            return redirect()->route('maintenance.bagian')->with('success', 'Bagian berhasil ditambahkan');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan bagian', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function editBagian(Request $request)
    {
        try {
            request()->validate([
                'id' => 'required|exists:bagian,id',
                'nama_bagian' => 'required|string|unique:bagian,nama_bagian,' . $request->id,
            ], [
                'nama_bagian.unique' => 'Bagian sudah ada.'
            ]);

            DB::beginTransaction();

            $bagian = Bagian::findOrFail($request->id);
            $bagian->nama_bagian = $request->nama_bagian;
            $bagian->save();

            DB::commit();

            return redirect()->route('maintenance.bagian')->with('success', 'Bagian berhasil diubah');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengubah bagian');
        }
    }

    public function deleteBagian($id)
    {
        try {
            DB::beginTransaction();

            $bagian = Bagian::findOrFail($id);

            $usersCount = User::where('bagian_id', $id)->count();

            if ($usersCount > 0) {
                DB::rollBack();
                return redirect()->back()
                    ->with('error', 'Bagian tidak dapat dihapus karena masih memiliki ' . $usersCount . ' user');
            }

            $bagian->delete();

            DB::commit();
            return redirect()->route('maintenance.bagian')
                ->with('success', 'Bagian berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting bagian: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus bagian');
        }
    }
}
