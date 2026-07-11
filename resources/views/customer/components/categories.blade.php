{{-- POPULAR CATEGORIES --}}

<section class="py-5 bg-light">

    <div class="container">


        <div class="text-center mb-5">

            <span class="badge bg-primary rounded-pill px-4 py-2 mb-3">

                <i class="fas fa-layer-group me-2"></i>

                POPULAR SERVICES

            </span>


            <h2 class="fw-bold display-6">
                Explore Categories
            </h2>


            <p class="text-muted fs-5">
                Find trusted professionals for every home service.
            </p>


        </div>




        <div class="row g-4">


            @foreach($categories as $category)


            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">


                <a href="{{ route('home',['search'=>$category->name]) }}"
                   class="text-decoration-none">


                    <div class="card border-0 shadow-sm rounded-4 h-100 text-center">


                        <div class="card-body p-4">


                            <div class="bg-primary bg-opacity-10 rounded-circle 
                                        d-flex align-items-center justify-content-center
                                        mx-auto mb-4"
                                 style="width:5rem;height:5rem;">


                                @if($category->icon)

                                    <i class="{{ $category->icon }} fa-2x text-primary"></i>


                                @else

                                    <i class="fas fa-screwdriver-wrench fa-2x text-primary"></i>


                                @endif


                            </div>




                            <h5 class="fw-bold text-dark mb-2">

                                {{ $category->name }}

                            </h5>




                            <p class="text-muted small mb-4">

                                Verified professionals available near you.

                            </p>




                            <span class="btn btn-outline-primary rounded-pill">


                                Explore


                                <i class="fas fa-arrow-right ms-2"></i>


                            </span>



                        </div>


                    </div>


                </a>


            </div>


            @endforeach



        </div>


    </div>


</section>