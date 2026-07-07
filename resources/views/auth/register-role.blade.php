@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <h2 class="text-center mb-4">
                Choose Account Type
            </h2>

            <div class="card shadow mb-4">

                <div class="card-body text-center">

                    <div style="font-size:60px;">👷</div>

                    <h4 class="mt-3">Register as Worker</h4>

                    <a href="{{ route('register', ['role' => 'worker']) }}"
                       class="btn btn-primary w-100 mt-3">

                        Continue

                    </a>

                </div>

            </div>

            <div class="card shadow">

                <div class="card-body text-center">

                    <div style="font-size:60px;">👤</div>

                    <h4 class="mt-3">Register as Customer</h4>

                    <a href="{{ route('register', ['role' => 'customer']) }}"
                       class="btn btn-success w-100 mt-3">

                        Continue

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection