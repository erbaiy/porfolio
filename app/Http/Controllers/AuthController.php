<?php

namespace App\Http\Controllers;

use App\Models\User;
use Doctrine\Common\Lexer\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);


        return response()->json(['user' => $user], 201);
    }
    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($loginData)) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        $user = Auth::user();

        $token = $user->createToken('authToken')->plainText;
        $cookie = cookie('jwt', $token);

        return response()->json([
            'user' => $user,
            'token' => $cookie
        ], 200);
    }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
