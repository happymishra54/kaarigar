@extends('layouts.app')

@section('content')
<x-home-hero />

{{-- Dashboard-like landing header (matches screenshot style) --}}



<section class="py-5 position-relative overflow-hidden">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                WHY CHOOSE KAARIGAR
            </span>

            <h2 class="section-title mt-3">
                Home Services You Can
                <span class="text-primary">Trust</span>
            </h2>

            <p class="section-subtitle mx-auto" style="max-width:700px;">

                From booking to completion, we make hiring skilled professionals
                simple, secure and completely hassle-free.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-xl-3 col-lg-6 col-md-6">

                <div class="feature-card h-100">

                    <div class="feature-icon blue">

                        <i class="fa-solid fa-shield-check"></i>

                    </div>

                    <div class="feature-content">

                        <h4>Verified Professionals</h4>

                        <p>

                            Every worker goes through identity verification
                            before joining our platform.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-lg-6 col-md-6">

                <div class="feature-card h-100">

                    <div class="feature-icon green">

                        <i class="fa-solid fa-bolt"></i>

                    </div>

                    <div class="feature-content">

                        <h4>Instant Booking</h4>

                        <p>

                            Find, compare and book skilled workers in just
                            a few clicks.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-lg-6 col-md-6">

                <div class="feature-card h-100">

                    <div class="feature-icon yellow">

                        <i class="fa-solid fa-award"></i>

                    </div>

                    <div class="feature-content">

                        <h4>Quality Work</h4>

                        <p>

                            Experienced professionals delivering reliable,
                            high-quality service every time.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-xl-3 col-lg-6 col-md-6">

                <div class="feature-card h-100">

                    <div class="feature-icon purple">

                        <i class="fa-solid fa-headset"></i>

                    </div>

                    <div class="feature-content">

                        <h4>Always Here to Help</h4>

                        <p>

                            Friendly customer support before, during and after
                            every booking.

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="row mt-5">

            <div class="col-lg-10 mx-auto">

                <div class="bg-white rounded-4 shadow-sm border p-4">

                    <div class="row text-center">

                        <div class="col-md-3 mb-3 mb-md-0">

                            <h3 class="fw-bold text-primary mb-1">
                                {{ number_format($verifiedWorkers) }}+
                            </h3>

                            <small class="text-muted">
                                Verified Workers
                            </small>

                        </div>

                        <div class="col-md-3 mb-3 mb-md-0">

                            <h3 class="fw-bold text-success mb-1">
                                {{ number_format($totalBookings) }}+
                            </h3>

                            <small class="text-muted">
                                Completed Bookings
                            </small>

                        </div>

                        <div class="col-md-3 mb-3 mb-md-0">

                            <h3 class="fw-bold text-warning mb-1">
                                {{ $totalCities }}+
                            </h3>

                            <small class="text-muted">
                                Cities Served
                            </small>

                        </div>

                        <div class="col-md-3">

                            <h3 class="fw-bold text-danger mb-1">
                                {{ $averageRating }} ★
                            </h3>

                            <small class="text-muted">
                                Customer Rating
                            </small>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>




<section class="stats-section section-blue py-5 position-relative overflow-hidden">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                OUR IMPACT
            </span>

            <h2 class="section-title text-white mt-3">

                Trusted by Thousands
                <br>
                Across India

            </h2>

            <p class="section-subtitle text-white-50 mx-auto" style="max-width:650px;">

                Every booking strengthens our mission of connecting customers
                with trusted and verified local professionals.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-xl-3 col-md-6">

                <div class="stats-card bg-white shadow-lg rounded-4 p-4 text-center h-100">

                    <div class="stats-icon mb-3">

                        <i class="fa-solid fa-users"></i>

                    </div>

                    <h2 class="fw-bold display-6 mb-2 counter"
                        data-target="{{ $verifiedWorkers }}">

                        {{ number_format($verifiedWorkers) }}

                    </h2>

                    <p class="mb-0 text-secondary">

                        Verified Workers

                    </p>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stats-card bg-white shadow-lg rounded-4 p-4 text-center h-100">

                    <div class="stats-icon mb-3">

                        <i class="fa-solid fa-calendar-check"></i>

                    </div>

                    <h2 class="fw-bold display-6 mb-2 counter"
                        data-target="{{ $totalBookings }}">

                        {{ number_format($totalBookings) }}

                    </h2>

                    <p class="mb-0 text-secondary">

                        Bookings Completed

                    </p>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stats-card bg-white shadow-lg rounded-4 p-4 text-center h-100">

                    <div class="stats-icon mb-3">

                        <i class="fa-solid fa-location-dot"></i>

                    </div>

                    <h2 class="fw-bold display-6 mb-2 counter"
                        data-target="{{ $totalCities }}">

                        {{ $totalCities }}

                    </h2>

                    <p class="mb-0 text-secondary">

                        Cities Covered

                    </p>

                </div>

            </div>

            <div class="col-xl-3 col-md-6">

                <div class="stats-card bg-white shadow-lg rounded-4 p-4 text-center h-100">

                    <div class="stats-icon mb-3">

                        <i class="fa-solid fa-star"></i>

                    </div>

                    <h2 class="fw-bold display-6 mb-2">

                        {{ $averageRating }}★

                    </h2>

                    <p class="mb-0 text-secondary">

                        Customer Rating

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<x-wave-divider />



