<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('YourAppName')->plainTextToken;

            return response()->json([
                'token' => $token,
                'username' => $user->username,
                'role' => $user->role,
                'kantor_cabang_id' => $user->kantor_cabang_id
            ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
