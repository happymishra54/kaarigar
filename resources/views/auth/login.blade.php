@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm">

                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <h2 class="fw-bold">

                            Welcome Back 👋

                        </h2>

                        <p class="text-muted">

                            Login to continue

                        </p>

                    </div>

                    @if(session('reactivate_email'))

                    <div class="alert alert-warning">
                    
                        <strong>Your account has been deactivated.</strong>
                    
                        <p class="mb-3 mt-2">
                            Click below to reactivate your account.
                        </p>
                    
                        <form method="POST"
                              action="{{ route('account.reactivate.send') }}">
                    
                            @csrf
                    
                            <input
                                type="hidden"
                                name="email"
                                value="{{ session('reactivate_email') }}">
                    
                            <button class="btn btn-warning">
                    
                                <i class="fa-solid fa-envelope me-2"></i>
                    
                                Reactivate My Account
                    
                            </button>
                    
                        </form>
                    
                    </div>
                    
                    @endif

                    @if($errors->has('login'))

<div class="alert alert-danger">

    {{ $errors->first('login') }}

    @if(Str::contains($errors->first('login'), 'not found'))

        <div class="mt-3">

            <a href="{{ route('register.role') }}"
               class="btn btn-primary">

                Register Now

            </a>

        </div>

    @endif

</div>

@endif

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label fw-semibold">

                                Login As

                            </label>

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="role"
                                    id="customer"
                                    value="customer"
                                    {{ old('role','customer') == 'customer' ? 'checked' : '' }}>

                                <label class="form-check-label" for="customer">

                                    <i class="fa-solid fa-user me-2"></i>

                                    Customer

                                </label>

                            </div>

                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="role"
                                    id="worker"
                                    value="worker"
                                    {{ old('role') == 'worker' ? 'checked' : '' }}>

                                <label class="form-check-label" for="worker">

                                    <i class="fa-solid fa-screwdriver-wrench me-2"></i>

                                    Worker

                                </label>

                            </div>

                            @error('role')

                                <div class="text-danger small">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Email or Mobile Number

                            </label>

                            <input
                                type="text"
                                name="login"
                                value="{{ old('login') }}"
                                class="form-control @error('login') is-invalid @enderror"
                                placeholder="Enter Email or Mobile Number"
                                required>

                            @error('login')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                        
                                Password
                        
                            </label>
                        
                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter Password"
                                required>
                        
                            @error('password')
                        
                                <div class="invalid-feedback">
                        
                                    {{ $message }}
                        
                                </div>
                        
                            @enderror
                        
                        </div>
                        
                        <div class="d-flex justify-content-end mb-4">
                        
                            <a href="{{ route('password.request') }}"
                               class="text-decoration-none small fw-semibold">
                        
                                Forgot Password?
                        
                            </a>
                        
                        </div>
                        
                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            <i class="fa-solid fa-right-to-bracket me-2"></i>

                            Login

                        </button>

                    </form>

                    <div class="text-center mt-4">

                        <p class="mb-0">

                            Don't have an account?

                            <a href="{{ route('register.role') }}">

                                Create Account

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection