<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class WorkerBookingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {

        $workerId = auth()->id();

        return response()->json([

            'success' => true,

            'stats' => [

                'pending' => Booking::where('worker_id', $workerId)
                    ->where('status', 'Pending')
                    ->count(),

                'accepted' => Booking::where('worker_id', $workerId)
                    ->where('status', 'Accepted')
                    ->count(),

                'completed' => Booking::where('worker_id', $workerId)
                    ->where('status', 'Completed')
                    ->count(),

            ]

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Worker Bookings
    |--------------------------------------------------------------------------
    */

    public function bookings()
    {
        $bookings = Booking::with([
                'customer',
                'service',
            ])
            ->where('worker_id', auth()->id())
            ->latest()
            ->get();

        return response()->json([

            'success' => true,

            'bookings' => $bookings,

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Accept Booking
    |--------------------------------------------------------------------------
    */

    public function accept(Booking $booking)
    {
        if ($booking->worker_id != auth()->id()) {

            return response()->json([
                'message' => 'Unauthorized'
            ], 403);

        }

        $booking->update([
            'status' => 'Accepted'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking accepted successfully.'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Reject Booking
    |--------------------------------------------------------------------------
    */

    public function reject(Booking $booking)
    {
        if ($booking->worker_id != auth()->id()) {

            return response()->json([
                'message' => 'Unauthorized'
            ], 403);

        }

        $booking->update([
            'status' => 'Cancelled'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking rejected.'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Complete Booking
    |--------------------------------------------------------------------------
    */

    public function complete(Booking $booking)
    {
        if ($booking->worker_id != auth()->id()) {

            return response()->json([
                'message' => 'Unauthorized'
            ], 403);

        }

        $booking->update([
            'status' => 'Completed'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Job completed.'
        ]);
    }
}