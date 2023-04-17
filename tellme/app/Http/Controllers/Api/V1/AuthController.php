<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwtauth')->except('login', 'register');
    }

    public function login(Request $request)
    {

        $credential = $request->only('email', 'password');
        // if (!$token = JWTAuth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
        if (!$token = JWTAuth::attempt($credential)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $user = Auth::user();
        $user_id = Auth::user()->id;
        return response()->json(compact('token', 'user_id', 'user'), 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = JWTAuth::fromUser($user);
        $user_id = Auth::user()->id;
        return response()->json(compact('token', 'user_id'), 201);
    }

    public function checkToken()
    {
        return response()->json(['success' => true], 200);
    }

    public function logout()
    {
        $logout = auth()->logout();
        return response()->json(['success' => true], 200);
    }
}
