@extends('layouts.app')

@section('content')

<div class="container py-5">


    {{-- PAGE HEADER --}}

    <div class="text-center mb-5">


        <span class="badge bg-primary rounded-pill px-4 py-2">

            ACCOUNT

        </span>



        <h2 class="fw-bold mt-3">

            My Profile

        </h2>



        <p class="text-muted">

            Manage your personal information and account details.

        </p>


    </div>





    <div class="row justify-content-center">


        <div class="col-lg-8">



            @if(session('success'))


                <div class="alert alert-success rounded-4 shadow-sm">


                    <i class="fa-solid fa-circle-check me-2"></i>


                    {{ session('success') }}


                </div>


            @endif






            {{-- PROFILE CARD --}}


            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">





                {{-- TOP PROFILE AREA --}}


                <div class="bg-primary text-white text-center p-5">



                    <div class="rounded-circle bg-white text-primary 
                                d-flex align-items-center justify-content-center
                                mx-auto mb-3"
                         style="width:90px;height:90px;">



                        <i class="fa-solid fa-user fs-1"></i>



                    </div>





                    <h3 class="fw-bold mb-1">


                        {{ $user->name }}


                    </h3>




                    <span class="badge bg-light text-primary rounded-pill px-4 py-2">


                        Customer


                    </span>



                </div>








                {{-- DETAILS --}}


                <div class="card-body p-5">





                    <h5 class="fw-bold mb-4">


                        <i class="fa-solid fa-address-card text-primary me-2"></i>


                        Personal Information



                    </h5>







                    <div class="row g-4">





                        <div class="col-md-6">

                            <div class="bg-light rounded-4 p-3 h-100">

                                <small class="text-muted">
                                    Full Name
                                </small>

                                <h6 class="mb-0 fw-semibold">

                                    {{ $user->name }}

                                </h6>


                            </div>

                        </div>







                        <div class="col-md-6">

                            <div class="bg-light rounded-4 p-3 h-100">

                                <small class="text-muted">
                                    Email Address
                                </small>

                                <h6 class="mb-0 fw-semibold">

                                    {{ $user->email }}

                                </h6>


                            </div>

                        </div>








                        <div class="col-md-6">

                            <div class="bg-light rounded-4 p-3 h-100">


                                <small class="text-muted">
                                    Phone Number
                                </small>


                                <h6 class="mb-0 fw-semibold">


                                    <i class="fa-solid fa-phone text-success me-1"></i>


                                    {{ $user->phone ?? 'Not Added' }}


                                </h6>



                            </div>


                        </div>








                        <div class="col-md-6">


                            <div class="bg-light rounded-4 p-3 h-100">


                                <small class="text-muted">

                                    City

                                </small>


                                <h6 class="mb-0 fw-semibold">


                                    <i class="fa-solid fa-location-dot text-danger me-1"></i>


                                    {{ $user->city ?? 'Not Added' }}



                                </h6>



                            </div>


                        </div>








                        <div class="col-md-12">


                            <div class="bg-light rounded-4 p-3 h-100">


                                <small class="text-muted">

                                    Address

                                </small>


                                <h6 class="mb-0 fw-semibold">


                                    {{ $user->address ?? 'Not Added' }}



                                </h6>



                            </div>



                        </div>








                        <div class="col-md-6">


                            <div class="bg-light rounded-4 p-3 h-100">


                                <small class="text-muted">

                                    State

                                </small>


                                <h6 class="mb-0 fw-semibold">


                                    {{ $user->state ?? 'Not Added' }}



                                </h6>



                            </div>



                        </div>





                    </div>







                    <div class="text-center mt-5">

                        <div class="d-inline-flex gap-3">
                    
                            <a href="{{ route('customer.profile.edit') }}"
                               class="btn btn-primary rounded-pill px-5 py-3">
                    
                                <i class="fa-solid fa-pen-to-square me-2"></i>
                    
                                Edit Profile
                    
                            </a>
                    
                            <button
                                type="button"
                                class="btn btn-danger rounded-pill px-5 py-3"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteAccountModal">
                    
                                <i class="fa-solid fa-trash me-2"></i>
                    
                                Delete My Account
                    
                            </button>
                    
                        </div>
                    
                    </div>





                </div>


            </div>


        </div>


    </div>


</div>


@endsection

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content rounded-4">

            <div class="modal-header">

                <h5 class="modal-title text-danger">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i>
                    Delete My Account
                </h5>

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"></button>

            </div>

            <form method="POST" action="{{ route('customer.profile.deactivate') }}">

                @csrf
                @method('DELETE')

                <div class="modal-body">

                    <div class="alert alert-warning">

                        <strong>Warning!</strong><br>

                            You Can Recover Your Account In Future.

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Enter your password to continue
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            required>

                        @error('password', 'userDeletion')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button
                        type="submit"
                        class="btn btn-danger">

                        <i class="fa-solid fa-trash me-2"></i>

                        Deactivate My Account

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>