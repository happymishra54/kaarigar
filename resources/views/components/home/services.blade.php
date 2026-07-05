<section class="services-section fade-up">

    <div class="container">

        <div class="text-center mb-5">

            <span class="section-tag">

                POPULAR SERVICES

            </span>

            <h2 class="section-title">

                Services You Can Trust

            </h2>

            <p class="section-subtitle">

                Book skilled professionals for all your home needs.

            </p>

        </div>

        <div class="row g-4">

            @foreach($services as $service)

            <div class="col-lg-4 col-md-6">

                <div class="premium-service-card reveal">

                    <div class="service-image">

                        <img
                            src="{{ $service->image }}"
                            alt="{{ $service->title }}"
                            class="img-fluid">
                    
                        <span class="service-badge">
                    
                            Popular
                    
                        </span>
                    
                    </div>

                    <div class="service-body">

                        <h4>

                            {{ $service->title }}

                        </h4>

                        <p>

                            {{ Str::limit($service->description,90) }}

                        </p>

                        <div class="service-footer">

                            <h5>

                                ₹{{ $service->price }}

                            </h5>

                            <a href="#workers"

                            class="btn-primary-custom">

                                View

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>