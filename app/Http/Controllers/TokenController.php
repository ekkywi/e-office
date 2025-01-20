<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function tokenIndex()
    {
        $users = User::all();
        return view('main.pages.token', compact('users'));
    }

    public function generateToken(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:user,id',
            ], [
                'user_id.exists' => 'User tidak ditemukan',
            ]);

            DB::beginTransaction();

            $user = User::find($request->user_id);
            $newToken = Str::random(60);
            $user->token = $newToken;
            $user->save();

            DB::commit();

            return redirect()->back()->with('success', 'Token berhasil digenerate');
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengenerate token');
        }
    }
}