<section class="py-5 position-relative overflow-hidden">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                POPULAR CATEGORIES
            </span>

            <h2 class="section-title mt-3">

                Find Skilled Professionals
                <br>
                For Every Service

            </h2>

            <p class="section-subtitle mx-auto" style="max-width:680px;">

                Whether you need an electrician, plumber, carpenter or cleaner,
                discover trusted professionals ready to help.

            </p>

        </div>

        <div class="row g-4">

            @php
                $icons = [
                    'Plumber'      => 'fa-faucet',
                    'Electrician'  => 'fa-bolt',
                    'Carpenter'    => 'fa-hammer',
                    'Painter'      => 'fa-paint-roller',
                    'Cleaner'      => 'fa-broom',
                    'Mechanic'     => 'fa-screwdriver-wrench',
                    'RO'           => 'fa-droplet',
                    'AC Repair'    => 'fa-fan',
                ];
            @endphp

            @foreach($categories as $category)

                <div class="col-xl-3 col-lg-4 col-md-6">

                    <a
                        href="{{ route('home',['search'=>$category->name]) }}"
                        class="text-decoration-none">

                        <div class="premium-category-card h-100">

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <div class="category-icon">

                                    <i class="fa-solid {{ $icons[$category->name] ?? 'fa-screwdriver-wrench' }}"></i>

                                </div>

                                <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">

                                    Available

                                </span>

                            </div>

                            <h4 class="fw-bold mb-3">

                                {{ $category->name }}

                            </h4>

                            <p class="text-muted mb-4">

                                Connect with experienced and verified
                                professionals for all your
                                {{ strtolower($category->name) }} needs.

                            </p>

                            <div class="d-flex justify-content-between align-items-center">

                                <span class="fw-semibold text-primary">

                                    View Workers

                                </span>

                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                     style="width:42px;height:42px;">

                                    <i class="fa-solid fa-arrow-right"></i>

                                </div>

                            </div>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>






<x-wave-divider />



<section class="services-section py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">

                POPULAR SERVICES

            </span>

            <h2 class="section-title">

                Professional Services
                <br>
                For Every Home

            </h2>

            <p class="section-subtitle">

                Discover trusted professionals for your everyday home service
                needs with transparent pricing and reliable quality.

            </p>

        </div>

        <div class="row g-4">

            @foreach($services as $service)

                <div class="col-lg-4 col-md-6">

                    <div class="premium-service-card reveal">

                        <div class="service-image">

                            @if($service->image)

                                <img
                                    src="{{ asset('storage/'.$service->image) }}"
                                    alt="{{ $service->title }}">

                            @else

                                <img
                                    src="{{ asset('images/default-service.jpg') }}"
                                    alt="{{ $service->title }}">

                            @endif

                            <span class="service-badge">

                                <i class="fa-solid fa-fire me-1"></i>

                                Popular

                            </span>

                        </div>

                        <div class="service-body">

                            <small class="text-primary fw-semibold mb-2 d-block">

                                Verified Service

                            </small>

                            <h4>

                                {{ $service->title }}

                            </h4>

                            <p>

                                {{ Str::limit($service->description,95) }}

                            </p>

                            <div class="service-footer">

                                <div>

                                    <small class="text-muted d-block">

                                        Starting From

                                    </small>

                                    <h5 class="text-primary">

                                        ₹{{ number_format($service->price) }}

                                    </h5>

                                </div>

                                <a
                                    href="{{ route('home',['search'=>$service->title]) }}"
                                    class="btn-primary-custom">

                                    Book Now

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="text-center mt-5">

            <a
                href="{{ route('home') }}"
                class="btn-outline-custom">

                View All Services

                <i class="fa-solid fa-arrow-right ms-2"></i>

            </a>

        </div>

    </div>

</section>

<x-wave-divider />

<section class="how-it-works section-gradient py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-semibold">
        
                HOW IT WORKS
        
            </span>
        
            <h2 class="fw-bold text-dark display-5 lh-sm mb-3">

                Book Trusted Professionals
                <br>
            
                <span class="border-bottom border-4 border-warning pb-1">
            
                    In 3 Simple Steps
            
                </span>
            
            </h2>
            
            <p class="fs-5 text-muted mx-auto" style="max-width:650px;">
            
                Search verified workers, book your preferred professional,
                and enjoy reliable home services with complete peace of mind.
            
            </p>
        
        </div>

        <div class="row g-4">

            <!-- Step 1 -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-lg rounded-4 h-100 text-center p-4">

                    <div class="mx-auto mb-4 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                         style="width:90px;height:90px;">

                        <i class="fas fa-magnifying-glass fs-2"></i>

                    </div>

                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">

                        STEP 01

                    </span>

                    <h4 class="fw-bold">

                        Search Workers

                    </h4>

                    <p class="text-muted mb-0">

                        Search verified electricians, plumbers,
                        painters, carpenters and many more
                        professionals near you.

                    </p>

                </div>

            </div>

            <!-- Step 2 -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-lg rounded-4 h-100 text-center p-4">

                    <div class="mx-auto mb-4 rounded-circle bg-success text-white d-flex align-items-center justify-content-center"
                         style="width:90px;height:90px;">

                        <i class="fas fa-calendar-check fs-2"></i>

                    </div>

                    <span class="badge bg-success rounded-pill px-3 py-2 mb-3">

                        STEP 02

                    </span>

                    <h4 class="fw-bold">

                        Book Instantly

                    </h4>

                    <p class="text-muted mb-0">

                        Compare ratings, reviews and pricing,
                        then confirm your booking in minutes.

                    </p>

                </div>

            </div>

            <!-- Step 3 -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-lg rounded-4 h-100 text-center p-4">

                    <div class="mx-auto mb-4 rounded-circle bg-warning text-white d-flex align-items-center justify-content-center"
                         style="width:90px;height:90px;">

                        <i class="fas fa-house-circle-check fs-2"></i>

                    </div>

                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2 mb-3">

                        STEP 03

                    </span>

                    <h4 class="fw-bold">

                        Enjoy the Service

                    </h4>

                    <p class="text-muted mb-0">

                        Sit back while skilled professionals
                        complete your work safely and efficiently.

                    </p>

                </div>

            </div>

        </div>

        <div class="text-center mt-5">

            <a href="#workers" class="btn btn-light btn-lg rounded-pill px-5">

                <i class="fas fa-arrow-right me-2"></i>

                Find Workers

            </a>

        </div>

    </div>

</section>


<x-wave-divider />

