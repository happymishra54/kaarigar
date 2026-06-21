@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2>Worker Dashboard</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h3>{{ $totalServices }}</h3>
                    <p>Total Services</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h3>{{ $pendingBookings }}</h3>
                    <p>Pending Bookings</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h3>{{ $completedBookings }}</h3>
                    <p>Completed Jobs</p>
                </div>
            </div>
        </div>

    </div>

    <hr class="my-5">

    <div class="row">

        <div class="col-md-4 mb-3">

            <a href="{{ route('services.index') }}"
               class="btn btn-primary w-100">

                My Services

            </a>

        </div>

        <div class="col-md-4 mb-3">

            <a href="{{ route('worker.bookings') }}"
               class="btn btn-success w-100">

                My Bookings

            </a>

        </div>

        <div class="col-md-4 mb-3">

            <a href="{{ route('worker.profile') }}"
               class="btn btn-warning w-100">

                My Profile

            </a>

        </div>

    </div>

</div>

@endsection