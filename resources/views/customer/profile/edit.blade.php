@extends('layouts.app')

@section('content')

<div class="container py-5">


    {{-- HEADER --}}
    <div class="text-center mb-5">

        <span class="section-tag">

            ACCOUNT SETTINGS

        </span>


        <h2 class="section-title mt-2">

            Edit Profile

        </h2>


        <p class="section-subtitle">

            Update your personal information and location details.

        </p>


    </div>




    <div class="row justify-content-center">

        <div class="col-lg-8">


            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">


                {{-- TOP HEADER --}}
                <div class="bg-primary text-white text-center p-4">


                    <div class="edit-profile-icon mx-auto mb-3">

                        <i class="fa-solid fa-user-pen"></i>

                    </div>


                    <h3 class="fw-bold mb-1">

                        {{ $user->name }}

                    </h3>


                    <p class="mb-0 opacity-75">

                        Manage your Kaarigar account

                    </p>


                </div>





                <div class="card-body p-5">


                    <form 
                    action="{{ route('customer.profile.update') }}" 
                    method="POST">

                        @csrf
                        @method('PUT')



                        <h5 class="fw-bold mb-4">

                            <i class="fa-solid fa-user text-primary me-2"></i>

                            Personal Information

                        </h5>




                        <div class="row g-4">


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Full Name

                                </label>

                                <input
                                type="text"
                                name="name"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('name',$user->name) }}">

                            </div>




                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Email Address

                                </label>

                                <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('email',$user->email) }}">

                            </div>




                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    Phone Number

                                </label>


                                <input
                                type="text"
                                name="phone"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('phone',$user->phone) }}">

                            </div>


                        </div>






                        {{-- LOCATION --}}

                        <hr class="my-5">



                        <h5 class="fw-bold mb-4">

                            <i class="fa-solid fa-location-dot text-danger me-2"></i>

                            Location Information

                        </h5>




                        <input
                        type="hidden"
                        name="latitude"
                        id="latitude"
                        value="{{ $user->latitude }}">


                        <input
                        type="hidden"
                        name="longitude"
                        id="longitude"
                        value="{{ $user->longitude }}">





                        <button
                        type="button"
                        class="btn btn-info text-white rounded-pill px-4 mb-4"
                        onclick="getLocation()">


                            <i class="fa-solid fa-location-crosshairs me-2"></i>

                            Detect My Location


                        </button>





                        <div
                        id="mapPreview"
                        class="rounded-4 shadow-sm mb-4"
                        style="height:280px;">
                        </div>





                        <div class="row g-4">


                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    City

                                </label>


                                <input
                                type="text"
                                name="city"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('city',$user->city) }}">


                            </div>





                            <div class="col-md-6">

                                <label class="form-label fw-semibold">

                                    State

                                </label>


                                <input
                                type="text"
                                name="state"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('state',$user->state) }}">


                            </div>





                            <div class="col-12">


                                <label class="form-label fw-semibold">

                                    Address

                                </label>


                                <textarea
                                name="address"
                                rows="3"
                                class="form-control form-control-lg rounded-3">{{ old('address',$user->address) }}</textarea>


                            </div>


                        </div>






                        <div class="text-center mt-5">


                            <button
                            class="btn btn-primary btn-lg rounded-pill px-5">


                                <i class="fa-solid fa-floppy-disk me-2"></i>

                                Save Changes


                            </button>


                        </div>



                    </form>


                </div>


            </div>


        </div>


    </div>


</div>





{{-- MAP --}}
<link rel="stylesheet"
href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">


<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>



<script>

let map;
let marker;



function fillAddress(data){

    const address = data.address || {};


    const city =
        address.city ||
        address.city_district ||
        address.town ||
        address.municipality ||
        address.village ||
        address.county ||
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



    map = L.map('mapPreview')
    .setView([lat,lng],15);



    L.tileLayer(
    'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    {
        attribution:'© OpenStreetMap'
    })
    .addTo(map);




    marker = L.marker(
        [lat,lng],
        {
            draggable:true
        }
    )
    .addTo(map);





    marker.on('dragend',async function(){


        const pos = marker.getLatLng();



        document.getElementById('latitude').value =
        pos.lat;



        document.getElementById('longitude').value =
        pos.lng;



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





window.onload=function(){


    const lat =
    document.getElementById('latitude').value;



    const lng =
    document.getElementById('longitude').value;



    if(lat && lng){

        initMap(
            parseFloat(lat),
            parseFloat(lng)
        );

    }


}


</script>


@endsection