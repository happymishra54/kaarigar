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

        <!-- Logo -->
    
        <div class="sidebar-logo text-center mb-4">
    
            <h2 class="fw-bold text-white mb-1">
    
                <i class="fas fa-tools me-2"></i>
    
                Kaarigar
    
            </h2>
    
            <small class="text-light opacity-75">
    
                Customer Panel
    
            </small>
    
        </div>
    
    
        <!-- Customer Profile -->
    
        <div class="card bg-white border-0 shadow-sm rounded-4 mb-4">
    
            <div class="card-body text-center">
    
    
                <div class="mb-3">
    
                    <i class="fas fa-circle-user fa-5x text-primary"></i>
    
                </div>
    
    
                <h5 class="fw-bold mb-1">
    
                    {{ auth()->user()->name }}
    
                </h5>
    
    
                <span class="badge bg-success rounded-pill">
    
                    Customer
    
                </span>
    
    
            </div>
    
        </div>
    
    
    
        <!-- Navigation -->
    
        <nav class="nav flex-column gap-2">
    
    
            <a href="{{ route('customer.bookings') }}"
               class="nav-link">
    
                <i class="fas fa-calendar-check me-2"></i>
    
                My Bookings
    
            </a>
    
    
    
            <a href="{{ route('customer.favorites') }}"
               class="nav-link">
    
    
                <i class="fas fa-heart me-2 text-danger"></i>
    
                Favourite Workers
    
    
            </a>
    
    
    
            <a href="{{ route('customer.profile') }}"
               class="nav-link">
    
    
                <i class="fas fa-user me-2"></i>
    
                My Profile
    
    
            </a>
    
    
    
    
            <a href="{{ route('notifications') }}"
               class="nav-link d-flex justify-content-between align-items-center">
    
    
                <span>
    
                    <i class="fas fa-bell me-2"></i>
    
                    Notifications
    
                </span>
    
    
                @php
    
                    $unread = auth()->user()
                        ->notifications()
                        ->whereNull('read_at')
                        ->count();
    
                @endphp
    
    
    
                @if($unread)
    
                    <span class="badge bg-danger rounded-pill">
    
                        {{ $unread }}
    
                    </span>
    
                @endif
    
    
            </a>
    
    
    
    
            <a href="{{ route('nearby.workers') }}"
               class="nav-link">
    
    
                <i class="fas fa-location-dot me-2"></i>
    
                Nearby Workers
    
    
            </a>
    
    
        </nav>
    
    
    </aside>

    <main class="customer-main">

        @include('customer.components.hero')
    
        @include('customer.components.quick-actions')
    
        @include('customer.components.stats')
    
        @include('customer.components.categories')
    
        @include('customer.components.recommended-workers')
    
        @include('customer.components.recent-bookings')

        @include('components.home.services')
    
    </main>

</div>

@endsection

