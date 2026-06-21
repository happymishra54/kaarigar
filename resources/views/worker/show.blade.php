@extends('layouts.app')

@section('content')

<div class="container py-5">

<div class="card shadow">

<div class="card-body">


    <h2>
    
    @if($worker->profile_image)
    
    <img
    src="{{ asset('storage/'.$worker->profile_image) }}"
    class="rounded-circle mb-4"
    width="150"
    height="150">
    
    @endif
    
    <br>
    
    {{ $worker->user->name }}
    
    </h2>
    
    @if($worker->user->reviewsReceived->count())
    
    <h5 class="text-warning">
    
    ⭐
    {{ number_format(
    $worker->user->reviewsReceived->avg('rating'),
    1
    ) }}
    
    (
    {{ $worker->user->reviewsReceived->count() }}
    reviews)
    
    </h5>
    
    @else
    
    <h5 class="text-secondary">
    
    No reviews yet
    
    </h5>
    
    @endif
    
    <p>
    <b>Location:</b>
    {{ $worker->city }},<br>
    {{ $worker->state }} <br>
    <b>Mobile:</b>
    {{ $worker->mobile }}
    </p>

    

<p>

<b>Experience:</b>

{{ $worker->experience }} Years

</p>

<p>

<b>Daily Wage:</b>

₹{{ $worker->daily_wage }}

</p>

<p>

<b>Bio:</b>

{{ $worker->bio }}

</p>

<hr>

<h3>

Services Offered

</h3>


<hr>

<h3 class="mt-5">

Customer Reviews

</h3>

@forelse($worker->user->reviewsReceived as $review)

<div class="card shadow mb-3">

    <div class="card-body">

        <h5>

            {{ $review->customer->name }}

        </h5>

        <p>

            Rating:
            @for($i=1;$i<=$review->rating;$i++)
                    ⭐
            @endfor

        </p>

        <p>

            {{ $review->comment }}

        </p>

    </div>

</div>

@empty

<p>

No reviews yet.

</p>

@endforelse



<div class="row">

@foreach($worker->user->services as $service)

<div class="col-md-4 mb-3">

<div class="card shadow">

<div class="card-body">

<h5>

{{ $service->title }}

</h5>

<p>

{{ Str::limit($service->description,100) }}

</p>

<h6 class="text-success">

₹{{ $service->price }}

</h6>

<a
href="{{ route('booking.create',$service->id) }}"
class="btn btn-primary">

Book Service

</a>

</div>

</div>

</div>

@endforeach

</div>

</div>

</div>

</div>

@endsection

