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

            $workers = WorkerProfile::with('user')
            ->where('is_verified', 1)
            ->when(request('search'), function ($query, $search) {
                $query->where('bio', 'like', "%{$search}%");
            })
            ->latest()
            ->get();
        if(
            request('search') ||
            request('city')
        ){
            return view(
                'search',
                compact('workers')
            );
        }
        
        return view(
            'welcome',
            compact(
                'categories',
                'services',
                'workers'
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

