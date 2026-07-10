{{-- HERO --}}
<section class="dashboard-hero py-5">

    <div class="container">

        <div class="card border-0 shadow-lg rounded-5 overflow-hidden">

            <div class="card-body p-5">

                <div class="row align-items-center">

                    <div class="col-lg-7">

                        <span class="badge bg-primary rounded-pill px-4 py-2 mb-3 fs-6">

                            👋 {{ $greeting }}

                        </span>

                        <h1 class="display-5 fw-bold mb-3">

                            Welcome back,

                            <span class="text-primary">

                                {{ Auth::user()->name }}

                            </span>

                        </h1>

                        <p class="text-secondary fs-5 mb-4">

                            Find trusted professionals near you, book verified experts, and track all your services from one dashboard.

                        </p>

                        <form
                            action="{{ route('home') }}"
                            method="GET">

                            <div class="input-group input-group-lg shadow-sm">

                                <span class="input-group-text bg-white border-end-0">

                                    <i class="fas fa-search text-primary"></i>

                                </span>

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control border-start-0 border-end-0"
                                    placeholder="Search Plumber, Electrician, Carpenter..."
                                    value="{{ request('search') }}">

                                <button
                                    class="btn btn-primary px-4">

                                    Search

                                </button>

                            </div>

                        </form>

                        <div class="row text-center mt-5">

                            <div class="col-4">

                                <h3 class="fw-bold text-primary">

                                    500+

                                </h3>

                                <small class="text-muted">

                                    Verified Workers

                                </small>

                            </div>

                            <div class="col-4">

                                <h3 class="fw-bold text-success">

                                    24×7

                                </h3>

                                <small class="text-muted">

                                    Customer Support

                                </small>

                            </div>

                            <div class="col-4">

                                <h3 class="fw-bold text-warning">

                                    ★4.9

                                </h3>

                                <small class="text-muted">

                                    Customer Rating

                                </small>

                            </div>

                        </div>

                    </div>

                    {{-- <div class="col-lg-5 text-center">

                        <img
                            src="{{ asset('images/dashboard-hero.png') }}"
                            class="img-fluid"
                            style="max-height:430px;">

                    </div> --}}

                </div>

            </div>

        </div>

    </div>

</section>