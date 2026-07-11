@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6 col-md-8">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4 p-lg-5">

                    <div class="text-center mb-4">

                        <span class="badge bg-warning-subtle text-warning px-3 py-2 rounded-pill">
                            CATEGORY
                        </span>

                        <h2 class="fw-bold mt-3">

                            <i class="fas fa-pen-to-square text-warning me-2"></i>

                            Edit Category

                        </h2>

                        <p class="text-muted mb-0">

                            Update the category details below.

                        </p>

                    </div>

                    <form
                        action="{{ route('categories.update', $category) }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Category Name

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', $category->name) }}"
                                class="form-control"
                                placeholder="e.g. Electrician"
                                required>

                            @error('name')

                                <div class="text-danger small mt-2">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="d-flex justify-content-between">

                            <a
                                href="{{ route('categories.index') }}"
                                class="btn btn-outline-secondary">

                                <i class="fas fa-arrow-left me-2"></i>

                                Back

                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning">

                                <i class="fas fa-save me-2"></i>

                                Update Category

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection