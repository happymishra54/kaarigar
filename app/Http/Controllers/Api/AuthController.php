<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([

            'login' => 'required',

            'password' => 'required'

        ]);

        $field = filter_var(

            $request->login,

            FILTER_VALIDATE_EMAIL

        ) ? 'email' : 'phone';

        if (!Auth::attempt([

            $field => $request->login,

            'password' => $request->password

        ])) {

            return response()->json([

                'success' => false,

                'message' => 'Invalid Credentials'

            ],401);

        }

        $user = Auth::user();

        $token = $user->createToken('flutter')->plainTextToken;

        return response()->json([

            'success' => true,

            'token' => $token,

            'user' => $user

        ]);
    }

    public function logout(Request $request)
    {
        $request->user()

            ->currentAccessToken()

            ->delete();

        return response()->json([

            'success'=>true

        ]);
    }
}