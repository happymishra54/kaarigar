@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h2 class="section-title">

            Nearby Workers

        </h2>

        <p class="section-subtitle">

            Find verified professionals around you

        </p>

    </div>

    <div class="row">

        <div class="col-lg-8">

            <div id="workerMap"></div>

        </div>

        <div class="col-lg-4">

            <div class="worker-list">

                @foreach($workers as $worker)

                <div class="map-worker-card">

                    <h5>

                        {{ $worker->user->name }}

                    </h5>

                    <p>

                        {{ $worker->bio }}

                    </p>

                    <small>

                        {{ $worker->city }}

                    </small>

                    <br>

                    <a
                        href="{{ route('worker.show',$worker->id) }}"
                        class="btn-primary-custom mt-3">

                        View Profile

                    </a>

                </div>

                @endforeach

            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<link
rel="stylesheet"
href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

var map=L.map('workerMap').setView([
{{ $customer->latitude }},
{{ $customer->longitude }}
],13);

L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
maxZoom:19
}
).addTo(map);

// Customer

L.marker([
{{ $customer->latitude }},
{{ $customer->longitude }}
]).addTo(map)
.bindPopup("📍 You");

// Workers

@foreach($workers as $worker)

L.marker([
{{ $worker->latitude }},
{{ $worker->longitude }}
]).addTo(map)
.bindPopup(`
<b>{{ $worker->user->name }}</b>

<br>

{{ $worker->bio }}

<br><br>

<a href="{{ route('worker.show',$worker->id) }}">
View Profile
</a>
`);

@endforeach

</script>

@endpush