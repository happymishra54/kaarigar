<!DOCTYPE html>

<html lang="en">

<head>

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

<style>

    body{
        background:#f8fafc;
    }

    .hero{
        min-height:80vh;
        display:flex;
        align-items:center;
        background:linear-gradient(
            rgba(0,0,0,.6),
            rgba(0,0,0,.6)
        ),
        url('https://images.unsplash.com/photo-1504307651254-35680f356dfd');
        background-size:cover;
        background-position:center;
    }

    .search-box{
        background:white;
        padding:20px;
        border-radius:15px;
        box-shadow:0 10px 30px rgba(0,0,0,.15);
    }

    .category-card{
        transition:.3s;
    }

    .category-card:hover{
        transform:translateY(-8px);
    }

    .worker-card{
    border-radius:20px;
    transition:.3s;
}

    .worker-card:hover{
        transform:translateY(-10px);
        box-shadow:0 20px 40px rgba(0,0,0,.18);
    }

    .stats-box{
        border-radius:15px;
    }

</style>


</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">


    <div class="container">

        <a class="navbar-brand fw-bold"
        href="/">

            Kaarigar

        </a>

        <div>

            @auth

                <span class="text-white me-3">
                    Welcome, {{ auth()->user()->phone }}
                </span>

                @if(auth()->user()->role === 'customer')

    <a href="{{ route('customer.dashboard') }}"
       class="btn btn-warning me-2">
        Dashboard
    </a>

@elseif(auth()->user()->role === 'worker')

    <a href="{{ route('worker.dashboard') }}"
       class="btn btn-warning me-2">
        Dashboard
    </a>

@elseif(auth()->user()->role === 'admin')

    <a href="{{ route('admin.dashboard') }}"
       class="btn btn-warning me-2">
        Dashboard
    </a>

@endif

                <form action="{{ route('logout') }}"
                    method="POST"
                    class="d-inline">

                    @csrf

                    <button type="submit"
                            class="btn btn-danger">
                        Logout
                    </button>

                </form>

            @else

                <a href="/login"
                class="btn btn-outline-light me-2">

                    Login

                </a>

                <a href="/register"
                class="btn btn-warning">

                    Register

                </a>

            @endauth

        </div>

    </div>

    <div class="d-flex align-items-center">


        <span class="text-warning me-3">
        
            <i class="fa-solid fa-location-dot"></i>
        
            <span id="currentCity">
        
                {{ session('city','Detecting...') }}
        
            </span>
        
        </span>

        
        </div>
        


</nav>

<main>


@yield('content')


</main>

<footer class="bg-dark text-white pt-5 pb-4 mt-5">

    <div class="container">

        <div class="row">

            <div class="col-md-4">

                <h4 class="fw-bold">
                    Kaarigar
                </h4>

                <p>
                    Find trusted workers near you for all home and professional services.
                </p>

            </div>

            <div class="col-md-2">

                <h5>
                    Company
                </h5>

                <ul class="list-unstyled">

                    <li>
                        <a href="#" class="text-white text-decoration-none">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white text-decoration-none">
                            Contact
                        </a>
                    </li>

                    <li>
                        <a href="#" class="text-white text-decoration-none">
                            Careers
                        </a>
                    </li>

                </ul>

            </div>

            <div class="col-md-3">

                <h5>
                    Services
                </h5>

                <ul class="list-unstyled">

                    <li>Electrician</li>
                    <li>Plumber</li>
                    <li>Carpenter</li>
                    <li>Cleaner</li>

                </ul>

            </div>

            <div class="col-md-3">

                <h5>
                    Follow Us
                </h5>

                <div class="d-flex gap-3">

                    <i class="fab fa-facebook fa-lg"></i>
                    <i class="fab fa-instagram fa-lg"></i>
                    <i class="fab fa-twitter fa-lg"></i>
                    <i class="fab fa-linkedin fa-lg"></i>

                </div>

            </div>

        </div>

        <hr>

        <div class="text-center">

            © {{ date('Y') }} Kaarigar.
            All Rights Reserved.

        </div>

    </div>

</footer>

{{-- //javascript --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




<script>

if (!localStorage.getItem('city'))
{
    navigator.geolocation.getCurrentPosition(

        function(position)
        {
            let lat = position.coords.latitude;
            let lon = position.coords.longitude;

            fetch(
                "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat="
                + lat +
                "&lon="
                + lon
            )

            .then(response => response.json())

            .then(data => {

                let city =
                    data.address.city ||
                    data.address.town ||
                    data.address.village ||
                    '';

                localStorage.setItem(
                    'city',
                    city
                );

                document.getElementById(
                    'currentCity'
                ).innerHTML = city;

                let cityInput =
                    document.getElementById('city');

                if(cityInput)
                {
                    cityInput.value = city;
                }

            });

        }

    );
}

else
{
    document.getElementById(
        "currentCity"
    ).innerHTML =
        localStorage.getItem(
            "city"
        );

    let cityInput =
        document.getElementById('city');

    if(cityInput)
    {
        cityInput.value =
            localStorage.getItem(
                'city'
            );
    }
}

</script>







</body>
</html>



