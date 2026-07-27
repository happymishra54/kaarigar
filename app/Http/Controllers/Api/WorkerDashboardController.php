<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use App\Models\WorkerProfile;
use Illuminate\Http\Request;

class WorkerDashboardController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
    
    
        $profile = \App\Models\WorkerProfile::where(
            'user_id',
            $user->id
        )->first();
    
    
        return response()->json([
    
            'success' => true,
    
    
            'worker' => [
    
                'id' => $user->id,
    
                'name' => $user->name,
    
                'email' => $user->email,
    
                'phone' => $user->phone,
    
    
                // worker profile fields
    
                'profile_image' =>
                    $profile?->profile_image,
    
                'aadhaar_image' =>
                    $profile?->aadhaar_image,
    
                'aadhaar_number' =>
                    $profile?->aadhaar_number,
    
    
                'bio' =>
                    $profile?->bio,
    
    
                'experience' =>
                    $profile?->experience,
    
    
                'daily_wage' =>
                    $profile?->daily_wage,
    
    
                'address' =>
                    $profile?->address,
    
    
                'city' =>
                    $profile?->city,
    
    
                'state' =>
                    $profile?->state,
    
    
                'mobile' =>
                    $profile?->mobile,
    
    
                'is_verified' =>
                    $profile?->is_verified,
    
    
                'latitude' =>
                    $profile?->latitude,
    
    
                'longitude' =>
                    $profile?->longitude,
    
            ],
    
    
            'services' => 
                $user->services()->count(),
    
    
            'total_bookings' => 0,
    
            'pending_bookings' => 0,
    
            'earnings' => 0,
    
    
            'recent_bookings' => []
    
        ]);


    }


}