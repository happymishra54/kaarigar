@extends('layouts.app')

@section('content')

<section class="py-5">

    <div class="container">


        <!-- Header -->

        <div class="text-center mb-5">


            <span class="section-tag">

                SAVED PROFESSIONALS

            </span>


            <h2 class="section-title mt-3">

                <i class="fa-solid fa-heart text-danger me-2"></i>

                My Favourite Workers

            </h2>


            <p class="section-subtitle">

                Quickly access your trusted professionals whenever you need them.

            </p>


        </div>




        <div class="row g-4">


            @forelse($favorites as $favorite)


                @php

                    $worker = $favorite->worker->workerProfile;

                @endphp



                @if($worker)


                <div class="col-xl-3 col-lg-4 col-md-6">


                    <div class="position-relative">


                        @include('partials.worker-card',['worker'=>$worker])


                    </div>


                </div>


                @endif



            @empty



            <div class="col-12">


                <div class="card border-0 shadow-lg rounded-4 p-5 text-center">


                    <div class="mb-4">


                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger-subtle"
                             style="width:90px;height:90px;">


                            <i class="fa-regular fa-heart fa-3x text-danger"></i>


                        </div>


                    </div>



                    <h3 class="fw-bold">

                        No Favourite Workers Yet

                    </h3>



                    <p class="text-muted mb-4">


                        Save your trusted workers by clicking the ❤️ icon.
                        They will appear here for quick booking.


                    </p>




                    <div>


                        <a
                            href="{{ route('home') }}"
                            class="btn-primary-custom px-4">


                            <i class="fa-solid fa-magnifying-glass me-2"></i>

                            Browse Workers


                        </a>


                    </div>



                </div>


            </div>



            @endforelse



        </div>



    </div>


</section>


@endsection