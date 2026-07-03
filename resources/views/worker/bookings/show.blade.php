@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            {{-- Header --}}
            <div class="card shadow-lg border-0 rounded-4 mb-4">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center flex-wrap">

                        <div>

                            <h3 class="fw-bold">
                                Booking #{{ $booking->booking_number }}
                            </h3>

                            <small class="text-muted">
                                {{ $booking->created_at->format('d M Y • h:i A') }}
                            </small>

                        </div>

                        <div>

                            @switch($booking->status)

                                @case('pending')
                                    <span class="badge bg-warning fs-6">Pending</span>
                                    @break

                                @case('accepted')
                                    <span class="badge bg-success fs-6">Accepted</span>
                                    @break

                                @case('in_progress')
                                    <span class="badge bg-info fs-6">In Progress</span>
                                    @break

                                @case('completed')
                                    <span class="badge bg-primary fs-6">Completed</span>
                                    @break

                                @default
                                    <span class="badge bg-danger fs-6">Cancelled</span>

                            @endswitch

                        </div>

                    </div>

                </div>

            </div>

            {{-- Customer Card --}}
            <div class="card shadow border-0 rounded-4 mb-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">
                        👤 Customer Information
                    </h5>

                    <div class="row">

                        <div class="col-md-8">

                            <h4>

                                {{ $booking->customer->name }}

                            </h4>

                            <p class="mb-2">

                                {{ $booking->customer->phone }}

                            </p>

                        </div>

                        <div class="col-md-4 text-md-end">

                            <a
                                href="tel:{{ $booking->customer->phone }}"
                                class="btn-success-custom btn-lg">

                                📞 Call Customer

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Booking Details --}}
            <div class="card shadow border-0 rounded-4 mb-4">

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
                                Date
                            </th>

                            <td>
                                {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Time
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
                                Earnings
                            </th>

                            <td>

                                <span class="fs-4 fw-bold text-success">

                                    ₹{{ number_format($booking->amount,2) }}

                                </span>

                            </td>

                        </tr>

                    </table>

                </div>

            </div>

            {{-- Timeline --}}
            <div class="card shadow border-0 rounded-4 mb-4">

                <div class="card-body">

                    <h5 class="fw-bold mb-4">

                        📍 Job Progress

                    </h5>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">

                            ✅ Booking Received

                        </li>

                        <li class="list-group-item">

                            @if(in_array($booking->status,['accepted','in_progress','completed']))

                                ✅ Booking Accepted

                            @else

                                ⏳ Waiting

                            @endif

                        </li>

                        <li class="list-group-item">

                            @if(in_array($booking->status,['in_progress','completed']))

                                ✅ Work Started

                            @else

                                ⏳ Not Started

                            @endif

                        </li>

                        <li class="list-group-item">

                            @if($booking->status=='completed')

                                ✅ Job Completed

                            @elseif($booking->status=='cancelled')

                                ❌ Cancelled

                            @else

                                ⏳ Pending

                            @endif

                        </li>

                    </ul>

                </div>

            </div>

            {{-- Action Buttons --}}
            <div class="card shadow border-0 rounded-4">

                <div class="card-body text-center">

                    @if($booking->status=='pending')

                        <form action="{{ route('worker.booking.accept',$booking) }}" method="POST" class="d-inline">

                            @csrf
                            @method('PATCH')

                            <button class="btn-success-custom btn-lg">

                                ✅ Accept Booking

                            </button>

                        </form>

                        <form action="{{ route('worker.booking.reject',$booking) }}" method="POST" class="d-inline">

                            @csrf
                            @method('PATCH')

                            <button class="btn-danger-custom btn-lg">

                                ❌ Reject

                            </button>

                        </form>

                    @elseif($booking->status=='accepted')

                        <form action="{{ route('worker.booking.start',$booking) }}" method="POST">

                            @csrf
                            @method('PATCH')

                            <button class="btn-primary-custom btn-lg">

                                ▶️ Start Work

                            </button>

                        </form>

                    @elseif($booking->status=='in_progress')

                        <form action="{{ route('worker.booking.complete',$booking) }}" method="POST">

                            @csrf
                            @method('PATCH')

                            <button class="btn-primary-custom btn-lg">

                                ✔ Complete Job

                            </button>

                        </form>

                    @elseif($booking->status=='completed')

                        <button class="btn-success-custom btn-lg" disabled>

                            🎉 Job Completed

                        </button>

                    @else

                        <button class="btn btn-secondary btn-lg" disabled>

                            Booking Cancelled

                        </button>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

