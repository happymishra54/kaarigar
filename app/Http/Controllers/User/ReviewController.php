<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function create(Booking $booking)
    {
        $review = Review::where(
            'booking_id',
            $booking->id
        )->first();

        if ($review) {

            return redirect()
                ->route('customer.bookings')
                ->with(
                    'error',
                    'You have already reviewed this booking.'
                );

        }

        return view(
            'customer.review',
            compact('booking')
        );
    }



    public function store(Request $request)
    {
        $booking = Booking::findOrFail(
            $request->booking_id
        );


        $existingReview = Review::where(
            'booking_id',
            $booking->id
        )->exists();

        if ($existingReview) {

            return redirect()
                ->route('customer.bookings')
                ->with(
                    'error',
                    'Review already submitted.'
                );

        }



        Review::create([

            'customer_id' => auth()->id(),

            'worker_id' => $booking->worker_id,

            'booking_id' => $booking->id,

            'rating' => $request->rating,

            'comment' => $request->comment

        ]);

        return redirect()
            ->route('customer.bookings')
            ->with(
                'success',
                'Review Submitted Successfully'
            );
    }
}

