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

    return view('worker.profile.index', [
        'profile' => $profile,
    ]);
}



public function store(Request $request)
{

    $image = null;

    if ($request->hasFile('aadhaar_image')) {

        $image = $request
            ->file('aadhaar_image')
            ->store(
                'aadhaar',
                'public'
            );
    }


    $profileImage = null;

    if ($request->hasFile('profile_image')) {

        $profileImage = $request
            ->file('profile_image')
            ->store(
                'profiles',
                'public'
            );

    }



$location = $request->address . ', '
          . $request->city . ', '
          . $request->state;

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


if (!empty($data)) {

    $latitude = $data[0]['lat'];

    $longitude = $data[0]['lon'];

}




    WorkerProfile::create([

        'user_id' => auth()->id(),
        
        'profile_image' => $profileImage,

        'name' => $request->name,
        
        'aadhaar_number' => $request->aadhaar_number,

        'aadhaar_image' => $image,

        'bio' => $request->bio,

        'experience' => $request->experience,

        'mobile' => $request->mobile,

        'address' => $request->address,

        'city' => $request->city,

        'state' => $request->state,

        'latitude' => $latitude,

        'longitude' => $longitude,

        'daily_wage' => $request->daily_wage

    ]);

    return redirect()
        ->route('worker.profile')
        ->with(
            'success',
            'Profile Created Successfully');
}





    public function edit()
{
    $profile = WorkerProfile::where(
        'user_id',
        auth()->id()
    )->first();

    return view(
        'worker.profile.edit',
        compact('profile')
    );
}


public function update(Request $request)
{
    

    $profile = WorkerProfile::where(
        'user_id',
        auth()->id()
    )->first();

    $location =
        $request->address . ', ' .
        $request->city . ', ' .
        $request->state;

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

    if (!empty($data)) {

        $latitude = $data[0]['lat'];

        $longitude = $data[0]['lon'];

    }

    $profile->update([

        'name' => $request->name,

        'mobile' => $request->mobile,

        'address' => $request->address,

        'city' => $request->city,

        'state' => $request->state,

        'latitude' => $latitude,

        'longitude' => $longitude,

        'bio' => $request->bio,

        'experience' => $request->experience,

        'daily_wage' => $request->daily_wage

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