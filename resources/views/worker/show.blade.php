@extends('layouts.app')

@section('content')

<div class="container py-5">


<div class="card border-0 shadow-lg rounded-4 overflow-hidden">


<div class="card-body p-4">



{{-- Profile Header --}}

<div class="text-center">


@if($worker->profile_image)

<img
src="{{ asset('storage/'.$worker->profile_image) }}"
class="rounded-circle shadow mb-3"
width="160"
height="160"
style="object-fit:cover;">

@endif



<h2 class="fw-bold">

{{ $worker->user->name }}

</h2>



@if($worker->is_verified)

<span class="badge bg-success rounded-pill px-3 py-2">

<i class="fa-solid fa-circle-check me-1"></i>

Verified Worker

</span>


@else

<span class="badge bg-warning text-dark rounded-pill px-3 py-2">

<i class="fa-solid fa-clock me-1"></i>

Verification Pending

</span>


@endif



</div>




<hr class="my-4">





{{-- Rating --}}

<div class="text-center mb-4">


@if($worker->user->reviewsReceived->count())


<h5 class="text-warning">


⭐

{{ number_format(
$worker->user->reviewsReceived->avg('rating'),
1
) }}


<small class="text-muted">

({{ $worker->user->reviewsReceived->count() }} Reviews)

</small>


</h5>


@else


<h5 class="text-secondary">

No reviews yet

</h5>


@endif


</div>







{{-- Worker Information --}}


<div class="row g-4">



<div class="col-md-6">


<div class="card border-0 bg-light rounded-4 p-3">


<p>

<i class="fa-solid fa-location-dot text-danger me-2"></i>

<strong>Location:</strong>

<br>

{{ $worker->city }}, {{ $worker->state }}

</p>




<p>

<i class="fa-solid fa-phone text-success me-2"></i>

<strong>Mobile:</strong>

{{ $worker->mobile }}

</p>



</div>


</div>





<div class="col-md-6">


<div class="card border-0 bg-light rounded-4 p-3">



<p>

<i class="fa-solid fa-briefcase text-primary me-2"></i>

<strong>Experience:</strong>

{{ $worker->experience }} Years

</p>




<p>

<i class="fa-solid fa-indian-rupee-sign text-success me-2"></i>

<strong>Daily Wage:</strong>

₹{{ number_format($worker->daily_wage) }}

</p>



</div>


</div>


</div>





{{-- Bio --}}


<div class="mt-4">


<h4 class="fw-bold">

About Worker

</h4>


<p class="text-muted">

{{ $worker->bio }}

</p>


</div>







{{-- Services --}}


<hr class="my-5">


<h3 class="fw-bold mb-4">

🛠 Services Offered

</h3>




<div class="row g-4">



@forelse($worker->user->services as $service)



<div class="col-md-4">


<div class="card border-0 shadow rounded-4 h-100 overflow-hidden">



@if($service->image)


<img
src="{{ asset('storage/'.$service->image) }}"
class="card-img-top"
height="180"
style="object-fit:cover;">


@endif




<div class="card-body">


<h5 class="fw-bold">

{{ $service->title }}

</h5>



<p class="text-muted">

{{ Str::limit($service->description,100) }}

</p>



<h4 class="text-success fw-bold">

₹{{ number_format($service->price) }}

</h4>



<a
href="{{ route('booking.create',$service->id) }}"
class="btn-primary-custom w-100 text-center">

Book Service

</a>



</div>


</div>


</div>




@empty


<div class="col-12">


<div class="alert alert-light text-center rounded-4">


<i class="fa-solid fa-screwdriver-wrench fa-2x mb-3"></i>


<h5>

No services available

</h5>


<p class="text-muted">

This worker has not added services yet.

</p>


</div>


</div>


@endforelse



</div>









{{-- Reviews --}}



<hr class="my-5">



<h3 class="fw-bold mb-4">

⭐ Customer Reviews

</h3>




@forelse($worker->user->reviewsReceived as $review)



<div class="card border-0 shadow-sm rounded-4 mb-3">


<div class="card-body">



<h5 class="fw-bold">

{{ $review->customer->name }}

</h5>




<p class="mb-2">


@for($i=1;$i<=$review->rating;$i++)

⭐

@endfor



</p>




<p class="text-muted mb-0">

{{ $review->comment }}

</p>




</div>


</div>




@empty



<div class="text-muted">

No reviews yet.

</div>



@endforelse





</div>


</div>


</div>


@endsection