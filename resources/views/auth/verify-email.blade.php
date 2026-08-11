@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-sm border-0">
                <div class="card-body text-center p-5">

                    <div class="mb-4">
                        <i class="fas fa-envelope-open-text fa-4x text-primary"></i>
                    </div>

                    <h2 class="fw-bold mb-3">
                        Verify Your Email Address
                    </h2>

                    <p class="text-muted mb-4">
                        Thanks for creating your account!
                        Before continuing, please check your email and click
                        the verification link we sent you.
                    </p>

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-paper-plane me-2"></i>
                            Resend Verification Email
                        </button>
                    </form>

                    <div class="mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn btn-link text-muted">
                                Logout
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection