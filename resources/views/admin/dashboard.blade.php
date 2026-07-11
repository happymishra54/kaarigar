@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">

        <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
            ADMIN PANEL
        </span>

        <h1 class="display-5 fw-bold mt-3">

            <i class="fas fa-user-shield text-primary me-2"></i>
            Admin Dashboard

        </h1>

        <p class="text-muted">

            Monitor and manage your Kaarigar platform from one place.

        </p>

    </div>

    <!-- Statistics -->

    <div class="row g-4">

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center p-4">

                    <div class="display-5 text-primary mb-3">
                        <i class="fas fa-users"></i>
                    </div>

                    <h2 class="fw-bold">{{ $usersCount }}</h2>

                    <p class="text-muted mb-0">
                        Total Users
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center p-4">

                    <div class="display-5 text-success mb-3">
                        <i class="fas fa-user-hard-hat"></i>
                    </div>

                    <h2 class="fw-bold">{{ $workersCount }}</h2>

                    <p class="text-muted mb-0">
                        Workers
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center p-4">

                    <div class="display-5 text-info mb-3">
                        <i class="fas fa-user"></i>
                    </div>

                    <h2 class="fw-bold">{{ $customers }}</h2>

                    <p class="text-muted mb-0">
                        Customers
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center p-4">

                    <div class="display-5 text-warning mb-3">
                        <i class="fas fa-layer-group"></i>
                    </div>

                    <h2 class="fw-bold">{{ $categories }}</h2>

                    <p class="text-muted mb-0">
                        Categories
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center p-4">

                    <div class="display-5 text-secondary mb-3">
                        <i class="fas fa-tools"></i>
                    </div>

                    <h2 class="fw-bold">{{ $services }}</h2>

                    <p class="text-muted mb-0">
                        Services
                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-4 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body text-center p-4">

                    <div class="display-5 text-danger mb-3">
                        <i class="fas fa-calendar-check"></i>
                    </div>

                    <h2 class="fw-bold">{{ $bookings }}</h2>

                    <p class="text-muted mb-0">
                        Bookings
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Quick Actions -->

    <div class="mt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold mb-0">

                <i class="fas fa-bolt text-warning me-2"></i>

                Quick Actions

            </h3>

        </div>

        <div class="row g-3">

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('admin.users') }}" class="btn btn-primary w-100 py-3">
                    <i class="fas fa-users me-2"></i>
                    Manage Users
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('admin.workers.index') }}" class="btn btn-outline-primary w-100 py-3">
                    <i class="fas fa-user-hard-hat me-2"></i>
                    Manage Workers
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('categories.index') }}" class="btn btn-success w-100 py-3">
                    <i class="fas fa-layer-group me-2"></i>
                    Categories
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('admin.bookings') }}" class="btn btn-warning w-100 py-3">
                    <i class="fas fa-calendar-check me-2"></i>
                    Bookings
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('admin.worker.verifications') }}" class="btn btn-danger w-100 py-3">
                    <i class="fas fa-circle-check me-2"></i>
                    Verify Workers
                </a>
            </div>

            <div class="col-lg-4 col-md-6">
                <a href="{{ route('admin.workers.create') }}" class="btn btn-dark w-100 py-3">
                    <i class="fas fa-user-plus me-2"></i>
                    Add Worker
                </a>
            </div>

        </div>

    </div>

</div>

@endsection