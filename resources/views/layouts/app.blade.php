<!DOCTYPE html>

<html lang="en">

<head>

{{-- // fonts  --}}

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">


<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<meta name="csrf-token"
      content="{{ csrf_token() }}">

<title>Kaarigar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      rel="stylesheet">


@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="kk-navbar">

        <div class="page-container nav-wrapper">
    
            <a href="/" class="logo">
    
                <i class="fa-solid fa-screwdriver-wrench"></i>
    
                <span>Kaarigar</span>
    
            </a>
    
            <div class="nav-links">
    
                <a href="/">Home</a>
    
                <a href="#">Categories</a>
    
                <a href="#">Become Worker</a>
    
                <a href="#">About</a>
    
            </div>
    
            <div class="nav-actions">
    
                @auth
    
                    <span class="welcome">
    
                        Hi,
    
                        {{ auth()->user()->name }}
    
                    </span>
    
                    @if(auth()->user()->role === 'customer')
    
                        <a href="{{ route('customer.dashboard') }}"
                           class="btn-primary-custom">
    
                            Dashboard
    
                        </a>
    
                    @elseif(auth()->user()->role === 'worker')
    
                        <a href="{{ route('worker.dashboard') }}"
                           class="btn-primary-custom">
    
                            Dashboard
    
                        </a>
    
                    @elseif(auth()->user()->role === 'admin')
    
                        <a href="{{ route('admin.dashboard') }}"
                           class="btn-primary-custom">
    
                            Dashboard
    
                        </a>
    
                    @endif
    
                    <form action="{{ route('logout') }}"
                          method="POST">
    
                        @csrf
    
                        <button class="btn-primary-custom">
    
                            Logout
    
                        </button>
    
                    </form>
    
                @else
    
                    <a href="/login"
                       class="btn-primary-custom">
    
                        Login
    
                    </a>
    
                    <a href="/register"
                       class="btn-primary-custom">
    
                        Register
    
                    </a>
    
                @endauth
    
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

                    Kaarigar

                </h2>

                <p class="footer-text">

                    India's trusted platform for finding verified
                    electricians, plumbers, carpenters,
                    painters, cleaners and hundreds of
                    skilled professionals near you.

                </p>

                <div class="footer-social">

                    <a href="#"><i class="fab fa-facebook-f"></i></a>

                    <a href="#"><i class="fab fa-instagram"></i></a>

                    <a href="#"><i class="fab fa-x-twitter"></i></a>

                    <a href="#"><i class="fab fa-linkedin-in"></i></a>

                </div>

            </div>

            <!-- Links -->

            <div class="col-lg-2">

                <h5>

                    Company

                </h5>

                <ul>

                    <li><a href="#">About</a></li>

                    <li><a href="#">Contact</a></li>

                    <li><a href="#">Careers</a></li>

                    <li><a href="#">Privacy</a></li>

                </ul>

            </div>

            <!-- Services -->

            <div class="col-lg-3">

                <h5>

                    Popular Services

                </h5>

                <ul>

                    <li>Electrician</li>

                    <li>Plumber</li>

                    <li>Painter</li>

                    <li>Carpenter</li>

                    <li>Cleaner</li>

                </ul>

            </div>

            <!-- Newsletter -->

            <div class="col-lg-3">

                <h5>

                    Stay Updated

                </h5>

                <p>

                    Subscribe to receive
                    latest offers and updates.

                </p>

                <form>

                    <input
                        type="email"
                        class="newsletter-input"
                        placeholder="Your email">

                    <button
                    class="btn-primary-custom w-100">

                        Subscribe

                    </button>

                </form>

            </div>

        </div>

        <hr class="footer-divider">

        <div class="footer-bottom">

            <span>

                © {{ date('Y') }} Kaarigar.

                All Rights Reserved.

            </span>

            <span>

                Made with ❤️ in India

            </span>

        </div>

    </div>

</footer>

{{-- //javascript --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




<script>

function updateCity(city) {

localStorage.setItem('city', city);

const currentCity = document.getElementById('currentCity');
if (currentCity) {
    currentCity.innerHTML = city;
}

const cityInput = document.getElementById('city');
if (cityInput) {
    cityInput.value = city;
}
}

const savedCity = localStorage.getItem('city');

if (savedCity) {

updateCity(savedCity);

} else {

navigator.geolocation.getCurrentPosition(function(position){

    const lat = position.coords.latitude;
    const lon = position.coords.longitude;

    fetch(
        `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`
    )
    .then(response => response.json())
    .then(data => {

console.log(data);

console.log(data.address);

let city =
    data.address.city ||
    data.address.town ||
    data.address.village ||
    '';

...
});


});

}

</script>







</body>
</html>



