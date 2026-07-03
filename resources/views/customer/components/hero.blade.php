{{-- HERO --}}
<section class="dashboard-hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <span class="dashboard-tag">

                    👋 {{ $greeting }}

                </span>

                <h1 class="dashboard-title">

                    Hello,

                    {{ Auth::user()->name }}

                </h1>

                <p class="dashboard-subtitle">

                    Find trusted professionals near you and manage all your bookings in one place.

                </p>

                <form action="{{ route('home') }}" method="GET" class="dashboard-search">

                    <input
                        type="text"
                        name="search"
                        placeholder="Search Plumber, Electrician, Painter..."
                        value="{{ request('search') }}">
                
                    <button type="submit">
                
                        <i class="fa-solid fa-magnifying-glass"></i>
                
                        Search
                
                    </button>
                
                </form>

            </div>

            <div class="col-lg-5 text-center">

                <img
                    src="{{ asset('images/dashboard-hero.png') }}"
                    class="img-fluid"
                    style="max-height:420px;">

            </div>

            

        </div>

    </div>

</section>