<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Service;
use App\Models\Booking;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return response()->json([

            'success' => true,

            'stats' => [

                'users' => User::count(),

                'workers' => User::where(
                    'role',
                    'worker'
                )->count(),

                'customers' => User::where(
                    'role',
                    'customer'
                )->count(),

                'categories' => Category::count(),
                'services' => Service::count(),

                'bookings' => Booking::count(),

            ]

        ]);
    }
}