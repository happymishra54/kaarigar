<div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100 worker-card">

    <div class="position-relative">

        @if($worker->profile_image)

        <a href="{{ route('worker.show',$worker->id) }}">

            <img
            src="{{ asset('storage/'.$worker->profile_image) }}"
            class="card-img-top"
            style="height:260px;object-fit:cover;">
            
            </a>

@else

<div class="d-flex align-items-center justify-content-center bg-light"
style="height:260px;">

    <i class="fas fa-user fa-5x text-secondary"></i>

</div>

@endif

        @if($worker->is_verified)

            <span class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill">

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
                        class="btn btn-light rounded-circle shadow"
                        style="width:45px;height:45px;">

                        <i class="fas fa-heart {{ $isFavorite ? 'text-danger' : 'text-secondary' }}"></i>

                    </button>

                </form>

            @endif

        @endauth

    </div>

    <div class="card-body d-flex flex-column">

        <div class="d-flex justify-content-between align-items-center mb-3">

            <h5 class="fw-bold mb-0">

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

        <p class="text-primary fw-semibold mb-3">

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

        <hr>

        <div class="d-flex justify-content-between align-items-center mt-auto">

            <div>

                <h4 class="text-success fw-bold mb-0">

                    ₹{{ number_format($worker->daily_wage) }}

                </h4>

                <small class="text-muted">

                    Per Day

                </small>

            </div>

            <div class="d-flex gap-2">

                <a href="{{ route('worker.show',$worker->id) }}"
                class="btn btn-outline-primary rounded-pill">
                
                Profile
                
                </a>
                
                
                <a href="{{ route('booking.create',$worker->id) }}"
                class="btn btn-primary rounded-pill">
                
                Book Now
                
                </a>
                
                </div>

        </div>

    </div>

</div>