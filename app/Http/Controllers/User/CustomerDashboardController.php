<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\WorkerProfile;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $activeBookings = Booking::where('customer_id', $user->id)
            ->whereIn('status', ['pending', 'accepted', 'started'])
            ->count();

        $completedBookings = Booking::where('customer_id', $user->id)
            ->where('status', 'completed')
            ->count();

        $recentBookings = Booking::with(['worker', 'service'])
            ->where('customer_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $recommendedWorkers = WorkerProfile::with('user')
            ->where('is_verified', 1)
            ->take(4)
            ->get();

        $categories = Category::all();

        $favorites = $user->favorites()
            ->pluck('worker_id')
            ->toArray();

        return view('customer.dashboard', compact(
            'activeBookings',
            'completedBookings',
            'recentBookings',
            'recommendedWorkers',
            'categories',
            'favorites'
        ));
    }
}

