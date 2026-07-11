@extends('layouts.app')

@section('content')

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">


<div class="card shadow-lg border-0 rounded-4">

<div class="card-body p-5">


<h2 class="fw-bold mb-4">

<i class="fa-solid fa-user-pen text-primary me-2"></i>

Edit Worker Profile

</h2>



<form action="{{ route('worker.profile.update') }}"
method="POST">

@csrf
@method('PUT')



<div class="mb-3">

<label class="fw-semibold">
Name
</label>

<input
type="text"
name="name"
class="form-control"
value="{{ old('name',$user->name) }}">

</div>




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





<div class="mb-3">

<label class="fw-semibold">
Mobile
</label>

<input
type="text"
name="mobile"
class="form-control"
value="{{ old('mobile',$user->phone) }}">

</div>





<div class="mb-3">

<button
type="button"
onclick="getLocation()"
class="btn btn-info text-white w-100 rounded-pill">


<i class="fa-solid fa-location-crosshairs me-2"></i>

Detect My Location


</button>


<div id="mapPreview"
class="rounded-4 mt-3"
style="height:250px">
</div>


</div>





<div class="mb-3">

<label class="fw-semibold">
Address
</label>


<textarea
name="address"
class="form-control"
rows="3">{{ old('address',optional($profile)->address) }}</textarea>


</div>





<div class="mb-3">

<label class="fw-semibold">
City
</label>


<input
type="text"
name="city"
class="form-control"
value="{{ old('city',optional($profile)->city) }}">


</div>





<div class="mb-3">

<label class="fw-semibold">
State
</label>


<input
type="text"
name="state"
class="form-control"
value="{{ old('state',optional($profile)->state) }}">


</div>





<div class="mb-3">

<label class="fw-semibold">
Bio
</label>


<textarea
name="bio"
class="form-control"
rows="3">{{ old('bio',optional($profile)->bio) }}</textarea>


</div>





<div class="mb-3">

<label class="fw-semibold">
Experience (Years)
</label>


<input
type="number"
name="experience"
class="form-control"
value="{{ old('experience',optional($profile)->experience) }}">


</div>





<div class="mb-3">

<label class="fw-semibold">
Daily Wage
</label>


<input
type="number"
name="daily_wage"
class="form-control"
value="{{ old('daily_wage',optional($profile)->daily_wage) }}">


</div>





<button
class="btn btn-primary rounded-pill px-5">


<i class="fa-solid fa-save me-2"></i>

Update Profile


</button>



</form>


</div>

</div>


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


const addr = data.address || {};



const city =
addr.city ||
addr.city_district ||
addr.town ||
addr.municipality ||
addr.village ||
addr.hamlet ||
"";



const road =
addr.road ||
addr.residential ||
addr.neighbourhood ||
"";



const house =
addr.house_number || "";



document.querySelector('textarea[name="address"]').value =
`${house} ${road}`.trim();



document.querySelector('input[name="city"]').value =
city;



document.querySelector('input[name="state"]').value =
addr.state || "";



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
}
).addTo(map);



marker = L.marker(
[lat,lng],
{
draggable:true
}
).addTo(map);




marker.on('dragend',async function(){


let pos = marker.getLatLng();



document.getElementById('latitude').value =
pos.lat;


document.getElementById('longitude').value =
pos.lng;



let res = await fetch(

`https://nominatim.openstreetmap.org/reverse?format=json&lat=${pos.lat}&lon=${pos.lng}`

);



let data = await res.json();



fillAddress(data);


});


}







async function getLocation(){


if(!navigator.geolocation){

alert("Location not supported");

return;

}



navigator.geolocation.getCurrentPosition(async function(position){



let lat =
position.coords.latitude;


let lng =
position.coords.longitude;



document.getElementById('latitude').value =
lat;


document.getElementById('longitude').value =
lng;




let res = await fetch(

`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`

);



let data = await res.json();



fillAddress(data);



initMap(lat,lng);



},function(){

alert("Unable to fetch location");


});


}





window.onload=function(){


let lat =
document.getElementById('latitude').value;


let lng =
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