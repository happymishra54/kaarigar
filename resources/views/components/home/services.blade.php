<section class="services-section fade-up py-5">

    <div class="container">

        <div class="section-heading text-center mb-5">

            <span class="section-tag">
                POPULAR SERVICES
            </span>

            <h2 class="section-title">
                Services You Can Trust
            </h2>

            <p class="section-subtitle">
                Book verified professionals for all your home needs.
            </p>

        </div>


        <div class="row g-4">


            @forelse($services as $service)

            <div class="col-lg-4 col-md-6">

                <div class="premium-service-card h-100">


                    <div class="service-image position-relative">


                        @if($service->image)

    <img
        src="{{ asset('storage/' . $service->image) }}"
        alt="{{ $service->title }}"
        class="img-fluid">

@else

    <img
        src="{{ asset('images/default-service.jpg') }}"
        alt="{{ $service->title }}"
        class="img-fluid">

@endif


                        <span class="service-badge">

                            <i class="fa-solid fa-star"></i>

                            Popular

                        </span>


                    </div>



                    <div class="service-body d-flex flex-column">


                        <div class="service-content">


                            <h4 class="fw-bold">

                                {{ $service->title }}

                            </h4>



                            <p>

                                {{ Str::limit($service->description,100) }}

                            </p>


                        </div>



                        <div class="service-footer mt-auto d-flex justify-content-between align-items-center">


                            <div class="service-price">

                                <span class="text-muted small">
                                    Starting from
                                </span>

                                <h5 class="mb-0">

                                    ₹{{ number_format($service->price) }}

                                </h5>

                            </div>



                            <a
    href="{{ route('home', ['search' => $service->title]) }}"
    class="btn-primary-custom">

    <i class="fa-solid fa-arrow-right me-1"></i>

    View

</a>


                        </div>



                    </div>



                </div>


            </div>


            @empty


            <div class="col-12">


                <div class="text-center p-5 shadow rounded-4">


                    <i class="fa-solid fa-screwdriver-wrench fa-3x text-primary mb-3"></i>


                    <h4>

                        No services available

                    </h4>


                    <p class="text-muted">

                        Services will appear here soon.

                    </p>


                </div>


            </div>


            @endforelse



        </div>


    </div>


</section>