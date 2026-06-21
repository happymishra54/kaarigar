<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $worker = auth()->user();

        $totalServices = Service::where(
            'worker_id',
            $worker->id
        )->count();

        $pendingBookings = Booking::where(
            'worker_id',
            $worker->id
        )
        ->where('status', 'pending')
        ->count();

        $completedBookings = Booking::where(
            'worker_id',
            $worker->id
        )
        ->where('status', 'completed')
        ->count();

        return view(
            'worker.dashboard',
            compact(
                'totalServices',
                'pendingBookings',
                'completedBookings'
            )
        );
    }
}