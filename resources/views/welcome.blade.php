@extends('layouts.app')

@section('content')
<x-home-hero />

{{-- Dashboard-like landing header (matches screenshot style) --}}



<section class="py-5 bg-light">

    <div class="container">

        <!-- Heading -->

        <div class="text-center mb-5">

            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">

                WHY CHOOSE KAARIGAR

            </span>

            <h2 class="display-5 fw-bold mt-4">

                Trusted Home Services,
                <span class="text-primary">Delivered Right</span>

            </h2>

            <p class="lead text-secondary mx-auto" style="max-width:700px;">

                Hire verified professionals with confidence.
                Fast booking, transparent service and reliable support —
                all in one place.

            </p>

        </div>

        <!-- Features -->

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">

                <div class="card h-100 border-0 shadow-sm text-center p-4">

                    <div class="mx-auto mb-4 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                         style="width:80px;height:80px;">

                        <i class="fas fa-shield-check fa-2x"></i>

                    </div>

                    <h4 class="fw-bold">

                        Verified Workers

                    </h4>

                    <p class="text-muted mb-0">

                        Every professional is identity verified before joining Kaarigar.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card h-100 border-0 shadow-sm text-center p-4">

                    <div class="mx-auto mb-4 rounded-circle bg-success text-white d-flex align-items-center justify-content-center"
                         style="width:80px;height:80px;">

                        <i class="fas fa-calendar-check fa-2x"></i>

                    </div>

                    <h4 class="fw-bold">

                        Easy Booking

                    </h4>

                    <p class="text-muted mb-0">

                        Search, compare and book skilled workers in just a few clicks.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card h-100 border-0 shadow-sm text-center p-4">

                    <div class="mx-auto mb-4 rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center"
                         style="width:80px;height:80px;">

                        <i class="fas fa-award fa-2x"></i>

                    </div>

                    <h4 class="fw-bold">

                        Quality Service

                    </h4>

                    <p class="text-muted mb-0">

                        Skilled professionals committed to delivering excellent work.

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="card h-100 border-0 shadow-sm text-center p-4">

                    <div class="mx-auto mb-4 rounded-circle bg-danger text-white d-flex align-items-center justify-content-center"
                         style="width:80px;height:80px;">

                        <i class="fas fa-headset fa-2x"></i>

                    </div>

                    <h4 class="fw-bold">

                        Dedicated Support

                    </h4>

                    <p class="text-muted mb-0">

                        Our support team is here whenever you need assistance.

                    </p>

                </div>

            </div>

        </div>

        <!-- Statistics -->

        <div class="card border-0 shadow-lg rounded-4 mt-5">

            <div class="card-body py-5">

                <div class="row text-center">

                    <div class="col-md-3">

                        <h2 class="fw-bold text-primary">

                            {{ number_format($verifiedWorkers) }}+

                        </h2>

                        <p class="text-muted mb-0">

                            Verified Workers

                        </p>

                    </div>

                    <div class="col-md-3">

                        <h2 class="fw-bold text-success">

                            {{ number_format($totalBookings) }}+

                        </h2>

                        <p class="text-muted mb-0">

                            Completed Bookings

                        </p>

                    </div>

                    <div class="col-md-3">

                        <h2 class="fw-bold text-warning">

                            {{ $totalCities }}+

                        </h2>

                        <p class="text-muted mb-0">

                            Cities Served

                        </p>

                    </div>

                    <div class="col-md-3">

                        <h2 class="fw-bold text-danger">

                            {{ $averageRating }} ★

                        </h2>

                        <p class="text-muted mb-0">

                            Customer Rating

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>




