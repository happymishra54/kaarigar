@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-xl-9">


            {{-- BOOKING HEADER --}}
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">


                        <div>

                            <span class="text-muted small">
                                Booking ID
                            </span>

                            <h2 class="fw-bold mb-1">

                                #{{ $booking->booking_number }}

                            </h2>

                            <p class="text-muted mb-0">

                                <i class="fa-regular fa-clock me-1"></i>

                                {{ $booking->created_at->format('d M Y, h:i A') }}

                            </p>

                        </div>



                        <div>

                            @switch($booking->status)

                                @case('pending')

                                    <span class="badge bg-warning text-dark rounded-pill px-4 py-2 fs-6">

                                        <i class="fa-solid fa-hourglass-half me-1"></i>
                                        Pending

                                    </span>

                                @break


                                @case('accepted')

                                    <span class="badge bg-success rounded-pill px-4 py-2 fs-6">

                                        <i class="fa-solid fa-check me-1"></i>
                                        Accepted

                                    </span>

                                @break


                                @case('in_progress')

                                    <span class="badge bg-info text-dark rounded-pill px-4 py-2 fs-6">

                                        <i class="fa-solid fa-screwdriver-wrench me-1"></i>
                                        Work Started

                                    </span>

                                @break


                                @case('completed')

                                    <span class="badge bg-primary rounded-pill px-4 py-2 fs-6">

                                        <i class="fa-solid fa-circle-check me-1"></i>
                                        Completed

                                    </span>

                                @break


                                @default

                                    <span class="badge bg-danger rounded-pill px-4 py-2 fs-6">

                                        Cancelled

                                    </span>

                            @endswitch

                        </div>


                    </div>

                </div>

            </div>




            {{-- WORKER DETAILS --}}

            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body p-4">


                    <h4 class="fw-bold mb-4">

                        <i class="fa-solid fa-user-gear text-primary me-2"></i>

                        Worker Details

                    </h4>



                    <div class="row align-items-center">


                        <div class="col-md-8 d-flex align-items-center gap-3">


                            <div>

                                @if($booking->worker->profile_image)

                                    <img
                                    src="{{ asset('storage/'.$booking->worker->profile_image) }}"
                                    width="85"
                                    height="85"
                                    class="rounded-circle object-fit-cover">

                                @else

                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                    style="width:85px;height:85px;font-size:35px">

                                        <i class="fa-solid fa-user"></i>

                                    </div>

                                @endif


                            </div>



                            <div>

                                <h4 class="mb-1">

                                    {{ $booking->worker->name }}

                                </h4>


                                <p class="text-muted mb-1">

                                    <i class="fa-solid fa-briefcase me-1"></i>

                                    Service Professional

                                </p>


                                <p class="mb-0">

                                    <i class="fa-solid fa-phone text-success me-1"></i>

                                    {{ $booking->worker->phone ?? 'No number available' }}

                                </p>


                            </div>


                        </div>



                        <div class="col-md-4 text-md-end mt-3 mt-md-0">


                            @if($booking->worker->phone)

                            <a
                            href="tel:{{ $booking->worker->phone }}"
                            class="btn btn-success rounded-pill px-4">

                                <i class="fa-solid fa-phone me-2"></i>

                                Call Worker

                            </a>

                            @endif


                        </div>


                    </div>


                </div>

            </div>






            {{-- BOOKING DETAILS --}}

            <div class="card border-0 shadow rounded-4 mb-4">


                <div class="card-body p-4">


                    <h4 class="fw-bold mb-4">

                        <i class="fa-solid fa-file-lines text-primary me-2"></i>

                        Booking Details

                    </h4>



                    <div class="row g-3">


                        <div class="col-md-6">

                            <div class="p-3 rounded-4 bg-light">

                                <small class="text-muted">
                                    Service
                                </small>

                                <h5 class="mb-0 fw-bold">

                                    {{ $booking->service->title }}

                                </h5>

                            </div>

                        </div>



                        <div class="col-md-6">

                            <div class="p-3 rounded-4 bg-light">

                                <small class="text-muted">
                                    Booking Date
                                </small>

                                <h5 class="mb-0 fw-bold">

                                    {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}

                                </h5>

                            </div>

                        </div>



                        <div class="col-md-6">

                            <div class="p-3 rounded-4 bg-light">

                                <small class="text-muted">
                                    Time
                                </small>

                                <h5 class="mb-0 fw-bold">

                                    {{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}

                                </h5>

                            </div>

                        </div>



                        <div class="col-md-6">

                            <div class="p-3 rounded-4 bg-light">

                                <small class="text-muted">
                                    Amount
                                </small>

                                <h4 class="mb-0 text-success fw-bold">

                                    ₹{{ number_format($booking->amount,2) }}

                                </h4>

                            </div>

                        </div>



                        <div class="col-12">

                            <div class="p-3 rounded-4 bg-light">

                                <small class="text-muted">
                                    Address
                                </small>

                                <p class="mb-0 fw-semibold">

                                    <i class="fa-solid fa-location-dot text-danger me-2"></i>

                                    {{ $booking->address }}

                                </p>

                            </div>

                        </div>


                    </div>


                </div>


            </div>






            {{-- TIMELINE --}}

            <div class="card border-0 shadow rounded-4 mb-4">


                <div class="card-body p-4">


                    <h4 class="fw-bold mb-4">

                        <i class="fa-solid fa-route text-primary me-2"></i>

                        Booking Progress

                    </h4>



                    <div class="timeline">


                        <div class="timeline-item active">

                            <i class="fa-solid fa-check"></i>

                            <div>

                                <h6>
                                    Booking Created
                                </h6>

                                <p>
                                    Your request has been submitted.
                                </p>

                            </div>

                        </div>



                        <div class="timeline-item 
                        {{ in_array($booking->status,['accepted','in_progress','completed']) ? 'active':'' }}">

                            <i class="fa-solid fa-user-check"></i>

                            <div>

                                <h6>
                                    Worker Accepted
                                </h6>

                                <p>
                                    Worker confirmed your booking.
                                </p>

                            </div>

                        </div>



                        <div class="timeline-item 
                        {{ in_array($booking->status,['in_progress','completed']) ? 'active':'' }}">

                            <i class="fa-solid fa-toolbox"></i>

                            <div>

                                <h6>
                                    Work Started
                                </h6>

                                <p>
                                    Service is in progress.
                                </p>

                            </div>

                        </div>



                        <div class="timeline-item 
                        {{ $booking->status=='completed' ? 'active':'' }}">

                            <i class="fa-solid fa-circle-check"></i>

                            <div>

                                <h6>
                                    Completed
                                </h6>

                                <p>
                                    Job finished successfully.
                                </p>

                            </div>

                        </div>


                    </div>


                </div>

            </div>






            {{-- ACTIONS --}}

            <div class="text-center">


                @if($booking->status=='pending')


                    <form
                    action="{{ route('booking.cancel',$booking->id) }}"
                    method="POST">

                        @csrf
                        @method('PATCH')


                        <button
                        class="btn btn-danger rounded-pill px-5 py-3">

                            <i class="fa-solid fa-xmark me-2"></i>

                            Cancel Booking

                        </button>


                    </form>



                @elseif($booking->status=='completed' && !$booking->review)


                    <a
                    href="{{ route('review.create',$booking->id) }}"
                    class="btn btn-primary rounded-pill px-5 py-3">


                        ⭐ Leave Review


                    </a>



                @else


                    <button
                    class="btn btn-secondary rounded-pill px-5 py-3"
                    disabled>

                        No Action Available

                    </button>


                @endif


            </div>


        </div>

    </div>

</div>


@endsection