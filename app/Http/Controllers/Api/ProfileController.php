<?php

namespace App\Http\Controllers\Api;
use App\Models\WorkerProfile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Get Logged-in User Profile
     */
    public function profile(Request $request)
    {
        return response()->json([
            'success' => true,
            'user' => $request->user(),
        ]);
    }

    /**
     * Update Logged-in User Profile
     */
    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|unique:users,phone,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name'  => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully.',
            'user' => $user,
        ]);
    }

    public function completeProfile(Request $request)
{
    $request->validate([

        'city' => 'required|string|max:100',

        'bio' => 'required|string|max:1000',

        'experience' => 'required|integer|min:0',

        'aadhaar_number' => 'required|digits:12',

        'address' => 'nullable|string|max:500',

        'daily_wage' => 'nullable|numeric',

        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        'aadhaar_image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',

    ]);

    $profile = WorkerProfile::firstOrNew([
        'user_id' => auth()->id(),
    ]);

    if ($request->hasFile('profile_image')) {

        $profile->profile_image = $request
            ->file('profile_image')
            ->store('profile_images', 'public');
    }

    if ($request->hasFile('aadhaar_image')) {

        $profile->aadhaar_image = $request
            ->file('aadhaar_image')
            ->store('aadhaar', 'public');
    }

    $profile->city = $request->city;
    $profile->bio = $request->bio;
    $profile->experience = $request->experience;
    $profile->aadhaar_number = $request->aadhaar_number;
    $profile->address = $request->address;
    $profile->daily_wage = $request->daily_wage;
    $profile->user_id = auth()->id();

    $profile->save();

    return response()->json([

        'success' => true,

        'message' => 'Profile completed successfully.',

        'profile' => $profile,

    ]);
}

public function profileStatus(Request $request)
{
    $profile = \App\Models\WorkerProfile::where(
        'user_id',
        auth()->id()
    )
    ->with('user')
    ->first();


    if (!$profile) {

        return response()->json([

            'success' => true,

            'completed' => false,

            'profile' => null,

        ]);

    }


    $completed =
    !empty($profile->city) &&
    !empty($profile->bio) &&
    !empty($profile->experience) &&
    !empty($profile->aadhaar_number);



    return response()->json([

        'success' => true,

        'completed' => $completed,

        'profile' => $profile,

    ]);
}

}