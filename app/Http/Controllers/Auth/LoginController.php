<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request) {
        try {
            $userData = $request->validate([
                'email' => 'required|string|email|max:255|exists:users,email',
                'password' => 'required|string|min:6',
            ]);

            if (!Auth::attempt($userData)) {
                return response()->json(['error' => 'Credenciales inválidas']);
            }
    
            $token = Auth::user()->createToken('token')->plainTextToken;
            return response()->json(['token' => $token]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()]);
        }
    }
}
