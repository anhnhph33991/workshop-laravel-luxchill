<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::query()->firstWhere('email', $credentials['email']);

        if (!$user) {
            return response()->json([
                'message' => "User Not Found"
            ], Response::HTTP_NOT_FOUND);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => "Thông tin tài khoản không chính xác"
            ], Response::HTTP_BAD_REQUEST);
        }

        $token = $user->createToken(env('SANCTUM_NAME'))->plainTextToken;

        return response()->json([
            'message' => "Login Success",
            'token' => $token
        ], Response::HTTP_OK);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5']
        ]);

        $user = User::create($data);

        $token = $user->createToken(env('SANCTUM_NAME'))->plainTextToken;

        return response()->json([
            'message' => "Create User Success",
            'token' => $token
        ], Response::HTTP_CREATED);
    }

    public function logout(Request $request)
    {
        // nếu đăng xuất trên all thiết bị
        /**
         *
         * $user->tokens()->delete();
         *
         *
         */

        if ($request->type === 'all') {
            $request->user()->tokens()->delete();
        } else {
            $request->user()->currentAccessToken()->delete();
        }


        return response()->noContent();
    }
}
