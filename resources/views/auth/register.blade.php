@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow-lg border-0">

                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <div class="display-3 mb-3">

                            🛠️

                        </div>

                        <h2 class="fw-bold">

                            Create Account

                        </h2>

                        <p class="text-muted">

                            Join India's trusted worker platform

                        </p>

                    </div>

                    <form method="POST" action="{{ route('register') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">

                                Full Name

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter your full name"
                                required>

                            @error('name')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Email Address

                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter your email"
                                required>

                            @error('email')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Mobile Number

                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Enter your mobile number">

                            @error('phone')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Password

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter password"
                                required>

                            @error('password')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="mb-4">

                            <label class="form-label">

                                Confirm Password

                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm password"
                                required>

                        </div>

                        <input
                            type="hidden"
                            name="role"
                            value="{{ request('role', 'customer') }}">

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="fas fa-user-plus me-2"></i>

                            Create Account

                        </button>

                    </form>

                    <div class="text-center mt-4">

                        <p class="mb-0">

                            Already have an account?

                            <a href="{{ route('login') }}">

                                Login

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection