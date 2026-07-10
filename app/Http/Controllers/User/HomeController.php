<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\WorkerProfile;

class HomeController extends Controller
{
    

    public function index()
{


    $categories = Category::all();

    $services = Service::latest()
        ->take(6)
        ->get();

    $user = auth()->user();

    // Customer location
    $customerLat = $user?->latitude;
    $customerLng = $user?->longitude;

    // Filters
    $state = request('state');
    $city = request('city');

    if (empty($state) && $user) {
        $state = $user->state;
    }

    if (empty($city) && $user) {
        $city = $user->city;
    }

    $workers = WorkerProfile::with('user')
        ->where('is_verified', 1)

        // Profession Search
        ->when(request('search'), function ($query, $search) {
            $query->where('bio', 'like', "%{$search}%");
        })

        // State Filter
        ->when($state, function ($query) use ($state) {
            $query->where('state', 'like', "%{$state}%");
        })

        // City Filter
        ->when($city, function ($query) use ($city) {
            $query->where('city', 'like', "%{$city}%");
        });

    // Calculate distance if customer location exists
    if ($customerLat && $customerLng) {

        $workers->select('worker_profiles.*')

            ->selectRaw("
                (
                    6371 *
                    acos(
                        cos(radians(?))
                        *
                        cos(radians(latitude))
                        *
                        cos(radians(longitude) - radians(?))
                        +
                        sin(radians(?))
                        *
                        sin(radians(latitude))
                    )
                ) AS distance
            ", [
                $customerLat,
                $customerLng,
                $customerLat
            ])

            ->orderBy('distance');

    } else {

        $workers->latest();

    }
    $workers = $workers->get();
    $favorites = [];

if (auth()->check() && auth()->user()->role == 'customer') {

    $favorites = auth()->user()
        ->favorites()
        ->pluck('worker_id')
        ->toArray();

}

$verifiedWorkers = WorkerProfile::where('is_verified', 1)->count();

$totalBookings = \App\Models\Booking::count();

$totalCities = WorkerProfile::whereNotNull('city')
    ->distinct()
    ->count('city');

$averageRating = round(
    \App\Models\Review::avg('rating') ?? 0,
    1
);    


    if (
        request()->filled('search') ||
        request()->filled('state') ||
        request()->filled('city')
    ) {
        return view('search', compact('workers'));
    }

    return view(
        'welcome',
        compact(
            'categories',
            'services',
            'workers',
            'favorites',
            'verifiedWorkers',
            'totalBookings',
            'totalCities',
            'averageRating'
        )
    );
}

public function workerProfile($worker)
{
    $worker = WorkerProfile::with([
        'user',
        'user.services',
        'user.reviewsReceived.customer'
    ])->findOrFail($worker);

    return view(
        'worker.show',
        compact('worker')
    );
}
}

