@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="fas fa-calendar-check text-primary me-2"></i>
                All Bookings
            </h2>

            <p class="text-muted mb-0">
                View and manage all customer bookings.
            </p>
        </div>

    </div>

    <!-- Card -->
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>
                            <th>Booking No.</th>
                            <th><i class="fas fa-user me-2"></i>Customer</th>
                            <th><i class="fas fa-user-hard-hat me-2"></i>Worker</th>
                            <th><i class="fas fa-tools me-2"></i>Service</th>
                            <th><i class="fas fa-indian-rupee-sign me-2"></i>Amount</th>
                            <th><i class="fas fa-circle-info me-2"></i>Status</th>
                            <th class="text-center">
                                <i class="fas fa-gears me-2"></i>Action
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bookings as $booking)

                        <tr>

                            <td>
                                <span class="badge bg-secondary">
                                    {{ $booking->booking_number }}
                                </span>
                            </td>

                            <td class="fw-semibold">
                                {{ $booking->customer->name }}
                            </td>

                            <td>
                                {{ $booking->worker->name }}
                            </td>

                            <td>
                                {{ $booking->service->title }}
                            </td>

                            <td class="fw-bold text-success">
                                ₹{{ number_format($booking->amount,2) }}
                            </td>

                            <td>

                                @if($booking->status == 'pending')

                                    <span class="badge bg-warning text-dark">
                                        Pending
                                    </span>

                                @elseif($booking->status == 'accepted')

                                    <span class="badge bg-primary">
                                        Accepted
                                    </span>

                                @elseif($booking->status == 'completed')

                                    <span class="badge bg-success">
                                        Completed
                                    </span>

                                @elseif($booking->status == 'cancelled')

                                    <span class="badge bg-danger">
                                        Cancelled
                                    </span>

                                @else

                                    <span class="badge bg-secondary">
                                        {{ ucfirst($booking->status) }}
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                @if($booking->status != 'completed' && $booking->status != 'cancelled')

                                    <form
                                        action="{{ route('admin.booking.cancel',$booking) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="btn btn-outline-danger btn-sm rounded-pill"
                                            onclick="return confirm('Are you sure you want to cancel this booking?')">

                                            <i class="fas fa-ban me-1"></i>
                                            Cancel

                                        </button>

                                    </form>

                                @else

                                    <span class="text-muted">
                                        —
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7" class="text-center py-5 text-muted">

                                <i class="fas fa-calendar-xmark fa-3x mb-3 d-block"></i>

                                No bookings found.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="mt-4 d-flex justify-content-center">

        {{ $bookings->links() }}

    </div>

</div>

@endsection