<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\WorkerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = WorkerProfile::where(
            'user_id',
            auth()->id()
        )->first();

        $user = auth()->user();

        return view(
            'worker.profile.index',
            compact('profile', 'user')
        );
    }

    public function store(Request $request)
    {
        $image = null;

        if ($request->hasFile('aadhaar_image')) {
            $image = $request->file('aadhaar_image')
                ->store('aadhaar', 'public');
        }

        $profileImage = null;

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image')
                ->store('profiles', 'public');
        }

        $location = $request->address.', '.$request->city.', '.$request->state;

        $response = Http::withHeaders([
            'User-Agent' => 'Kaarigar'
        ])->get(
            'https://nominatim.openstreetmap.org/search',
            [
                'q' => $location,
                'format' => 'json',
                'limit' => 1
            ]
        );

        $data = $response->json();

        $latitude = null;
        $longitude = null;

        if (is_array($data) && !empty($data)) {

            $latitude = (float)$data[0]['lat'];

            $longitude = (float)$data[0]['lon'];
        }

        WorkerProfile::create([

            'user_id' => auth()->id(),

            'profile_image' => $profileImage,

            'aadhaar_number' => $request->aadhaar_number,

            'aadhaar_image' => $image,

            'bio' => $request->bio,

            'experience' => $request->experience,

            'address' => $request->address,

            'city' => $request->city,

            'state' => $request->state,

            'latitude' => $request->latitude,
            
            'longitude' => $request->longitude,

            'daily_wage' => $request->daily_wage

        ]);

        auth()->user()->update([

            'name' => $request->name,

            'phone' => $request->mobile,

            'latitude' => $request->latitude,

            'longitude' => $request->longitude

        ]);

        return redirect()
            ->route('worker.profile')
            ->with(
                'success',
                'Profile Created Successfully'
            );
    }

    public function edit()
    {
        $profile = WorkerProfile::where(
            'user_id',
            auth()->id()
        )->first();

        $user = auth()->user();

        return view(
            'worker.profile.edit',
            compact(
                'profile',
                'user'
            )
        );
    }

    public function update(Request $request)
    {
        $profile = WorkerProfile::where(
            'user_id',
            auth()->id()
        )->first();

        $location = $request->address.', '.$request->city.', '.$request->state;

        $response = Http::withHeaders([
            'User-Agent' => 'Kaarigar'
        ])->get(
            'https://nominatim.openstreetmap.org/search',
            [
                'q' => $location,
                'format' => 'json',
                'limit' => 1
            ]
        );

        $data = $response->json();

        $latitude = null;
        $longitude = null;

        if (is_array($data) && !empty($data)) {

            $latitude = (float)$data[0]['lat'];

            $longitude = (float)$data[0]['lon'];
        }

        $profile->update([

            'address' => $request->address,

            'city' => $request->city,

            'state' => $request->state,

            'latitude' => $latitude,

            'longitude' => $longitude,

            'bio' => $request->bio,

            'experience' => $request->experience,

            'daily_wage' => $request->daily_wage

        ]);

        auth()->user()->update([

            'name' => $request->name,

            'phone' => $request->mobile,

            'latitude' => $latitude,

            'longitude' => $longitude

        ]);

        return redirect()
            ->route('worker.profile')
            ->with(
                'success',
                'Profile Updated Successfully'
            );
    }

    public function destroy()
    {
        $profile = WorkerProfile::where(
            'user_id',
            auth()->id()
        )->first();

        if ($profile) {
            $profile->delete();
        }

        return redirect()
            ->route('worker.profile')
            ->with(
                'success',
                'Profile Deleted Successfully'
            );
    }
}