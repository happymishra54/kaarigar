@extends('layouts.app')

@section('content')

<div class="container py-5">


    {{-- HEADER --}}

    <div class="text-center mb-5">


        <span class="badge bg-primary rounded-pill px-4 py-2">

            ACCOUNT SETTINGS

        </span>



        <h2 class="fw-bold mt-3">

            Edit Profile

        </h2>



        <p class="text-muted">

            Update your personal information and location details.

        </p>


    </div>




    <div class="row justify-content-center">


        <div class="col-lg-8">



            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">


                {{-- TOP HEADER --}}

                <div class="bg-primary text-white text-center p-4">



                    <div class="rounded-circle bg-white text-primary 
                                d-flex align-items-center justify-content-center
                                mx-auto mb-3"
                         style="width:70px;height:70px;">


                        <i class="fa-solid fa-user-pen fs-2"></i>


                    </div>




                    <h3 class="fw-bold mb-1">

                        {{ $user->name }}

                    </h3>



                    <p class="mb-0 opacity-75">

                        Manage your Kaarigar account

                    </p>



                </div>





                <div class="card-body p-5">


                    <form action="{{ route('customer.profile.update') }}"
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
                                class="form-control form-control-lg"
                                value="{{ old('name',$user->name) }}">


                            </div>




                            <div class="col-md-6">


                                <label class="form-label fw-semibold">

                                    Email Address

                                </label>


                                <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg"
                                value="{{ old('email',$user->email) }}">


                            </div>




                            <div class="col-md-6">


                                <label class="form-label fw-semibold">

                                    Phone Number

                                </label>


                                <input
                                type="text"
                                name="phone"
                                class="form-control form-control-lg"
                                value="{{ old('phone',$user->phone) }}">


                            </div>


                        </div>






                        <hr class="my-5">






                        <h5 class="fw-bold mb-4">


                            <i class="fa-solid fa-location-dot text-danger me-2"></i>


                            Location Information


                        </h5>





                        <input type="hidden"
                               name="latitude"
                               id="latitude"
                               value="{{ $user->latitude }}">



                        <input type="hidden"
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





                        <div class="ratio ratio-21x9 rounded-4 shadow-sm mb-4">


                            <div id="mapPreview"></div>


                        </div>






                        <div class="row g-4">


                            <div class="col-md-6">


                                <label class="form-label fw-semibold">

                                    City

                                </label>



                                <input
                                type="text"
                                name="city"
                                class="form-control form-control-lg"
                                value="{{ old('city',$user->city) }}">


                            </div>




                            <div class="col-md-6">


                                <label class="form-label fw-semibold">

                                    State

                                </label>



                                <input
                                type="text"
                                name="state"
                                class="form-control form-control-lg"
                                value="{{ old('state',$user->state) }}">


                            </div>





                            <div class="col-12">


                                <label class="form-label fw-semibold">

                                    Address

                                </label>



                                <textarea
                                name="address"
                                rows="3"
                                class="form-control form-control-lg">{{ old('address',$user->address) }}</textarea>


                            </div>


                        </div>






                        <div class="text-center mt-5">


                            <button class="btn btn-primary btn-lg rounded-pill px-5">


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