@extends('layouts.app')

@section('content')


<div class="container py-5">


    <div class="row justify-content-center">


        <div class="col-lg-8">


            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">



                {{-- HEADER IMAGE --}}

                @if($service->image)

                    <img
                        src="{{ asset('storage/'.$service->image) }}"
                        class="card-img-top"
                        style="height:300px;object-fit:cover;">

                @endif





                <div class="card-body p-5">



                    {{-- SERVICE TITLE --}}

                    <h2 class="fw-bold mb-3">

                        {{ $service->title }}

                    </h2>



                    <hr>





                    {{-- PRICE --}}

                    <h3 class="text-success fw-bold mb-4">

                        ₹{{ number_format($service->price) }}

                    </h3>







                    {{-- DESCRIPTION --}}

                    <p class="text-muted fs-5">

                        {{ $service->description }}

                    </p>







                    {{-- WORKER DETAILS --}}

                    @if($service->worker)


                    <div class="card bg-light border-0 rounded-4 my-4">


                        <div class="card-body">


                            <h5 class="fw-bold mb-3">

                                <i class="fas fa-user-check text-primary me-2"></i>

                                Professional

                            </h5>



                            <p class="mb-2">

                                <strong>Name:</strong>

                                {{ $service->worker->user->name }}

                            </p>



                            <p class="mb-2">

                                <strong>Location:</strong>

                                {{ $service->worker->city }}

                            </p>



                            <p class="mb-0">

                                <strong>Experience:</strong>

                                {{ $service->worker->experience }}

                                Years

                            </p>


                        </div>


                    </div>


                    @endif







                    {{-- BOOK BUTTON --}}

                    @auth


                        <a
                            href="{{ route(
                                'booking.create',
                                [
                                    'service'=>$service->id,
                                    'worker'=>$service->worker->id
                                ]
                            ) }}"
                            class="btn btn-primary btn-lg rounded-pill px-5">


                            <i class="fas fa-calendar-check me-2"></i>

                            Book Service


                        </a>



                    @else



                        <a
                            href="{{ route('login') }}"
                            class="btn btn-primary btn-lg rounded-pill px-5">


                            Login To Book


                        </a>



                    @endauth




                </div>



            </div>


        </div>


    </div>


</div>



@endsection