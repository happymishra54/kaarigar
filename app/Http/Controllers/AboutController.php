<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Category;
use App\Models\WorkerProfile;

class AboutController extends Controller
{
    public function index()
    {
        $verifiedWorkers = WorkerProfile::where('is_verified', 1)->count();

        $customers = User::where('role', 'customer')->count();

        $completedBookings = Booking::where('status', 'completed')->count();

        $categories = Category::count();

        return view('about', compact(
            'verifiedWorkers',
            'customers',
            'completedBookings',
            'categories'
        ));
    }
}