@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">

        My Bookings

    </h2>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <table class="table table-bordered">

        <thead>

        <tr>

            <th>Booking No</th>

            <th>Customer</th>

            <th>Service</th>

            <th>Date</th>

            <th>Status</th>

            <th>Action</th>

        </tr>

        </thead>

        <tbody>

        @foreach($bookings as $booking)

            <tr>

                <td>

                    {{ $booking->booking_number }}

                </td>

                <td>

                    {{ $booking->customer->name }}

                </td>

                <td>

                    {{ $booking->service->title }}

                </td>

                <td>

                    {{ $booking->booking_date }}

                </td>

                <td>

                    {{ ucfirst($booking->status) }}

                </td>

                <td>

                    @if($booking->status == 'pending')

                        <form
                            action="{{ route('worker.booking.accept',$booking->id) }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('PATCH')

                            <button
                                class="btn btn-success btn-sm">

                                Accept

                            </button>

                        </form>

                        <form
                            action="{{ route('worker.booking.reject',$booking->id) }}"
                            method="POST"
                            style="display:inline">

                            @csrf
                            @method('PATCH')

                            <button
                                class="btn btn-danger btn-sm">

                                Reject

                            </button>

                        </form>

                    @elseif($booking->status == 'accepted')

                        <form
                            action="{{ route('worker.booking.complete',$booking->id) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')

                            <button
                                class="btn btn-primary btn-sm">

                                Complete

                            </button>

                        </form>

                    @endif

                </td>

            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection

