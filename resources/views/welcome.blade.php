@extends('layouts.app')

@section('content')

<section class="hero">

<div class="container text-white">

<div class="row">

<div class="col-lg-8">

<h1 class="display-3 fw-bold">
Find Trusted Workers Near You
</h1>

<p class="lead">
Book electricians, plumbers, mechanics, cleaners and more in minutes.
</p>

        <form method="GET" action="/">

        <div class="row g-3">
        

            <div class="col-md-8">
        
                <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control form-control-lg"
                placeholder="Search plumber, electrician, painter, AC repair...">
            
            </div>
        
            {{-- <div class="col-md-2">
            
                <input
                type="text"
                name="city"
                value="{{ request('city') }}"
                class="form-control form-control-lg"
                placeholder="City">
            
            </div> --}}


            <div class="col-md-2">

                <input
                    type="text"
                    id="city"
                    name="city"
                    value="{{ request('city') }}"
                    class="form-control h-100"
                    placeholder="Current City">

            </div>

            {{-- <div class="col-md-2">

                <button
                    type="button"
                    class="btn btn-info w-100"
                    onclick="getLocation()">

                    Use My Location

                </button>

            </div> --}}


        
        <div class="col-md-2">
        
            <button
            type="submit"
            class="btn btn-warning btn-lg w-100">
        
                <i class="fa-solid fa-magnifying-glass"></i>
        
                Search
        
            </button>

            {{-- <a
                href="/"
                class="btn btn-secondary w-100">

                Clear

            </a> --}}
        
        </div>

        
        </div>
        
    </form>
    

</div>

</div>

</div>

</section>


<section class="py-5">

<div class="container">

<div class="row text-center">

<div class="col-md-3">

<div class="bg-white p-4 shadow stats-box">

<h2>5K+</h2>

<p>Workers</p>

</div>

</div>

<div class="col-md-3">

<div class="bg-white p-4 shadow stats-box">

<h2>10K+</h2>

<p>Bookings</p>

</div>

</div>

<div class="col-md-3">

<div class="bg-white p-4 shadow stats-box">

<h2>100+</h2>

<p>Cities</p>

</div>

</div>

<div class="col-md-3">

<div class="bg-white p-4 shadow stats-box">

<h2>4.8★</h2>

<p>Rating</p>

</div>

</div>

</div>

</div>

</section>


<section class="container py-5">

<h2 class="text-center mb-5">

Popular Categories

</h2>

<div class="row">

@foreach($categories as $category)

<div class="col-md-3 mb-4">

<div class="card category-card shadow">

<div class="card-body text-center">

<i class="fas fa-tools fa-3x mb-3"></i>

<h5>

{{ $category->name }}

</h5>

</div>

</div>

</div>

@endforeach

</div>

</section>


<section class="container py-5">

<h2 class="text-center mb-5">

Featured Services

</h2>

<div class="row">

@foreach($services as $service)

<div class="col-md-4 mb-4">

<div class="card worker-card shadow">

<div class="card-body">

<h4>

{{ $service->title }}

</h4>

<p>

{{ Str::limit($service->description,100) }}

</p>

<h5 class="text-success">

₹{{ $service->price }}

</h5>

</div>

</div>

</div>

@endforeach

</div>

</section>


<section class="container py-5">

    @if(
        request('name') ||
        request('city') ||
        request('category')
        )
        
        <h2 class="text-center mb-5">
        Search Results
        </h2>
        
        @else
        
        <h2 class="text-center mb-5">
        Featured Workers
        </h2>
        
        @endif

<div class="row">

@forelse($workers as $worker)

<div class="col-md-4 mb-4">

<div class="card shadow worker-card">

<div class="card-body text-center">

@if($worker->profile_image)

<img
src="{{ asset('storage/'.$worker->profile_image) }}"
class="rounded-circle mb-3"
width="120"
height="120">

@endif

<h4>

{{ $worker->user->name }} <br>

@if($worker->is_verified)

<span class="badge bg-success">

<i class="fa-solid fa-circle-check"></i>

Verified Worker

</span>

@endif

@if($worker->user->reviewsReceived->count())

<p class="text-warning">

⭐
{{ number_format(
$worker->user->reviewsReceived->avg('rating'),
1
) }}

</p>

@endif



</h4>


<p>

{{ $worker->user->reviewsReceived->count() }}

Reviews

</p>



<p class="text-muted">

    <i class="fa-solid fa-location-dot"></i>
    
    {{ $worker->city }},
    {{ $worker->state }}
    
</p>

<p>

    <i class="fa-solid fa-briefcase"></i>
    
    {{ $worker->experience }}
     Years Experience
    
</p>


<h5 class="text-success fw-bold">

    <i class="fa-solid fa-indian-rupee-sign"></i>
    
    {{ $worker->daily_wage }}/day
    
</h5>

<p>

{{ Str::limit($worker->bio,80) }}

</p>

<a
href="{{ route('worker.show',$worker->id) }}"
class="btn btn-primary">

View Profile

</a>

</div>

</div>

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

</section>


<section class="bg-light py-5">

<div class="container">

<h2 class="text-center mb-5">

How It Works

</h2>

<div class="row text-center">

<div class="col-md-4">

<h1>1</h1>

<h5>

Search Service

</h5>

</div>

<div class="col-md-4">

<h1>2</h1>

<h5>

Book Worker

</h5>

</div>

<div class="col-md-4">

<h1>3</h1>

<h5>

Get Work Done

</h5>

</div>

</div>

</div>

</section>


<section class="container py-5">

<h2 class="text-center mb-5">

Testimonials

</h2>

<div class="row">

<div class="col-md-4">

<div class="card shadow">

<div class="card-body">

★★★★★

<p>

Amazing service.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body">

★★★★★

<p>

Quick and reliable workers.

</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body">

★★★★★

<p>

Very professional.

</p>

</div>

</div>

</div>

</div>

</section>

@endsection

