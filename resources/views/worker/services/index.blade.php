@extends('layouts.app')

@section('content')

<div class="container py-5">

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="d-flex justify-content-between mb-4">

        <h2>

            My Services

        </h2>

        <a
            href="{{ route('services.create') }}"
            class="btn-success-custom">

            Add Service

        </a>

    </div>

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>Title</th>

                <th>Category</th>

                <th>Price</th>

                <th>Status</th>

                <th>Action</th>

                <th>Image</th>

            </tr>

        </thead>

        <tbody>

        @forelse($services as $service)

            <tr>

                <td>

                    {{ $service->title }}

                </td>

                <td>

                    {{ $service->category->name }}

                </td>

                <td>

                    ₹{{ $service->price }}

                </td>

                <td>

                    @if($service->status)

                        Active

                    @else

                        Inactive

                    @endif

                </td>

                <td>

                    <a
                        href="{{ route('services.edit',$service->id) }}"
                        class="btn-primary-custom btn-sm">

                        Edit

                    </a>

                    <a>
                        <form
                            action="{{ route('services.destroy',$service->id) }}"
                            method="POST"
                            style="display:inline">

                            @csrf

                            @method('DELETE')

                            <button
                                class="btn-danger-custom btn-sm">

                                Delete

                            </button>

                        </form>
                    </a>

                </td>
                

                <td>
                    @if($service->image)

                        <img
                            src="{{ asset('storage/'.$service->image) }}"
                            width="80">

                    @endif
                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5">

                    No services found.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection

