@extends('layouts.app')

@section('content')

<div class="container py-5">


    {{-- Header --}}

    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap">


        <div>

            <h2 class="fw-bold mb-2">

                Welcome, {{ auth()->user()->name }} 👋

            </h2>


            <p class="text-muted mb-0">

                Manage your services and bookings from here.

            </p>


        </div>



        <div class="mt-3 mt-md-0">


            @if(auth()->user()->workerProfile?->is_verified)

                <span class="badge bg-success rounded-pill px-4 py-2 fs-6">

                    <i class="fa-solid fa-circle-check me-2"></i>

                    Verified Worker

                </span>


            @else


                <span class="badge bg-warning text-dark rounded-pill px-4 py-2 fs-6">

                    <i class="fa-solid fa-clock me-2"></i>

                    Verification Pending

                </span>


            @endif


        </div>


    </div>





    {{-- Statistics --}}


    <div class="row g-4">


        <div class="col-lg-3 col-md-6">


            <div class="card border-0 shadow-lg rounded-4 bg-primary text-white h-100">


                <div class="card-body text-center py-5">


                    <i class="fa-solid fa-screwdriver-wrench fa-3x mb-3"></i>


                    <h1 class="fw-bold">

                        {{ $totalServices }}

                    </h1>


                    <h5>

                        Total Services

                    </h5>


                </div>


            </div>


        </div>





        <div class="col-lg-3 col-md-6">


            <div class="card border-0 shadow-lg rounded-4 bg-warning text-dark h-100">


                <div class="card-body text-center py-5">


                    <i class="fa-solid fa-calendar-check fa-3x mb-3"></i>


                    <h1 class="fw-bold">

                        {{ $pendingBookings }}

                    </h1>


                    <h5>

                        Pending Bookings

                    </h5>


                </div>


            </div>


        </div>





        <div class="col-lg-3 col-md-6">


            <div class="card border-0 shadow-lg rounded-4 bg-success text-white h-100">


                <div class="card-body text-center py-5">


                    <i class="fa-solid fa-circle-check fa-3x mb-3"></i>


                    <h1 class="fw-bold">

                        {{ $completedBookings }}

                    </h1>


                    <h5>

                        Completed Jobs

                    </h5>


                </div>


            </div>


        </div>





        <div class="col-lg-3 col-md-6">


            <div class="card border-0 shadow-lg rounded-4 bg-dark text-white h-100">


                <div class="card-body text-center py-5">


                    <i class="fa-solid fa-indian-rupee-sign fa-3x mb-3"></i>


                    <h1 class="fw-bold">


                        ₹{{ number_format($totalEarnings ?? 0) }}


                    </h1>


                    <h5>

                        Total Earnings

                    </h5>


                </div>


            </div>


        </div>



    </div>





    <hr class="my-5">





    {{-- Quick Actions --}}


    <h3 class="fw-bold mb-4">

        Quick Actions

    </h3>



    <div class="row g-4">



        <div class="col-md-4">


            <a
                href="{{ route('services.index') }}"
                class="text-decoration-none">


                <div class="card border-0 shadow rounded-4 text-center p-4 h-100">


                    <i class="fa-solid fa-tools fa-3x text-primary mb-3"></i>


                    <h5 class="fw-bold">

                        My Services

                    </h5>


                    <p class="text-muted mb-0">

                        Add and manage your services

                    </p>


                </div>


            </a>


        </div>






        <div class="col-md-4">


            <a
                href="{{ route('worker.bookings') }}"
                class="text-decoration-none">


                <div class="card border-0 shadow rounded-4 text-center p-4 h-100">


                    <i class="fa-solid fa-calendar-days fa-3x text-warning mb-3"></i>


                    <h5 class="fw-bold">

                        My Bookings

                    </h5>


                    <p class="text-muted mb-0">

                        Accept and complete jobs

                    </p>


                </div>


            </a>


        </div>






        <div class="col-md-4">


            <a
                href="{{ route('worker.profile') }}"
                class="text-decoration-none">


                <div class="card border-0 shadow rounded-4 text-center p-4 h-100">


                    <i class="fa-solid fa-user fa-3x text-success mb-3"></i>


                    <h5 class="fw-bold">

                        My Profile

                    </h5>


                    <p class="text-muted mb-0">

                        Update your details

                    </p>


                </div>


            </a>


        </div>




    </div>



</div>


@endsection