<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'nullable|email|unique:users,email',

            'phone' => 'required|digits:10|unique:users,phone',

            'password' => 'required|min:6|confirmed',

            'role' => 'required|in:customer,worker',

        ]);

        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'password' => bcrypt($request->password),

            'role' => $request->role,

            'status' => 1,

        ]);

        $token = $user->createToken('kaarigar')->plainTextToken;

        return response()->json([

            'success' => true,

            'message' => 'Registration Successful.',

            'token' => $token,

            'user' => $user

        ], 201);
    }

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $request->validate([

            'login' => 'required',

            'password' => 'required',

        ]);

        $field = filter_var(
            $request->login,
            FILTER_VALIDATE_EMAIL
        )
            ? 'email'
            : 'phone';

        if (!Auth::attempt([

            $field => $request->login,

            'password' => $request->password,

        ])) {

            throw ValidationException::withMessages([

                'login' => ['Invalid Credentials.']

            ]);
        }

        $user = Auth::user();

        /*
        Don't allow admin login
        */

        if ($user->role == 'admin') {

            Auth::logout();

            return response()->json([

                'success' => false,

                'message' => 'Admin login is not allowed.'

            ],403);

        }

        /*
        Block inactive users
        */

        if (!$user->status) {

            Auth::logout();

            return response()->json([

                'success' => false,

                'message' => 'Account Disabled.'

            ],403);

        }

        /*
        Delete old tokens
        */

        $user->tokens()->delete();

        /*
        Create new token
        */

        $token = $user
            ->createToken('kaarigar')
            ->plainTextToken;

        return response()->json([

            'success'=>true,

            'message'=>'Login Successful.',

            'token'=>$token,

            'user'=>$user

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        $request
            ->user()
            ->currentAccessToken()
            ->delete();

        return response()->json([

            'success'=>true,

            'message'=>'Logged Out Successfully.'

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Current User
    |--------------------------------------------------------------------------
    */

    public function me(Request $request)
    {
        return response()->json([

            'success'=>true,

            'user'=>$request->user()

        ]);
    }
}