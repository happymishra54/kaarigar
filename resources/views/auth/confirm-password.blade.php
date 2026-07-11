@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <i class="fas fa-lock fa-3x text-primary mb-3"></i>

                        <h2 class="fw-bold">

                            Confirm Password

                        </h2>

                        <p class="text-muted">

                            This is a secure area of the application. Please confirm your password before continuing.

                        </p>

                    </div>

                    <form method="POST" action="{{ route('password.confirm') }}">

                        @csrf

                        <div class="mb-3">

                            <label for="password" class="form-label">

                                Password

                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                required
                                autocomplete="current-password">

                            @error('password')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="fas fa-lock me-2"></i>

                            Confirm Password

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection