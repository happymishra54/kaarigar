{{-- QUICK ACTIONS --}}

<section class="py-5">

    <div class="container">


        <div class="d-flex justify-content-between align-items-center mb-4">


            <div>

                <h2 class="fw-bold mb-1">

                    <i class="fas fa-bolt text-warning me-2"></i>

                    Quick Actions

                </h2>


                <p class="text-muted mb-0">

                    Everything you need is just one click away.

                </p>


            </div>


        </div>




        <div class="row g-4">



            {{-- Browse Services --}}

            <div class="col-lg-4 col-md-6">


                <a href="/"
                   class="text-decoration-none">


                    <div class="card border-0 shadow-sm rounded-4 h-100">


                        <div class="card-body text-center p-5">



                            <div class="bg-primary bg-opacity-10 rounded-circle 
                                        d-flex align-items-center justify-content-center
                                        mx-auto mb-4"
                                 style="width:5rem;height:5rem;">


                                <i class="fas fa-search fa-2x text-primary"></i>


                            </div>




                            <h4 class="fw-bold">

                                Browse Services

                            </h4>



                            <p class="text-muted mb-4">

                                Explore verified plumbers, electricians, painters and more.

                            </p>




                            <span class="btn btn-outline-primary rounded-pill">

                                Explore

                                <i class="fas fa-arrow-right ms-2"></i>

                            </span>



                        </div>


                    </div>


                </a>


            </div>





            {{-- Bookings --}}

            <div class="col-lg-4 col-md-6">


                <a href="{{ route('customer.bookings') }}"
                   class="text-decoration-none">


                    <div class="card border-0 shadow-sm rounded-4 h-100">


                        <div class="card-body text-center p-5">


                            <div class="bg-success bg-opacity-10 rounded-circle
                                        d-flex align-items-center justify-content-center
                                        mx-auto mb-4"
                                 style="width:5rem;height:5rem;">


                                <i class="fas fa-calendar-check fa-2x text-success"></i>


                            </div>




                            <h4 class="fw-bold">

                                My Bookings

                            </h4>




                            <p class="text-muted mb-4">

                                View upcoming, completed and cancelled bookings.

                            </p>




                            <span class="btn btn-outline-success rounded-pill">

                                View Bookings

                                <i class="fas fa-arrow-right ms-2"></i>

                            </span>



                        </div>


                    </div>


                </a>


            </div>





            {{-- Profile --}}

            <div class="col-lg-4 col-md-6">


                <a href="{{ route('customer.profile') }}"
                   class="text-decoration-none">


                    <div class="card border-0 shadow-sm rounded-4 h-100">


                        <div class="card-body text-center p-5">


                            <div class="bg-warning bg-opacity-10 rounded-circle
                                        d-flex align-items-center justify-content-center
                                        mx-auto mb-4"
                                 style="width:5rem;height:5rem;">


                                <i class="fas fa-user fa-2x text-warning"></i>


                            </div>




                            <h4 class="fw-bold">

                                My Profile

                            </h4>




                            <p class="text-muted mb-4">

                                Manage your personal details and account settings.

                            </p>




                            <span class="btn btn-outline-warning rounded-pill">

                                Edit Profile

                                <i class="fas fa-arrow-right ms-2"></i>

                            </span>



                        </div>


                    </div>


                </a>


            </div>



        </div>


    </div>


</section>