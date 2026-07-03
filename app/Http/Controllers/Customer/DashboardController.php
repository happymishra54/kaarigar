<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Category;
use App\Models\WorkerProfile;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $activeBookings = Booking::where('customer_id',$user->id)
            ->whereIn('status',['pending','accepted','in_progress'])
            ->count();

        $completedBookings = Booking::where('customer_id',$user->id)
            ->where('status','completed')
            ->count();

        // $totalSpent = Booking::where('customer_id',$user->id)
        //     ->where('status','completed')
        //     ->sum('total_amount');

        $categories = Category::latest()
            ->take(8)
            ->get();

            $recommendedWorkers = WorkerProfile::with('user')
            ->where('is_verified',1)
            ->when($user->city,function($q) use ($user){
        
                $q->where('city',$user->city);
        
            })
            ->latest()
            ->take(4)
            ->get();

            $recentBookings = Booking::with([
                'worker',
                'service'
            ])
            ->where('customer_id',$user->id)
            ->latest()
            ->take(5)
            ->get();

        return view(
            'customer.dashboard',
            compact(
                'activeBookings',
                'completedBookings',
                // 'totalSpent',
                'categories',
                'recommendedWorkers',
                'recentBookings'
            )
        );
    }
}

