<?php

namespace App\Http\Controllers\Api\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Http\Requests\Dashboard\Admin\LoginRequest;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function login(LoginRequest $request)
    {
        $user = Admin::whereEmail($request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        // Create token
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'data' => [
                'user' => AdminResource::make($user),
                'token' => $token,
            ]
        ], 200);
    }


    public function logout()
    {
        // logout with api
        Auth::user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Logout successful',
        ], 200);
    }
}