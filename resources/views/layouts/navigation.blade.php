<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">

    <div class="container">

        {{-- Logo --}}
        @auth
            @if(auth()->user()->role === 'customer')
                <a class="navbar-brand fw-bold" href="{{ route('customer.dashboard') }}">
            @elseif(auth()->user()->role === 'worker')
                <a class="navbar-brand fw-bold" href="{{ route('worker.dashboard') }}">
            @elseif(auth()->user()->role === 'admin')
                <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">
            @else
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            @endif
        @else
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
        @endauth

            <i class="fas fa-screwdriver-wrench me-2 text-warning"></i>
            Kaarigar

        </a>

        {{-- Mobile Toggle --}}
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- Left --}}
            <ul class="navbar-nav me-auto">

                @auth

                    @if(auth()->user()->role=='customer')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customer.dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                    @elseif(auth()->user()->role=='worker')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('worker.dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                    @elseif(auth()->user()->role=='admin')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                Dashboard
                            </a>
                        </li>

                    @endif

                @endauth

            </ul>

            {{-- Right --}}
            @auth

                <div class="dropdown">

                    <button
                        class="btn btn-outline-light dropdown-toggle"
                        data-bs-toggle="dropdown">

                        <i class="fas fa-user-circle me-2"></i>

                        {{ auth()->user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        @if(auth()->user()->role=='worker')

                            <li>

                                <a class="dropdown-item"
                                   href="{{ route('worker.profile.edit') }}">

                                    <i class="fas fa-user-edit me-2"></i>

                                    Profile

                                </a>

                            </li>

                        @endif

                        <li><hr class="dropdown-divider"></li>

                        <li>

                            <form method="POST"
                                  action="{{ route('logout') }}">

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger">

                                    <i class="fas fa-right-from-bracket me-2"></i>

                                    Logout

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            @endauth

        </div>

    </div>

</nav>