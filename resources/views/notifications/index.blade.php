@extends('layouts.app')

@section('content')

<div class="container py-5">


    <!-- Header -->

    <div class="text-center mb-5">


        <span class="section-tag">

            UPDATES

        </span>


        <h2 class="section-title mt-3">

            <i class="fa-solid fa-bell text-warning me-2"></i>

            Notifications

        </h2>


        <p class="section-subtitle">

            Stay updated with your bookings and service activities.

        </p>


    </div>





    <div class="row justify-content-center">


        <div class="col-lg-8">



        @forelse($notifications as $notification)



            <div class="card border-0 shadow-lg rounded-4 mb-4 overflow-hidden">


                <div class="card-body p-4">


                    <div class="d-flex justify-content-between align-items-start">


                        <div class="d-flex">


                            <div class="notification-icon me-3">


                                <i class="fa-solid fa-bell"></i>


                            </div>



                            <div>


                                <h5 class="fw-bold mb-2">


                                    {{ $notification->data['message'] }}


                                </h5>



                                <p class="text-muted mb-2">


                                    <i class="fa-solid fa-receipt me-2"></i>

                                    Booking No:

                                    <strong>

                                        {{ $notification->data['booking_number'] }}

                                    </strong>


                                </p>




                                <p class="mb-0">


                                    <i class="fa-solid fa-circle-info me-2"></i>

                                    Status:


                                    @if($notification->data['status'] == 'completed')


                                        <span class="badge bg-success rounded-pill">

                                            Completed

                                        </span>



                                    @elseif($notification->data['status'] == 'accepted')


                                        <span class="badge bg-primary rounded-pill">

                                            Accepted

                                        </span>



                                    @elseif($notification->data['status'] == 'pending')


                                        <span class="badge bg-warning text-dark rounded-pill">

                                            Pending

                                        </span>



                                    @else


                                        <span class="badge bg-danger rounded-pill">

                                            {{ ucfirst($notification->data['status']) }}

                                        </span>



                                    @endif


                                </p>


                            </div>


                        </div>



                        @if(!$notification->read_at)


                            <span class="badge bg-danger rounded-pill">

                                New

                            </span>


                        @endif



                    </div>





                    @if(!$notification->read_at)


                    <div class="mt-4">


                        <form
                            method="POST"
                            action="{{ route('notifications.read',$notification->id) }}">


                            @csrf

                            @method('PATCH')



                            <button
                                class="btn btn-primary rounded-pill px-4">


                                <i class="fa-solid fa-check me-2"></i>

                                Mark as Read


                            </button>


                        </form>


                    </div>


                    @endif




                </div>


            </div>




        @empty



            <div class="card border-0 shadow-lg rounded-4 p-5 text-center">


                <div class="mb-3">


                    <i class="fa-regular fa-bell-slash fa-4x text-muted"></i>


                </div>


                <h4 class="fw-bold">

                    No Notifications Yet

                </h4>


                <p class="text-muted">

                    Your booking updates and important alerts will appear here.

                </p>


            </div>



        @endforelse



        </div>


    </div>



</div>


@endsection