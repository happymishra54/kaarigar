@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow-lg border-0">

                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <div class="display-3 mb-3">

                            🔒

                        </div>

                        <h2 class="fw-bold">

                            Reset Password

                        </h2>

                        <p class="text-muted">

                            Enter your email and choose a new password.

                        </p>

                    </div>

                    <form method="POST" action="{{ route('password.store') }}">

                        @csrf

                        <input
                            type="hidden"
                            name="token"
                            value="{{ $request->route('token') }}">

                        <div class="mb-3">

                            <label class="form-label">

                                Email Address

                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $request->email) }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter your email"
                                required
                                autofocus>

                            @error('email')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                New Password

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter new password"
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
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Confirm new password"
                                required>

                            @error('password_confirmation')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="fas fa-key me-2"></i>

                            Reset Password

                        </button>

                    </form>

                    <div class="text-center mt-4">

                        <a href="{{ route('login') }}">

                            Back to Login

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection