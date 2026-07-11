@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h1 class="fw-bold">

            Welcome to Kaarigar

        </h1>

        <p class="text-muted">

            Choose how you'd like to continue.

        </p>

    </div>

    <div class="row justify-content-center g-4">

        <!-- Customer -->

        <div class="col-md-6 col-lg-5">

            <form method="POST" action="{{ route('become.customer') }}">

                @csrf

                <button
                    type="submit"
                    class="card shadow-sm w-100 border-0 h-100 text-start">

                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-3">

                            🏠 Need a Service

                        </h3>

                        <p class="text-muted mb-0">

                            Book electricians, plumbers, carpenters and other trusted professionals.

                        </p>

                    </div>

                </button>

            </form>

        </div>

        <!-- Worker -->

        <div class="col-md-6 col-lg-5">

            <form method="POST" action="{{ route('become.worker') }}">

                @csrf

                <button
                    type="submit"
                    class="card shadow-sm w-100 border-0 h-100 text-start">

                    <div class="card-body p-4">

                        <h3 class="fw-bold mb-3">

                            🔧 Work as a Kaarigar

                        </h3>

                        <p class="text-muted mb-0">

                            Join Kaarigar, offer your services, and manage customer bookings.

                        </p>

                    </div>

                </button>

            </form>

        </div>

    </div>

</div>

@endsection