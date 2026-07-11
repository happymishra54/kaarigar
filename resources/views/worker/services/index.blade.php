@extends('layouts.app')

@section('content')

<div class="container py-5">


    @if(session('success'))

        <div class="alert alert-success rounded-4 shadow-sm">

            {{ session('success') }}

        </div>

    @endif



    <div class="d-flex justify-content-between align-items-center mb-5">

        <div>

            <h2 class="fw-bold mb-1">

                My Services

            </h2>

            <p class="text-muted mb-0">

                Manage the services you provide.

            </p>

        </div>


        <a
            href="{{ route('services.create') }}"
            class="btn-success-custom">

            ➕ Add Service

        </a>


    </div>





    <div class="row g-4">


    @forelse($services as $service)


        <div class="col-lg-4 col-md-6">


            <div class="card border-0 shadow-lg rounded-4 overflow-hidden h-100">


                {{-- Image --}}

                <div class="position-relative">


                    @if($service->image)

                        <img
                            src="{{ asset('storage/'.$service->image) }}"
                            class="w-100"
                            style="height:220px;object-fit:cover;">


                    @else

                        <div
                            class="bg-light d-flex align-items-center justify-content-center"
                            style="height:220px;">

                            <i class="fa-solid fa-image fa-4x text-muted"></i>

                        </div>


                    @endif



                    @if($service->status)

                        <span
                            class="badge bg-success position-absolute top-0 end-0 m-3 rounded-pill px-3">

                            Active

                        </span>


                    @else


                        <span
                            class="badge bg-danger position-absolute top-0 end-0 m-3 rounded-pill px-3">

                            Inactive

                        </span>


                    @endif



                </div>




                <div class="card-body">


                    <h4 class="fw-bold">

                        {{ $service->title }}

                    </h4>



                    <p class="text-primary fw-semibold">

                        {{ $service->category->name ?? 'No Category' }}

                    </p>



                    <p class="text-muted">

                        {{ Str::limit($service->description,100) }}

                    </p>




                    <h4 class="text-success fw-bold">

                        ₹{{ number_format($service->price) }}

                    </h4>



                </div>




                <div class="card-footer bg-white border-0 pb-4 px-4">


                    <div class="d-flex gap-2">


                        <a
                            href="{{ route('services.edit',$service->id) }}"
                            class="btn-primary-custom flex-fill text-center">

                            ✏ Edit

                        </a>




                        <form
                            action="{{ route('services.destroy',$service->id) }}"
                            method="POST"
                            class="flex-fill">


                            @csrf

                            @method('DELETE')



                            <button
                                class="btn-danger-custom w-100"
                                onclick="return confirm('Are you sure you want to delete this service?')">


                                🗑 Delete


                            </button>



                        </form>



                    </div>


                </div>



            </div>


        </div>




    @empty



        <div class="col-12">


            <div class="card shadow border-0 rounded-4 p-5 text-center">


                <i class="fa-solid fa-screwdriver-wrench fa-4x text-muted mb-3"></i>


                <h4 class="fw-bold">

                    No Services Added

                </h4>


                <p class="text-muted">

                    Add your first service so customers can book you.

                </p>



                <div>

                    <a
                        href="{{ route('services.create') }}"
                        class="btn-success-custom">

                        Add First Service

                    </a>

                </div>


            </div>


        </div>



    @endforelse



    </div>



</div>


@endsection