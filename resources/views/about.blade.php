@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container py-4">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <span class="badge bg-light text-primary px-3 py-2 rounded-pill mb-3">
                    ABOUT KAARIGAR
                </span>

                <h1 class="display-4 fw-bold mb-3">
                    Connecting Skilled Workers with Customers
                </h1>

                <p class="lead mb-4">
                    Kaarigar is a trusted service booking platform that helps customers
                    quickly find verified professionals like plumbers, electricians,
                    carpenters, painters, cleaners, AC technicians and many more.
                </p>

                <a href="{{ route('login') }}" class="btn btn-light btn-lg me-3">
                    <i class="fas fa-right-to-bracket me-2"></i>
                    Login to Explore Services
                </a>

                <a href="{{ route('register.role') }}" class="btn btn-outline-light btn-lg">
                    Join Kaarigar
                </a>

            </div>

            <div class="col-lg-6 text-center mt-5 mt-lg-0">

                <i class="fas fa-user-hard-hat display-1"></i>

            </div>

        </div>
    </div>
</section>

<!-- Who We Are -->
<section class="py-5">
    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Who We Are
            </h2>

            <p class="text-muted col-lg-8 mx-auto">

                Kaarigar is designed to simplify the process of hiring trusted workers.
                Whether you need emergency repairs, home maintenance or professional
                services, we connect you with verified experts near your location.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body text-center p-4">

                        <i class="fas fa-shield-halved fa-3x text-primary mb-3"></i>

                        <h4 class="fw-bold">
                            Trusted Workers
                        </h4>

                        <p class="text-muted">

                            Every worker profile goes through verification before
                            appearing on the platform.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body text-center p-4">

                        <i class="fas fa-bolt fa-3x text-warning mb-3"></i>

                        <h4 class="fw-bold">
                            Fast Booking
                        </h4>

                        <p class="text-muted">

                            Search, compare and book professional workers within
                            minutes.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card shadow-sm border-0 h-100">

                    <div class="card-body text-center p-4">

                        <i class="fas fa-star fa-3x text-success mb-3"></i>

                        <h4 class="fw-bold">
                            Quality Service
                        </h4>

                        <p class="text-muted">

                            We aim to deliver excellent customer satisfaction
                            through skilled professionals.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- Mission -->
<section class="bg-light py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">

                    Our Mission

                </h2>

                <p class="text-muted">

                    Our mission is to bridge the gap between skilled workers and
                    customers by creating a transparent, secure and reliable
                    digital marketplace.

                </p>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item bg-transparent">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Easy Worker Discovery
                    </li>

                    <li class="list-group-item bg-transparent">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Secure Booking Process
                    </li>

                    <li class="list-group-item bg-transparent">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Verified Professionals
                    </li>

                    <li class="list-group-item bg-transparent">
                        <i class="fas fa-check-circle text-success me-2"></i>
                        Transparent Communication
                    </li>

                </ul>

            </div>

            <div class="col-lg-6 text-center">

                <i class="fas fa-handshake display-1 text-primary"></i>

            </div>

        </div>

    </div>

</section>

<!-- How It Works -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                How Kaarigar Works

            </h2>

        </div>

        <div class="row g-4">

            <div class="col-md-3">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center">

                        <span class="badge bg-primary rounded-pill fs-5 mb-3">1</span>

                        <h5 class="fw-bold">

                            Search

                        </h5>

                        <p class="text-muted">

                            Find workers based on category or location.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center">

                        <span class="badge bg-primary rounded-pill fs-5 mb-3">2</span>

                        <h5 class="fw-bold">

                            Compare

                        </h5>

                        <p class="text-muted">

                            View profiles, skills and experience.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center">

                        <span class="badge bg-primary rounded-pill fs-5 mb-3">3</span>

                        <h5 class="fw-bold">

                            Book

                        </h5>

                        <p class="text-muted">

                            Schedule your service with ease.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center">

                        <span class="badge bg-primary rounded-pill fs-5 mb-3">4</span>

                        <h5 class="fw-bold">

                            Relax

                        </h5>

                        <p class="text-muted">

                            Let skilled professionals handle your work.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Statistics -->

<section class="bg-primary text-white py-5">

    <div class="container">

        <div class="row text-center">

            <div class="col-md-3">

                <h2 class="display-5 fw-bold">

                    {{ $verifiedWorkers }}

                </h2>

                <p>

                    Verified Workers

                </p>

            </div>

            <div class="col-md-3">

                <h2 class="display-5 fw-bold">

                    {{ $customers }}

                </h2>

                <p>

                    Registered Customers

                </p>

            </div>

            <div class="col-md-3">

                <h2 class="display-5 fw-bold">

                    {{ $completedBookings }}

                </h2>

                <p>

                    Completed Bookings

                </p>

            </div>

            <div class="col-md-3">

                <h2 class="display-5 fw-bold">

                    {{ $categories }}

                </h2>

                <p>

                    Service Categories

                </p>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->

<section class="py-5">

    <div class="container">

        <div class="card border-0 shadow-lg bg-primary text-white">

            <div class="card-body text-center p-5">

                <h2 class="fw-bold mb-3">

                    Ready to Get Started?

                </h2>

                <p class="lead mb-4">

                    Whether you're looking for trusted professionals or want to
                    grow your career as a skilled worker, Kaarigar is here to
                    help.

                </p>

                <a href="{{ route('register.role') }}" class="btn btn-light btn-lg me-3">

                    <i class="fas fa-user-plus me-2"></i>

                    Register Now

                </a>

                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                    Login to Browse Services
                </a>

            </div>

        </div>

    </div>

</section>

@endsection