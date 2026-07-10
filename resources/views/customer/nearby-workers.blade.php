@extends('layouts.app')

@section('content')

<div class="container py-5">


    <!-- Header -->

    <div class="text-center mb-5">


        <span class="section-tag">

            LOCATION

        </span>


        <h2 class="section-title mt-3">

            <i class="fa-solid fa-location-dot text-danger me-2"></i>

            Nearby Workers

        </h2>


        <p class="section-subtitle">

            Find verified professionals available around your location.

        </p>


    </div>




    <div class="row g-4">



        <!-- Map -->

        <div class="col-lg-8">


            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">


                <div class="card-header bg-white border-0 py-3">


                    <h5 class="fw-bold mb-0">

                        <i class="fa-solid fa-map-location-dot text-primary me-2"></i>

                        Workers Near You


                    </h5>


                </div>



                <div id="workerMap"
                     style="height:550px;width:100%;">
                </div>


            </div>


        </div>





        <!-- Worker List -->

        <div class="col-lg-4">


            <div class="card border-0 shadow-lg rounded-4">


                <div class="card-header bg-white border-0 py-3">


                    <h5 class="fw-bold mb-0">


                        <i class="fa-solid fa-users text-primary me-2"></i>

                        Available Workers


                    </h5>


                </div>




                <div class="card-body">


                    <div class="worker-list">


                    @forelse($workers as $worker)



                        <div class="card border-0 shadow-sm rounded-4 mb-3">


                            <div class="card-body">


                                <div class="d-flex align-items-center mb-3">


                                    <div class="rounded-circle bg-primary-subtle d-flex align-items-center justify-content-center me-3"
                                         style="width:50px;height:50px;">


                                        <i class="fa-solid fa-user-gear text-primary"></i>


                                    </div>



                                    <div>


                                        <h6 class="fw-bold mb-1">

                                            {{ $worker->user->name }}

                                        </h6>


                                        <small class="text-muted">

                                            <i class="fa-solid fa-location-dot me-1"></i>

                                            {{ $worker->city }}

                                        </small>


                                    </div>


                                </div>





                                <p class="text-muted small">

                                    {{ Str::limit($worker->bio,90) }}

                                </p>




                                <a
                                    href="{{ route('worker.show',$worker->id) }}"
                                    class="btn btn-primary rounded-pill w-100">


                                    <i class="fa-solid fa-eye me-2"></i>

                                    View Profile


                                </a>



                            </div>


                        </div>




                    @empty



                        <div class="text-center py-4">


                            <i class="fa-solid fa-user-slash fa-2x text-muted mb-3"></i>


                            <h6>

                                No workers found

                            </h6>


                            <p class="text-muted small">

                                No verified professionals available nearby.

                            </p>


                        </div>



                    @endforelse



                    </div>


                </div>


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


var map = L.map('workerMap').setView(
[
{{ $customer->latitude }},
{{ $customer->longitude }}
],
13
);



L.tileLayer(
'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
{
maxZoom:19
}
).addTo(map);




// Customer Marker

L.marker([
{{ $customer->latitude }},
{{ $customer->longitude }}
])
.addTo(map)
.bindPopup(
"📍 Your Location"
);





// Worker Markers


@foreach($workers as $worker)


L.marker([
{{ $worker->latitude }},
{{ $worker->longitude }}
])
.addTo(map)
.bindPopup(`

<div style="min-width:180px">


<h6>
{{ $worker->user->name }}
</h6>


<p>
{{ Str::limit($worker->bio,70) }}
</p>


<a href="{{ route('worker.show',$worker->id) }}"
class="btn btn-sm btn-primary rounded-pill">

View Profile

</a>


</div>

`);



@endforeach



</script>


@endpush