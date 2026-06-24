<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Service;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'admin.dashboard',
            [

                // Counts for stat cards
                'usersCount' => User::whereIn('role', ['customer', 'admin'])->count(),

                'workersCount' => User::where('role', 'worker')->count(),

                'customers' => User::where('role', 'customer')->count(),

                'categories' => Category::count(),

                'services' => Service::count(),

                'bookings' => Booking::count(),

                // Panel data
                'users' => User::whereIn('role', ['customer', 'admin'])->latest()->paginate(20),

                'workers' => User::where('role', 'worker')->latest()->paginate(20)

            ]
        );
    }
}