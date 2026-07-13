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
                        <a class="nav-link"
                           href="{{ url('/#about') }}">
                            <i class="fas fa-circle-info me-1"></i>
                            About
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

    <footer class="bg-dark text-light pt-5 pb-3 mt-5">

        <div class="container">
    
            <div class="row gy-4">
    
                {{-- Brand --}}
                <div class="col-lg-4">
    
                    <h3 class="fw-bold mb-3">
                        <i class="fas fa-screwdriver-wrench text-warning me-2"></i>
                        Kaarigar
                    </h3>
    
                    <p class="text-light-emphasis">
    
                        India's trusted platform for connecting customers with
                        verified electricians, plumbers, carpenters, painters,
                        cleaners and other skilled professionals.
    
                    </p>
    
                    <div class="d-flex gap-3 mt-4">
    
                        <a href="#" class="text-light fs-5">
                            <i class="fab fa-facebook"></i>
                        </a>
    
                        <a href="#" class="text-light fs-5">
                            <i class="fab fa-instagram"></i>
                        </a>
    
                        <a href="#" class="text-light fs-5">
                            <i class="fab fa-x-twitter"></i>
                        </a>
    
                        <a href="#" class="text-light fs-5">
                            <i class="fab fa-linkedin"></i>
                        </a>
    
                    </div>
    
                </div>
    
                {{-- Quick Links --}}
                <div class="col-lg-2 col-md-6">
    
                    <h5 class="fw-semibold mb-3">
    
                        Company
    
                    </h5>
    
                    <ul class="nav flex-column">
    
                        <li class="nav-item mb-2">
    
                            <a href="#about"
                               class="nav-link p-0 text-light-emphasis">
    
                                About Us
    
                            </a>
    
                        </li>
    
                        <li class="nav-item mb-2">
    
                            <a href="#contact"
                               class="nav-link p-0 text-light-emphasis">
    
                                Contact
    
                            </a>
    
                        </li>
    
                        <li class="nav-item mb-2">
    
                            <a href="#"
                               class="nav-link p-0 text-light-emphasis">
    
                                Privacy Policy
    
                            </a>
    
                        </li>
    
                        <li class="nav-item">
    
                            <a href="#"
                               class="nav-link p-0 text-light-emphasis">
    
                                Terms & Conditions
    
                            </a>
    
                        </li>
    
                    </ul>
    
                </div>
    
                {{-- Popular Services --}}
                <div class="col-lg-3 col-md-6">
    
                    <h5 class="fw-semibold mb-3">
    
                        Popular Services
    
                    </h5>
    
                    <ul class="list-unstyled">
    
                        <li class="mb-2">
    
                            <i class="fas fa-bolt text-warning me-2"></i>
    
                            Electrician
    
                        </li>
    
                        <li class="mb-2">
    
                            <i class="fas fa-faucet text-info me-2"></i>
    
                            Plumber
    
                        </li>
    
                        <li class="mb-2">
    
                            <i class="fas fa-hammer text-success me-2"></i>
    
                            Carpenter
    
                        </li>
    
                        <li class="mb-2">
    
                            <i class="fas fa-paint-roller text-danger me-2"></i>
    
                            Painter
    
                        </li>
    
                        <li>
    
                            <i class="fas fa-broom text-primary me-2"></i>
    
                            Cleaner
    
                        </li>
    
                    </ul>
    
                </div>
    
                {{-- Newsletter --}}
                <div class="col-lg-3">
    
                    <h5 class="fw-semibold mb-3">
    
                        Newsletter
    
                    </h5>
    
                    <p class="text-light-emphasis">
    
                        Subscribe to receive updates and special offers.
    
                    </p>
    
                    <form>
    
                        <div class="input-group">
    
                            <input
                                type="email"
                                class="form-control"
                                placeholder="Enter your email">
    
                            <button
                                class="btn btn-warning"
                                type="submit">
    
                                Subscribe
    
                            </button>
    
                        </div>
    
                    </form>
    
                </div>
    
            </div>
    
            <hr class="border-secondary my-4">
    
            <div class="row">
    
                <div class="col-md-6 text-center text-md-start">
    
                    © {{ date('Y') }}
    
                    <strong>Kaarigar</strong>
    
                    • All Rights Reserved.
    
                </div>
    
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
    
                    Made with ❤️ in India
    
                </div>
    
            </div>
    
        </div>
    
    </footer>

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

</body>
</html>



