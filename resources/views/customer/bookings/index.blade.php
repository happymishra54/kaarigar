@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        My Bookings
    </h2>

    <a
            href="{{ url('/') }}"
            class="btn-primary-custom">

            ➕ Book Now

        </a>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover align-middle">

        <thead class="table-dark">

            <tr>

                <th>Booking No</th>
                <th>Service</th>
                <th>Worker</th>
                <th>Contact</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th width="200">Action</th>

            </tr>

        </thead>

        <tbody>

        @forelse($bookings as $booking)

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

                    @if($booking->worker->phone)

                        <a
                            href="tel:{{ $booking->worker->phone }}"
                            class="btn-success-custom btn-sm">

                            📞 Call Worker

                        </a>

                        <br>

                        <small class="text-muted">
                            {{ $booking->worker->phone }}
                        </small>

                    @else

                        <span class="text-danger">
                            No Number
                        </span>

                    @endif

                </td>

                <td>
                    {{ $booking->booking_date }}
                </td>

                <td>
                    ₹{{ number_format($booking->amount, 2) }}
                </td>

                <td>

                    @if($booking->status == 'pending')

                        <span class="badge bg-warning text-dark">
                            Pending
                        </span>

                    @elseif($booking->status == 'accepted')

                        <span class="badge bg-success">
                            Accepted
                        </span>

                    @elseif($booking->status == 'in_progress')

                        <span class="badge bg-info text-dark">
                            In Progress
                        </span>

                    @elseif($booking->status == 'completed')

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

                    @if($booking->status == 'pending')

                        <form
                            action="{{ route('booking.cancel', $booking->id) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')

                            <button class="btn-danger-custom btn-sm">

                                ❌ Cancel Booking

                            </button>

                        </form>

                    @elseif($booking->status == 'completed' && !$booking->review)

                        <a
                            href="{{ route('review.create', $booking->id) }}"
                            class="btn-primary-custom btn-sm">

                            ⭐ Leave Review

                        </a>

                    @elseif($booking->status == 'completed' && $booking->review)

                        <span class="text-success fw-bold">

                            ✔ Reviewed

                        </span>

                    @else

                        <span class="text-muted">

                            No Action

                        </span>

                    @endif

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="8" class="text-center py-4">

                    <h5>No bookings found.</h5>

                    <p class="text-muted mb-0">

                        Book your first service to see it here.

                    </p>

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>


</div>

@endsection

