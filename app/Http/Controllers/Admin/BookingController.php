<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()
                    ->paginate(20);

        return view(
            'admin.bookings.index',
            compact('bookings')
        );
    }

    public function cancel(Booking $booking)
    {
        $booking->update([
            'status' => 'cancelled'
        ]);

        return back()
            ->with(
                'success',
                'Booking cancelled successfully.'
            );
    }
}