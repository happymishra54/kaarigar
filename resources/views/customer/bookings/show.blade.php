@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            {{-- Header --}}
            <div class="card border-0 shadow-lg rounded-4 mb-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center flex-wrap">

                        <div>

                            <h3 class="fw-bold mb-1">
                                Booking #{{ $booking->booking_number }}
                            </h3>

                            <p class="text-muted mb-0">
                                {{ $booking->created_at->format('d M Y, h:i A') }}
                            </p>

                        </div>

                        <div>

                            @if($booking->status=='pending')

                                <span class="badge bg-warning fs-6 px-3 py-2">
                                    Pending
                                </span>

                            @elseif($booking->status=='accepted')

                                <span class="badge bg-success fs-6 px-3 py-2">
                                    Accepted
                                </span>

                            @elseif($booking->status=='in_progress')

                                <span class="badge bg-info fs-6 px-3 py-2">
                                    In Progress
                                </span>

                            @elseif($booking->status=='completed')

                                <span class="badge bg-primary fs-6 px-3 py-2">
                                    Completed
                                </span>

                            @else

                                <span class="badge bg-danger fs-6 px-3 py-2">
                                    Cancelled
                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            {{-- Worker Card --}}
            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">
                        👷 Worker Details
                    </h5>

                    <div class="row align-items-center">

                        <div class="col-md-8">

                            <h4 class="mb-2">
                                {{ $booking->worker->name }}
                            </h4>

                            <p class="text-muted mb-2">

                                Service Professional

                            </p>

                            <p class="mb-0">

                                <strong>Phone:</strong>

                                {{ $booking->worker->phone }}

                            </p>

                        </div>

                        <div class="col-md-4 text-md-end mt-3 mt-md-0">

                            <a
                                href="tel:{{ $booking->worker->phone }}"
                                class="btn btn-success btn-lg">

                                📞 Call Worker

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Booking Information --}}
            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">
                        📋 Booking Details
                    </h5>

                    <table class="table">

                        <tr>

                            <th width="220">

                                Service

                            </th>

                            <td>

                                {{ $booking->service->title }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Booking Date

                            </th>

                            <td>

                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Booking Time

                            </th>

                            <td>

                                {{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Address

                            </th>

                            <td>

                                {{ $booking->address }}

                            </td>

                        </tr>

                        <tr>

                            <th>

                                Amount

                            </th>

                            <td>

                                <span class="fw-bold fs-4 text-success">

                                    ₹{{ number_format($booking->amount,2) }}

                                </span>

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            {{-- Timeline --}}
            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">
                        📍 Booking Progress
                    </h5>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            ✅ Booking Created
                        </li>

                        <li class="list-group-item">

                            @if(in_array($booking->status,['accepted','in_progress','completed']))

                                ✅ Worker Accepted

                            @else

                                ⏳ Waiting for Worker

                            @endif

                        </li>

                        <li class="list-group-item">

                            @if(in_array($booking->status,['in_progress','completed']))

                                ✅ Work Started

                            @else

                                ⏳ Work Not Started

                            @endif

                        </li>

                        <li class="list-group-item">

                            @if($booking->status=='completed')

                                ✅ Job Completed

                            @elseif($booking->status=='cancelled')

                                ❌ Booking Cancelled

                            @else

                                ⏳ Awaiting Completion

                            @endif

                        </li>

                    </ul>

                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="card border-0 shadow rounded-4">

                <div class="card-body text-center">

                    @if($booking->status=='pending')

                        <form
                            action="{{ route('booking.cancel',$booking->id) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')

                            <button
                                class="btn btn-danger btn-lg">

                                ❌ Cancel Booking

                            </button>

                        </form>

                    @elseif($booking->status=='completed' && !$booking->review)

                        <a
                            href="{{ route('review.create',$booking->id) }}"
                            class="btn btn-primary btn-lg">

                            ⭐ Leave Review

                        </a>

                    @elseif($booking->status=='completed')

                        <button
                            class="btn btn-success btn-lg"
                            disabled>

                            ✔ Job Completed

                        </button>

                    @else

                        <button
                            class="btn btn-secondary btn-lg"
                            disabled>

                            No Action Available

                        </button>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

