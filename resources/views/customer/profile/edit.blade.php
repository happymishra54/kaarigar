@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">

        <i class="fa-solid fa-circle-check me-2"></i>

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"></button>

    </div>
@endif

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
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    value="{{ old('name',$user->name) }}">

                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror


                            </div>




                            <div class="col-md-6">


                                <label class="form-label fw-semibold">

                                    Email Address

                                </label>


                                <input
                                    type="email"
                                    name="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    value="{{ old('email',$user->email) }}">

                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror


                            </div>




                            <div class="col-md-6">


                                <label class="form-label fw-semibold">

                                    Phone Number

                                </label>


                                <input
                                type="text"
                                name="phone"
                                class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                value="{{ old('phone',$user->phone) }}">

                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror


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





                        <div class="ratio ratio-16x9">


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
                                    class="form-control form-control-lg @error('city') is-invalid @enderror"
                                    value="{{ old('city',$user->city) }}">

                                @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror


                            </div>




                            <div class="col-md-6">

                                <label class="form-label fw-semibold">
                                    State
                                </label>
                            
                                <input
                                    type="text"
                                    name="state"
                                    class="form-control form-control-lg @error('state') is-invalid @enderror"
                                    value="{{ old('state', $user->state) }}">
                            
                                @error('state')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            
                            </div>





                            <div class="col-12">

    <label class="form-label fw-semibold">
        Address
    </label>

    <textarea
        name="address"
        rows="3"
        class="form-control form-control-lg @error('address') is-invalid @enderror">{{ old('address', $user->address) }}</textarea>

    @error('address')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>


                        </div>






                        <div class="d-flex justify-content-end mt-5">


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