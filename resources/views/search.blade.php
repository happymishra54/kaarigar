@extends('layouts.app')

@section('content')

<section class="py-5 bg-light">

    <div class="container">

        <!-- Header -->
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center mb-5">

            <div>

                <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill mb-3">
                    SEARCH RESULTS
                </span>

                <h2 class="fw-bold mb-2">

                    {{ $workers->count() }}
                    Worker{{ $workers->count() != 1 ? 's' : '' }} Found

                </h2>

                <p class="text-muted mb-0">

                    Browse verified professionals matching your search.

                </p>

            </div>

            <a href="{{ route('home') }}"
               class="btn btn-primary rounded-pill px-4 mt-4 mt-lg-0">

                <i class="fa-solid fa-arrow-left me-2"></i>

                Back to Home

            </a>

        </div>

        <!-- Workers -->

        @if($workers->count())

            <div class="row g-4">

                @foreach($workers as $worker)

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        @include('partials.worker-card',[
                            'worker'=>$worker,
                            'favorites'=>$favorites ?? []
                        ])

                    </div>

                @endforeach

            </div>

        @else

            <!-- Empty State -->

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body text-center py-5">

                    <div class="display-1 text-secondary mb-3">

                        <i class="fa-solid fa-user-slash"></i>

                    </div>

                    <h3 class="fw-bold">

                        No Workers Found

                    </h3>

                    <p class="text-muted mx-auto mb-4" style="max-width:600px;">

                        We couldn't find any professionals matching your search.
                        Try changing the profession, city, or search keyword.

                    </p>

                    <a href="{{ route('home') }}"
                       class="btn btn-primary rounded-pill px-5">

                        <i class="fa-solid fa-house me-2"></i>

                        Browse All Workers

                    </a>

                </div>

            </div>

        @endif

    </div>

</section>

@endsection