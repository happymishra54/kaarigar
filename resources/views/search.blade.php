@extends('layouts.app')

@section('content')

<div class="container py-5">


<div class="d-flex justify-content-between align-items-center mb-5">

    <div>

        <h2 class="mb-4">

            {{ $workers->count() }}
            worker(s) found
        
        </h2>
        
        <p class="text-muted">

            {{ $workers->count() }} workers found

        </p>

    </div>

    <a href="/"
       class="btn btn-outline-dark">

        Back To Home

    </a>

</div>

<div class="row">

    @forelse($workers as $worker)

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card border-0 shadow-lg h-100 worker-card">

            <div class="card-body text-center">

                @if($worker->profile_image)

                <img
                src="{{ asset('storage/'.$worker->profile_image) }}"
                class="rounded-circle mb-3"
                width="120"
                height="120">

                @endif

                <h4>

                    {{ $worker->name }}

                </h4>

                @if($worker->is_verified)

                <span class="badge bg-success mb-3">

                    <i class="fa-solid fa-circle-check"></i>

                    Verified Worker

                </span>

                @endif

                @if($worker->user->reviewsReceived->count())

                <h5 class="text-warning">

                    ⭐ {{ number_format($worker->user->reviewsReceived->avg('rating'),1) }}

                </h5>

                @endif

                <p>

                    {{ $worker->user->reviewsReceived->count() }}

                    Reviews

                </p>

                <p class="text-muted">

                    {{ $worker->mobile }} <br>
                    <i class="fa-solid fa-location-dot"></i>
                    {{ $worker->city }},
                    {{ $worker->state }}

                </p>

                <p>

                    <i class="fa-solid fa-briefcase"></i>

                    {{ $worker->experience }}

                    Years Experience

                </p>

                <h5 class="text-success fw-bold">

                    ₹{{ $worker->daily_wage }}/day

                </h5>

                <p>

                    {{ Str::limit($worker->bio,80) }}

                </p>

                <a
                href="{{ route('worker.show',$worker->id) }}"
                class="btn btn-warning w-100">

                    View Profile

                </a>

            </div>

        </div>

    </div>

    @empty

    <div class="col-12">

        <div class="alert alert-warning text-center">

            <h3>No workers found</h3>

            <p>Try another name, city or category.</p>

        </div>

    </div>

    @endforelse

</div>


</div>

@endsection