<section class="py-5 bg-primary text-white">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">

                OUR IMPACT

            </span>

            <h2 class="display-5 fw-bold mt-4">

                Trusted by Thousands
                <br>

                Across India

            </h2>

            <p class="lead text-white-50 mx-auto" style="max-width:650px;">

                Every booking helps us connect customers with trusted,
                verified local professionals across the country.

            </p>

        </div>

        <div class="row g-4">

            {{-- Verified Workers --}}
            <div class="col-lg-3 col-sm-6">

                <div class="card h-100 border-0 shadow text-center">

                    <div class="card-body py-4">

                        <div class="display-5 text-primary mb-3">

                            <i class="fas fa-users"></i>

                        </div>

                        <h2 class="fw-bold counter"
                            data-target="{{ $verifiedWorkers }}">

                            {{ number_format($verifiedWorkers) }}

                        </h2>

                        <p class="text-muted mb-0">

                            Verified Workers

                        </p>

                    </div>

                </div>

            </div>

            {{-- Bookings --}}
            <div class="col-lg-3 col-sm-6">

                <div class="card h-100 border-0 shadow text-center">

                    <div class="card-body py-4">

                        <div class="display-5 text-success mb-3">

                            <i class="fas fa-calendar-check"></i>

                        </div>

                        <h2 class="fw-bold counter"
                            data-target="{{ $totalBookings }}">

                            {{ number_format($totalBookings) }}

                        </h2>

                        <p class="text-muted mb-0">

                            Completed Bookings

                        </p>

                    </div>

                </div>

            </div>

            {{-- Cities --}}
            <div class="col-lg-3 col-sm-6">

                <div class="card h-100 border-0 shadow text-center">

                    <div class="card-body py-4">

                        <div class="display-5 text-warning mb-3">

                            <i class="fas fa-location-dot"></i>

                        </div>

                        <h2 class="fw-bold counter"
                            data-target="{{ $totalCities }}">

                            {{ number_format($totalCities) }}

                        </h2>

                        <p class="text-muted mb-0">

                            Cities Covered

                        </p>

                    </div>

                </div>

            </div>

            {{-- Rating --}}
            <div class="col-lg-3 col-sm-6">

                <div class="card h-100 border-0 shadow text-center">

                    <div class="card-body py-4">

                        <div class="display-5 text-danger mb-3">

                            <i class="fas fa-star"></i>

                        </div>

                        <h2 class="fw-bold">

                            {{ $averageRating }}★

                        </h2>

                        <p class="text-muted mb-0">

                            Customer Rating

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<x-wave-divider />



<section class="py-5 bg-light" id="categories">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">

                POPULAR CATEGORIES

            </span>

            <h2 class="display-5 fw-bold mt-4">

                Find Skilled Professionals
                <br>

                <span class="text-primary">
                    For Every Service
                </span>

            </h2>

            <p class="lead text-secondary mx-auto" style="max-width:680px;">

                Hire trusted and verified professionals for all your
                home maintenance and repair needs.

            </p>

        </div>

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

        <div class="row g-4">

            @foreach($categories as $category)

                <div class="col-xl-3 col-lg-4 col-md-6">

                    <a href="{{ route('home',['search'=>$category->name]) }}"
                       class="text-decoration-none">

                        <div class="card border-0 shadow-sm h-100 text-center">

                            <div class="card-body p-4">

                                <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-4"
                                     style="width:75px;height:75px;">

                                    <i class="fa-solid {{ $icons[$category->name] ?? 'fa-screwdriver-wrench' }} fa-2x"></i>

                                </div>

                                <h4 class="fw-bold">

                                    {{ $category->name }}

                                </h4>

                                <p class="text-muted my-3">

                                    Verified professionals available for all your
                                    {{ strtolower($category->name) }} requirements.

                                </p>

                                <button class="btn btn-outline-primary rounded-pill px-4">

                                    Explore Services

                                    <i class="fas fa-arrow-right ms-2"></i>

                                </button>

                            </div>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>

    </div>

</section>






<x-wave-divider />



