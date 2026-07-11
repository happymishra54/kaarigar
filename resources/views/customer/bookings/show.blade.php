@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-xl-9">


            {{-- BOOKING HEADER --}}
            <div class="card border-0 shadow rounded-4 overflow-hidden mb-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                        <div>

                            <small class="text-muted">
                                Booking ID
                            </small>

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
                                    <span class="badge bg-warning text-dark rounded-pill px-4 py-2">
                                        <i class="fa-solid fa-hourglass-half me-1"></i>
                                        Pending
                                    </span>
                                @break


                                @case('accepted')
                                    <span class="badge bg-success rounded-pill px-4 py-2">
                                        <i class="fa-solid fa-check me-1"></i>
                                        Accepted
                                    </span>
                                @break


                                @case('in_progress')
                                    <span class="badge bg-info text-dark rounded-pill px-4 py-2">
                                        <i class="fa-solid fa-screwdriver-wrench me-1"></i>
                                        Work Started
                                    </span>
                                @break


                                @case('completed')
                                    <span class="badge bg-primary rounded-pill px-4 py-2">
                                        <i class="fa-solid fa-circle-check me-1"></i>
                                        Completed
                                    </span>
                                @break


                                @default
                                    <span class="badge bg-danger rounded-pill px-4 py-2">
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


                            @if($booking->worker->profile_image)

                                <img
                                src="{{ asset('storage/'.$booking->worker->profile_image) }}"
                                width="85"
                                height="85"
                                class="rounded-circle">

                            @else

                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                     style="width:85px;height:85px">

                                    <i class="fa-solid fa-user fs-2"></i>

                                </div>

                            @endif



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

                            <a href="tel:{{ $booking->worker->phone }}"
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


                        @foreach([
                            'Service' => $booking->service->title,
                            'Booking Date' => \Carbon\Carbon::parse($booking->booking_date)->format('d M Y'),
                            'Time' => \Carbon\Carbon::parse($booking->booking_time)->format('h:i A'),
                            'Amount' => '₹'.number_format($booking->amount,2)
                        ] as $label=>$value)

                        <div class="col-md-6">

                            <div class="p-3 rounded-4 bg-light">

                                <small class="text-muted">
                                    {{ $label }}
                                </small>

                                <h5 class="mb-0 fw-bold">
                                    {{ $value }}
                                </h5>

                            </div>

                        </div>

                        @endforeach



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





            {{-- BOOTSTRAP TIMELINE --}}
            <div class="card border-0 shadow rounded-4 mb-4">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">

                        <i class="fa-solid fa-route text-primary me-2"></i>

                        Booking Progress

                    </h4>



                    <div class="list-group">


                        @foreach([
                            ['Booking Created','Your request has been submitted.',true],
                            ['Worker Accepted','Worker confirmed your booking.',in_array($booking->status,['accepted','in_progress','completed'])],
                            ['Work Started','Service is in progress.',in_array($booking->status,['in_progress','completed'])],
                            ['Completed','Job finished successfully.',$booking->status=='completed']
                        ] as $step)


                        <div class="list-group-item border-0 d-flex gap-3">

                            <i class="fa-solid fa-circle-check 
                            {{ $step[2] ? 'text-success':'text-muted' }} fs-4"></i>


                            <div>

                                <h6 class="mb-1 fw-bold">
                                    {{ $step[0] }}
                                </h6>

                                <p class="text-muted mb-0">
                                    {{ $step[1] }}
                                </p>

                            </div>

                        </div>


                        @endforeach


                    </div>


                </div>

            </div>





            {{-- ACTIONS --}}
            <div class="text-center">


                @if($booking->status=='pending')

                    <form action="{{ route('booking.cancel',$booking->id) }}"
                          method="POST">

                        @csrf
                        @method('PATCH')


                        <button class="btn btn-danger rounded-pill px-5 py-3">

                            <i class="fa-solid fa-xmark me-2"></i>

                            Cancel Booking

                        </button>


                    </form>


                @elseif($booking->status=='completed' && !$booking->review)


                    <a href="{{ route('review.create',$booking->id) }}"
                       class="btn btn-primary rounded-pill px-5 py-3">

                        ⭐ Leave Review

                    </a>


                @else


                    <button class="btn btn-secondary rounded-pill px-5 py-3"
                            disabled>

                        No Action Available

                    </button>


                @endif


            </div>


        </div>

    </div>

</div>

@endsection