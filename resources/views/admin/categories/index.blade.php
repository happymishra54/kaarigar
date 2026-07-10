@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                <i class="fas fa-layer-group text-primary me-2"></i>
                Categories
            </h2>

            <p class="text-muted mb-0">
                Manage all service categories.
            </p>
        </div>

        <a
            href="{{ route('categories.create') }}"
            class="btn btn-primary rounded-pill px-4">

            <i class="fas fa-plus me-2"></i>

            Add Category

        </a>

    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-lg rounded-4">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-dark">

                        <tr>
                            <th width="10%">ID</th>
                            <th>Category Name</th>
                            <th width="25%" class="text-center">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $category)

                        <tr>

                            <td>
                                <span class="badge bg-secondary">
                                    #{{ $category->id }}
                                </span>
                            </td>

                            <td class="fw-semibold">
                                <i class="fas fa-folder-open text-warning me-2"></i>
                                {{ $category->name }}
                            </td>

                            <td class="text-center">

                                <a
                                    href="{{ route('categories.edit',$category) }}"
                                    class="btn btn-warning btn-sm rounded-pill">

                                    <i class="fas fa-pen me-1"></i>
                                    Edit

                                </a>

                                <form
                                    action="{{ route('categories.destroy',$category) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm rounded-pill"
                                        onclick="return confirm('Delete this category?')">

                                        <i class="fas fa-trash me-1"></i>
                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-center py-5 text-muted">

                                <i class="fas fa-folder-open fa-3x mb-3 d-block"></i>

                                No categories found.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <div class="mt-4 d-flex justify-content-center">

        {{ $categories->links() }}

    </div>

</div>

@endsection