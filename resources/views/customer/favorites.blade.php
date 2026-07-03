@extends('layouts.app')

@section('content')

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">

                ❤️ My Favourite Workers

            </h2>

            <p class="section-subtitle">

                Your saved professionals

            </p>

        </div>

        <div class="row g-4">

            @forelse($favorites as $favorite)

                <div class="col-lg-3 col-md-6">

                    @php
                        $worker = $favorite->worker->workerProfile;
                    @endphp

                    @if($worker)

                        @include('partials.worker-card',['worker'=>$worker])

                    @endif

                </div>

            @empty

                <div class="col-12">

                    <div class="empty-booking">

                        <i class="fa-regular fa-heart"></i>

                        <h3>

                            No Favourite Workers

                        </h3>

                        <p>

                            Save workers by clicking the heart icon.

                        </p>

                        <a
                            href="{{ route('home') }}"
                            class="btn-primary-custom">

                            Browse Workers

                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>

@endsection

