<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AktivasiController extends Controller
{
    public function aktivasi()
    {
        $users = User::paginate(10);
        return view('main.pages.aktivasi', compact('users'));
    }

    public function aktivasiUser(Request $request)
    {
        try {
            $user = User::findOrFail($request->user_id);
            $user->status_aktivasi = !$user->status_aktivasi;
            $user->save();

            return response()->json(['success' => 'User berhasil diaktivasi']);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => 'User gagal diaktivasi'], 500);
        }
    }
}
