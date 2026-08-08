@props(['title', 'subtitle'])

<section class="py-5 hero-section text-white position-relative overflow-hidden">

    {{-- Floating decorative shapes --}}
    <div class="hero-shape hero-shape-1"></div>
    <div class="hero-shape hero-shape-2"></div>
    <div class="hero-shape hero-shape-3"></div>

    <div class="container py-5 position-relative" style="z-index:1;">

        <div class="text-center">

            <span class="badge bg-light text-dark fs-6 px-3 py-2 mb-4 hero-badge shadow-sm">
                <i class="fa-solid fa-shield-check me-2 text-success"></i>
                India's Trusted Home Service Platform
            </span>

            <h1 class="display-4 fw-bold mb-3 hero-title">
                Book <span class="hero-highlight">Verified Professionals</span><br>
                Near You in Minutes
            </h1>

            <p class="lead mb-5 mx-auto hero-subtitle" style="max-width:700px;">
                Find trusted electricians, plumbers, carpenters, painters,
                cleaners and hundreds of skilled professionals for your
                home and office.
            </p>

        </div>

        <form action="{{ route('home') }}" method="GET" class="hero-search-form">

            <div class="row g-3 justify-content-center">

                <div class="col-lg-5">

                    <div class="input-group input-group-lg hero-input-group">

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

                    <div class="input-group input-group-lg hero-input-group">

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

                    <button type="submit" class="btn btn-warning btn-lg fw-bold hero-search-btn">

                        <i class="fa-solid fa-magnifying-glass me-2"></i>

                        Search

                    </button>

                </div>

            </div>

        </form>

        <div class="text-center mt-5">

            <a href="{{ route('home',['search'=>'Electrician']) }}" class="btn btn-outline-light rounded-pill m-2 hero-tag">
                ⚡ Electrician
            </a>

            <a href="{{ route('home',['search'=>'Plumber']) }}" class="btn btn-outline-light rounded-pill m-2 hero-tag">
                🚰 Plumber
            </a>

            <a href="{{ route('home',['search'=>'Carpenter']) }}" class="btn btn-outline-light rounded-pill m-2 hero-tag">
                🪚 Carpenter
            </a>

            <a href="{{ route('home',['search'=>'Painter']) }}" class="btn btn-outline-light rounded-pill m-2 hero-tag">
                🎨 Painter
            </a>

            <a href="{{ route('home',['search'=>'Cleaner']) }}" class="btn btn-outline-light rounded-pill m-2 hero-tag">
                🧹 Cleaner
            </a>

        </div>

    </div>

</section>

<style>

.hero-section {
    background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 60%, #3b82f6 100%);
}

.hero-badge {
    display: inline-flex;
    align-items: center;
}

.hero-title {
    text-shadow: 0 2px 20px rgba(0,0,0,.15);
}

.hero-highlight {
    color: #fbbf24;
    position: relative;
    white-space: nowrap;
}

.hero-subtitle {
    color: rgba(255,255,255,.9);
}

/* Search form */
.hero-search-form .input-group-lg {
    box-shadow: 0 10px 30px rgba(0,0,0,.2);
    border-radius: 14px;
    overflow: hidden;
}

.hero-search-form .input-group-text {
    background: #fff;
    color: #2563eb;
    border: none;
    font-size: 18px;
}

.hero-search-form .form-control {
    border: none;
    padding: 12px 16px;
}

.hero-search-form .form-control:focus {
    box-shadow: none;
}

.hero-search-btn {
    border-radius: 14px;
    box-shadow: 0 10px 25px rgba(251,191,36,.4);
    transition: transform .25s ease, box-shadow .25s ease;
}

.hero-search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 30px rgba(251,191,36,.5);
}

/* Tags */
.hero-tag {
    backdrop-filter: blur(2px);
    border-color: rgba(255,255,255,.4);
    transition: all .25s ease;
    font-size: 14px;
}

.hero-tag:hover {
    background: #fff;
    color: #2563eb;
    border-color: #fff;
    transform: translateY(-2px);
}

/* Floating decorative shapes */
.hero-shape {
    position: absolute;
    border-radius: 50%;
    opacity: .12;
    background: #fff;
    filter: blur(20px);
}

.hero-shape-1 {
    width: 260px;
    height: 260px;
    top: -60px;
    right: -60px;
    animation: floatShape 8s ease-in-out infinite;
}

.hero-shape-2 {
    width: 180px;
    height: 180px;
    bottom: -40px;
    left: -40px;
    animation: floatShape 10s ease-in-out infinite reverse;
}

.hero-shape-3 {
    width: 100px;
    height: 100px;
    top: 40%;
    left: 12%;
    animation: floatShape 6s ease-in-out infinite;
}

@keyframes floatShape {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

</style>
