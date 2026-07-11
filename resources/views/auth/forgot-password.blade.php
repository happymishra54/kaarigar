@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <i class="fas fa-key fa-3x text-primary mb-3"></i>

                        <h2 class="fw-bold">

                            Forgot Password

                        </h2>

                        <p class="text-muted">

                            Enter your email address and we'll send you a password reset link.

                        </p>

                    </div>

                    @if (session('status'))

                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>

                    @endif

                    <form method="POST" action="{{ route('password.email') }}">

                        @csrf

                        <div class="mb-3">

                            <label for="email" class="form-label">

                                Email Address

                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
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

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="fas fa-paper-plane me-2"></i>

                            Send Reset Link

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection