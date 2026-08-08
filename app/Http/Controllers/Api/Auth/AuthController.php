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

            'role' => 'required|in:customer,worker,admin',

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
        'role' => 'required|in:customer,worker,admin',
    ]);

    $field = filter_var(
        $request->login,
        FILTER_VALIDATE_EMAIL
    ) ? 'email' : 'phone';

    if (!Auth::attempt([
        $field => $request->login,
        'password' => $request->password,
    ])) {

        return response()->json([
            'success' => false,
            'message' => 'Invalid Credentials.'
        ], 401);
    }

    $user = Auth::user();

    if (!$user->status) {

        Auth::logout();

        return response()->json([
            'success' => false,
            'message' => 'Account Disabled.'
        ], 403);
    }

    // Role must match selected role
    // Allow admin to login from any role selection
if ($user->role != 'admin' && $user->role != $request->role) {

    Auth::logout();

    return response()->json([
        'success' => false,
        'message' => 'Please login as '.$user->role.'.'
    ], 403);

}

    $user->tokens()->delete();

    $token = $user->createToken('kaarigar')->plainTextToken;

    return response()->json([
        'success' => true,
        'message' => 'Login Successful.',
        'token' => $token,
        'role' => $user->role,
        'user' => $user,
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