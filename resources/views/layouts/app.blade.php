<!DOCTYPE html>

<html lang="en">

<head>

    {{-- =========================
        Meta Information
    ========================== --}}

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:title" content="Kaarigar">
    <meta property="og:description" content="India's trusted platform for hiring verified home service professionals.">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Kaarigar">
    <meta name="twitter:description" content="Book trusted electricians, plumbers, carpenters and more.">
    <meta name="twitter:image" content="{{ asset('images/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">

    <meta
        name="description"
        content="Kaarigar - India's trusted platform to hire verified plumbers, electricians, carpenters, painters, cleaners and other skilled professionals.">

    <meta
        name="keywords"
        content="Kaarigar, Electrician, Plumber, Carpenter, Painter, Home Services, Skilled Workers">

    <meta
        name="author"
        content="Kaarigar">

    <meta
        name="theme-color"
        content="#2563EB">

    {{-- =========================
        Title
    ========================== --}}

    <title>

        @yield('title', 'Kaarigar | Trusted Home Service Professionals')

    </title>

    {{-- =========================
        Google Fonts
    ========================== --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- =========================
        Bootstrap CSS
    ========================== --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- =========================
        Font Awesome
    ========================== --}}

    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        rel="stylesheet">

    {{-- =========================
        Favicon
    ========================== --}}

    <link
        rel="icon"
        type="image/png"
        href="{{ asset('images/logo.png') }}">

    {{-- =========================
        Vite Assets
    ========================== --}}

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">

        <div class="container">
    
            {{-- Brand --}}
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fas fa-screwdriver-wrench text-warning me-2"></i>
                Kaarigar
            </a>
    
            {{-- Mobile Toggle --}}
            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar">
    
                <span class="navbar-toggler-icon"></span>
    
            </button>
    
            <div class="collapse navbar-collapse" id="mainNavbar">
    
                {{-- Left Menu --}}
                <ul class="navbar-nav ms-auto mb-3 mb-lg-0">
    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active fw-semibold' : '' }}"
                           href="{{ route('home') }}">
                            <i class="fas fa-house me-1"></i>
                            Home
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ url('/#categories') }}">
                            <i class="fas fa-layer-group me-1"></i>
                            Categories
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ url('/#services') }}">
                            <i class="fas fa-tools me-1"></i>
                            Services
                        </a>
                    </li>
    
<li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">
                            About
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('contact') }}">
                            <i class="fas fa-headset me-1"></i>
                            Contact
                        </a>
                    </li>
    
                </ul>
    
                {{-- Right Side --}}
                <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2 ms-lg-4">
    
                    @auth
    
                        @if(auth()->user()->role=='customer')
    
                            <a href="{{ route('customer.dashboard') }}"
                               class="btn btn-primary">
    
                                <i class="fas fa-gauge-high me-1"></i>
    
                                Dashboard
    
                            </a>
    
                        @elseif(auth()->user()->role=='worker')
    
                            <a href="{{ route('worker.dashboard') }}"
                               class="btn btn-primary">
    
                                <i class="fas fa-gauge-high me-1"></i>
    
                                Dashboard
    
                            </a>
    
                        @elseif(auth()->user()->role=='admin')
    
                            <a href="{{ route('admin.dashboard') }}"
                               class="btn btn-warning">
    
                                <i class="fas fa-user-shield me-1"></i>
    
                                Admin
    
                            </a>
    
                        @endif
    
                        <div class="dropdown">
    
                            <button class="btn btn-outline-light dropdown-toggle"
                                    data-bs-toggle="dropdown">
    
                                <i class="fas fa-user-circle me-1"></i>
    
                                {{ Str::limit(auth()->user()->name,15) }}
    
                            </button>
    
                            <ul class="dropdown-menu dropdown-menu-end">
    
                                <li class="dropdown-header">
    
                                    {{ auth()->user()->email }}
    
                                </li>
    
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
    
                                <li>
    

                                    <li>
                                        <button
                                            type="button"
                                            class="dropdown-item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#changePasswordModal">
                                    
                                            <i class="fas fa-key me-2"></i>
                                            Change Password
                                    
                                        </button>
                                    </li>
                                    
                                    <li><hr class="dropdown-divider"></li>

                                    <form method="POST"
                                          action="{{ route('logout') }}">
    
                                        @csrf
    
                                        <button class="dropdown-item text-danger">
    
                                            <i class="fas fa-right-from-bracket me-2"></i>
    
                                            Logout
    
                                        </button>
    
                                    </form>
    
                                </li>
    
                            </ul>
    
                        </div>
    
                    @else
    
                        <a href="{{ route('login') }}"
                           class="btn btn-outline-light">
    
                            Login
    
                        </a>
    
                        <a href="{{ route('register.role') }}"
                           class="btn btn-warning">
    
                            Register
    
                        </a>
    
                    @endauth
    
                </div>
    
            </div>
    
        </div>
    
    </nav>

    <main>


    @yield('content')


    </main>

    @include('partials.footer')

    <script>

        function updateCity(city) {
        
            if (!city) return;
        
            localStorage.setItem("city", city);
        
            const currentCity = document.getElementById("currentCity");
        
            if (currentCity) {
                currentCity.textContent = city;
            }
        
            document.querySelectorAll('input[name="city"]').forEach(input => {
                input.value = city;
            });
        
        }
        
        const savedCity = localStorage.getItem("city");
        
        if (savedCity) {
        
            updateCity(savedCity);
        
        } else if ("geolocation" in navigator) {
        
            navigator.geolocation.getCurrentPosition(
        
                async function (position) {
        
                    try {
        
                        const lat = position.coords.latitude;
                        const lon = position.coords.longitude;
        
                        const response = await fetch(
                            `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`
                        );
        
                        if (!response.ok) {
                            throw new Error("Reverse geocoding failed.");
                        }
        
                        const data = await response.json();
                        const address = data.address || {};
        
                        // Better priority for Indian addresses

                        const city =
                            address.city ||
                            address.city_district ||
                            address.state_district ||
                            address.town ||
                            address.municipality ||
                            address.county ||
                            address.village ||
                            address.hamlet ||
                            "";
                        updateCity(city);
        
                    } catch (error) {
        
                        console.error(error);
        
                    }
        
                },
        
                function (error) {
        
                    console.log(error.message);
        
                },
        
                {
        
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 300000
        
                }
        
            );
        
        }
        
    </script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

{{-- // javascript for handling the change password modal --}}

@if ($errors->updatePassword->isNotEmpty() || session('status') === 'password-updated')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const modalElement = document.getElementById('changePasswordModal');
    const modal = new bootstrap.Modal(modalElement);

    modal.show();

    @if(session('status') === 'password-updated')
        setTimeout(function () {
            modal.hide();
        }, 2000);
    @endif

});
</script>
@endif

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-4">

            <div class="modal-header">

                <h5 class="modal-title">
                    <i class="fas fa-lock me-2 text-primary"></i>
                    Change Password
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>

            </div>

            <form method="POST" action="{{ route('password.update') }}">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success">
                            Password updated successfully.
                        </div>
                    @endif

                    <div class="mb-3">

                        <label class="form-label">
                            Current Password
                        </label>

                        <input
                            type="password"
                            name="current_password"
                            class="form-control"
                            required>

                        @error('current_password', 'updatePassword')
                            <div class="text-danger mt-1">
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
                            class="form-control"
                            required>

                        @error('password', 'updatePassword')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-key me-2"></i>

                        Update Password

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>



