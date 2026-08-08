<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | All Users
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");

            });

        }

        return response()->json([

            'success' => true,

            'users' => $query
                ->latest()
                ->paginate(20),

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Show User
    |--------------------------------------------------------------------------
    */

    public function show(User $user)
    {
        return response()->json([

            'success' => true,

            'user' => $user,

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update User
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, User $user)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'nullable|email|unique:users,email,' . $user->id,

            'phone' => 'required|digits:10|unique:users,phone,' . $user->id,

        ]);

        $user->update([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

        ]);

        return response()->json([

            'success' => true,

            'message' => 'User updated successfully.',

            'user' => $user,

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete User
    |--------------------------------------------------------------------------
    */

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([

            'success' => true,

            'message' => 'User deleted successfully.',

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Activate / Deactivate
    |--------------------------------------------------------------------------
    */

    public function status(User $user)
    {
        $user->status = !$user->status;

        $user->save();

        return response()->json([

            'success' => true,

            'message' => 'Status updated.',

            'status' => $user->status,

        ]);
    }
}