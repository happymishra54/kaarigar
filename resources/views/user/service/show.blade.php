@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow">

        <div class="card-body">

            <h2>

                {{ $service->title }}

            </h2>

            <hr>

            <h4 class="text-success">

                ₹{{ $service->price }}

            </h4>

            <p>

                {{ $service->description }}

            </p>

            <p>

                Worker:

                {{ $service->worker->name }}

            </p>

            @auth

                <a
                    href="{{ route(
                        'booking.create',
                        $service->id
                    ) }}"
                    class="btn-primary-custom">

                    Book Service

                </a>

            @else

                <a
                    href="/login"
                    class="btn-primary-custom">

                    Login To Book

                </a>

            @endauth

        </div>

    </div>

</div>

@endsection

