<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function tokenIndex()
    {
        $users = User::all();
        return view('main.pages.token', compact('users'));
    }

    public function generateToken(Request $request, $id)
    {
        $user = User::find($id);
        $newToken = Str::random(32);
        $user->update(['token' => $newToken]);

        return response()->json([
            'success' => true,
            'token' => $newToken
        ]);
    }
}
