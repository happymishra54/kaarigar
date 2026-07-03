@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow">

        <div class="card-header">

            <h3>Add Service</h3>

        </div>

        <div class="card-body">

            @if ($errors->any())

<div class="alert alert-danger">

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

            <form
                action="{{ route('services.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-3">

                    <label class="form-label">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="form-control">

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}">

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Service Title

                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Description

                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="form-control"></textarea>

                </div>

                <div class="mb-3">

                    <label class="form-label">

                        Price

                    </label>

                    <input
                        type="number"
                        name="price"
                        class="form-control">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                
                        Service Image
                
                    </label>
                
                    <input
                        type="file"
                        name="image"
                        class="form-control">
                
                </div>

                <button class="btn-primary-custom">

                    Save Service

                </button>






            </form>

        </div>

    </div>

</div>

@endsection