{{-- // testimonials section --}}
<section class="testimonials-section section-light py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">

                CUSTOMER REVIEWS

            </span>

            <h2 class="fw-bold mt-3">

                Loved by Homeowners Across India

            </h2>

            <p class="text-secondary fs-5 mx-auto" style="max-width:700px;">

                Thousands of customers rely on Kaarigar for trusted,
                verified professionals and a smooth booking experience.

            </p>

        </div>

        <div class="row g-4">

            <!-- Review 1 -->

            <div class="col-lg-4">

                <div class="testimonial-card h-100 shadow-sm border rounded-4 p-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <span class="badge bg-success">

                            <i class="fas fa-circle-check me-1"></i>

                            Verified Booking

                        </span>

                        <small class="text-muted">

                            2 days ago

                        </small>

                    </div>

                    <div class="d-flex align-items-center mb-3">

                        <img
                            src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=2563eb&color=fff"
                            class="rounded-circle me-3"
                            width="60"
                            height="60">

                        <div>

                            <h5 class="mb-0">

                                Rahul Sharma

                            </h5>

                            <small class="text-muted">

                                Electrician • Ludhiana

                            </small>

                        </div>

                    </div>

                    <div class="text-warning fs-5 mb-3">

                        ★★★★★

                    </div>

                    <p class="text-muted mb-0">

                        The electrician arrived exactly on time and fixed
                        the wiring issue within an hour. The booking process
                        was simple, pricing was transparent, and the service
                        exceeded my expectations.

                    </p>

                </div>

            </div>

            <!-- Review 2 -->

            <div class="col-lg-4">

                <div class="testimonial-card h-100 shadow-sm border rounded-4 p-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <span class="badge bg-success">

                            <i class="fas fa-circle-check me-1"></i>

                            Verified Booking

                        </span>

                        <small class="text-muted">

                            1 week ago

                        </small>

                    </div>

                    <div class="d-flex align-items-center mb-3">

                        <img
                            src="https://ui-avatars.com/api/?name=Priya+Verma&background=7C3AED&color=fff"
                            class="rounded-circle me-3"
                            width="60"
                            height="60">

                        <div>

                            <h5 class="mb-0">

                                Priya Verma

                            </h5>

                            <small class="text-muted">

                                Plumber • New Delhi

                            </small>

                        </div>

                    </div>

                    <div class="text-warning fs-5 mb-3">

                        ★★★★★

                    </div>

                    <p class="text-muted mb-0">

                        We had an urgent kitchen pipe leak. The plumber reached
                        quickly, explained everything clearly, and completed the
                        repair professionally. I will definitely use Kaarigar again.

                    </p>

                </div>

            </div>

            <!-- Review 3 -->

            <div class="col-lg-4">

                <div class="testimonial-card h-100 shadow-sm border rounded-4 p-4">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <span class="badge bg-success">

                            <i class="fas fa-circle-check me-1"></i>

                            Verified Booking

                        </span>

                        <small class="text-muted">

                            3 weeks ago

                        </small>

                    </div>

                    <div class="d-flex align-items-center mb-3">

                        <img
                            src="https://ui-avatars.com/api/?name=Amit+Singh&background=16A34A&color=fff"
                            class="rounded-circle me-3"
                            width="60"
                            height="60">

                        <div>

                            <h5 class="mb-0">

                                Amit Singh

                            </h5>

                            <small class="text-muted">

                                Carpenter • Chandigarh

                            </small>

                        </div>

                    </div>

                    <div class="text-warning fs-5 mb-3">

                        ★★★★★

                    </div>

                    <p class="text-muted mb-0">

                        I booked a carpenter to assemble furniture for my new
                        apartment. The work was neat, completed on time, and
                        the professional was polite and highly skilled.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- // javascript for state-city scrolldown  --}}
<script>

    document.addEventListener(
    'DOMContentLoaded',
    function(){
    
    initCitySelector(
    
    'city',
    
    "{{ request('city', auth()->user()->city ?? '') }}"
    
    );
    
    });
    
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    
        initLocationSelector(
            "state",
            "city",
            "{{ request('state', auth()->user()->state ?? '') }}",
            "{{ request('city', auth()->user()->city ?? '') }}"
        );
    
    });
    </script>

<script>

    const counters=document.querySelectorAll(".counter");
    
    counters.forEach(counter=>{
    
    const update=()=>{
    
    const target=+counter.dataset.target;
    
    const count=+counter.innerText;
    
    const increment=target/100;
    
    if(count<target){
    
    counter.innerText=Math.ceil(count+increment);
    
    setTimeout(update,20);
    
    }else{
    
    counter.innerText=target.toLocaleString()+"+";
    
    }
    
    };
    
    update();
    
    });
    
    </script>

<script>

    const counters = document.querySelectorAll('.stats-number');
    
    const observer = new IntersectionObserver(entries=>{
    
    entries.forEach(entry=>{
    
    if(!entry.isIntersecting) return;
    
    const counter = entry.target;
    
    const target = +counter.dataset.target;
    
    let current = 0;
    
    const increment = target / 100;
    
    const update = ()=>{
    
    current += increment;
    
    if(current < target){
    
    counter.innerText = Math.ceil(current).toLocaleString();
    
    requestAnimationFrame(update);
    
    }else{
    
    counter.innerText = target.toLocaleString()+"+";
    
    }
    
    };
    
    update();
    
    observer.unobserve(counter);
    
    });
    
    });
    
    counters.forEach(counter=>observer.observe(counter));
    
    </script>

<script>

    const sections=document.querySelectorAll('.fade-up');
    
    const sectionObserver=new IntersectionObserver(entries=>{
    
    entries.forEach(entry=>{
    
    if(entry.isIntersecting){
    
    entry.target.classList.add('show');
    
    }
    
    });
    
    },{
    threshold:.15
    });
    
    sections.forEach(section=>{
    
    sectionObserver.observe(section);
    
    });
    
    </script>

<script>
    window.addEventListener("scroll",function(){
    
    const navbar=document.querySelector(".navbar");
    
    if(window.scrollY>50){
    
    navbar.classList.add("scrolled");
    
    }else{
    
    navbar.classList.remove("scrolled");
    
    }
    
    });
    </script>

<script>

    const reveals=document.querySelectorAll(".reveal");
    
    window.addEventListener("scroll",()=>{
    
    reveals.forEach(el=>{
    
    const top=el.getBoundingClientRect().top;
    
    if(top<window.innerHeight-120){
    
    el.classList.add("active");
    
    }
    
    });
    
    });
    
    </script>
@endsection
