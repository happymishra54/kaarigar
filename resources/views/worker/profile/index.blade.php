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
<input
type="text"
name="name"
class="form-control"
value="{{ old('name', $user->name) }}">
</div>

<div>
    <input
    type="hidden"
    name="latitude"
    id="latitude"
    value="{{ optional($profile)->latitude }}">

<input
    type="hidden"
    name="longitude"
    id="longitude"
    value="{{ optional($profile)->longitude }}">
</div>

<div class="mb-3">
<label>Mobile</label>
<input
type="text"
name="mobile"
class="form-control"
value="{{ old('mobile', $user->phone) }}">
</div>

<div class="mb-3">

    <button type="button" class="btn btn-info w-100" onclick="getLocation()">

        📍 Detect My Location

    </button>
    <div id="mapPreview" style="height: 250px; margin-top: 10px;"></div>

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
<label>Profile Image</label>
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

<button class="btn-success-custom">

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
{{ $user->name }}
</p>

<p>
<b>Mobile:</b>
{{ $user->phone }}
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
class="btn-primary-custom">

Edit Profile

</a>

<form
action="{{ route('worker.profile.delete') }}"
method="POST"
class="d-inline">

    @csrf

    @method('DELETE')

    <button
    class="btn-danger-custom"
    onclick="return confirm('Are you sure you want to delete your profile?')">

        Delete Profile

    </button>

</form>



</div>

</div>

@endif

</div>


<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

let map;
let marker;

function fillAddress(data){

    const address = data.address;

    const city =
        address.city ||
        address.city_district ||
        address.town ||
        address.municipality ||
        address.village ||
        address.hamlet ||
        "";

    const road =
        address.road ||
        address.residential ||
        address.neighbourhood ||
        "";

    const house =
        address.house_number || "";

    document.querySelector('textarea[name="address"]').value =
        `${house} ${road}`.trim();

    document.querySelector('input[name="city"]').value = city;

    document.querySelector('input[name="state"]').value =
        address.state || "";

}

function initMap(lat,lng){

    if(map){
        map.remove();
    }

    map = L.map('mapPreview').setView([lat,lng],15);

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution:'© OpenStreetMap'
        }
    ).addTo(map);

    marker = L.marker([lat,lng],{
        draggable:true
    }).addTo(map);

    marker.on('dragend',async function(){

        const pos = marker.getLatLng();

        document.getElementById('latitude').value = pos.lat;
        document.getElementById('longitude').value = pos.lng;

        const res = await fetch(
            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${pos.lat}&lon=${pos.lng}`
        );

        const data = await res.json();

        fillAddress(data);

    });

}

async function getLocation(){

    if(!navigator.geolocation){
        alert("Geolocation not supported.");
        return;
    }

    navigator.geolocation.getCurrentPosition(async function(position){

        const lat = position.coords.latitude;
        const lng = position.coords.longitude;

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;

        const res = await fetch(
            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`
        );

        const data = await res.json();

        fillAddress(data);

        initMap(lat,lng);

    },function(){

        alert("Unable to fetch location.");

    });

}

</script>

@endsection