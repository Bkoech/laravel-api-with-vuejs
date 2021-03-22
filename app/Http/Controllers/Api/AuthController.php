<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {

            return response()->json(['success' => true], 401);
        }
        return response()->json(['success' => true, 'token' => $token], 200);
    }

    public function checkToken()
    {

        return response()->json(['success' => true]);
    }

    public function logout()
    {

        auth()->logout();
        return response()->json(['success' => true]);
    }
}
