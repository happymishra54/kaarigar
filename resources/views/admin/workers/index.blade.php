@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="fas fa-user-hard-hat text-primary me-2"></i>
                Manage Workers
            </h2>

            <p class="text-muted mb-0">
                View and manage all registered workers.
            </p>
        </div>

        <a href="{{ route('admin.workers.create') }}"
           class="btn btn-primary rounded-pill px-4">
            <i class="fas fa-user-plus me-2"></i>
            Add Worker
        </a>

    </div>

    <!-- Card -->
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>ID</th>
                            <th><i class="fas fa-user me-2"></i>Name</th>
                            <th><i class="fas fa-phone me-2"></i>Mobile</th>
                            <th><i class="fas fa-file-lines me-2"></i>Bio</th>
                            <th><i class="fas fa-location-dot me-2"></i>City</th>
                            <th class="text-center">
                                <i class="fas fa-gears me-2"></i>Actions
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($workers as $worker)

                        <tr>

                            <td>
                                <span class="badge bg-secondary">
                                    #{{ $worker->id }}
                                </span>
                            </td>

                            <td class="fw-semibold">
                                {{ $worker->name }}
                            </td>

                            <td>
                                {{ $worker->phone ?? 'N/A' }}
                            </td>

                            <td>
                                {{ Str::limit($worker->workerProfile->bio ?? 'N/A', 40) }}
                            </td>

                            <td>
                                {{ $worker->workerProfile?->city ?? 'N/A' }}
                            </td>

                            <td class="text-center">

                                <form
                                    action="{{ route('admin.workers.destroy',$worker->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-outline-danger btn-sm rounded-pill"
                                        onclick="return confirm('Delete this worker?')">

                                        <i class="fas fa-trash me-1"></i>
                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="fas fa-user-slash fa-2x mb-3 d-block"></i>
                                No workers found.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection