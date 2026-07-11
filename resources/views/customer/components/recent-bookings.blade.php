{{-- RECENT BOOKINGS --}}

<section class="py-5 bg-light">

    <div class="container">


        <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">


            <div>

                <span class="badge bg-primary rounded-pill px-4 py-2 mb-3">

                    <i class="fas fa-clock-rotate-left me-2"></i>

                    BOOKING HISTORY

                </span>


                <h2 class="fw-bold mb-2">

                    Recent Bookings

                </h2>


                <p class="text-muted mb-0">

                    Track your latest service requests and their current status.

                </p>


            </div>




            <a href="{{ route('customer.bookings') }}"
               class="btn btn-outline-primary rounded-pill px-4">


                View All

                <i class="fas fa-arrow-right ms-2"></i>


            </a>


        </div>





        @forelse($recentBookings as $booking)



        <div class="card border-0 shadow-sm rounded-4 mb-4">


            <div class="card-body p-4">


                <div class="row align-items-center">



                    {{-- LEFT --}}

                    <div class="col-lg-6">


                        <div class="d-flex align-items-center">



                            <div class="rounded-circle bg-primary bg-opacity-10 
                                        d-flex align-items-center justify-content-center
                                        me-4 p-4">


                                <i class="fas fa-tools fa-2x text-primary"></i>


                            </div>





                            <div>


                                <h5 class="fw-bold mb-2">

                                    {{ $booking->service->title }}

                                </h5>




                                <p class="text-muted mb-1">


                                    <i class="fas fa-user me-2"></i>


                                    {{ $booking->worker->name }}


                                </p>




                                <small class="text-secondary">


                                    <i class="fas fa-calendar me-2"></i>


                                    {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}


                                </small>


                            </div>


                        </div>


                    </div>





                    {{-- MIDDLE --}}

                    <div class="col-lg-3 text-center mt-4 mt-lg-0">


                        @switch($booking->status)


                            @case('completed')

                                <span class="badge bg-success rounded-pill px-4 py-2">

                                    <i class="fas fa-circle-check me-2"></i>

                                    Completed

                                </span>

                            @break



                            @case('accepted')

                                <span class="badge bg-primary rounded-pill px-4 py-2">

                                    <i class="fas fa-handshake me-2"></i>

                                    Accepted

                                </span>

                            @break



                            @case('pending')

                                <span class="badge bg-warning text-dark rounded-pill px-4 py-2">

                                    <i class="fas fa-clock me-2"></i>

                                    Pending

                                </span>

                            @break



                            @case('cancelled')

                                <span class="badge bg-danger rounded-pill px-4 py-2">

                                    <i class="fas fa-xmark me-2"></i>

                                    Cancelled

                                </span>

                            @break



                            @default

                                <span class="badge bg-secondary rounded-pill px-4 py-2">

                                    {{ ucfirst($booking->status) }}

                                </span>


                        @endswitch


                    </div>





                    {{-- RIGHT --}}

                    <div class="col-lg-3 text-lg-end text-center mt-4 mt-lg-0">


                        <a href="{{ route('booking.show',$booking->id) }}"
                           class="btn btn-primary rounded-pill px-4">


                            <i class="fas fa-eye me-2"></i>


                            View Details


                        </a>


                    </div>



                </div>


            </div>


        </div>



        @empty




        <div class="card border-0 shadow rounded-4">


            <div class="card-body text-center py-5">


                <i class="far fa-calendar-xmark fa-5x text-secondary mb-4"></i>


                <h3 class="fw-bold">

                    No Bookings Yet

                </h3>



                <p class="text-muted mb-4">

                    Start by booking a trusted professional near you.

                </p>




                <a href="{{ route('home') }}"
                   class="btn btn-primary rounded-pill px-5">


                    Browse Services


                </a>


            </div>


        </div>



        @endforelse



    </div>


</section>