<div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 worker-card">

    <div class="position-relative worker-card-image">

        @if($worker->profile_image)

            <a href="{{ route('worker.show',$worker->id) }}">

                <img
                    src="{{ asset('storage/'.$worker->profile_image) }}"
                    class="card-img-top"
                    alt="{{ $worker->user->name ?? 'Worker' }}"
                >

            </a>

        @else

            <div class="d-flex align-items-center justify-content-center bg-light"
                 style="height:260px;">

                <i class="fas fa-user fa-5x text-secondary"></i>

            </div>

        @endif

        @if($worker->is_verified)

            <span class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill shadow-sm">

                <i class="fas fa-circle-check me-1"></i>

                Verified

            </span>

        @endif

        @auth

            @if(auth()->user()->role == 'customer')

                @php

                    $isFavorite = isset($favorites)
                        && in_array(
                            $worker->user->id,
                            $favorites instanceof \Illuminate\Support\Collection
                                ? $favorites->pluck('worker_id')->toArray()
                                : $favorites
                        );

                @endphp

                <form
                    action="{{ route('favorite.toggle',$worker->user->id) }}"
                    method="POST"
                    class="position-absolute top-0 end-0 m-3">

                    @csrf

                    <button
                        class="btn btn-light rounded-circle shadow-sm worker-fav-btn"
                        style="width:45px;height:45px;">

                        <i class="fas fa-heart {{ $isFavorite ? 'text-danger' : 'text-secondary' }}"></i>

                    </button>

                </form>

            @endif

        @endauth

        <div class="worker-category-chip">

            <i class="fas fa-badge-check"></i>

            Verified Professional

        </div>

    </div>

    <div class="card-body d-flex flex-column">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="fw-bold mb-0 worker-name">

                {{ $worker->user->name ?? 'Unknown Worker' }}

            </h5>

            @if($worker->user->reviewsReceived->count())

                <span class="badge bg-warning text-dark rounded-pill">

                    ⭐ {{ number_format($worker->user->reviewsReceived->avg('rating'),1) }}

                </span>

            @else

                <span class="badge bg-secondary rounded-pill">

                    New

                </span>

            @endif

        </div>

        <p class="text-primary fw-semibold mb-3 worker-bio">

            {{ Str::limit($worker->bio,70) }}

        </p>

        <div class="small text-muted mb-2">

            <i class="fas fa-location-dot text-danger me-2"></i>

            {{ $worker->city }}

        </div>

        <div class="small text-muted mb-2">

            <i class="fas fa-briefcase text-primary me-2"></i>

            {{ $worker->experience }} Years Experience

        </div>

        <div class="small text-muted mb-3">

            <i class="fas fa-star text-warning me-2"></i>

            {{ $worker->user?->reviewsReceived?->count() ?? 0 }}
            Reviews

        </div>

        @if(isset($worker->distance))

            <div class="alert alert-light border rounded-3 py-2 mb-3">

                <i class="fas fa-location-crosshairs text-success me-2"></i>

                {{ number_format($worker->distance,1) }} km Away

            </div>

        @endif

        <hr class="my-3">

        <div class="d-flex justify-content-between align-items-center mt-auto">

            <div>

                <h4 class="text-success fw-bold mb-0 worker-price">

                    ₹{{ number_format($worker->daily_wage) }}

                </h4>

                <small class="text-muted">

                    Per Day

                </small>

            </div>

            <div class="d-flex gap-2">

                <a href="{{ route('worker.show',$worker->id) }}"
                   class="btn btn-outline-primary rounded-pill worker-btn">

                    <i class="fas fa-user me-1"></i>

                    Profile

                </a>


                <a href="{{ route('booking.create',$worker->id) }}"
                   class="btn btn-primary rounded-pill worker-btn worker-btn-primary">

                    <i class="fas fa-calendar-check me-1"></i>

                    Book Now

                </a>

            </div>

        </div>

    </div>

</div>

<style>

.worker-card {
    transition: transform .3s ease, box-shadow .3s ease;
    border: 1px solid rgba(15,23,42,.05) !important;
}

.worker-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(15,23,42,.12) !important;
}

.worker-card-image img {
    transition: transform .4s ease;
}

.worker-card:hover .worker-card-image img {
    transform: scale(1.05);
}

.worker-card-image {
    overflow: hidden;
}

.worker-category-chip {
    position: absolute;
    bottom: 12px;
    left: 12px;
    background: rgba(15,23,42,.75);
    backdrop-filter: blur(4px);
    color: #fff;
    font-size: 11px;
    padding: 5px 12px;
    border-radius: 30px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.worker-category-chip i {
    color: #f59e0b;
}

.worker-fav-btn {
    transition: transform .25s ease;
}

.worker-fav-btn:hover {
    transform: scale(1.12);
}

.worker-name {
    color: #111827;
}

.worker-bio {
    color: #2563eb;
    font-size: 14px;
}

.worker-price {
    font-size: 22px;
}

.worker-btn {
    font-size: 13px;
    transition: transform .25s ease, box-shadow .25s ease;
}

.worker-btn:hover {
    transform: translateY(-2px);
}

.worker-btn-primary {
    box-shadow: 0 6px 16px rgba(37,99,235,.25);
}

.worker-btn-primary:hover {
    box-shadow: 0 10px 22px rgba(37,99,235,.35);
}

</style>
