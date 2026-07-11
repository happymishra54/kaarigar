@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-7 col-lg-6">

            <div class="card shadow-lg border-0">

                <div class="card-body p-5 text-center">

                    <div class="display-3 mb-3">

                        📧

                    </div>

                    <h2 class="fw-bold mb-3">

                        Verify Your Email

                    </h2>

                    <p class="text-muted mb-4">

                        Thanks for signing up! Before getting started, please verify
                        your email address by clicking the verification link we
                        sent to your inbox.

                    </p>

                    @if(session('status') == 'verification-link-sent')

                        <div class="alert alert-success">

                            <i class="fas fa-circle-check me-2"></i>

                            A new verification link has been sent to your email
                            address.

                        </div>

                    @endif

                    <form
                        method="POST"
                        action="{{ route('verification.send') }}">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg w-100 mb-3">

                            <i class="fas fa-paper-plane me-2"></i>

                            Resend Verification Email

                        </button>

                    </form>

                    <form
                        method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-outline-secondary w-100">

                            <i class="fas fa-right-from-bracket me-2"></i>

                            Log Out

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection