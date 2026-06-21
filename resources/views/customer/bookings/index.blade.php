@extends('layouts.app')

@section('content')

<div class="container py-5">


<h2 class="mb-4">

    My Bookings

</h2>

<table class="table table-bordered">

    <thead>

    <tr>

        <th>Booking No</th>
        <th>Service</th>
        <th>Worker</th>
        <th>Date</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Action</th>

    </tr>

    </thead>

    <tbody>

    @foreach($bookings as $booking)

        <tr>

            <td>

                {{ $booking->booking_number }}

            </td>

            <td>

                {{ $booking->service->title }}

            </td>

            <td>

                {{ $booking->worker->name }}

            </td>

            <td>

                {{ $booking->booking_date }}

            </td>

            <td>

                ₹{{ $booking->amount }}

            </td>

            <td>

                @if($booking->status=='pending')

                    <span class="badge bg-warning">

                        Pending

                    </span>

                @elseif($booking->status=='accepted')

                    <span class="badge bg-success">

                        Accepted

                    </span>

                @elseif($booking->status=='completed')

                    <span class="badge bg-primary">

                        Completed

                    </span>

                @else

                    <span class="badge bg-danger">

                        Cancelled

                    </span>

                @endif

            </td>

            <td>

                @if($booking->status=='pending')

                    <form
                    action="{{ route('booking.cancel',$booking->id) }}"
                    method="POST">

                        @csrf
                        @method('PATCH')

                        <button
                        class="btn btn-danger btn-sm">

                            Cancel

                        </button>

                    </form>

                @elseif(
                    $booking->status=='completed'
                    &&
                    !$booking->review
                )

                    <a
                    href="{{ route('review.create',$booking->id) }}"
                    class="btn btn-primary btn-sm">

                        Leave Review

                    </a>

                @else

                    -

                @endif

            </td>

        </tr>

    @endforeach

    </tbody>

</table>


</div>

@endsection
