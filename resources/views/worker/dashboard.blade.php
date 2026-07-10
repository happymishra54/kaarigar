@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2>Worker Dashboard</h2>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 bg-primary text-white h-100">
                <div class="card-body text-center py-5">
                    <i class="fas fa-tools fa-3x mb-3"></i>
                    <h1 class="fw-bold">{{ $totalServices }}</h1>
                    <h5 class="mb-0">Total Services</h5>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 bg-warning text-dark h-100">
                <div class="card-body text-center py-5">
                    <i class="fas fa-calendar-check fa-3x mb-3"></i>
                    <h1 class="fw-bold">{{ $pendingBookings }}</h1>
                    <h5 class="mb-0">Pending Bookings</h5>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 bg-success text-white h-100">
                <div class="card-body text-center py-5">
                    <i class="fas fa-circle-check fa-3x mb-3"></i>
                    <h1 class="fw-bold">{{ $completedBookings }}</h1>
                    <h5 class="mb-0">Completed Jobs</h5>
                </div>
            </div>
        </div>
    
    </div>

    <hr class="my-5">

    <div class="row">

        <div class="col-md-4 mb-3">
            <a href="{{ route('services.index') }}"
               class="btn btn-success w-100 py-3 fw-bold rounded-4 shadow">
                🛠️ My Services
            </a>
        </div>
    
        <div class="col-md-4 mb-3">
            <a href="{{ route('worker.bookings') }}"
               class="btn btn-warning w-100 py-3 fw-bold rounded-4 shadow text-dark">
                📅 My Bookings
            </a>
        </div>
    
        <div class="col-md-4 mb-3">
            <a href="{{ route('worker.profile') }}"
               class="btn btn-info w-100 py-3 fw-bold rounded-4 shadow text-white">
                👤 My Profile
            </a>
        </div>
    
    </div>

    </div>

</div>

@endsection