{{-- RECOMMENDED WORKERS --}}

<section class="dashboard-section py-5">

    <div class="container">

        <div class="section-heading text-center mb-5">

            <span class="section-tag">

                PROFESSIONALS

            </span>

            <h2 class="section-title">

                Recommended Workers

            </h2>

        </div>

        <div class="row g-4">

            @forelse($recommendedWorkers as $worker)

            <div class="col-lg-3 col-md-6">

                @include('partials.worker-card',['worker'=>$worker])

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-info">

                    No recommended workers available.

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>