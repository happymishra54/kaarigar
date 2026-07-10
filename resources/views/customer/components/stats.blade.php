{{-- STATS --}}

<section class="pb-5">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>

                <h2 class="fw-bold">

                    <i class="fas fa-chart-line text-primary me-2"></i>

                    Dashboard Overview

                </h2>

                <p class="text-muted mb-0">

                    A quick summary of your account activity.

                </p>

            </div>

        </div>

        <div class="row g-4">

            <!-- Active Bookings -->

            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex align-items-center p-4">

                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width:70px;height:70px;">

                            <i class="fas fa-calendar-check fa-2x text-primary"></i>

                        </div>

                        <div>

                            <h2 class="fw-bold mb-0">

                                {{ $activeBookings }}

                            </h2>

                            <p class="text-muted mb-0">

                                Active Bookings

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Completed -->

            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex align-items-center p-4">

                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width:70px;height:70px;">

                            <i class="fas fa-circle-check fa-2x text-success"></i>

                        </div>

                        <div>

                            <h2 class="fw-bold mb-0">

                                {{ $completedBookings }}

                            </h2>

                            <p class="text-muted mb-0">

                                Completed Jobs

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Favorites -->

            <div class="col-lg-3 col-md-6">

                <a href="{{ route('customer.favorites') }}"
                   class="text-decoration-none">

                    <div class="card border-0 shadow-sm rounded-4 h-100">

                        <div class="card-body d-flex align-items-center p-4">

                            <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                                 style="width:70px;height:70px;">

                                <i class="fas fa-heart fa-2x text-danger"></i>

                            </div>

                            <div>

                                <h2 class="fw-bold text-dark mb-0">

                                    {{ auth()->user()->favorites()->count() }}

                                </h2>

                                <p class="text-muted mb-0">

                                    Saved Workers

                                </p>

                            </div>

                        </div>

                    </div>

                </a>

            </div>

            <!-- Recommended -->

            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body d-flex align-items-center p-4">

                        <div class="bg-warning bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3"
                             style="width:70px;height:70px;">

                            <i class="fas fa-user-shield fa-2x text-warning"></i>

                        </div>

                        <div>

                            <h2 class="fw-bold mb-0">

                                {{ $recommendedWorkers->count() }}

                            </h2>

                            <p class="text-muted mb-0">

                                Recommended Workers

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>