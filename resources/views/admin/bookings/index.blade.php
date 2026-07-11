@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Header -->

    <div class="text-center mb-5">

        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
            BOOKINGS
        </span>

        <h2 class="display-6 fw-bold mt-3">

            <i class="fas fa-calendar-check text-primary me-2"></i>

            Manage Bookings

        </h2>

        <p class="text-muted">

            View all customer bookings and manage their status.

        </p>

    </div>

    <!-- Table Card -->

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Customer</th>

                            <th>Worker</th>

                            <th>Service</th>

                            <th>Amount</th>

                            <th>Status</th>

                            <th class="text-center">
                                Action
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

                                @switch($booking->status)

                                    @case('pending')
                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>
                                        @break

                                    @case('accepted')
                                        <span class="badge bg-primary">
                                            Accepted
                                        </span>
                                        @break

                                    @case('completed')
                                        <span class="badge bg-success">
                                            Completed
                                        </span>
                                        @break

                                    @case('cancelled')
                                        <span class="badge bg-danger">
                                            Cancelled
                                        </span>
                                        @break

                                    @default
                                        <span class="badge bg-secondary">
                                            {{ ucfirst($booking->status) }}
                                        </span>

                                @endswitch

                            </td>

                            <td class="text-center">

                                @if(!in_array($booking->status,['completed','cancelled']))

                                    <form
                                        action="{{ route('admin.booking.cancel',$booking) }}"
                                        method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Cancel this booking?')">

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

                            <td colspan="7" class="text-center py-5">

                                <i class="fas fa-calendar-xmark fa-4x text-secondary mb-3"></i>

                                <h5 class="fw-bold">

                                    No Bookings Found

                                </h5>

                                <p class="text-muted mb-0">

                                    Customer bookings will appear here.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    @if($bookings->hasPages())

        <div class="mt-4">

            {{ $bookings->links() }}

        </div>

    @endif

</div>

@endsection