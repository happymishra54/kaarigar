@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Header -->

    <div class="text-center mb-5">

        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
            WORKER DASHBOARD
        </span>

        <h2 class="fw-bold mt-3">

            Welcome Back 👋

        </h2>

        <p class="text-secondary">

            Manage your services, bookings and profile from one place.

        </p>

    </div>

    <div class="row g-4">

        <!-- Services -->

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body text-center p-5">

                    <div class="bg-primary text-white rounded-circle d-inline-flex justify-content-center align-items-center mb-4"
                         style="width:80px;height:80px;">

                        <i class="fa-solid fa-toolbox fs-2"></i>

                    </div>

                    <h4 class="fw-bold">

                        My Services

                    </h4>

                    <p class="text-muted mb-4">

                        Create, edit and manage all the services you offer.

                    </p>

                    <a href="{{ route('services.index') }}"
                       class="btn btn-primary rounded-pill px-4">

                        Manage Services

                    </a>

                </div>

            </div>

        </div>

        <!-- Bookings -->

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body text-center p-5">

                    <div class="bg-success text-white rounded-circle d-inline-flex justify-content-center align-items-center mb-4"
                         style="width:80px;height:80px;">

                        <i class="fa-solid fa-calendar-check fs-2"></i>

                    </div>

                    <h4 class="fw-bold">

                        My Bookings

                    </h4>

                    <p class="text-muted mb-4">

                        View upcoming jobs and manage customer bookings.

                    </p>

                    <a href="{{ route('worker.bookings') }}"
                       class="btn btn-success rounded-pill px-4">

                        View Bookings

                    </a>

                </div>

            </div>

        </div>

        <!-- Profile -->

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body text-center p-5">

                    <div class="bg-warning text-dark rounded-circle d-inline-flex justify-content-center align-items-center mb-4"
                         style="width:80px;height:80px;">

                        <i class="fa-solid fa-id-card fs-2"></i>

                    </div>

                    <h4 class="fw-bold">

                        Profile Verification

                    </h4>

                    <p class="text-muted mb-4">

                        Complete or update your profile to gain customer trust.

                    </p>

                    <a href="{{ route('worker.profile.create') }}"
                       class="btn btn-warning rounded-pill px-4">

                        Update Profile

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection