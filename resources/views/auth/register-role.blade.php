@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <span class="badge bg-primary px-3 py-2 rounded-pill mb-3">
            Welcome to Kaarigar
        </span>

        <h1 class="fw-bold display-5">
            Choose Your Account Type
        </h1>

        <p class="text-muted fs-5">
            Join India's trusted platform for skilled professionals and customers.
        </p>

    </div>

    <div class="row justify-content-center g-4">

        <!-- Worker -->

        <div class="col-lg-5">

            <div class="card border-0 shadow-lg rounded-4 h-100">

                <div class="card-body d-flex flex-column text-center p-5">

                    <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex justify-content-center align-items-center mx-auto mb-4"
                         style="width:110px;height:110px;">

                        <i class="fas fa-user-hard-hat text-primary fa-3x"></i>

                    </div>

                    <h3 class="fw-bold">

                        Register as Worker

                    </h3>

                    <p class="text-muted my-3">

                        Offer your professional services, receive bookings,
                        grow your business and connect with customers near you.

                    </p>

                    <ul class="list-unstyled text-start mb-4">

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Get verified
                        </li>

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Receive booking requests
                        </li>

                        <li>
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Earn more every day
                        </li>

                    </ul>

                    <a href="{{ route('register', ['role' => 'worker']) }}"
                       class="btn btn-primary btn-lg rounded-pill w-100 mt-auto">

                        <i class="fas fa-arrow-right me-2"></i>

                        Continue as Worker

                    </a>

                </div>

            </div>

        </div>

        <!-- Customer -->

        <div class="col-lg-5">

            <div class="card border-0 shadow-lg rounded-4 h-100">

                <div class="card-body d-flex flex-column text-center p-5">

                    <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex justify-content-center align-items-center mx-auto mb-4"
                         style="width:110px;height:110px;">

                        <i class="fas fa-user text-success fa-3x"></i>

                    </div>

                    <h3 class="fw-bold">

                        Register as Customer

                    </h3>

                    <p class="text-muted my-3">

                        Find trusted professionals, compare workers,
                        book services and manage everything in one place.

                    </p>

                    <ul class="list-unstyled text-start mb-4">

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Book verified workers
                        </li>

                        <li class="mb-3">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Secure service requests
                        </li>

                        <li>
                            <i class="fas fa-check-circle text-success me-2"></i>
                            Rate & review workers
                        </li>

                    </ul>

                    <a href="{{ route('register', ['role' => 'customer']) }}"
                       class="btn btn-success btn-lg rounded-pill w-100 mt-auto">

                        <i class="fas fa-arrow-right me-2"></i>

                        Continue as Customer

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection