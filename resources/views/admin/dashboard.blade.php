@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h1 class="fw-bold">
            <i class="fas fa-user-shield text-primary"></i>
            Admin Dashboard
        </h1>
        <p class="text-muted">
            Manage your Kaarigar platform from one place.
        </p>
    </div>

    <!-- Statistics -->
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 bg-primary text-white">
                <div class="card-body text-center py-4">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h2 class="fw-bold">{{ $usersCount }}</h2>
                    <h5>Total Users</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 bg-success text-white">
                <div class="card-body text-center py-4">
                    <i class="fas fa-user-hard-hat fa-3x mb-3"></i>
                    <h2 class="fw-bold">{{ $workersCount }}</h2>
                    <h5>Workers</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 bg-info text-white">
                <div class="card-body text-center py-4">
                    <i class="fas fa-user fa-3x mb-3"></i>
                    <h2 class="fw-bold">{{ $customers }}</h2>
                    <h5>Customers</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 bg-warning text-dark">
                <div class="card-body text-center py-4">
                    <i class="fas fa-layer-group fa-3x mb-3"></i>
                    <h2 class="fw-bold">{{ $categories }}</h2>
                    <h5>Categories</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 bg-secondary text-white">
                <div class="card-body text-center py-4">
                    <i class="fas fa-tools fa-3x mb-3"></i>
                    <h2 class="fw-bold">{{ $services }}</h2>
                    <h5>Services</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 h-100 bg-danger text-white">
                <div class="card-body text-center py-4">
                    <i class="fas fa-calendar-check fa-3x mb-3"></i>
                    <h2 class="fw-bold">{{ $bookings }}</h2>
                    <h5>Bookings</h5>
                </div>
            </div>
        </div>

    </div>

    <!-- Quick Actions -->
    <div class="mt-5">

        <h3 class="fw-bold mb-4">
            <i class="fas fa-bolt text-warning"></i>
            Quick Actions
        </h3>

        <div class="row g-3">

            <div class="col-md-4">
                <a href="{{ route('admin.users') }}" class="btn btn-primary w-100 py-3">
                    <i class="fas fa-users me-2"></i>
                    Manage Users
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.workers.index') }}" class="btn btn-secondary w-100 py-3">
                    <i class="fas fa-user-hard-hat me-2"></i>
                    Manage Workers
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('categories.index') }}" class="btn btn-success w-100 py-3">
                    <i class="fas fa-layer-group me-2"></i>
                    Categories
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.bookings') }}" class="btn btn-warning w-100 py-3">
                    <i class="fas fa-calendar-check me-2"></i>
                    Bookings
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.worker.verifications') }}" class="btn btn-danger w-100 py-3">
                    <i class="fas fa-circle-check me-2"></i>
                    Verify Workers
                </a>
            </div>

            <div class="col-md-4">
                <a href="{{ route('admin.workers.create') }}" class="btn btn-info w-100 py-3 text-white">
                    <i class="fas fa-user-plus me-2"></i>
                    Add Worker
                </a>
            </div>

        </div>

    </div>

</div>

@endsection