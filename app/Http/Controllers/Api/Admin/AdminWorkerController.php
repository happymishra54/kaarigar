<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminWorkerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | All Workers
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = User::with('workerProfile')
            ->where('role', 'worker');

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

            'workers' => $query
                ->latest()
                ->paginate(20),

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Show Worker
    |--------------------------------------------------------------------------
    */

    public function show(User $user)
    {
        if ($user->role != 'worker') {

            return response()->json([
                'success' => false,
                'message' => 'Worker not found.'
            ],404);

        }

        return response()->json([

            'success' => true,

            'worker' => $user,

        ]);
    }

    public function store(Request $request)
{
    $request->validate([

        'name' => 'required|string|max:255',

        'email' => 'nullable|email|unique:users,email',

        'phone' => 'required|digits:10|unique:users,phone',

        'password' => 'required|min:6',

        'bio' => 'nullable',

        'experience' => 'nullable',

        'daily_wage' => 'nullable|numeric',

        'address' => 'nullable',

        'city' => 'nullable',

        'state' => 'nullable',

        'aadhaar_number' => 'nullable',

        'aadhaar_image' => 'nullable|image',

        'profile_image' => 'nullable|image',

    ]);

    $user = \App\Models\User::create([

        'name' => $request->name,

        'email' => $request->email,

        'phone' => $request->phone,

        'password' => bcrypt($request->password),

        'role' => 'worker',

        'status' => 1,

    ]);

    $aadhaarImage = null;
    $profileImage = null;

    if ($request->hasFile('aadhaar_image')) {

        $aadhaarImage = $request
            ->file('aadhaar_image')
            ->store('aadhaar', 'public');

    }

    if ($request->hasFile('profile_image')) {

        $profileImage = $request
            ->file('profile_image')
            ->store('profiles', 'public');

    }

    \App\Models\WorkerProfile::create([

        'user_id' => $user->id,

        'bio' => $request->bio,

        'experience' => $request->experience,

        'daily_wage' => $request->daily_wage,

        'address' => $request->address,

        'city' => $request->city,

        'state' => $request->state,

        'aadhaar_number' => $request->aadhaar_number,

        'aadhaar_image' => $aadhaarImage,

        'profile_image' => $profileImage,

        'is_verified' => 0,

    ]);

    return response()->json([

        'success' => true,

        'message' => 'Worker created successfully.',

        'worker' => $user,

    ], 201);
}

    /*
    |--------------------------------------------------------------------------
    | Update Worker
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, User $user)
{
    if ($user->role != 'worker') {

        return response()->json([
            'success' => false,
            'message' => 'Worker not found.'
        ],404);

    }

    $request->validate([

        'name' => 'required',

        'email' => 'nullable|email|unique:users,email,' . $user->id,

        'phone' => 'required|digits:10|unique:users,phone,' . $user->id,

        'city' => 'nullable',

        'experience' => 'nullable',

        'daily_wage' => 'nullable|numeric',

    ]);

    $user->update([

        'name' => $request->name,

        'email' => $request->email,

        'phone' => $request->phone,

    ]);

    if ($user->workerProfile) {

        $user->workerProfile->update([

            'city' => $request->city,

            'experience' => $request->experience,

            'daily_wage' => $request->daily_wage,

        ]);

    }

    return response()->json([

        'success' => true,

        'message' => 'Worker Updated Successfully.'

    ]);
}

    /*
    |--------------------------------------------------------------------------
    | Delete Worker
    |--------------------------------------------------------------------------
    */

    public function destroy(User $user)
    {
        if ($user->role != 'worker') {

            return response()->json([
                'success' => false,
                'message' => 'Worker not found.'
            ],404);

        }

        $user->delete();

        return response()->json([

            'success' => true,

            'message' => 'Worker deleted successfully.',

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Activate / Deactivate Worker
    |--------------------------------------------------------------------------
    */

    public function status(User $user)
    {
        if ($user->role != 'worker') {

            return response()->json([
                'success' => false,
                'message' => 'Worker not found.'
            ],404);

        }

        $user->status = !$user->status;

        $user->save();

        return response()->json([

            'success' => true,

            'message' => 'Worker status updated.',

            'status' => $user->status,

        ]);
    }

    /*
|--------------------------------------------------------------------------
| Verify / Unverify Worker
|--------------------------------------------------------------------------
*/

public function verify(User $user)
{
    if ($user->role != 'worker') {

        return response()->json([
            'success' => false,
            'message' => 'Worker not found.'
        ], 404);
    }

    $profile = $user->workerProfile;

    if (!$profile) {

        return response()->json([
            'success' => false,
            'message' => 'Worker profile not found.'
        ], 404);

    }

    $profile->is_verified = !$profile->is_verified;

    $profile->save();

    return response()->json([

        'success' => true,

        'message' => 'Verification updated.',

        'verified' => $profile->is_verified,

    ]);
}

public function pendingVerification()
{
    $workers = User::where('role', 'worker')
        ->whereHas('workerProfile', function ($q) {
            $q->where('is_verified', 0);
        })
        ->with('workerProfile')
        ->latest()
        ->get();

    return response()->json([
        'success' => true,
        'workers' => $workers,
    ]);
}

public function generatePassword(User $user)
{
    if ($user->role !== 'worker') {

        return response()->json([
            'success' => false,
            'message' => 'User is not a worker.'
        ], 422);

    }

    $password = Str::password(
        10,
        true,
        true,
        true,
        false
    );

    $user->password = Hash::make($password);

    $user->save();

    return response()->json([
        'success' => true,
        'message' => 'Password generated successfully.',
        'password' => $password,
    ]);
}

}