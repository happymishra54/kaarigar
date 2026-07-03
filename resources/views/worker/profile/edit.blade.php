@extends('layouts.app')

@section('content')

<div class="container py-5">

<h2>Edit Profile</h2>

<form
action="{{ route('worker.profile.update') }}"
method="POST">

    @csrf
    @method('PUT')

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
type="number"
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
    class="btn-primary-custom">
    Update Profile
</button>

</form>

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
        // address.town ||
        // address.municipality ||
        // address.village ||
        address.hamlet ||
        "";

    const address =
        address.road ||
        address.residential ||
        address.neighbourhood ||
        "";

    // const house =
    //     address.house_number || "";

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

// Show saved location automatically when opening Edit page
window.onload = function(){

    const lat = document.getElementById('latitude').value;
    const lng = document.getElementById('longitude').value;

    if(lat && lng){

        initMap(parseFloat(lat),parseFloat(lng));

    }

}

</script>

@endsection