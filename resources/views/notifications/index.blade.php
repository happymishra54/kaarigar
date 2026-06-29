@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2 class="mb-4">

🔔 Notifications

</h2>

@forelse($notifications as $notification)

<div class="card mb-3">

<div class="card-body">

<h5>

{{ $notification->data['message'] }}

</h5>

<p>

Booking No :

{{ $notification->data['booking_number'] }}

</p>

<p>

Status :

{{ ucfirst($notification->data['status']) }}

</p>

@if(!$notification->read_at)

<form
method="POST"
action="{{ route('notifications.read',$notification->id) }}">

@csrf

@method('PATCH')

<button class="btn btn-primary">

Mark as Read

</button>

</form>

@endif

</div>

</div>

@empty

<div class="alert alert-info">

No notifications yet.

</div>

@endforelse

</div>

@endsection