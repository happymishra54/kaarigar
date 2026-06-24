<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WorkerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    public function create()
    {
        return view('admin.workers.create');
    }

    public function store(Request $request)
    {
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

        $user = User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'role' => 'worker',

            'phone' => trim($request->std_code . $request->mobile)

        ]);

        WorkerProfile::create([

            'user_id' => $user->id,

            'aadhaar_number' => $request->aadhaar_number,

            'aadhaar_image' => $aadhaarImage,

            'profile_image' => $profileImage,

            'bio' => $request->bio,

            'experience' => $request->experience,

            'mobile' => trim($request->std_code . $request->mobile),

            'address' => $request->address,

            'city' => $request->city,

            'state' => $request->state,

            'daily_wage' => $request->daily_wage,

            'is_verified' => 1

        ]);

        return redirect()
            ->route('admin.dashboard')
            ->with(
                'success',
                'Worker created successfully.'
            );
    }

    public function index()
    {
        $workers = User::where(
            'role',
            'worker'
        )->latest()->get();

        return view(
            'admin.workers.index',
            compact('workers')
        );
    }

    public function destroy(User $worker)
    {
        WorkerProfile::where(
            'user_id',
            $worker->id
        )->delete();

        $worker->delete();

        return back()->with(
            'success',
            'Worker deleted successfully.'
        );
    }
}

