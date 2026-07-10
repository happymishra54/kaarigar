@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <i class="fas fa-folder-plus fa-3x text-success mb-3"></i>

                        <h2 class="fw-bold">
                            Add Category
                        </h2>

                        <p class="text-muted">
                            Create a new service category for your platform.
                        </p>

                    </div>

                    <form
                        action="{{ route('categories.store') }}"
                        method="POST">

                        @csrf

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Category Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
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
                                class="btn btn-success rounded-pill px-4">

                                <i class="fas fa-floppy-disk me-2"></i>

                                Save Category

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection