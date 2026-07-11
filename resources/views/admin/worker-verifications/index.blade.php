@extends('layouts.app')

@section('content')

<div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">

    <div>

        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
            VERIFICATIONS
        </span>

        <h2 class="fw-bold mt-3">

            <i class="fas fa-circle-check text-success me-2"></i>

            Worker Verification Requests

        </h2>

        <p class="text-muted mb-0">

            Review worker documents before approving their accounts.

        </p>

    </div>

    <div class="d-flex gap-2 flex-wrap">

        <a
            href="{{ route('admin.workers.index') }}"
            class="btn btn-outline-primary">

            <i class="fas fa-user-hard-hat me-2"></i>

            Workers

        </a>

        <a
            href="{{ route('admin.workers.create') }}"
            class="btn btn-primary">

            <i class="fas fa-user-plus me-2"></i>

            Add Worker

        </a>

    </div>

</div>

<div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>Profile</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>City</th>
                            <th>Aadhaar No.</th>
                            <th>Aadhaar</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($workers as $worker)

                    <tr>

                        <td>

                            @if($worker->profile_image)

                                <img
                                    src="{{ asset('storage/'.$worker->profile_image) }}"
                                    class="rounded-circle border"
                                    width="55"
                                    height="55"
                                    style="object-fit:cover;cursor:pointer"
                                    data-bs-toggle="modal"
                                    data-bs-target="#profile{{ $worker->id }}">

                            @else

                                <span class="text-muted">N/A</span>

                            @endif

                        </td>

                        <td class="fw-semibold">

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

                            <button
                            class="btn btn-outline-primary btn-sm"
                            title="View Aadhaar">
                            
                            <i class="fas fa-image"></i>
                            
                            </button>

                            @else

                                N/A

                            @endif

                        </td>

                        <td>

                            @if($worker->is_verified)

                                <span class="badge bg-success">
                                    Verified
                                </span>

                            @else

                                <span class="badge bg-warning text-dark">
                                    Pending
                                </span>

                            @endif

                        </td>

                        <td class="text-center">

                            @if(!$worker->is_verified)

                                <form
                                    action="{{ route('admin.worker.approve',$worker->id) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="btn btn-success btn-sm">

                                        <i class="fas fa-check me-1"></i>

                                        Approve

                                    </button>

                                </form>

                            @else

                                <span class="text-success fw-semibold">
                                    Approved
                                </span>

                            @endif

                        </td>

                    </tr>

                    <!-- Profile Modal -->

                    <div class="modal fade"
                         id="profile{{ $worker->id }}"
                         tabindex="-1">

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h5 class="modal-title">

                                        Profile Image

                                    </h5>

                                    <button
                                        class="btn-close"
                                        data-bs-dismiss="modal"></button>

                                </div>

                                <div class="modal-body text-center">

                                    <img
                                        src="{{ asset('storage/'.$worker->profile_image) }}"
                                        class="img-fluid rounded">

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Aadhaar Modal -->

                    <div class="modal fade"
                         id="aadhaar{{ $worker->id }}"
                         tabindex="-1">

                        <div class="modal-dialog modal-lg modal-dialog-centered">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <h5 class="modal-title">

                                        Aadhaar Card

                                    </h5>

                                    <button
                                        class="btn-close"
                                        data-bs-dismiss="modal"></button>

                                </div>

                                <div class="modal-body text-center">

                                    <img
                                        src="{{ asset('storage/'.$worker->aadhaar_image) }}"
                                        class="img-fluid rounded">

                                </div>

                            </div>

                        </div>

                    </div>

                    @empty

                    <tr>

                        <td colspan="8" class="text-center py-5">

                            <i class="fas fa-user-shield fa-4x text-secondary mb-3"></i>
                        
                            <h5 class="fw-bold">
                        
                                No Verification Requests
                        
                            </h5>
                        
                            <p class="text-muted mb-0">
                        
                                New worker verification requests will appear here.
                        
                            </p>
                        
                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    @if($workers->hasPages())

<div class="mt-4">

    {{ $workers->links() }}

</div>

@endif

</div>

@endsection