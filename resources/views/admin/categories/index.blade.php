@extends('layouts.app')

@section('content')

<div class="container py-5">

    <!-- Header -->

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">

        <div>

            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                CATEGORIES
            </span>

            <h2 class="fw-bold mt-3">

                <i class="fas fa-layer-group text-primary me-2"></i>

                Manage Categories

            </h2>

            <p class="text-muted mb-0">

                Create, edit and manage all service categories.

            </p>

        </div>

        <a
            href="{{ route('categories.create') }}"
            class="btn btn-primary">

            <i class="fas fa-plus me-2"></i>

            Add Category

        </a>

    </div>

    <!-- Table -->

    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th style="width:10%">#</th>

                            <th>Category</th>

                            <th class="text-center" style="width:25%">

                                Actions

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($categories as $category)

                        <tr>

                            <td>

                                <span class="badge bg-secondary">

                                    {{ $category->id }}

                                </span>

                            </td>

                            <td>

                                <i class="fas fa-folder text-warning me-2"></i>

                                <strong>{{ $category->name }}</strong>

                            </td>

                            <td class="text-center">

                                <a
                                    href="{{ route('categories.edit',$category) }}"
                                    class="btn btn-outline-warning btn-sm me-2">

                                    <i class="fas fa-pen"></i>

                                </a>

                                <form
                                    action="{{ route('categories.destroy',$category) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-outline-danger btn-sm"
                                        onclick="return confirm('Delete this category?')">

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="text-center py-5">

                                <i class="fas fa-folder-open fa-4x text-secondary mb-3"></i>

                                <h5 class="fw-bold">

                                    No Categories Found

                                </h5>

                                <p class="text-muted mb-0">

                                    Start by creating your first category.

                                </p>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    @if($categories->hasPages())

        <div class="mt-4">

            {{ $categories->links() }}

        </div>

    @endif

</div>

@endsection