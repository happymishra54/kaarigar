@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h2 class="mb-4">
        Worker Verification Requests
    </h2>

    <table class="table table-bordered">

        <thead>

        <tr>

            <th>Name</th>
            <th>Mobile</th>
            <th>City</th>
            <th>Aadhaar Number</th>
            <th>Aadhaar Image</th>
            <th>Status</th>
            <th>Action</th>

        </tr>

        </thead>

        <tbody>

        @foreach($workers as $worker)

        <tr>

            <td>

{{ $worker->user?->name ?? 'N/A' }}

            </td>

            <td>

{{ $worker->user?->phone ?? 'N/A' }}

            </td>

            <td>

                {{ $worker->city }}

            </td>

            <td>

                {{ $worker->aadhaar_number }}

            </td>

            <td>

                @if($worker->aadhaar_image)

                <img
                    src="{{ asset('storage/'.$worker->aadhaar_image) }}"
                    width="120">

                @endif

            </td>

            <td>

                @if($worker->is_verified)

                    <span class="badge bg-success">

                        Verified

                    </span>

                @else

                    <span class="badge bg-warning">

                        Pending

                    </span>

                @endif

            </td>

            <td>

                @if(!$worker->is_verified)

                <form
                    action="{{ route('admin.worker.approve',$worker->id) }}"
                    method="POST">

                    @csrf
                    @method('PATCH')

                    <button class="btn btn-success">

                        Approve

                    </button>

                </form>

                @endif

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

    <div class="mt-4">

        {{ $workers->links() }}

    </div>

</div>

@endsection

