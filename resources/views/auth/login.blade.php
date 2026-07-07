@extends('layouts.app')

@section('content')

<div class="auth-page">

<div class="auth-card">

<div class="auth-logo">

KAARIGAR

</div>

<h2 class="auth-title">

Welcome Back 👋

</h2>

<p class="auth-subtitle">

Login to continue

</p>

<form method="POST" action="{{ route('login') }}">

@csrf

<div class="mb-4">

    <label class="form-label fw-bold mb-3">

        Login As

    </label>

    <div class="role-selector">

        <label class="role-option">

            <input
                type="radio"
                name="role"
                value="customer"
                {{ old('role','customer') == 'customer' ? 'checked' : '' }}>

            <span>

                <i class="fa-solid fa-user"></i>

                Customer

            </span>

        </label>

        <label class="role-option">

            <input
                type="radio"
                name="role"
                value="worker"
                {{ old('role') == 'worker' ? 'checked' : '' }}>

            <span>

                <i class="fa-solid fa-screwdriver-wrench"></i>

                Worker

            </span>

        </label>

    </div>

    @error('role')

        <small class="text-danger">

            {{ $message }}

        </small>

    @enderror

</div>

<div class="mb-3">

    <label class="form-label">

        Email or Mobile Number

    </label>

    <input
        type="text"
        name="login"
        value="{{ old('login') }}"
        class="form-control @error('login') is-invalid @enderror"
        placeholder="Enter Email or Mobile Number"
        required>

    @error('login')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<input
type="password"
name="password"
class="form-control"
placeholder="Password"
required>

<button class="auth-btn">

Login

</button>

</form>

<div class="auth-footer">

Don't have an account?

<a href="{{ route('register.role') }}">
    Create Account
</a>

</a>

</div>

</div>

</div>

@endsection

