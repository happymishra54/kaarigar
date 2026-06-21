@extends('layouts.app')

@section('content')

<div class="container py-5">

@if(!$profile)

<h2>Create Profile</h2>

<form
action="{{ route('worker.profile.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

<div class="mb-3">
<label>Name</label>
<input type="text"
name="name"
class="form-control">
</div>

<div class="mb-3">
<label>Mobile</label>
<input type="number"
name="mobile"
class="form-control">
</div>

<div class="mb-3">
<label>Address</label>
<textarea
name="address"
class="form-control"></textarea>
</div>

<div class="mb-3">
<label>City</label>
<input type="text"
name="city"
class="form-control">
</div>

<div class="mb-3">
<label>State</label>
<input type="text"
name="state"
class="form-control">
</div>

<div class="mb-3">
<label>Bio</label>
<textarea
name="bio"
class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Experience</label>
<input type="text"
name="experience"
class="form-control">
</div>

<div class="mb-3">
<label>Daily Wage</label>
<input type="text"
name="daily_wage"
class="form-control">
</div>


<div class="mb-3">



<input
type="file"
name="profile_image"
class="form-control">

</div>



<div class="mb-3">
<label>Aadhaar Number</label>
<input type="number"
name="aadhaar_number"
class="form-control">
</div>

<div class="mb-3">
    <label>Aadhaar Image</label>

    <input
        type="file"
        name="aadhaar_image"
        class="form-control">
</div>

<button class="btn btn-success">

Save Profile

</button>

</form>

@else

<h2>My Profile</h2>

<div class="card shadow">

    <div class="card-body text-center">

        @if($profile->profile_image)
        
        <img
            src="{{ asset('storage/'.$profile->profile_image) }}"
            class="rounded-circle mb-4 shadow"
            width="150"
            height="150"
            style="object-fit:cover;">
        
        @endif

<p>
<b>Name:</b>
{{ $profile->name }}
</p>

<p>
<b>Mobile:</b>
{{ $profile->mobile }}
</p>

<p>
<b>City:</b>
{{ $profile->city }}
</p>

<p>
<b>State:</b>
{{ $profile->state }}
</p>

<p>
<b>Experience:</b>
{{ $profile->experience }}
Years
</p>

<p>
<b>Daily Wage:</b>
₹{{ $profile->daily_wage }} per day
</p>

<p>
<b>Bio:</b>
{{ $profile->bio }}
</p>




<a
href="{{ route('worker.profile.edit') }}"
class="btn btn-warning">

Edit Profile

</a>

<form
action="{{ route('worker.profile.delete') }}"
method="POST"
class="d-inline">

    @csrf

    @method('DELETE')

    <button
    class="btn btn-danger"
    onclick="return confirm('Are you sure you want to delete your profile?')">

        Delete Profile

    </button>

</form>



</div>

</div>

@endif

</div>

@endsection