<section class="py-5 bg-white" id="services">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">

                POPULAR SERVICES

            </span>

            <h2 class="display-5 fw-bold mt-4">

                Professional Services
                <br>

                <span class="text-primary">

                    For Every Home

                </span>

            </h2>

            <p class="lead text-secondary mx-auto" style="max-width:700px;">

                Book trusted professionals with transparent pricing,
                verified quality and reliable service.

            </p>

        </div>

        <div class="row g-4">

            @foreach($services as $service)

                <div class="col-lg-4 col-md-6">

                    <div class="card border-0 shadow-sm h-100">

                        <div class="position-relative">

                            @if($service->image)

                                <img
                                    src="{{ asset('storage/'.$service->image) }}"
                                    class="card-img-top"
                                    style="height:230px;object-fit:cover;"
                                    alt="{{ $service->title }}">

                            @else

                                <img
                                    src="{{ asset('images/default-service.jpg') }}"
                                    class="card-img-top"
                                    style="height:230px;object-fit:cover;"
                                    alt="{{ $service->title }}">

                            @endif

                            <span class="badge bg-danger position-absolute top-0 end-0 m-3 px-3 py-2">

                                <i class="fas fa-fire me-1"></i>

                                Popular

                            </span>

                        </div>

                        <div class="card-body d-flex flex-column">

                            <span class="badge bg-success-subtle text-success align-self-start mb-3">

                                Verified Service

                            </span>

                            <h4 class="fw-bold">

                                {{ $service->title }}

                            </h4>

                            <p class="text-secondary flex-grow-1">

                                {{ Str::limit($service->description,100) }}

                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-3">

                                <div>

                                    <small class="text-muted">

                                        Starting From

                                    </small>

                                    <h4 class="fw-bold text-primary mb-0">

                                        ₹{{ number_format($service->price) }}

                                    </h4>

                                </div>

                                <a
                                    href="{{ route('home',['search'=>$service->title]) }}"
                                    class="btn btn-primary rounded-pill px-4">

                                    Book

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
                class="btn btn-outline-primary btn-lg rounded-pill px-5">

                View All Services

                <i class="fas fa-arrow-right ms-2"></i>

            </a>

        </div>

    </div>

</section>

<x-wave-divider />

<section class="py-5 bg-light" id="how-it-works">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">

                HOW IT WORKS

            </span>

            <h2 class="display-5 fw-bold mt-4">

                Get Your Work Done
                <br>

                <span class="text-primary">

                    In Just 3 Simple Steps

                </span>

            </h2>

            <p class="lead text-secondary mx-auto" style="max-width:700px;">

                Finding trusted professionals is quick and easy.
                Search, book and relax while experienced workers
                complete your job.

            </p>

        </div>

        <div class="row g-4 text-center">

            <!-- STEP 1 -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-5">

                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mx-auto mb-4"
                             style="width:90px;height:90px;">

                            <i class="fas fa-search fa-2x"></i>

                        </div>

                        <span class="badge bg-primary mb-3">

                            STEP 1

                        </span>

                        <h4 class="fw-bold">

                            Search

                        </h4>

                        <p class="text-muted mb-0">

                            Search verified electricians, plumbers,
                            carpenters, painters and other skilled
                            professionals near your location.

                        </p>

                    </div>

                </div>

            </div>

            <!-- STEP 2 -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-5">

                        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center mx-auto mb-4"
                             style="width:90px;height:90px;">

                            <i class="fas fa-calendar-check fa-2x"></i>

                        </div>

                        <span class="badge bg-success mb-3">

                            STEP 2

                        </span>

                        <h4 class="fw-bold">

                            Book

                        </h4>

                        <p class="text-muted mb-0">

                            Compare profiles, ratings and prices,
                            then confirm your booking within minutes.

                        </p>

                    </div>

                </div>

            </div>

            <!-- STEP 3 -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-5">

                        <div class="rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center mx-auto mb-4"
                             style="width:90px;height:90px;">

                            <i class="fas fa-house-circle-check fa-2x"></i>

                        </div>

                        <span class="badge bg-warning text-dark mb-3">

                            STEP 3

                        </span>

                        <h4 class="fw-bold">

                            Relax

                        </h4>

                        <p class="text-muted mb-0">

                            Your chosen professional arrives on time
                            and completes the work efficiently.

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <div class="text-center mt-5">

            <a href="#workers"
               class="btn btn-primary btn-lg rounded-pill px-5">

                Find Workers

                <i class="fas fa-arrow-right ms-2"></i>

            </a>

        </div>

    </div>

