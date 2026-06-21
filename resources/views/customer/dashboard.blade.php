@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2 class="mb-4">

Customer Dashboard

</h2>

<div class="row">

<div class="col-md-4 mb-3">

<a
href="/"
class="btn btn-primary w-100">

Browse Services

</a>

</div>

<div class="col-md-4 mb-3">

<a
href="{{ route('customer.bookings') }}"
class="btn btn-success w-100">

My Bookings

</a>

</div>

</div>

</div>

@endsection