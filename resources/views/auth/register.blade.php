@extends('layouts.app')

@section('content')

<div class="auth-page">

    <div class="auth-card">

        <div class="auth-logo">
            <i class="fas fa-screwdriver-wrench"></i>
        </div>

        <h1 class="auth-title">
            Create Account 🛠️
        </h1>

        <p class="auth-subtitle">
            Join India's trusted worker platform
        </p>

        @error('recaptcha')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <form id="registerForm" action="{{ route('register') }}" method="POST">
            @csrf
        
            <!-- Hidden reCAPTCHA token -->
            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
        
            <!-- Hidden Role field (Retains old value if validation fails) -->
            <input type="hidden" name="role" value="{{ old('role', request('role', 'customer')) }}">
        
            <!-- Display Global/reCAPTCHA Errors if any -->
            @if ($errors->has('recaptcha_token'))
                <div class="alert alert-danger mb-3">
                    {{ $errors->first('recaptcha_token') }}
                </div>
            @endif
        
            <!-- Full Name -->
            <div class="mb-3 input-icon-wrap">
                <label class="form-label">Full Name</label>
                <div class="input-icon">
                    <i class="fa-solid fa-user"></i>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror"
                        placeholder="Enter your full name"
                        required>
                </div>
                @error('name')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <!-- Email Address -->
            <div class="mb-3 input-icon-wrap">
                <label class="form-label">Email Address</label>
                <div class="input-icon">
                    <i class="fa-solid fa-envelope"></i>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Enter your email"
                        required>
                </div>
                @error('email')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <!-- Mobile Number -->
            <div class="mb-3 input-icon-wrap">
                <label class="form-label">Mobile Number</label>
                <div class="input-icon">
                    <i class="fa-solid fa-phone"></i>
                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        class="form-control @error('phone') is-invalid @enderror"
                        placeholder="Enter your mobile number"
                        required>
                </div>
                @error('phone')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <!-- Password -->
            <div class="mb-3 input-icon-wrap">
                <label class="form-label">Password</label>
                <div class="input-icon">
                    <i class="fa-solid fa-lock"></i>
                    <input
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter password"
                        required>
                </div>
                @error('password')
                    <div class="text-danger small mt-1">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        
            <!-- Confirm Password -->
            <div class="mb-4 input-icon-wrap">
                <label class="form-label">Confirm Password</label>
                <div class="input-icon">
                    <i class="fa-solid fa-lock"></i>
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Confirm password"
                        required>
                </div>
            </div>
        
            <button type="submit" class="auth-btn">
                <i class="fas fa-user-plus me-2"></i>
                Create Account
            </button>
        </form>

        <div class="auth-footer">

            <p class="mb-0">

                Already have an account?

                <a href="{{ route('login') }}">

                    Login

                </a>

            </p>

        </div>

    </div>

</div>

<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>

<script>
document.getElementById('registerForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const form = this;

    grecaptcha.ready(function () {
        // Double quotes prevent Blade single-quote syntax errors
        grecaptcha.execute("{{ config('services.recaptcha.site_key') }}", {
            action: 'register'
        }).then(function (token) {
            document.getElementById('recaptcha_token').value = token;
            form.submit();
        });
    });
});
</script>

@endsection
