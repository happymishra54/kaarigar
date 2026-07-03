{{-- QUICK ACTIONS --}}

<section class="py-5">

    <div class="container">

        <div class="row g-4">

            <div class="col-lg-4">

                <a href="/"
                   class="dashboard-action-card">

                    <div class="action-icon">

                        🔍

                    </div>

                    <h4>

                        Browse Services

                    </h4>

                    <p>

                        Find trusted workers near you.

                    </p>

                </a>

            </div>

            <div class="col-lg-4">

                <a href="{{ route('customer.bookings') }}"
                   class="dashboard-action-card">

                    <div class="action-icon">

                        📅

                    </div>

                    <h4>

                        My Bookings

                    </h4>

                    <p>

                        Track all your bookings.

                    </p>

                </a>

            </div>

            <div class="col-lg-4">

                <a href="{{ route('customer.profile') }}"
                   class="dashboard-action-card">

                    <div class="action-icon">

                        👤

                    </div>

                    <h4>

                        My Profile

                    </h4>

                    <p>

                        Update your personal information.

                    </p>

                </a>

            </div>

        </div>

    </div>

</section>