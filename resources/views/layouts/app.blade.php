<!DOCTYPE html>

<html lang="en">

<head>

    {{-- =========================
        Meta Information
    ========================== --}}

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

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

    <nav class="navbar navbar-expand-lg kaarigar-navbar sticky-top">

        <div class="container">
    
            {{-- Brand --}}
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <i class="fa-solid fa-screwdriver-wrench me-2"></i>
                <span>Kaarigar</span>
            </a>
    
            {{-- Mobile Toggle --}}
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainNavbar">
    
                <span class="navbar-toggler-icon"></span>
    
            </button>
    
            <div class="collapse navbar-collapse" id="mainNavbar">
    
                {{-- Navigation --}}
                <ul class="navbar-nav mx-auto align-items-lg-center">
    
                    <li class="nav-item">
                        <a class="nav-link"
                           href="/">
                            <i class="fas fa-house me-2"></i>
                            Home
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#categories') }}">
                            <i class="fas fa-layer-group me-2"></i>
                            Categories
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user-hard-hat me-2"></i>
                            Become a Worker
                        </a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/#about') }}">
                            <i class="fas fa-circle-info me-2"></i>
                            About
                        </a>
                    </li>
    
                </ul>
    
                {{-- Right Side --}}
                <div class="d-flex align-items-center gap-3">
    
                    @auth
    
                        {{-- Dashboard --}}
                        @if(auth()->user()->role === 'customer')
    
                            <a href="{{ route('customer.dashboard') }}"
                               class="btn btn-primary rounded-pill px-4">
    
                                <i class="fas fa-gauge-high me-2"></i>
    
                                Dashboard
    
                            </a>
    
                        @elseif(auth()->user()->role === 'worker')
    
                            <a href="{{ route('worker.dashboard') }}"
                               class="btn btn-primary rounded-pill px-4">
    
                                <i class="fas fa-gauge-high me-2"></i>
    
                                Dashboard
    
                            </a>
    
                        @elseif(auth()->user()->role === 'admin')
    
                            <a href="{{ route('admin.dashboard') }}"
                               class="btn btn-dark rounded-pill px-4">
    
                                <i class="fas fa-user-shield me-2"></i>
    
                                Admin
    
                            </a>
    
                        @endif
    
                        {{-- User Dropdown --}}
                        <div class="dropdown">
    
                            <button
                                class="btn btn-light rounded-pill dropdown-toggle px-3"
                                data-bs-toggle="dropdown">
    
                                <i class="fas fa-circle-user me-2"></i>
    
                                {{ Str::limit(auth()->user()->name,15) }}
    
                            </button>
    
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4">
    
                                <li class="dropdown-header fw-bold">
    
                                    {{ auth()->user()->email }}
    
                                </li>
    
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
    
                                <li>
    
                                    <form method="POST"
                                          action="{{ route('logout') }}">
    
                                        @csrf
    
                                        <button
                                            type="submit"
                                            class="dropdown-item text-danger">
    
                                            <i class="fas fa-right-from-bracket me-2"></i>
    
                                            Logout
    
                                        </button>
    
                                    </form>
    
                                </li>
    
                            </ul>
    
                        </div>
    
                    @else
    
                        <a href="{{ route('login') }}"
                           class="btn btn-outline-light rounded-pill px-4">
    
                            <i class="fas fa-right-to-bracket me-2"></i>
    
                            Login
    
                        </a>
    
                        <a href="{{ route('register.role') }}"
                           class="btn btn-warning rounded-pill px-4 fw-semibold">
    
                            <i class="fas fa-user-plus me-2"></i>
    
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

    <footer class="premium-footer">

        <div class="container">

            <div class="row gy-5">

                <!-- Brand -->
                <div class="col-lg-4">

                    <h2 class="footer-logo">
                        🛠️ Kaarigar
                    </h2>

                    <p class="footer-text">
                        India's trusted platform for finding verified electricians,
                        plumbers, carpenters, painters, cleaners and skilled
                        professionals near you.
                    </p>

                    <div class="footer-social mt-4">

                        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>

                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>

                        <a href="#" title="X"><i class="fab fa-x-twitter"></i></a>

                        <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>

                    </div>

                </div>

                <!-- Company -->
                <div class="col-lg-2">

                    <h5>Company</h5>

                    <ul class="list-unstyled">

                        <li><a href="#"><i class="fas fa-angle-right"></i> About Us</a></li>

                        <li><a href="#"><i class="fas fa-angle-right"></i> Contact</a></li>

                        <li><a href="#"><i class="fas fa-angle-right"></i> Terms & Conditions</a></li>

                        <li><a href="#"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>

                    </ul>

                </div>

                <!-- Popular Services -->
                <div class="col-lg-3">

                    <h5>Popular Services</h5>

                    <ul class="list-unstyled">

                        <li><i class="fas fa-bolt text-warning"></i> Electrician</li>

                        <li><i class="fas fa-faucet text-primary"></i> Plumber</li>

                        <li><i class="fas fa-paint-roller text-danger"></i> Painter</li>

                        <li><i class="fas fa-hammer text-success"></i> Carpenter</li>

                        <li><i class="fas fa-broom text-info"></i> Cleaner</li>

                    </ul>

                </div>

                <!-- Newsletter -->
                <div class="col-lg-3">

                    <h5>Stay Updated</h5>

                    <p>
                        Get the latest offers, updates and new services directly in your inbox.
                    </p>

                    <form>

                        <div class="input-group mb-3">

                            <span class="input-group-text">
                                <i class="fas fa-envelope"></i>
                            </span>

                            <input
                                type="email"
                                class="form-control"
                                placeholder="Enter your email">

                        </div>

                        <button class="btn-primary-custom w-100">
                            Subscribe
                        </button>

                    </form>

                </div>

            </div>

            <hr class="footer-divider">

            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center">

                <span>
                    © {{ date('Y') }} <strong>Kaarigar</strong>. All Rights Reserved.
                </span>

                <span class="mt-2 mt-md-0">
                    🇮🇳 Made with ❤️ in India | Version 1.0
                </span>

            </div>

        </div>

    </footer>

    <script>

function updateCity(city){

if(!city) return;

localStorage.setItem('city', city);

const currentCity = document.getElementById('currentCity');

if(currentCity){
    currentCity.textContent = city;
}

document.querySelectorAll('input[name="city"]').forEach(function(input){
    input.value = city;
});

}
        
        const savedCity = localStorage.getItem('city');
        
        if(savedCity){
        
            updateCity(savedCity);
        
        }else{
        
            if(navigator.geolocation){
        
                navigator.geolocation.getCurrentPosition(
        
                    function(position){
        
                        const lat = position.coords.latitude;
                        const lon = position.coords.longitude;
        
                        fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`)
        
                        .then(response => {
        
                            if(!response.ok){
                                throw new Error("Unable to fetch location.");
                            }
        
                            return response.json();
        
                        })
        
                        .then(data => {
        
                            console.log(data);
        
                            const city =
                                data.address.city ||
                                data.address.town ||
                                data.address.village ||
                                data.address.hamlet ||
                                data.address.county ||
                                "";
        
                            updateCity(city);
        
                        })
        
                        .catch(error => {
        
                            console.error("Reverse geocoding failed:", error);
        
                        });
        
                    },
        
                    function(error){
        
                        switch(error.code){
        
                            case error.PERMISSION_DENIED:
                                console.log("User denied location permission.");
                                break;
        
                            case error.POSITION_UNAVAILABLE:
                                console.log("Location unavailable.");
                                break;
        
                            case error.TIMEOUT:
                                console.log("Location request timed out.");
                                break;
        
                            default:
                                console.log("Unknown location error.");
                                break;
        
                        }
        
                    },
        
                    {
        
                        enableHighAccuracy: true,
                        timeout: 10000,
                        maximumAge: 60000
        
                    }
        
                );
        
            }else{
        
                console.log("Geolocation is not supported by this browser.");
        
            }
        
        }
        
        </script>







</body>
</html>