</section>


<x-wave-divider />

{{-- // testimonials section --}}
<section class="py-5 bg-light" id="reviews">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">

                CUSTOMER REVIEWS

            </span>

            <h2 class="display-5 fw-bold mt-4">

                Trusted by Families
                <br>

                Across India

            </h2>

            <p class="lead text-secondary mx-auto" style="max-width:700px;">

                Real experiences shared by customers who booked verified
                professionals through Kaarigar.

            </p>

        </div>

        <div class="row g-4">

            <!-- Review 1 -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4 d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <span class="text-warning fs-5">

                                ★★★★★

                            </span>

                            <span class="badge bg-success">

                                Verified Booking

                            </span>

                        </div>

                        <span class="badge bg-primary-subtle text-primary align-self-start mb-3">

                            Electrician

                        </span>

                        <p class="text-muted flex-grow-1">

                            "Booked an electrician for a wiring issue. He arrived
                            on time, explained the problem clearly and completed
                            the repair professionally. Excellent service and fair pricing."

                        </p>

                        <hr>

                        <div class="d-flex align-items-center">

                            <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&background=2563eb&color=fff"
                                 class="rounded-circle me-3"
                                 width="55"
                                 height="55">

                            <div>

                                <h6 class="fw-bold mb-0">

                                    Rahul Sharma

                                </h6>

                                <small class="text-muted">

                                    Ludhiana, Punjab

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Review 2 -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4 d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <span class="text-warning fs-5">

                                ★★★★★

                            </span>

                            <span class="badge bg-success">

                                Verified Booking

                            </span>

                        </div>

                        <span class="badge bg-info-subtle text-info align-self-start mb-3">

                            Plumber

                        </span>

                        <p class="text-muted flex-grow-1">

                            "Had an emergency kitchen pipe leak. The plumber
                            reached quickly, fixed everything neatly and even
                            checked the remaining fittings before leaving."

                        </p>

                        <hr>

                        <div class="d-flex align-items-center">

                            <img src="https://ui-avatars.com/api/?name=Priya+Verma&background=7C3AED&color=fff"
                                 class="rounded-circle me-3"
                                 width="55"
                                 height="55">

                            <div>

                                <h6 class="fw-bold mb-0">

                                    Priya Verma

                                </h6>

                                <small class="text-muted">

                                    New Delhi

                                </small>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Review 3 -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4 d-flex flex-column">

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <span class="text-warning fs-5">

                                ★★★★★

                            </span>

                            <span class="badge bg-success">

                                Verified Booking

                            </span>

                        </div>

                        <span class="badge bg-warning-subtle text-warning align-self-start mb-3">

                            Carpenter

                        </span>

                        <p class="text-muted flex-grow-1">

                            "The carpenter assembled all my furniture perfectly.
                            He was punctual, polite and completed the work much
                            faster than expected. Highly recommended."

                        </p>

                        <hr>

                        <div class="d-flex align-items-center">

                            <img src="https://ui-avatars.com/api/?name=Amit+Singh&background=16A34A&color=fff"
                                 class="rounded-circle me-3"
                                 width="55"
                                 height="55">

                            <div>

                                <h6 class="fw-bold mb-0">

                                    Amit Singh

                                </h6>

                                <small class="text-muted">

                                    Chandigarh

                                </small>

                            </div>

                        </div>

                    </div>

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
