@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2 class="mb-4">

Worker Dashboard

</h2>

<div class="row">

<div class="col-md-4 mb-3">

<a
href="{{ route('services.index') }}"
class="btn btn-primary w-100">

My Services

</a>

</div>

<div class="col-md-4 mb-3">

<a
href="{{ route('worker.bookings') }}"
class="btn btn-success w-100">

My Bookings

</a>

</div>

<div class="col-md-4 mb-3">

<a
href="{{ route('worker.profile.create') }}"
class="btn btn-warning w-100">

Profile Verification

</a>

</div>

</div>

</div>

@endsection