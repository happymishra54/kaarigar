@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-primary text-white py-3">

                    <h3 class="mb-0">
                        📅 Book Service
                    </h3>

                </div>

                <div class="card-body p-4">

                    <form action="{{ route('booking.store') }}" method="POST">

                        @csrf

                        <input
                            type="hidden"
                            name="service_id"
                            value="{{ $service->id }}">

                        <!-- Hidden Location Fields -->

                        <input
                            type="hidden"
                            name="latitude"
                            id="latitude">

                        <input
                            type="hidden"
                            name="longitude"
                            id="longitude">

                        <!-- Service -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Service

                            </label>

                            <input
                                class="form-control"
                                value="{{ $service->title }}"
                                readonly>

                        </div>

                        <!-- Date -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Booking Date

                            </label>

                            <input
                                type="date"
                                name="booking_date"
                                class="form-control"
                                required>

                        </div>

                        <!-- Time -->

                        <div class="mb-4">

                            <label class="form-label fw-bold">

                                Booking Time

                            </label>

                            <input
                                type="time"
                                name="booking_time"
                                class="form-control"
                                required>

                        </div>

                        <!-- Address -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                Service Address

                            </label>

                            <textarea
                                id="address"
                                name="address"
                                class="form-control"
                                rows="4"
                                placeholder="Enter complete address"
                                required></textarea>

                        </div>

                        <!-- Location Button -->

                        <div class="mb-4">

                            <button
                                type="button"
                                onclick="getLocation()"
                                class="btn-success-custom">

                                📍 Use My Current Location

                            </button>

                            <div
                                id="locationStatus"
                                class="mt-3 text-muted">

                                Location not selected.

                            </div>

                        </div>

                        <!-- Submit -->

                        <button
                            class="btn-primary-custom btn-lg w-100">

                            ✅ Confirm Booking

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function getLocation() {

    if (!navigator.geolocation) {

        alert("Geolocation is not supported by this browser.");

        return;

    }

    document.getElementById("locationStatus").innerHTML =
        "📍 Fetching your location...";

    navigator.geolocation.getCurrentPosition(

        function(position) {

            const lat = position.coords.latitude;

            const lng = position.coords.longitude;

            document.getElementById("latitude").value = lat;

            document.getElementById("longitude").value = lng;

            document.getElementById("locationStatus").innerHTML =
                "✅ Location captured successfully.";

            // Reverse Geocoding

            fetch(
                `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`
            )

            .then(response => response.json())

            .then(data => {

                if(data.display_name){

                    document.getElementById("address").value =
                        data.display_name;

                }

            });

        },

        function(error){

            alert("Unable to fetch location.");

            console.log(error);

        }

    );

}

</script>

@endsection

