<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'address' => 'required|string|max:500',
        ]);

        $service = Service::with('worker')->findOrFail($request->service_id);

        $booking = Booking::create([

            'booking_number' => strtoupper(Str::random(10)),

            'customer_id' => auth()->id(),

            'worker_id' => $service->worker_id,

            'service_id' => $service->id,

            'booking_date' => $request->booking_date,

            'booking_time' => $request->booking_time,

            'address' => $request->address,

            'amount' => $service->price,

            'status' => 'Pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking created successfully.',
            'booking' => $booking,
        ]);
    }

    public function index()
    {
        $bookings = Booking::with([
            'worker',
            'service',
        ])
        ->where('customer_id', auth()->id())
        ->latest()
        ->get();

        return response()->json([
            'success' => true,
            'bookings' => $bookings,
        ]);
    }
}