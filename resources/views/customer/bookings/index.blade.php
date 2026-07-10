@extends('layouts.app')

@section('content')

<div class="container py-5">


    <!-- Header -->

    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">


        <div>


            <span class="section-tag">

                HISTORY

            </span>


            <h2 class="section-title mt-3">

                <i class="fa-solid fa-calendar-check text-primary me-2"></i>

                My Bookings

            </h2>


            <p class="section-subtitle mb-0">

                Track and manage all your service requests.

            </p>


        </div>



        <a
            href="{{ url('/') }}"
            class="btn btn-primary rounded-pill px-4">


            <i class="fa-solid fa-plus me-2"></i>

            Book New Service


        </a>


    </div>





    @if(session('success'))


        <div class="alert alert-success border-0 shadow-sm rounded-4">

            <i class="fa-solid fa-circle-check me-2"></i>

            {{ session('success') }}

        </div>


    @endif





    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">


        <div class="table-responsive">


            <table class="table table-hover align-middle mb-0">


                <thead class="table-dark">


                    <tr>


                        <th>
                            Booking
                        </th>


                        <th>
                            Service
                        </th>


                        <th>
                            Worker
                        </th>


                        <th>
                            Contact
                        </th>


                        <th>
                            Date
                        </th>


                        <th>
                            Amount
                        </th>


                        <th>
                            Status
                        </th>


                        <th>
                            Action
                        </th>


                    </tr>


                </thead>



                <tbody>



                @forelse($bookings as $booking)



                    <tr>



                        <td>

                            <span class="fw-bold text-primary">

                                #{{ $booking->booking_number }}

                            </span>


                        </td>




                        <td>


                            <div class="fw-semibold">

                                {{ $booking->service->title }}

                            </div>


                        </td>




                        <td>


                            <i class="fa-solid fa-user-tie text-primary me-1"></i>

                            {{ $booking->worker->name }}


                        </td>





                        <td>


                            @if($booking->worker->phone)



                                <a
                                    href="tel:{{ $booking->worker->phone }}"
                                    class="btn btn-success btn-sm rounded-pill">


                                    <i class="fa-solid fa-phone me-1"></i>

                                    Call


                                </a>



                                <div>

                                    <small class="text-muted">

                                        {{ $booking->worker->phone }}

                                    </small>


                                </div>



                            @else


                                <span class="text-danger">

                                    No Number

                                </span>


                            @endif



                        </td>





                        <td>


                            <i class="fa-regular fa-calendar me-1"></i>


                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}


                        </td>





                        <td>


                            <span class="fw-bold">

                                ₹{{ number_format($booking->amount,2) }}

                            </span>


                        </td>





                        <td>



                            @if($booking->status == 'pending')


                                <span class="badge bg-warning text-dark rounded-pill px-3">

                                    Pending

                                </span>



                            @elseif($booking->status == 'accepted')


                                <span class="badge bg-success rounded-pill px-3">

                                    Accepted

                                </span>



                            @elseif($booking->status == 'in_progress')


                                <span class="badge bg-info text-dark rounded-pill px-3">

                                    In Progress

                                </span>



                            @elseif($booking->status == 'completed')


                                <span class="badge bg-primary rounded-pill px-3">

                                    Completed

                                </span>



                            @else


                                <span class="badge bg-danger rounded-pill px-3">

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



                                    <button
                                        class="btn btn-danger btn-sm rounded-pill"
                                        onclick="return confirm('Cancel this booking?')">


                                        <i class="fa-solid fa-xmark me-1"></i>

                                        Cancel


                                    </button>



                                </form>





                            @elseif($booking->status == 'completed' && !$booking->review)



                                <a
                                    href="{{ route('review.create',$booking->id) }}"
                                    class="btn btn-primary btn-sm rounded-pill">


                                    <i class="fa-solid fa-star me-1"></i>

                                    Review


                                </a>





                            @elseif($booking->status == 'completed' && $booking->review)



                                <span class="text-success fw-bold">


                                    <i class="fa-solid fa-circle-check me-1"></i>

                                    Reviewed


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


                        <td colspan="8">


                            <div class="text-center py-5">


                                <i class="fa-regular fa-calendar-xmark fa-3x text-muted mb-3"></i>


                                <h5 class="fw-bold">

                                    No Bookings Found

                                </h5>


                                <p class="text-muted">

                                    Book your first service and it will appear here.

                                </p>


                                <a
                                    href="{{ url('/') }}"
                                    class="btn btn-primary rounded-pill px-4">


                                    Browse Services


                                </a>


                            </div>


                        </td>


                    </tr>




                @endforelse




                </tbody>


            </table>


        </div>


    </div>



</div>


@endsection