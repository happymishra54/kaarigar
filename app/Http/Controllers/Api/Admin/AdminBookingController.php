<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | All Bookings
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $bookings = Booking::with([
            'customer',
            'worker',
            'service'
        ])
        ->latest()
        ->paginate(20);

        return response()->json([
            'success' => true,
            'bookings' => $bookings,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Show Booking
    |--------------------------------------------------------------------------
    */

    public function show(Booking $booking)
    {
        $booking->load([
            'customer',
            'worker',
            'service'
        ]);

        return response()->json([
            'success' => true,
            'booking' => $booking,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Update Status
    |--------------------------------------------------------------------------
    */

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $booking->update([
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking status updated.'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Booking
    |--------------------------------------------------------------------------
    */

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return response()->json([
            'success' => true,
            'message' => 'Booking deleted.'
        ]);
    }
}