
@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        My Bookings
    </h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover align-middle">

        <thead class="table-dark">
            <tr>
                <th>Booking No</th>
                <th>Customer</th>
                <th>Contact</th>
                <th>Service</th>
                <th>Date</th>
                <th>Status</th>
                <th width="220">Action</th>
            </tr>
        </thead>

        <tbody>

        @forelse($bookings as $booking)

            <tr>

                <td>
                    {{ $booking->booking_number }}
                </td>

                <td>
                    {{ $booking->customer->name }}
                </td>

                <td>

                    @if($booking->customer->phone)

                        <a href="tel:{{ $booking->customer->phone }}"
                           class="btn btn-success btn-sm">

                            📞 Call Customer

                        </a>

                        <br>

                        <small class="text-muted">
                            {{ $booking->customer->phone }}
                        </small>

                    @else

                        <span class="text-danger">
                            No Number
                        </span>

                    @endif

                </td>

                <td>
                    {{ $booking->service->title }}
                </td>

                <td>
                    {{ $booking->booking_date }}
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
                            action="{{ route('worker.booking.accept', $booking->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-success btn-sm">
                                ✅ Accept
                            </button>

                        </form>

                        <form
                            action="{{ route('worker.booking.reject', $booking->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-danger btn-sm">
                                ❌ Reject
                            </button>

                        </form>

                    @elseif($booking->status == 'accepted')

                        <form
                            action="{{ route('worker.booking.start', $booking->id) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-warning btn-sm">
                                ▶️ Start Work
                            </button>

                        </form>

                    @elseif($booking->status == 'in_progress')

                        <form
                            action="{{ route('worker.booking.complete', $booking->id) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-primary btn-sm">
                                ✅ Complete Job
                            </button>

                        </form>

                    @elseif($booking->status == 'completed')

                        <span class="text-success fw-bold">
                            ✔ Completed
                        </span>

                    @else

                        <span class="text-danger fw-bold">
                            ✖ Cancelled
                        </span>

                    @endif

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="7" class="text-center">
                    No bookings found.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection

