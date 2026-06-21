@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2 class="mb-4">

Admin Dashboard

</h2>

<div class="row">

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body">

<h3>{{ $users }}</h3>

Users

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body">

<h3>{{ $workers }}</h3>

Workers

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body">

<h3>{{ $customers }}</h3>

Customers

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body">

<h3>{{ $categories }}</h3>

Categories

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body">

<h3>{{ $services }}</h3>

Services

</div>

</div>

</div>

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body">

<h3>{{ $bookings }}</h3>

Bookings

</div>

</div>

</div>

<hr>

<div class="row mt-4">

    <div class="col-md-3 mb-3">

        <a href="{{ route('admin.users') }}"
           class="btn btn-primary w-100">

            Users

        </a>

    </div>

    <div class="col-md-3 mb-3">

        <a href="{{ route('categories.index') }}"
           class="btn btn-success w-100">

            Categories

        </a>

    </div>

    <div class="col-md-3 mb-3">

        <a href="{{ route('admin.bookings') }}"
           class="btn btn-warning w-100">

            Bookings

        </a>

    </div>

    <div class="col-md-3 mb-3">

        <a href="{{ route('admin.worker.verifications') }}"
           class="btn btn-danger w-100">

            Worker Verification

        </a>

    </div>

    <div class="col-md-3 mb-3">

        <a href="{{ route('admin.workers.create') }}"
           class="btn btn-info w-100">
    
            Add Worker
    
        </a>
    
    </div>

    <div class="col-md-3 mb-3">

        <a href="{{ route('admin.workers.index') }}"
           class="btn btn-secondary w-100">
    
            Manage Workers
    
        </a>
    
    </div>

</div>

</div>

</div>

@endsection