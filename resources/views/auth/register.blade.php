@extends('layouts.app')

@section('content')

<div class="auth-page">

<div class="auth-card">

<div class="auth-logo">

KAARIGAR

</div>

<h2 class="auth-title">

Create Account

</h2>

<p class="auth-subtitle">

Join India's trusted worker platform

</p>

<form method="POST" action="{{ route('register') }}">

@csrf

<input
type="text"
name="name"
class="form-control"
placeholder="Full Name"
required>

<input
type="email"
name="email"
class="form-control"
placeholder="Email"
required>

<input
type="text"
name="phone"
class="form-control"
placeholder="Phone Number">

<input
type="password"
name="password"
class="form-control"
placeholder="Password"
required>

<input
type="password"
name="password_confirmation"
class="form-control"
placeholder="Confirm Password"
required>

<input
    type="hidden"
    name="role"
    value="{{ request('role', 'customer') }}">

<button class="auth-btn">

Create Account

</button>

</form>

<div class="auth-footer">

Already have an account?

<a href="{{ route('login') }}">

Login

</a>

</div>

</div>

</div>

@endsection

