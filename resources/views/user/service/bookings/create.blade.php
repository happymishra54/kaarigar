@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header">

            <h3>

                Book Service

            </h3>

        </div>

        <div class="card-body">

            <form
                action="{{ route('booking.store') }}"
                method="POST">

                @csrf

                <input
                    type="hidden"
                    name="service_id"
                    value="{{ $service->id }}">

                <div class="mb-3">

                    <label>

                        Service

                    </label>

                    <input
                        class="form-control"
                        value="{{ $service->title }}"
                        readonly>

                </div>

                <div class="mb-3">

                    <label>

                        Date

                    </label>

                    <input
                        type="date"
                        name="booking_date"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>

                        Time

                    </label>

                    <input
                        type="time"
                        name="booking_time"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label>

                        Address

                    </label>

                    <textarea
                        name="address"
                        class="form-control"
                        rows="4"></textarea>

                </div>

                <button
                    class="btn btn-primary">

                    Confirm Booking

                </button>

            </form>

        </div>

    </div>

</div>

@endsection

