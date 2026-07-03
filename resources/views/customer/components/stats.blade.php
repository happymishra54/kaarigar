{{-- STATS --}}

<section class="pb-5">

    <div class="container">

        <div class="row g-4">

            <div class="col-md-3">

                <div class="stats-box">

                    <h2>{{ $activeBookings }}</h2>

                    <span>Active Bookings</span>

                </div>

            </div>

            <div class="col-md-3">

                <div class="stats-box">

                    <h2>{{ $completedBookings }}</h2>

                    <span>Completed Jobs</span>

                </div>

            </div>

            <div class="col-md-3">

                <div class="stats-box">

                    <h2>{{ auth()->user()->favorites()->count() }}</h2>

                    <a
                        href="{{ route('customer.favorites') }}">

                        Saved Workers

                    </a>

                </div>

            </div>

            <div class="col-md-3">

                <div class="stats-box">

                    <h2>{{ $recommendedWorkers->count() }}</h2>

                    <span>Recommended Workers</span>

                </div>

            </div>

        </div>

    </div>

</section>