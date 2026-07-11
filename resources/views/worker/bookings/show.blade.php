@extends('layouts.app')

@section('content')

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-9">


{{-- HEADER --}}

<div class="card border-0 shadow-lg rounded-4 mb-4">

<div class="card-body p-4">


<div class="d-flex justify-content-between align-items-center flex-wrap gap-3">


<div>

<h3 class="fw-bold mb-1">

Booking #{{ $booking->booking_number }}

</h3>


<small class="text-muted">

<i class="fa-solid fa-clock me-1"></i>

{{ $booking->created_at->format('d M Y • h:i A') }}

</small>


</div>



<div>

@if($booking->status == 'pending')

<span class="badge bg-warning text-dark fs-6 px-4 py-2 rounded-pill">
Pending
</span>

@elseif($booking->status == 'accepted')

<span class="badge bg-success fs-6 px-4 py-2 rounded-pill">
Accepted
</span>

@elseif($booking->status == 'in_progress')

<span class="badge bg-info text-dark fs-6 px-4 py-2 rounded-pill">
In Progress
</span>

@elseif($booking->status == 'completed')

<span class="badge bg-primary fs-6 px-4 py-2 rounded-pill">
Completed
</span>

@else

<span class="badge bg-danger fs-6 px-4 py-2 rounded-pill">
Cancelled
</span>

@endif

</div>


</div>


</div>

</div>



{{-- CUSTOMER INFO --}}


<div class="card border-0 shadow rounded-4 mb-4">

<div class="card-body p-4">


<h5 class="fw-bold mb-4">

<i class="fa-solid fa-user text-primary me-2"></i>

Customer Information

</h5>



<div class="row align-items-center">


<div class="col-md-8">


<h4 class="fw-bold">

{{ $booking->customer->name ?? 'Customer' }}

</h4>


<p class="text-muted">

<i class="fa-solid fa-phone me-2"></i>

{{ $booking->customer->phone ?? 'No phone number' }}

</p>


</div>



<div class="col-md-4 text-md-end">


@if($booking->customer && $booking->customer->phone)

<a href="tel:{{ $booking->customer->phone }}"
class="btn btn-success rounded-pill px-4">

<i class="fa-solid fa-phone me-2"></i>

Call Customer

</a>

@endif


</div>


</div>


</div>

</div>




{{-- BOOKING DETAILS --}}


<div class="card border-0 shadow rounded-4 mb-4">


<div class="card-body p-4">


<h5 class="fw-bold mb-4">

<i class="fa-solid fa-clipboard-list text-primary me-2"></i>

Booking Details

</h5>



<div class="table-responsive">


<table class="table">


<tr>

<th>
Service
</th>

<td>
{{ $booking->service->title ?? 'Service' }}
</td>

</tr>


<tr>

<th>
Date
</th>

<td>

{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}

</td>

</tr>



<tr>

<th>
Time
</th>

<td>

{{ \Carbon\Carbon::parse($booking->booking_time)->format('h:i A') }}

</td>

</tr>



<tr>

<th>
Address
</th>

<td>

{{ $booking->address }}

<br>


@if($booking->latitude && $booking->longitude)

<a target="_blank"
href="https://www.google.com/maps?q={{$booking->latitude}},{{$booking->longitude}}"
class="btn btn-sm btn-outline-primary mt-2 rounded-pill">

<i class="fa-solid fa-location-dot"></i>

Open Map

</a>

@endif


</td>

</tr>



<tr>

<th>
Amount
</th>


<td>

<h4 class="text-success fw-bold mb-0">

₹{{ number_format($booking->amount ?? 0,2) }}

</h4>

</td>


</tr>


</table>


</div>


</div>

</div>





{{-- TIMELINE --}}


<div class="card border-0 shadow rounded-4 mb-4">


<div class="card-body p-4">


<h5 class="fw-bold mb-4">

<i class="fa-solid fa-road text-warning me-2"></i>

Job Progress

</h5>



<ul class="list-group list-group-flush">


<li class="list-group-item">

✅ Booking Received

</li>



<li class="list-group-item">

@if(in_array($booking->status,['accepted','in_progress','completed']))

✅ Booking Accepted

@else

⏳ Waiting For Acceptance

@endif

</li>



<li class="list-group-item">

@if(in_array($booking->status,['in_progress','completed']))

✅ Work Started

@else

⏳ Work Not Started

@endif

</li>



<li class="list-group-item">


@if($booking->status=='completed')

🎉 Job Completed


@elseif($booking->status=='cancelled')

❌ Booking Cancelled


@else

⏳ Job Pending

@endif


</li>



</ul>


</div>

</div>





{{-- ACTIONS --}}


<div class="card border-0 shadow rounded-4">


<div class="card-body p-4 text-center">


@if($booking->status=='pending')


<form action="{{route('worker.booking.accept',$booking)}}"
method="POST"
class="d-inline">

@csrf
@method('PATCH')


<button class="btn btn-success btn-lg rounded-pill px-4">

<i class="fa-solid fa-check me-2"></i>

Accept

</button>


</form>



<form action="{{route('worker.booking.reject',$booking)}}"
method="POST"
class="d-inline">

@csrf
@method('PATCH')


<button class="btn btn-danger btn-lg rounded-pill px-4">

<i class="fa-solid fa-xmark me-2"></i>

Reject

</button>


</form>



@elseif($booking->status=='accepted')


<form action="{{route('worker.booking.start',$booking)}}"
method="POST">

@csrf
@method('PATCH')


<button class="btn btn-primary btn-lg rounded-pill px-5">

<i class="fa-solid fa-play me-2"></i>

Start Work

</button>


</form>



@elseif($booking->status=='in_progress')


<form action="{{route('worker.booking.complete',$booking)}}"
method="POST">

@csrf
@method('PATCH')


<button class="btn btn-primary btn-lg rounded-pill px-5">

<i class="fa-solid fa-check me-2"></i>

Complete Job

</button>


</form>



@elseif($booking->status=='completed')


<button class="btn btn-success btn-lg rounded-pill px-5"
disabled>

🎉 Completed

</button>



@else


<button class="btn btn-secondary btn-lg rounded-pill px-5"
disabled>

Cancelled

</button>



@endif



</div>

</div>


</div>

</div>

</div>


@endsection