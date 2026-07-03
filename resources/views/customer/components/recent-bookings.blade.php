{{-- RECENT BOOKINGS --}}

<section class="dashboard-section py-5">

    <div class="container">

        <div class="section-heading text-center mb-5">

            <span class="section-tag">

                HISTORY

            </span>

            <h2 class="section-title">

                Recent Bookings

            </h2>

            <p class="section-subtitle">

                Track your latest service requests

            </p>

        </div>

        <div class="booking-list">

            @forelse($recentBookings as $booking)

            <div class="booking-premium-card">

                <div class="booking-left">

                    <div class="booking-icon">

                        <i class="fa-solid fa-calendar-check"></i>

                    </div>

                    <div>

                        <h4>

                            {{ $booking->service->title }}

                        </h4>

                        <p>

                            <i class="fa-solid fa-user"></i>

                            {{ $booking->worker->name }}

                        </p>

                        <small>

                            {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}

                        </small>

                    </div>

                </div>

                <div class="booking-right">

                    @if($booking->status=='completed')

                        <span class="status completed">

                            Completed

                        </span>

                    @elseif($booking->status=='accepted')

                        <span class="status accepted">

                            Accepted

                        </span>

                    @elseif($booking->status=='pending')

                        <span class="status pending">

                            Pending

                        </span>

                    @else

                        <span class="status cancelled">

                            {{ ucfirst($booking->status) }}

                        </span>

                    @endif

                    <div class="mt-3">

                        <a
                            href="{{ route('booking.show',$booking->id) }}"
                            class="btn-primary-custom">

                            View Details

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="empty-booking">

                <i class="fa-regular fa-calendar-xmark"></i>

                <h3>

                    No bookings yet

                </h3>

                <p>

                    Book your first service to see it here.

                </p>

                <a
                    href="{{ route('home') }}"
                    class="btn-primary-custom">

                    Browse Services

                </a>

            </div>

            @endforelse

        </div>

    </div>

</section>