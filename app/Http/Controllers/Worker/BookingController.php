<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::where(
            'worker_id',
            auth()->id()
        )
        ->latest()
        ->get();

        return view(
            'worker.bookings.index',
            compact('bookings')
        );
    }

    public function accept(Booking $booking)
    {
        $booking->update([
            'status' => 'accepted'
        ]);

        return back()
            ->with(
                'success',
                'Booking accepted successfully.'
            );
    }

    public function reject(Booking $booking)
    {
        $booking->update([
            'status' => 'cancelled'
        ]);

        return back()
            ->with(
                'success',
                'Booking rejected.'
            );
    }

    public function complete(Booking $booking)
    {
        $booking->update([
            'status' => 'completed'
        ]);

        return back()
            ->with(
                'success',
                'Booking completed.'
            );
    }
}

