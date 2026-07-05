{{-- <nav class="kk-navbar">

    <div class="container nav-container">
    
        <a href="/" class="logo">
    
            <i class="fa-solid fa-screwdriver-wrench"></i>
    
            <span>Kaarigar</span>
    
        </a>
    
        <button class="hamburger" id="hamburger">
    
            <i class="fa-solid fa-bars"></i>
    
        </button>
    
        <div class="mobile-overlay" id="overlay"></div>
    
        <div class="side-menu" id="sideMenu">
    
            <button class="close-menu" id="closeMenu">
    
                <i class="fa-solid fa-xmark"></i>
    
            </button>
    
            <div class="menu-links">
    
                <a href="/">Home</a>
    
                <a href="#">Categories</a>
    
                <a href="#">Become Worker</a>
    
                <a href="#">About</a>
    
            </div>
    
            <div class="menu-actions">
    
                @auth
    
                    <span class="welcome">
    
                        Hi, {{ auth()->user()->name }}
    
                    </span>
    
                    @if(auth()->user()->role === 'customer')
                        <a href="{{ route('customer.dashboard') }}" class="btn-primary-custom">Dashboard</a>
                    @elseif(auth()->user()->role === 'worker')
                        <a href="{{ route('worker.dashboard') }}" class="btn-primary-custom">Dashboard</a>
                    @elseif(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="btn-primary-custom">Dashboard</a>
                    @endif
    
                    <form method="POST" action="{{ route('logout') }}">
    
                        @csrf
    
                        <button class="btn-primary-custom">
    
                            Logout
    
                        </button>
    
                    </form>
    
                @else
    
                    <a href="/login" class="btn-primary-custom">
    
                        Login
    
                    </a>
    
                    <a href="/register" class="btn-primary-custom">
    
                        Register
    
                    </a>
    
                @endauth
    
            </div>
    
        </div>
    
    </div>
    
    </nav> --}}