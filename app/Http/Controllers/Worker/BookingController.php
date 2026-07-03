<?php

namespace App\Http\Controllers\Worker;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Notifications\BookingStatusNotification;

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

    $booking->customer->notify(

        new BookingStatusNotification(

            $booking,

            'Your booking has been accepted.'

        )

    );

    return back()->with(

        'success',

        'Booking accepted successfully.'

    );
}

    public function show(Booking $booking)
    {
        if ($booking->worker_id != auth()->id()) {
            abort(403);
        }

        return view(
            'worker.bookings.show',
            compact('booking')
        );
    }

    public function reject(Booking $booking)
{
    $booking->update([
        'status' => 'cancelled'
    ]);

    $booking->customer->notify(

        new BookingStatusNotification(

            $booking,

            'Your booking has been rejected.'

        )

    );

    return back()->with(

        'success',

        'Booking rejected.'

    );
}

public function start(Booking $booking)
{
    $booking->update([
        'status' => 'in_progress'
    ]);

    $booking->customer->notify(

        new BookingStatusNotification(

            $booking,

            'The worker has started the job.'

        )

    );

    return back()->with(

        'success',

        'Work started successfully.'

    );
}


public function complete(Booking $booking)
{
    $booking->update([
        'status' => 'completed'
    ]);

    $booking->customer->notify(

        new BookingStatusNotification(

            $booking,

            'Your booking has been completed. Please leave a review.'

        )

    );

    return back()->with(

        'success',

        'Booking completed.'

    );
}
}

