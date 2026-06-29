@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header">
            <h3>👤 My Profile</h3>
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('customer.profile.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Name</label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="{{ old('name', auth()->user()->name) }}">
                </div>

                <div>
                    <input
    type="hidden"
    name="latitude"
    id="latitude"
    value="{{ auth()->user()->latitude }}">

<input
    type="hidden"
    name="longitude"
    id="longitude"
    value="{{ auth()->user()->longitude }}">
                </div>

                <div class="mb-3">
                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', auth()->user()->email) }}">
                </div>

                <div class="mb-3">
                    <label>Phone</label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        value="{{ old('phone', auth()->user()->phone) }}">
                </div>

                <div>
                    <button type="button" class="btn btn-info w-100" onclick="getLocation()">

                        📍 Detect My Location
                
                    </button>
                    <div id="mapPreview" style="height: 250px; margin-top: 10px;"></div>
                </div>

                <div class="mb-3">
                    <label>Address</label>

                    <textarea
                        name="address"
                        class="form-control"
                        rows="4">{{ old('address', auth()->user()->address) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>City</label>

                    <input
                        type="text"
                        name="city"
                        class="form-control"
                        value="{{ old('city', auth()->user()->city) }}">
                </div>

                <div class="mb-3">
                    <label>State</label>

                    <input
                        type="text"
                        name="state"
                        class="form-control"
                        value="{{ old('state', auth()->user()->state) }}">
                </div>

                <button class="btn btn-primary">
                    💾 Update Profile
                </button>

            </form>

        </div>

    </div>

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

window.onload = function(){

const lat = document.getElementById('latitude').value;
const lng = document.getElementById('longitude').value;

if(lat && lng){

    initMap(parseFloat(lat), parseFloat(lng));

}

}

</script>

@endsection