@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Header -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>

            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                USERS
            </span>

            <h2 class="fw-bold mt-3">

                <i class="fas fa-users text-primary me-2"></i>

                Manage Users

            </h2>

            <p class="text-muted mb-0">

                View and manage all registered users.

            </p>

        </div>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="fas fa-circle-check me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif

    <!-- Table -->

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th>Name</th>

                            <th>Mobile</th>

                            <th>Role</th>

                            <th>Status</th>

                            <th class="text-center">

                                Actions

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($users as $user)

                        <tr>

                            <td>

                                <strong>{{ $user->name }}</strong>

                            </td>

                            <td>

                                {{ $user->phone }}

                            </td>

                            <td>

                                @php
                                    $roleColor = match($user->role){
                                        'admin' => 'danger',
                                        'worker' => 'warning',
                                        default => 'primary'
                                    };
                                @endphp

                                <span class="badge bg-{{ $roleColor }}">

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
                                        class="btn btn-outline-warning btn-sm"
                                        title="Toggle Status">

                                        <i class="fas fa-repeat"></i>

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
                                        class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Delete this user?')"
                                        title="Delete User">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-5">

                                <i class="fas fa-users fa-4x text-secondary mb-3"></i>

                                <h5 class="fw-bold">

                                    No Users Found

                                </h5>

                                <p class="text-muted mb-0">

                                    Registered users will appear here.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    @if($users->hasPages())

        <div class="mt-4">

            {{ $users->links() }}

        </div>

    @endif

</div>

@endsection