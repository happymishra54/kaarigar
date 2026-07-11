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
<input type="text"
name="aadhaar_number"
class="form-control"
maxlength="12">
</div>

<div class="mb-3">
    <label>Aadhaar Image</label>

    <input
        type="file"
        name="aadhaar_image"
        class="form-control">
</div>

<button class="btn-primary-custom">

Save Profile

</button>

</form>

@else

<h2>My Profile</h2>

<div class="card shadow">

    <div class="card-body">

        @if($profile->profile_image)
            <img
                src="{{ asset('storage/'.$profile->profile_image) }}"
                class="rounded-circle shadow d-block mx-auto mb-3"
                width="150"
                height="150"
                style="object-fit: cover;">
        @endif
    
        <h3 class="text-center fw-bold mb-3">
            {{ $user->name }}
        </h3>
        
        
        <div class="text-center mb-4">
        
            @if($profile->is_verified)
        
                <span class="badge bg-success rounded-pill px-4 py-2">
        
                    <i class="fa-solid fa-circle-check me-1"></i>
        
                    Verified Worker
        
                </span>
        
            @else
        
                <span class="badge bg-warning text-dark rounded-pill px-4 py-2">
        
                    <i class="fa-solid fa-clock me-1"></i>
        
                    Pending Verification
        
                </span>
        
            @endif
        
        </div>
    
        <div class="text-start">
    
            <p>
                <strong>📞 Mobile:</strong>
                {{ $user->phone }}
            </p>
    
            <p>
                <strong>📍 City:</strong>
                {{ $profile->city }}
            </p>
    
            <p>
                <strong>🏙️ State:</strong>
                {{ $profile->state }}
            </p>
    
            <p>
                <strong>💼 Experience:</strong>
                {{ $profile->experience }} Years
            </p>
    
            <p>
                <strong>💰 Daily Wage:</strong>
                ₹{{ $profile->daily_wage }} per day
            </p>
    
            <p>
                <strong>📝 Bio:</strong>
                {{ $profile->bio }}
            </p>
    
        </div>
    
        <div class="text-center mt-4">
    
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
                    type="submit"
                    class="btn-primary-custom"
                    style="background:linear-gradient(135deg,#DC2626,#B91C1C); border:none;"
                    onclick="return confirm('Are you sure you want to delete your profile?')">
                    Delete Profile
                </button>
    
            </form>
    
        </div>
    
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



function fillAddress(data)
{

    if(!data.address)
    {
        return;
    }


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



    let addressBox = document.querySelector('textarea[name="address"]');

    let cityBox = document.querySelector('input[name="city"]');

    let stateBox = document.querySelector('input[name="state"]');



    if(addressBox)
    {
        addressBox.value =
        `${house} ${road}`.trim();
    }


    if(cityBox)
    {
        cityBox.value = city;
    }


    if(stateBox)
    {
        stateBox.value =
        address.state || "";
    }

}





function initMap(lat,lng)
{

    let mapElement = document.getElementById('mapPreview');


    if(!mapElement)
    {
        return;
    }



    if(map)
    {
        map.remove();
    }



    map = L.map('mapPreview')
    .setView(
        [lat,lng],
        15
    );



    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {

            attribution:'© OpenStreetMap'

        }

    ).addTo(map);



    marker = L.marker(
        [lat,lng],
        {
            draggable:true
        }

    ).addTo(map);




    marker.on('dragend', async function(){


        let pos = marker.getLatLng();


        document.getElementById('latitude').value =
        pos.lat;


        document.getElementById('longitude').value =
        pos.lng;



        let response = await fetch(

            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${pos.lat}&lon=${pos.lng}`

        );


        let data = await response.json();



        fillAddress(data);


    });


}







async function getLocation()
{


    if(!navigator.geolocation)
    {

        alert(
            "Geolocation not supported."
        );

        return;

    }




    navigator.geolocation.getCurrentPosition(

    async function(position){



        const lat =
        position.coords.latitude;


        const lng =
        position.coords.longitude;




        document.getElementById('latitude').value =
        lat;


        document.getElementById('longitude').value =
        lng;





        let response = await fetch(

            `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`

        );



        let data = await response.json();



        fillAddress(data);



        initMap(
            lat,
            lng
        );



    },

    function()
    {

        alert(
            "Unable to fetch location."
        );

    },

    {

        enableHighAccuracy:true,
        timeout:10000,
        maximumAge:300000

    });


}





</script>

@endsection