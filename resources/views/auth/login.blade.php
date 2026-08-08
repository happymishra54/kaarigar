@extends('layouts.app')

@section('content')

<div class="auth-page">

    <div class="auth-card">

        <div class="auth-logo">
            <i class="fas fa-screwdriver-wrench"></i>
        </div>

        <h1 class="auth-title">
            Welcome Back 👋
        </h1>

        <p class="auth-subtitle">
            Login to continue to Kaarigar
        </p>

        @if(session('reactivate_email'))

            <div class="alert alert-warning">

                <strong>Your account has been deactivated.</strong>

                <p class="mb-3 mt-2">
                    Click below to reactivate your account.
                </p>

                <form method="POST"
                      action="{{ route('account.reactivate.send') }}">

                    @csrf

                    <input
                        type="hidden"
                        name="email"
                        value="{{ session('reactivate_email') }}">

                    <button class="btn btn-warning">

                        <i class="fa-solid fa-envelope me-2"></i>

                        Reactivate My Account

                    </button>

                </form>

            </div>

        @endif

        @if($errors->has('login'))

            <div class="alert alert-danger">

                {{ $errors->first('login') }}

                @if(Str::contains($errors->first('login'), 'not found'))

                    <div class="mt-3">

                        <a href="{{ route('register.role') }}"
                           class="btn btn-primary">

                            Register Now

                        </a>

                    </div>

                @endif

            </div>

        @endif

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label fw-semibold">

                    Login As

                </label>

                <div class="role-selector">

                    <label class="role-option">

                        <input
                            type="radio"
                            name="role"
                            id="customer"
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
                            id="worker"
                            value="worker"
                            {{ old('role') == 'worker' ? 'checked' : '' }}>

                        <span>
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                            Worker
                        </span>

                    </label>

                </div>

                @error('role')

                    <div class="text-danger small">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="mb-3 input-icon-wrap">

                <label class="form-label">

                    Email or Mobile Number

                </label>

                <div class="input-icon">

                    <i class="fa-solid fa-envelope"></i>

                    <input
                        type="text"
                        name="login"
                        value="{{ old('login') }}"
                        class="form-control @error('login') is-invalid @enderror"
                        placeholder="Enter Email or Mobile Number"
                        required>

                </div>

                @error('login')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="mb-3 input-icon-wrap">

                <label class="form-label">

                    Password

                </label>

                <div class="input-icon">

                    <i class="fa-solid fa-lock"></i>

                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter Password"
                        required>

                </div>

                @error('password')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="d-flex justify-content-end mb-4">

                <a href="{{ route('password.request') }}"
                   class="text-decoration-none small fw-semibold">

                    Forgot Password?
                </a>

            </div>

            <button
                type="submit"
                class="auth-btn">

                <i class="fa-solid fa-right-to-bracket me-2"></i>
                Login

            </button>

        </form>

        <div class="auth-footer">

            <p class="mb-0">

                Don't have an account?

                <a href="{{ route('register.role') }}">

                    Create Account

                </a>

            </p>

        </div>

    </div>

</div>

@endsection
