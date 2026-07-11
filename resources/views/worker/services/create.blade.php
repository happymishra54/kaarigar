@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">


            <div class="card shadow-lg border-0 rounded-4">


                <div class="card-header bg-primary text-white rounded-top-4">

                    <h3 class="mb-0">

                        <i class="fa-solid fa-plus-circle me-2"></i>

                        Add Service

                    </h3>

                </div>



                <div class="card-body p-4">



                    @if ($errors->any())

                    <div class="alert alert-danger rounded-3">

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                    @endif





                    <form
                    action="{{ route('services.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf




                    {{-- Category --}}

                    <div class="mb-4">

                        <label class="form-label fw-bold">

                            Category

                        </label>


                        <select
                        name="category_id"
                        class="form-control"
                        required>


                            <option value="">
                                Select Category
                            </option>



                            @foreach($categories as $category)

                            <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>


                            @endforeach


                        </select>


                    </div>






                    {{-- Title --}}

                    <div class="mb-4">


                        <label class="form-label fw-bold">

                            Service Title

                        </label>


                        <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        required>


                    </div>







                    {{-- Description --}}

                    <div class="mb-4">


                        <label class="form-label fw-bold">

                            Description

                        </label>


                        <textarea
                        name="description"
                        rows="5"
                        class="form-control"
                        required>{{ old('description') }}</textarea>


                    </div>








                    {{-- Price --}}

                    <div class="mb-4">


                        <label class="form-label fw-bold">

                            Price

                        </label>


                        <input
                        type="number"
                        name="price"
                        class="form-control"
                        value="{{ old('price') }}"
                        required>


                    </div>








                    {{-- Image --}}

                    <div class="mb-4">


                        <label class="form-label fw-bold">

                            Service Image

                        </label>


                        <input
                        type="file"
                        name="image"
                        id="image"
                        class="form-control"
                        accept="image/*">



                        <img
                        id="preview"
                        class="mt-3 rounded-3 shadow"
                        width="150"
                        style="display:none;">



                    </div>








                    <button
                    class="btn-primary-custom w-100">


                        <i class="fa-solid fa-save me-2"></i>

                        Save Service


                    </button>





                    </form>



                </div>


            </div>


        </div>


    </div>


</div>






<script>


document.getElementById('image').onchange = function(event){


    let preview = document.getElementById('preview');


    preview.src =
    URL.createObjectURL(event.target.files[0]);


    preview.style.display="block";


}


</script>


@endsection