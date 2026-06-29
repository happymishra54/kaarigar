<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\ServiceResource;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | All Services
    |--------------------------------------------------------------------------
    */

    public function services()
    {
        $services = Service::with([
            'worker',
            'category'
        ])
        ->where('status', 1)
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'services' => $services
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

    public function categories()
    {
        return response()->json([
            'success' => true,
            'categories' => Category::all()
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Worker Profile
    |--------------------------------------------------------------------------
    */

    public function worker(User $worker)
    {
        $worker->load([
            'workerProfile',
            'services',
            'reviewsReceived'
        ]);

        return response()->json([
            'success' => true,
            'worker' => $worker
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Nearby Workers
    |--------------------------------------------------------------------------
    */

    public function nearbyWorkers(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'nullable|numeric'
        ]);

        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $radius = $request->radius ?? 10;

        $workers = User::select(
                '*',
                DB::raw("
                    (
                        6371 * acos(
                            cos(radians($latitude))
                            * cos(radians(latitude))
                            * cos(radians(longitude) - radians($longitude))
                            + sin(radians($latitude))
                            * sin(radians(latitude))
                        )
                    ) AS distance
                ")
            )
            ->where('role', 'worker')
            ->where('status', 1)
            ->whereNotNull('latitude')
            ->whereNotNull('longitude')
            ->having('distance', '<=', $radius)
            ->orderBy('distance')
            ->get();

        return response()->json([
            'success' => true,
            'workers' => $workers
        ]);
    }

    public function search(Request $request)
{
    $request->validate([
        'q' => 'required|string'
    ]);

    $services = Service::with([
        'worker',
        'category'
    ])
    ->where('status', 1)
    ->where(function ($query) use ($request) {

        $query->where(
            'title',
            'like',
            '%' . $request->q . '%'
        )
        ->orWhere(
            'description',
            'like',
            '%' . $request->q . '%'
        );

    })
    ->latest()
    ->get();

    return response()->json([

        'success' => true,

        'count' => $services->count(),

        'services' => ServiceResource::collection($services)

    ]);
}


}