@extends('layouts.app')

@section('content')

<div class="container py-5">


    {{-- HEADER --}}

    <div class="text-center mb-5">

        <span class="section-tag">
            WORK MANAGEMENT
        </span>


        <h2 class="section-title mt-3">

            My Bookings

        </h2>


        <p class="section-subtitle">

            Manage customer requests and update job status.

        </p>


    </div>




    @if(session('success'))

        <div class="alert alert-success rounded-4 shadow-sm">

            <i class="fas fa-circle-check me-2"></i>

            {{ session('success') }}

        </div>

    @endif






    @forelse($bookings as $booking)



    <div class="card border-0 shadow-lg rounded-4 mb-4">


        <div class="card-body p-4">


            <div class="row align-items-center">


                {{-- CUSTOMER --}}

                <div class="col-lg-4">


                    <h5 class="fw-bold mb-3">

                        <i class="fas fa-user text-primary me-2"></i>

                        {{ $booking->customer->name }}

                    </h5>



                    <p class="text-muted mb-2">

                        <i class="fas fa-tools me-2"></i>

                        {{ $booking->service->title }}

                    </p>



                    <p class="text-muted mb-2">

                        <i class="fas fa-calendar me-2"></i>

                        {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}

                    </p>




                    @if($booking->customer->phone)


                    <a href="tel:{{ $booking->customer->phone }}"
                       class="btn btn-success rounded-pill btn-sm">


                        <i class="fas fa-phone me-1"></i>

                        Call Customer


                    </a>


                    @else


                    <span class="text-danger">

                        No phone number

                    </span>


                    @endif



                </div>








                {{-- STATUS --}}

                <div class="col-lg-3 text-center my-4 my-lg-0">


                    @switch($booking->status)


                        @case('pending')

                            <span class="badge bg-warning text-dark rounded-pill px-4 py-2">

                                <i class="fas fa-clock me-1"></i>

                                Pending

                            </span>

                        @break



                        @case('accepted')

                            <span class="badge bg-success rounded-pill px-4 py-2">

                                <i class="fas fa-check me-1"></i>

                                Accepted

                            </span>

                        @break



                        @case('in_progress')

                            <span class="badge bg-info text-dark rounded-pill px-4 py-2">

                                <i class="fas fa-play me-1"></i>

                                In Progress

                            </span>

                        @break



                        @case('completed')

                            <span class="badge bg-primary rounded-pill px-4 py-2">

                                <i class="fas fa-check-double me-1"></i>

                                Completed

                            </span>

                        @break



                        @default

                            <span class="badge bg-danger rounded-pill px-4 py-2">

                                Cancelled

                            </span>


                    @endswitch



                    <p class="small text-muted mt-3 mb-0">

                        Booking No:

                        <strong>

                            {{ $booking->booking_number }}

                        </strong>

                    </p>


                </div>








                {{-- ACTIONS --}}


                <div class="col-lg-5 text-lg-end">


                    @if($booking->status == 'pending')


                        <form
                            action="{{ route('worker.booking.accept',$booking->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('PATCH')


                            <button class="btn btn-success rounded-pill px-4 mb-2">


                                <i class="fas fa-check me-1"></i>

                                Accept


                            </button>


                        </form>





                        <form
                            action="{{ route('worker.booking.reject',$booking->id) }}"
                            method="POST"
                            class="d-inline">


                            @csrf
                            @method('PATCH')


                            <button class="btn btn-danger rounded-pill px-4 mb-2">


                                <i class="fas fa-times me-1"></i>

                                Reject


                            </button>


                        </form>




                    @elseif($booking->status == 'accepted')



                        <form
                            action="{{ route('worker.booking.start',$booking->id) }}"
                            method="POST">


                            @csrf
                            @method('PATCH')


                            <button class="btn btn-primary rounded-pill px-4">


                                ▶ Start Work


                            </button>


                        </form>




                    @elseif($booking->status == 'in_progress')



                        <form
                            action="{{ route('worker.booking.complete',$booking->id) }}"
                            method="POST">


                            @csrf
                            @method('PATCH')


                            <button class="btn btn-primary rounded-pill px-4">


                                ✅ Complete Job


                            </button>


                        </form>





                    @elseif($booking->status == 'completed')



                        <span class="text-success fw-bold">

                            ✔ Job Completed

                        </span>




                    @else



                        <span class="text-danger fw-bold">

                            ✖ Cancelled

                        </span>



                    @endif



                </div>



            </div>



        </div>


    </div>




    @empty



    <div class="card border-0 shadow rounded-4">


        <div class="card-body text-center py-5">


            <i class="fas fa-calendar-xmark fa-4x text-muted mb-3"></i>


            <h4 class="fw-bold">

                No Bookings Found

            </h4>


            <p class="text-muted">

                New customer requests will appear here.

            </p>


        </div>


    </div>



    @endforelse



</div>


@endsection