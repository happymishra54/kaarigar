<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
{
    $bookings = Booking::where(
        'customer_id',
        auth()->id()
    )
    ->latest()
    ->get();

    return view(
        'customer.bookings.index',
        compact('bookings')
    );
}


    public function create(Service $service)
    {
        return view(
            'user.service.bookings.create',
            compact('service')
        );
    }




    public function store(Request $request)
    {
        $request->validate([

            'service_id' => 'required',

            'booking_date' => 'required|date',

            'booking_time' => 'required',

            'address' => 'required'

        ]);

        $service = Service::findOrFail(
            $request->service_id
        );

        Booking::create([

            'booking_number' =>
            'BK'.time(),

            'customer_id' =>
            auth()->id(),

            'worker_id' =>
            $service->worker_id,

            'service_id' =>
            $service->id,

            'booking_date' =>
            $request->booking_date,

            'booking_time' =>
            $request->booking_time,

            'address' => $request->address,

            'latitude' => $request->latitude,

            'longitude' => $request->longitude,

            'amount' =>
            $service->price,

            'status' =>
            'pending'

        ]);

        return redirect()
            ->route('customer.dashboard')
            ->with(
                'success',
                'Booking Created Successfully'
            );
    }

    public function show(Booking $booking)
    {
        if ($booking->customer_id != auth()->id()) {
            abort(403);
        }

        return view(
            'customer.bookings.show',
            compact('booking')
        );
    }

    public function cancel(Booking $booking)
    {
        if($booking->status == 'pending')
        {
            $booking->update([
                'status' => 'cancelled'
            ]);
        }

        return back();
    }

}