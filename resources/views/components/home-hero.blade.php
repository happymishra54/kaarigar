<section class="py-5 bg-primary text-white">

    <div class="container py-5">

        <div class="text-center">

            <span class="badge bg-warning text-dark fs-6 px-3 py-2 mb-4">
                <i class="fa-solid fa-shield-check me-2"></i>
                India's Trusted Home Service Platform
            </span>

            <h1 class="display-4 fw-bold mb-3">
                Book <span class="text-warning">Verified Professionals</span><br>
                Near You in Minutes
            </h1>

            <p class="lead mb-5 mx-auto" style="max-width:700px;">
                Find trusted electricians, plumbers, carpenters, painters,
                cleaners and hundreds of skilled professionals for your
                home and office.
            </p>

        </div>

        <form action="{{ route('home') }}" method="GET">

            <div class="row g-3 justify-content-center">

                <div class="col-lg-5">

                    <div class="input-group input-group-lg">

                        <span class="input-group-text">
                            <i class="fa-solid fa-screwdriver-wrench"></i>
                        </span>

                        <input
                            type="text"
                            class="form-control"
                            name="search"
                            placeholder="Search Electrician, Plumber, Painter..."
                            value="{{ request('search') }}">

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="input-group input-group-lg">

                        <span class="input-group-text">
                            <i class="fa-solid fa-location-dot"></i>
                        </span>

                        <input
                            type="text"
                            class="form-control"
                            id="city"
                            name="city"
                            placeholder="Your City"
                            value="{{ request('city') }}">

                    </div>

                </div>

                <div class="col-lg-2 d-grid">

                    <button type="submit" class="btn btn-warning btn-lg fw-bold">

                        <i class="fa-solid fa-magnifying-glass me-2"></i>

                        Search

                    </button>

                </div>

            </div>

        </form>

        <div class="text-center mt-5">

            <a href="{{ route('home',['search'=>'Electrician']) }}" class="btn btn-outline-light rounded-pill m-2">
                ⚡ Electrician
            </a>

            <a href="{{ route('home',['search'=>'Plumber']) }}" class="btn btn-outline-light rounded-pill m-2">
                🚰 Plumber
            </a>

            <a href="{{ route('home',['search'=>'Carpenter']) }}" class="btn btn-outline-light rounded-pill m-2">
                🪚 Carpenter
            </a>

            <a href="{{ route('home',['search'=>'Painter']) }}" class="btn btn-outline-light rounded-pill m-2">
                🎨 Painter
            </a>

            <a href="{{ route('home',['search'=>'Cleaner']) }}" class="btn btn-outline-light rounded-pill m-2">
                🧹 Cleaner
            </a>

        </div>

    </div>

</section>