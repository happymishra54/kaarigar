@extends('layouts.app')

@section('content')

<section class="dashboard-section py-5">

    <div class="container">

        <div class="search-header">

            <div>

                <span class="section-tag">

                    SEARCH RESULTS

                </span>

                <h2 class="section-title">

                    {{ $workers->count() }} Worker{{ $workers->count() != 1 ? 's' : '' }} Found

                </h2>

                <p class="section-subtitle">

                    Here are the professionals matching your search.

                </p>

            </div>

            <a href="{{ route('home') }}"
               class="btn-primary-custom">

                <i class="fa-solid fa-arrow-left"></i>

                Back Home

            </a>

        </div>

        <div class="row g-4 mt-2">

            @forelse($workers as $worker)

                <div class="col-xl-3 col-lg-4 col-md-6">

                    @include('partials.worker-card',[
                        'worker'=>$worker,
                        'favorites'=>$favorites ?? []
                    ])

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-search">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <h2>

                            No Workers Found

                        </h2>

                        <p>

                            We couldn't find any professionals matching your search.
                            Try using another city or profession.

                        </p>

                        <a href="{{ route('home') }}"
                           class="btn-primary-custom">

                            Browse All Workers

                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection