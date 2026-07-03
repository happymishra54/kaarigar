<div class="worker-premium-card">

    <div class="worker-image">

        <img
            src="{{ asset('storage/'.$worker->profile_image) }}"
            alt="{{ $worker->user->name }}">

            @if($worker->is_verified)

                <span class="verified-badge">

                    <i class="fa-solid fa-circle-check"></i>

                    Verified

                </span>

            @endif
            @auth
            @if(auth()->user()->role == 'customer')
            
            <form
                action="{{ route('favorite.toggle',$worker->user->id) }}"
                method="POST"
                class="favorite-form">
            
                @csrf
            
                @php

$isFavorite = isset($favorites) &&
              in_array($worker->user->id,$favorites);

@endphp

<form
action="{{ route('favorite.toggle',$worker->user->id) }}"
method="POST"
class="favorite-form">

    @csrf

    <button
        class="favorite-btn {{ $isFavorite ? 'active' : '' }}">

        <i class="fa-solid fa-heart"></i>

    </button>

</form>
            
            </form>
            
            @endif
            @endauth

    </div>

    <div class="worker-content">

        <div class="worker-rating">

            <div class="rating-chip">

                ⭐ {{ number_format($worker->user->reviewsReceived->avg('rating') ?? 0,1) }}

            </div>

            <div class="review-count">

                {{ $worker->user->reviewsReceived->count() }} Reviews

            </div>

        </div>

        <h4>

            {{ $worker->user->name }}

        </h4>

        <p class="worker-profession">

            {{ $worker->bio }}

        </p>

        <div class="worker-meta">

            <span>

                <i class="fa-solid fa-location-dot"></i>

                {{ $worker->city }}

            </span>

            <span>

                <i class="fa-solid fa-briefcase"></i>

                {{ $worker->experience }} yrs

            </span>

        </div>

        @if(isset($worker->distance))

            <div class="worker-distance">

                📍 {{ number_format($worker->distance,1) }} km away

            </div>

        @endif

        <div class="worker-footer">

            <div class="worker-price">

                ₹{{ number_format($worker->daily_wage) }}

                <small>/day</small>

            </div>

            <a
                href="{{ route('worker.show',$worker->id) }}"
                class="btn-primary-custom">

                View Profile

            </a>

        </div>

    </div>

</div>

