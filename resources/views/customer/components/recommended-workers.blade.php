{{-- RECOMMENDED WORKERS --}}

<section class="py-5 bg-white">

    <div class="container">


        <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">


            <div>


                <span class="badge bg-success rounded-pill px-4 py-2 mb-3">

                    <i class="fas fa-user-check me-2"></i>

                    VERIFIED PROFESSIONALS

                </span>



                <h2 class="fw-bold mb-2">

                    Recommended Workers

                </h2>



                <p class="text-muted mb-0">

                    Skilled professionals selected based on your location and preferences.

                </p>


            </div>




            <a href="{{ route('home') }}"
               class="btn btn-outline-primary rounded-pill px-4">


                View All

                <i class="fas fa-arrow-right ms-2"></i>


            </a>



        </div>





        @if($recommendedWorkers->count())


            <div class="row g-4">


                @foreach($recommendedWorkers as $worker)


                    <div class="col-xl-3 col-lg-4 col-md-6">


                        @include('partials.worker-card',['worker'=>$worker])


                    </div>


                @endforeach


            </div>




        @else




            <div class="card border-0 shadow-sm rounded-4">


                <div class="card-body text-center py-5">


                    <i class="fas fa-user-slash fa-4x text-secondary mb-4"></i>



                    <h4 class="fw-bold">

                        No Workers Found

                    </h4>




                    <p class="text-muted">

                        We couldn't find any verified workers in your area yet.

                    </p>




                    <a href="{{ route('home') }}"
                       class="btn btn-primary rounded-pill px-4">


                        Browse All Workers


                    </a>



                </div>


            </div>



        @endif



    </div>


</section>