@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <i class="fas fa-pen-to-square fa-3x text-warning mb-3"></i>

                        <h2 class="fw-bold">
                            Edit Category
                        </h2>

                        <p class="text-muted">
                            Update the category information below.
                        </p>

                    </div>

                    <form
                        action="{{ route('categories.update',$category) }}"
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
                                class="form-control form-control-lg"
                                placeholder="Enter category name"
                                required>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a
                                href="{{ route('categories.index') }}"
                                class="btn btn-outline-secondary rounded-pill px-4">

                                <i class="fas fa-arrow-left me-2"></i>

                                Back

                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning rounded-pill px-4">

                                <i class="fas fa-floppy-disk me-2"></i>

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