<section class="hero-section">

    <div class="hero-bg-circle hero-bg-circle-1"></div>
    <div class="hero-bg-circle hero-bg-circle-2"></div>
    <div class="hero-decoration dot dot-1"></div>
<div class="hero-decoration dot dot-2"></div>
<div class="hero-decoration dot dot-3"></div>

<div class="hero-plus plus-1">+</div>
<div class="hero-plus plus-2">+</div>

<div class="hero-ring ring-1"></div>
<div class="hero-ring ring-2"></div>

    <div class="container">

        <div class="hero-grid">

            <div class="hero-left">

                <div class="hero-badge">
                    <i class="fa-solid fa-circle-check"></i>
                    Trusted Marketplace
                </div>

                <h1 class="hero-title">
                    Find Trusted
                    <br>
                    Local
                    <span>Workers</span>
                </h1>

                <p class="hero-description">

                    Connect with verified electricians,
                    plumbers, painters, carpenters and
                    skilled professionals near you.

                </p>

                <form action="{{ route('home') }}" method="GET" class="hero-search">

                    <div class="search-input">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <input
                            type="text"
                            name="name"
                            placeholder="Search workers">

                    </div>

                    <div class="search-input">

                        <i class="fa-solid fa-location-dot"></i>

                        <input
                            type="text"
                            name="city"
                            placeholder="City">

                    </div>

                    <button class="hero-search-btn">

                        Search

                    </button>

                </form>

                <div class="hero-stats">

                    <div>

                        <h3>5000+</h3>

                        <span>Workers</span>

                    </div>

                    <div>

                        <h3>4.8 ★</h3>

                        <span>Rating</span>

                    </div>

                    <div>

                        <h3>100+</h3>

                        <span>Cities</span>

                    </div>

                </div>

            </div>

            <div class="hero-right">

                <div class="hero-image-wrapper">

                    <div class="hero-circle"></div>

                    <img
                        src="{{ asset('images/worker-hero.png') }}"
                        class="hero-worker-image">

                    <div class="floating-card card-1">

                        ⚡ Electrician

                    </div>

                    <div class="floating-card card-one">

                        ⭐ 4.9 Rating
                    
                    </div>
                    
                    <div class="floating-card card-two">
                    
                    ✔ Verified Workers
                    
                    </div>
                    
                    <div class="floating-card card-three">
                    
                    10K+ Bookings
                    
                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="hero-wave">

        <svg viewBox="0 0 1440 180" preserveAspectRatio="none">

            <path fill="#F8FAFC"
                d="M0,64L80,80C160,96,320,128,480,128C640,128,800,96,960,80C1120,64,1280,64,1360,64L1440,64L1440,181L0,181Z"/>

        </svg>

    </div>

</section>