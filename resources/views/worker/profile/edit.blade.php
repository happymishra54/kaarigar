@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2>Edit Profile</h2>

<form
action="{{ route('worker.profile.update') }}"
method="PUT">


<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{-- <input type="hidden" name="_method" value="PUT"> --}}



<div class="mb-3">

    <label>Name</label>
    
    <input
    type="text"
    name="name"
    class="form-control"
    value="{{ $profile->name }}">
    
    </div>

<div class="mb-3">

<label>Mobile</label>

<input
type="number"
name="mobile"
class="form-control"
value="{{ $profile->mobile }}">

</div>

<div class="mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control">{{ $profile->address }}</textarea>

</div>

<div class="mb-3">

<label>City</label>

<input
type="text"
name="city"
class="form-control"
value="{{ $profile->city }}">

</div>

<div class="mb-3">

<label>State</label>

<input
type="text"
name="state"
class="form-control"
value="{{ $profile->state }}">

</div>

<div class="mb-3">

<label>Bio</label>

<textarea
name="bio"
class="form-control">{{ $profile->bio }}</textarea>

</div>

<div class="mb-3">

<label>Experience</label>

<input
type="string"
name="experience"
class="form-control"
value="{{ $profile->experience }}">

</div>

<div class="mb-3">

<label>Daily Wage</label>

<input
type="string"
name="daily_wage"
class="form-control"
value="{{ $profile->daily_wage }}">

</div>

<button
    type="submit"
    class="btn btn-primary">
    Update Profile
</button>

</form>

</div>

@endsection

