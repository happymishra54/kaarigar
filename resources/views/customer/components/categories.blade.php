{{-- POPULAR CATEGORIES --}}

<section class="dashboard-section py-5">

    <div class="container">

        <div class="section-heading text-center mb-5">

            <span class="section-tag">

                SERVICES

            </span>

            <h2 class="section-title">

                Popular Categories

            </h2>

            <p class="section-subtitle">

                Choose the service you need

            </p>

        </div>

        <div class="categories-grid">

            @foreach($categories as $category)

            <a
                href="{{ route('home',['search'=>$category->name]) }}"
                class="category-card">

                <div class="category-icon">

                    @if($category->icon)

                        <i class="{{ $category->icon }}"></i>

                    @else

                        <i class="fa-solid fa-screwdriver-wrench"></i>

                    @endif

                </div>

                <h4>

                    {{ $category->name }}

                </h4>

            </a>

            @endforeach

        </div>

    </div>

</section>