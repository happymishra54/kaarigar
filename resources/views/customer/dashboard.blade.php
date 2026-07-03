@extends('layouts.app')

@section('content')

@php

    $hour = now()->hour;

    if($hour < 12){

        $greeting = "Good Morning";

    }elseif($hour < 17){

        $greeting = "Good Afternoon";

    }else{

        $greeting = "Good Evening";

    }

@endphp

<div class="customer-layout">

    <aside class="customer-sidebar">

        <div class="sidebar-logo">

            <h2>Kaarigar</h2>

        </div>

        <nav>

            <a href="{{ route('customer.dashboard') }}" class="active">

                <i class="fa-solid fa-house"></i>

                Dashboard

            </a>

            <a href="{{ route('customer.bookings') }}">

                <i class="fa-solid fa-calendar-days"></i>

                My Bookings

            </a>

            <a href="{{ route('customer.favorites') }}">

                <i class="fa-solid fa-heart"></i>
            
                Favourite Workers
            
            </a>

                        

            <a href="{{ route('customer.profile') }}">

                <i class="fa-solid fa-user"></i>

                My Profile

            </a>

            <a href="{{ route('notifications') }}">

                <i class="fa-solid fa-bell"></i>
            
                Notifications
            
                @php
            
                    $unread = auth()->user()
                        ->notifications()
                        ->whereNull('read_at')
                        ->count();
            
                @endphp
            
                @if($unread)
            
                    <span class="notification-badge">
            
                        {{ $unread }}
            
                    </span>
            
                @endif
            
            </a>

            <a href="{{ route('nearby.workers') }}">

                <i class="fa-solid fa-location-dot"></i>
            
                Nearby Workers
            
            </a>

            {{-- <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button class="logout-btn">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    Logout

                </button>

            </form> --}}

        </nav>

    </aside>

    <main class="customer-main">

        @include('customer.components.hero')
    
        @include('customer.components.quick-actions')
    
        @include('customer.components.stats')
    
        @include('customer.components.categories')
    
        @include('customer.components.recommended-workers')
    
        @include('customer.components.recent-bookings')
    
    </main>

</div>

@endsection

