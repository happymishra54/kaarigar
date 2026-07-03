@extends('layouts.app')

@section('content')
<x-home-hero />

{{-- Dashboard-like landing header (matches screenshot style) --}}
<section class="section-white py-5">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="section-header mb-4 mb-lg-0">
                    <span class="section-tag">DASHBOARD</span>
                    <h2 class="section-title">
                        Book Trusted Home Services
                        in Minutes
                    </h2>
                    <p class="section-subtitle">
                        Verified professionals, transparent pricing, and a hassle-free booking experience—built for your everyday needs.
                    </p>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="stats-section" style="padding:0;background:transparent;">
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <h2 class="counter" data-target="5000">0</h2>
                                <p>Verified Workers</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fa-solid fa-calendar-check"></i>
                                </div>
                                <h2 class="counter" data-target="10000">0</h2>
                                <p>Bookings Completed</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-6">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <h2 class="counter" data-target="100">0</h2>
                                <p>Cities Covered</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stats-card">
                                <div class="stats-icon">
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <h2>4.9★</h2>
                                <p>Customer Rating</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-4">
            <div class="col-lg-3 col-md-6">
                <div class="feature-card reveal">
                    <div class="feature-icon blue">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Verified</h4>
                        <p>Identity-verified professionals you can trust.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-card reveal">
                    <div class="feature-icon green">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Instant Booking</h4>
                        <p>Book in minutes with clear next steps.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-card reveal">
                    <div class="feature-icon purple">
                        <i class="fa-solid fa-medal"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Quality Service</h4>
                        <p>Skilled workers with real experience.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="feature-card reveal">
                    <div class="feature-icon yellow">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div class="feature-content">
                        <h4>Support 24×7</h4>
                        <p>We’re here when you need help.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="stats-section reveal">
    <div class="container">

    <div class="text-center mb-5">

        <span class="section-tag">

            WHY CHOOSE US

        </span>

        <h2 class="section-title">

            We Make Home Services
            Simple & Reliable

        </h2>

        <p class="section-subtitle">

            Trusted workers, transparent pricing,
            and hassle-free booking.

        </p>

    </div>

    <div class="row g-4">

        <div class="col-lg-3 col-md-6">

            <div class="feature-card reveal">

                <div class="feature-icon yellow">

                    <i class="fa-solid fa-shield-halved"></i>

                </div>

                <div class="feature-content">

                    <h4>Verified Workers</h4>

                    <p>

                        Every professional is
                        identity verified.

                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="feature-card reveal">

                <div class="feature-icon green">

                    <i class="fa-solid fa-calendar-check"></i>

                </div>

                <div class="feature-content">

                    <h4>Instant Booking</h4>

                    <p>

                        Book workers within
                        minutes.

                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="feature-card reveal">

                <div class="feature-icon purple">

                    <i class="fa-solid fa-medal"></i>

                </div>

                <div class="feature-content">

                    <h4>Quality Service</h4>

                    <p>

                        Skilled professionals
                        with experience.

                    </p>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="feature-card reveal">

                <div class="feature-icon blue">

                    <i class="fa-solid fa-headset"></i>

                </div>

                <div class="feature-content">

                    <h4>24×7 Support</h4>

                    <p>

                        Always available to
                        assist you.

                    </p>

                </div>

            </div>

        </div>

    </div>
</div>

</section>




<section class="stats-section section-blue fade-up">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">

                OUR IMPACT

            </span>

            <h2 class="section-title">

                Trusted Across India

            </h2>

            <p class="section-subtitle">

                Thousands of customers trust Kaarigar every day.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6">

                <div class="stats-card reveal-scale">

                    <i class="fa-solid fa-users stats-icon"></i>

                    <h2 class="counter"

                        data-target="5000">

                        0

                    </h2>

                    <p>

                        Verified Workers

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="stats-card reveal-scale">

                    <i class="fa-solid fa-calendar-check stats-icon"></i>

                    <h2 class="counter"

                        data-target="10000">

                        0

                    </h2>

                    <p>

                        Bookings Completed

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="stats-card reveal-scale">

                    <i class="fa-solid fa-location-dot stats-icon"></i>

                    <h2 class="counter"

                        data-target="100">

                        0

                    </h2>

                    <p>

                        Cities Covered

                    </p>

                </div>

            </div>

            <div class="col-lg-3 col-md-6">

                <div class="stats-card reveal-scale">

                    <i class="fa-solid fa-star stats-icon"></i>

                    <h2>

                        4.9★

                    </h2>

                    <p>

                        Customer Rating

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<x-wave-divider />



{{-- <section class="testimonials-section section-light fade-up"> --}}
<section class="stats-section reveal">
    <div class="container">

        <div class="section-header">

            <span class="section-tag">
        
                Categories
        
            </span>
        
            <h2>
        
                Find Professionals
                For Every Need
        
            </h2>
        
            <p>
        
                Browse trusted professionals across multiple home and business services.
        
            </p>
        
        </div>

<div class="row">

@foreach($categories as $category)

<div class="col-lg-3 col-md-6 mb-4">

    <div class="premium-category-card">

        <div class="category-icon">

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

<i class="fa-solid {{ $icons[$category->name] ?? 'fa-tools' }}"></i>

        </div>

        <h3>

            {{ $category->name }}

        </h3>

        <p>

            Trusted professionals available for this service.

        </p>

        <a href="#workers"

           class="category-link">

            Explore

            <i class="fa-solid fa-arrow-right"></i>

        </a>

    </div>

</div>

@endforeach

</div>
</div>

</section>


<section class="categories-section fade-up">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">
                CATEGORIES
            </span>

            <h2 class="section-title">
                Find the Right Professional
            </h2>

            <p class="section-subtitle">
                Browse the most popular home services near you.
            </p>

        </div>

        <div class="row g-4">

            @foreach($categories as $category)

            <div class="col-lg-3 col-md-6">

                <div class="premium-category-card">

                    <div class="category-circle">

                        <img
                            src="{{ $category->icon }}"
                            alt="{{ $category->name }}">

                    </div>

                    <h4>

                        {{ $category->name }}

                    </h4>

                    <p>

                        Trusted workers available in your area.

                    </p>

                    <a href="#workers"
                       class="category-btn">

                        Explore

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>



<x-wave-divider />



{{-- <section class="testimonials-section section-light fade-up"> --}}
<section class="stats-section reveal">
    <div class="container">

        <div class="section-header">

            <span class="section-tag">
        
                Services
        
            </span>
        
            <h2>
        
                Popular Services
        
            </h2>
        
            <p>
        
                Affordable services delivered by experienced professionals.
        
            </p>
        
        </div>

<div class="row">

@foreach($services as $service)

<div class="col-lg-4 col-md-6 mb-5">

    <div class="premium-service-card">

        <div class="service-image">

            @if($service->image)

                <img
                    src="{{ asset('storage/'.$service->image) }}"
                    alt="{{ $service->title }}">

            @else

                <img
                    src="{{ asset('images/default-service.jpg') }}"
                    alt="Service">

            @endif

            <span class="service-tag">

                Popular

            </span>

        </div>

        <div class="service-content">

            <h3>{{ $service->title }}</h3>

            <p>

                {{ Str::limit($service->description,70) }}

            </p>

            <div class="service-footer">

                <div class="service-price">

                    ₹{{ $service->price }}

                </div>

                <a href="#" class="btn-primary-custom">

                    Book Now

                </a>

            </div>

        </div>

    </div>

</div>

@endforeach

</div>
</div>

</section>



<x-wave-divider />



<section class="services-section fade-up">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">

                POPULAR SERVICES

            </span>

            <h2 class="section-title">

                Services You Can Trust

            </h2>

            <p class="section-subtitle">

                Book skilled professionals for all your home needs.

            </p>

        </div>

        <div class="row g-4">

            @foreach($services as $service)

            <div class="col-lg-4 col-md-6">

                <div class="premium-service-card reveal">

                    <div class="service-image">

                        <img
                            src="{{ $service->image }}"
                            alt="{{ $service->title }}"
                            class="img-fluid">
                    
                        <span class="service-badge">
                    
                            Popular
                    
                        </span>
                    
                    </div>

                    <div class="service-body">

                        <h4>

                            {{ $service->title }}

                        </h4>

                        <p>

                            {{ Str::limit($service->description,90) }}

                        </p>

                        <div class="service-footer">

                            <h5>

                                ₹{{ $service->price }}

                            </h5>

                            <a href="#workers"

                            class="btn-primary-custom">

                                View

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>



<x-wave-divider />



<section class="testimonials-section section-light fade-up">
    <div class="container">

    @if(
        request('name') ||
        request('city') ||
        request('category')
        )
        
        <h2 class="text-center mb-5">
        Search Results
        </h2>
        
        @else
        
        <div class="section-header">

            <span class="section-tag">
        
                Workers
        
            </span>
        
            <h2>
        
                Meet Our Top Rated Professionals
        
            </h2>
        
            <p>
        
                Skilled, verified and trusted workers near your location.
        
            </p>
        
        </div>
        
        @endif

<div class="row">

    @forelse($workers as $worker)

    <div class="col-lg-3 col-md-6">
    
        @include('partials.worker-card',['worker'=>$worker])
    
    </div>
    
    @empty

<div class="col-12">

<div class="alert alert-warning text-center">

<h4>No workers found</h4>

<p>
Try another name, city or category.
</p>

</div>

</div>

@endforelse

</div>
</div>

</section>




<x-wave-divider />



<section class="how-it-works section-gradient fade-up">

    <div class="container">

        <div class="text-center mb-5">

            <div class="section-header">

                <span class="section-tag">
            
                    Process
            
                </span>
            
                <h2 class="text-white">
            
                    How Kaarigar Works
            
                </h2>
            
                <p class="text-white-50">
            
                    Get your work completed in three simple steps.
            
                </p>
            
            </div>

            <h2 class="section-title">

                Book a Worker in 3 Easy Steps

            </h2>

            <p class="section-subtitle">

                Finding trusted professionals has never been easier.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="step-card reveal-scale">

                    <div class="step-number">

                        1

                    </div>

                    <div class="step-icon">

                        <i class="fa-solid fa-magnifying-glass"></i>

                    </div>

                    <h3>

                        Search

                    </h3>

                    <p>

                        Search workers by profession,
                        city and distance.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="step-card reveal-scale">

                    <div class="step-number">

                        2

                    </div>

                    <div class="step-icon">

                        <i class="fa-solid fa-calendar-check"></i>

                    </div>

                    <h3>

                        Book

                    </h3>

                    <p>

                        View profile, compare ratings
                        and book instantly.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="step-card reveal-scale">

                    <div class="step-number">

                        3

                    </div>

                    <div class="step-icon">

                        <i class="fa-solid fa-house-circle-check"></i>

                    </div>

                    <h3>

                        Relax

                    </h3>

                    <p>

                        Sit back while experienced
                        professionals complete the work.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



<x-wave-divider />


<section class="testimonials-section section-light fade-up">

    <div class="container">

        <div class="text-center mb-5">

            <div class="section-header">

                <span class="section-tag">
            
                    Reviews
            
                </span>
            
                <h2>
            
                    What Our Customers Say
            
                </h2>
            
                <p>
            
                    Thousands of happy customers trust Kaarigar every day.
            
                </p>
            
            </div>

            <h2 class="section-title">

                Loved by Thousands

            </h2>

            <p class="section-subtitle">

                Here's what our happy customers say.

            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="testimonial-card reveal">

                    <div class="testimonial-top">

                        <img
                            src="https://ui-avatars.com/api/?name=Rahul&background=2563eb&color=fff">

                        <div>

                            <h5>Rahul Sharma</h5>

                            <small>Ludhiana</small>

                        </div>

                    </div>

                    <div class="stars">

                        ★★★★★

                    </div>

                    <p>

                        Booking an electrician took less than
                        five minutes. Excellent experience.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="testimonial-card reveal">

                    <div class="testimonial-top">

                        <img
                            src="https://ui-avatars.com/api/?name=Priya&background=7C3AED&color=fff">

                        <div>

                            <h5>Priya Verma</h5>

                            <small>Delhi</small>

                        </div>

                    </div>

                    <div class="stars">

                        ★★★★★

                    </div>

                    <p>

                        Professional workers,
                        transparent pricing,
                        highly recommended.

                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="testimonial-card reveal">

                    <div class="testimonial-top">

                        <img
                            src="https://ui-avatars.com/api/?name=Amit&background=16A34A&color=fff">

                        <div>

                            <h5>Amit Singh</h5>

                            <small>Chandigarh</small>

                        </div>

                    </div>

                    <div class="stars">

                        ★★★★★

                    </div>

                    <p>

                        Finally a platform where
                        I can actually trust
                        local professionals.

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
