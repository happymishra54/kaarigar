<section class="hero-section">

    <!-- Background Decorations -->

    <div class="hero-bg-circle hero-bg-circle-1"></div>
    <div class="hero-bg-circle hero-bg-circle-2"></div>

    <div class="hero-decoration dot dot-1"></div>
    <div class="hero-decoration dot dot-2"></div>
    <div class="hero-decoration dot dot-3"></div>

    <div class="hero-ring ring-1"></div>
    <div class="hero-ring ring-2"></div>

    <div class="container">

        <div class="hero-content text-center">

            <!-- Badge -->

            <div class="hero-badge mx-auto">

                <i class="fa-solid fa-shield-check"></i>

                India's Trusted Home Service Platform

            </div>

            <!-- Heading -->

            <h1 class="hero-title">

                Book <span>Verified Professionals</span>

                <br>

                Near You in Minutes

            </h1>

            <!-- Subtitle -->

            <p class="hero-description">

                Find trusted electricians, plumbers, carpenters, painters,

                cleaners and hundreds of skilled professionals for your

                home and office. Safe, verified and affordable.

            </p>

            <!-- Search -->

            <form
                action="{{ route('home') }}"
                method="GET"
                class="hero-search">

                <div class="search-input">

                    <i class="fa-solid fa-screwdriver-wrench"></i>

                    <input
                        type="text"
                        name="search"
                        placeholder="Search Electrician, Plumber, Painter..."
                        value="{{ request('search') }}">

                </div>

                <div class="search-input">

                    <i class="fa-solid fa-location-dot"></i>

                    <input
                        type="text"
                        id="city"
                        name="city"
                        placeholder="Your City"
                        value="{{ request('city') }}">

                </div>

                <button
                    type="submit"
                    class="hero-search-btn">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    Find Workers

                </button>

            </form>

            <!-- Quick Categories -->

            <div class="hero-tags">

                <a href="{{ route('home',['search'=>'Electrician']) }}"
                   style="display:inline-flex;align-items:center;padding:12px 22px;border-radius:50px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;text-decoration:none;font-weight:600;backdrop-filter:blur(10px);transition:.3s;">
                    ⚡ Electrician
                </a>
            
                <a href="{{ route('home',['search'=>'Plumber']) }}"
                   style="display:inline-flex;align-items:center;padding:12px 22px;border-radius:50px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;text-decoration:none;font-weight:600;backdrop-filter:blur(10px);transition:.3s;">
                    🚰 Plumber
                </a>
            
                <a href="{{ route('home',['search'=>'Carpenter']) }}"
                   style="display:inline-flex;align-items:center;padding:12px 22px;border-radius:50px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;text-decoration:none;font-weight:600;backdrop-filter:blur(10px);transition:.3s;">
                    🪚 Carpenter
                </a>
            
                <a href="{{ route('home',['search'=>'Painter']) }}"
                   style="display:inline-flex;align-items:center;padding:12px 22px;border-radius:50px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;text-decoration:none;font-weight:600;backdrop-filter:blur(10px);transition:.3s;">
                    🎨 Painter
                </a>
            
                <a href="{{ route('home',['search'=>'Cleaner']) }}"
                   style="display:inline-flex;align-items:center;padding:12px 22px;border-radius:50px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.25);color:#fff;text-decoration:none;font-weight:600;backdrop-filter:blur(10px);transition:.3s;">
                    🧹 Cleaner
                </a>
            
            </div>

            <!-- Stats -->

            <div class="hero-stats">

                <div class="hero-stat-card">

                    <i class="fa-solid fa-users"></i>

                    <h3>5,000+</h3>

                    <span>Verified Workers</span>

                </div>

                <div class="hero-stat-card">

                    <i class="fa-solid fa-star"></i>

                    <h3>4.9</h3>

                    <span>Average Rating</span>

                </div>

                <div class="hero-stat-card">

                    <i class="fa-solid fa-city"></i>

                    <h3>100+</h3>

                    <span>Cities Covered</span>

                </div>

                <div class="hero-stat-card">

                    <i class="fa-solid fa-circle-check"></i>

                    <h3>10K+</h3>

                    <span>Completed Bookings</span>

                </div>

            </div>

        </div>

    </div>

    <div class="hero-wave">

        <svg viewBox="0 0 1440 180" preserveAspectRatio="none">

            <path
                fill="#F8FAFC"
                d="M0,64L80,80C160,96,320,128,480,128C640,128,800,96,960,80C1120,64,1280,64,1360,64L1440,64L1440,181L0,181Z"/>

        </svg>

    </div>

</section>