@extends('layouts.app')

@section('content')

<div class="container py-5">


    <div class="row justify-content-center">

        <div class="col-lg-8">


            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">


                {{-- HEADER --}}
                <div class="bg-primary text-white p-4 text-center">

                    <h3 class="fw-bold mb-1">

                        📅 Book Service

                    </h3>

                    <p class="mb-0 opacity-75">

                        Schedule your trusted professional

                    </p>

                </div>





                <div class="card-body p-4">



                    {{-- ERRORS --}}

                    @if($errors->any())

                        <div class="alert alert-danger rounded-4">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif





                    <form action="{{ route('booking.store') }}" method="POST">

                        @csrf



                        {{-- SERVICE ID --}}

                        <input
                            type="hidden"
                            name="service_id"
                            value="{{ $service->id }}">



                        {{-- WORKER ID --}}

                        @if(isset($worker))

                        <input
                            type="hidden"
                            name="worker_id"
                            value="{{ $worker->id }}">

                        @endif





                        {{-- LOCATION --}}

                        <input
                            type="hidden"
                            name="latitude"
                            id="latitude"
                            value="{{ old('latitude') }}">


                        <input
                            type="hidden"
                            name="longitude"
                            id="longitude"
                            value="{{ old('longitude') }}">




                        {{-- SERVICE --}}

                        <div class="mb-4">


                            <label class="form-label fw-bold">

                                Service

                            </label>


                            <input
                                class="form-control form-control-lg rounded-3"
                                value="{{ $service->title }}"
                                readonly>


                        </div>






                        {{-- WORKER --}}

                        @if(isset($worker))


                        <div class="mb-4">


                            <label class="form-label fw-bold">

                                Professional

                            </label>



                            <div class="card bg-light border-0 rounded-4">


                                <div class="card-body">


                                    <h5 class="fw-bold mb-1">

                                        {{ $worker->user->name }}

                                    </h5>


                                    <p class="text-muted mb-1">

                                        <i class="fas fa-location-dot text-danger me-2"></i>

                                        {{ $worker->city }}

                                    </p>


                                    <p class="text-muted mb-0">

                                        ⭐

                                        {{ number_format($worker->user->reviewsReceived->avg('rating') ?? 0,1) }}

                                        Rating

                                    </p>


                                </div>


                            </div>


                        </div>


                        @endif







                        {{-- DATE --}}

                        <div class="mb-4">


                            <label class="form-label fw-bold">

                                Booking Date

                            </label>


                            <input
                                type="date"
                                name="booking_date"
                                class="form-control form-control-lg rounded-3"
                                min="{{ date('Y-m-d') }}"
                                value="{{ old('booking_date') }}"
                                required>


                        </div>






                        {{-- TIME --}}

                        <div class="mb-4">


                            <label class="form-label fw-bold">

                                Booking Time

                            </label>


                            <input
                                type="time"
                                name="booking_time"
                                class="form-control form-control-lg rounded-3"
                                value="{{ old('booking_time') }}"
                                required>


                        </div>








                        {{-- ADDRESS --}}


                        <div class="mb-4">


                            <label class="form-label fw-bold">

                                Service Address

                            </label>


                            <textarea
                                id="address"
                                name="address"
                                class="form-control form-control-lg rounded-3"
                                rows="4"
                                placeholder="Enter complete service address"
                                required>{{ old('address') }}</textarea>


                        </div>







                        {{-- LOCATION BUTTON --}}


                        <div class="mb-4">


                            <button
                                type="button"
                                onclick="getLocation()"
                                id="locationBtn"
                                class="btn btn-success rounded-pill px-4">


                                <i class="fas fa-location-crosshairs me-2"></i>

                                Use My Current Location


                            </button>




                            <div
                                id="locationStatus"
                                class="text-muted mt-3">


                                Location not selected.


                            </div>


                        </div>








                        {{-- SUBMIT --}}


                        <button
                            class="btn btn-primary btn-lg rounded-pill w-100">


                            <i class="fas fa-check-circle me-2"></i>

                            Confirm Booking


                        </button>



                    </form>



                </div>



            </div>


        </div>


    </div>



</div>








<script>


function getLocation(){


    if(!navigator.geolocation){


        alert("Geolocation is not supported.");

        return;


    }



    const button =
        document.getElementById("locationBtn");



    const status =
        document.getElementById("locationStatus");



    button.disabled=true;



    button.innerHTML =
    `
        <i class="fas fa-spinner fa-spin me-2"></i>
        Detecting Location...
    `;



    status.innerHTML =
    "📍 Fetching your location...";





    navigator.geolocation.getCurrentPosition(



        async function(position){


            const lat =
                position.coords.latitude;



            const lng =
                position.coords.longitude;





            document.getElementById("latitude").value = lat;


            document.getElementById("longitude").value = lng;





            try{


                const response = await fetch(

                `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`

                );



                const data =
                    await response.json();



                if(data.display_name){


                    document.getElementById("address").value =
                        data.display_name;


                }



            }
            catch(error){


                console.log(error);


            }





            status.innerHTML =
            `
                <span class="text-success">

                    ✅ Location captured successfully.

                </span>
            `;



            button.disabled=false;



            button.innerHTML =
            `
                <i class="fas fa-location-crosshairs me-2"></i>

                Use My Current Location
            `;



        },



        function(){



            alert(
                "Unable to fetch location."
            );



            button.disabled=false;



            button.innerHTML =
            `
                <i class="fas fa-location-crosshairs me-2"></i>

                Use My Current Location
            `;



        },



        {

            enableHighAccuracy:true,

            timeout:10000,

            maximumAge:0

        }



    );



}



</script>



@endsection