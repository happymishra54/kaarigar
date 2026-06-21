@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2>

Leave Review

</h2>

<form
action="{{ route('review.store') }}"
method="POST">

@csrf

<input
type="hidden"
name="booking_id"
value="{{ $booking->id }}">

<div class="mb-3">

<label>

Rating (1-5)

</label>

<select
name="rating"
class="form-control">

<option value="5">5</option>
<option value="4">4</option>
<option value="3">3</option>
<option value="2">2</option>
<option value="1">1</option>

</select>

</div>

<div class="mb-3">

<label>

Comment

</label>

<textarea
name="comment"
class="form-control">

</textarea>

</div>

<button class="btn btn-success">

Submit Review

</button>

</form>

</div>

@endsection

