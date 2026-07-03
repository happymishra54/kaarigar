@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2 class="mb-4">

All Bookings

</h2>

<table class="table table-bordered">

<thead>

<tr>

<th>Booking No</th>
<th>Customer</th>
<th>Worker</th>
<th>Service</th>
<th>Amount</th>
<th>Status</th>
<th>Action</th>

</tr>

</thead>

<tbody>

@foreach($bookings as $booking)

<tr>

<td>

{{ $booking->booking_number }}

</td>

<td>

{{ $booking->customer->name }}

</td>

<td>

{{ $booking->worker->name }}

</td>

<td>

{{ $booking->service->title }}

</td>

<td>

₹{{ $booking->amount }}

</td>

<td>

{{ ucfirst($booking->status) }}

</td>

<td>

@if($booking->status != 'completed')

<form
action="{{ route('admin.booking.cancel',$booking) }}"
method="POST">

@csrf
@method('PATCH')

<button
class="btn-danger-custom btn-sm">

Cancel

</button>

</form>

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

{{ $bookings->links() }}

</div>

@endsection