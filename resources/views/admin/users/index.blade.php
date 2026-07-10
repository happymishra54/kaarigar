@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">
                <i class="fas fa-users text-primary me-2"></i>
                Users
            </h2>
            <p class="text-muted mb-0">
                Manage all registered users.
            </p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm">
            <i class="fas fa-circle-check me-2"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif

    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>
                            <th><i class="fas fa-user me-2"></i>Name</th>
                            <th><i class="fas fa-phone me-2"></i>Mobile</th>
                            <th><i class="fas fa-user-tag me-2"></i>Role</th>
                            <th><i class="fas fa-circle-info me-2"></i>Status</th>
                            <th class="text-center">
                                <i class="fas fa-gears me-2"></i>Actions
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($users as $user)

                        <tr>

                            <td class="fw-semibold">
                                {{ $user->name }}
                            </td>

                            <td>
                                {{ $user->phone }}
                            </td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>

                            <td>

                                @if($user->status)

                                    <span class="badge bg-success">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-danger">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <form
                                    action="{{ route('admin.users.status',$user) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="btn btn-warning btn-sm rounded-pill">
                                        <i class="fas fa-repeat me-1"></i>
                                        Toggle
                                    </button>

                                </form>

                                <form
                                    action="{{ route('admin.users.destroy',$user) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm rounded-pill"
                                        onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="fas fa-trash me-1"></i>
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $users->links() }}
    </div>

</div>

@endsection