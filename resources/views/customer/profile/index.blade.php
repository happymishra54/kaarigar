@extends('layouts.app')

@section('content')

<div class="container py-5">

<div class="card shadow">

<div class="card-header">

<h3>👤 My Profile</h3>

</div>

<div class="card-body">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<p>

<strong>Name :</strong>

{{ $user->name }}

</p>

<p>

<strong>Email :</strong>

{{ $user->email }}

</p>

<p>

<strong>Phone :</strong>

{{ $user->phone }}

</p>

<p>

<strong>Address :</strong>

{{ $user->address }}

</p>

<p>

<strong>City :</strong>

{{ $user->city }}

</p>

<p>

<strong>State :</strong>

{{ $user->state }}

</p>

<a
href="{{ route('customer.profile.edit') }}"
class="btn-primary-custom">

Edit Profile

</a>

</div>

</div>

</div>

@endsection