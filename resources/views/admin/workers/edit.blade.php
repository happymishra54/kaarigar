@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-5">

                <div>
            
                    <h2 class="fw-bold mb-1">
                        <i class="fas fa-user-plus text-primary me-2"></i>
                        Edit Worker
                    </h2>
            
                    <p class="text-muted mb-0">
                        Edit the worker account for the Kaarigar platform.
                    </p>
            
                </div>
            
                <a href="{{ route('admin.workers.index') }}"
                   class="btn btn-outline-secondary">
            
                    <i class="fas fa-arrow-left me-2"></i>
            
                    Back to Workers
            
                </a>
            
            </div>

            <form action="{{ route('admin.workers.update', $worker->id) }}"
                method="POST"
                enctype="multipart/form-data">
              @csrf
              @method('PUT')

                <div class="row">
                
                    <!-- Left Column -->
                    <div class="col-lg-6">
                
                        <div class="card shadow-sm mb-4">

                            <div class="card-body">
                        
                                <h5 class="fw-bold mb-4">
                        
                                    <i class="fas fa-user text-primary me-2"></i>
                        
                                    Personal Details
                        
                                </h5>
                        
                                <div class="mb-3">
                        
                                    <label class="form-label">
                                        Full Name
                                    </label>
                        
                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name', $worker->name) }}"
                                        required>
                        
                                </div>
                        
                                {{-- <div class="mb-3">
                        
                                    <label class="form-label">
                                        Email
                                    </label>
                        
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email', $worker->email) }}">
                        
                                </div> --}}
                        
                                <div class="mb-3">
                        
                                    <label class="form-label">
                                        Password
                                    </label>
                        
                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control">
                        
                                </div>
                        
                                <div>
                        
                                    <label class="form-label">
                                        Mobile Number
                                    </label>
                        
                                    <div class="input-group">
                        
                                        <span class="input-group-text">
                                            +91
                                        </span>
                        
                                        <input
                                            type="text"
                                            name="mobile"
                                            class="form-control"
                                            value="{{ old('mobile', substr($worker->phone, -10)) }}"
                                            required>
                        
                                    </div>
                        
                                </div>
                        
                            </div>
                        
                        </div>
                
                        <div class="card shadow-sm mb-4">

                            <div class="card-body">
                        
                                <h5 class="fw-bold mb-4">
                        
                                    <i class="fas fa-briefcase text-success me-2"></i>
                        
                                    Professional Details
                        
                                </h5>
                        
                                <div class="row">
                        
                                    <div class="col-md-6 mb-3">
                        
                                        <label class="form-label">
                                            Experience
                                        </label>
                        
                                        <input
                                            type="number"
                                            name="experience"
                                            class="form-control"
                                            value="{{ old('experience', $worker->workerProfile->experience) }}">
                        
                                    </div>
                        
                                    <div class="col-md-6 mb-3">
                        
                                        <label class="form-label">
                                            Daily Wage
                                        </label>
                        
                                        <input
                                            type="number"
                                            name="daily_wage"
                                            class="form-control"
                                            value="{{ old('daily_wage', $worker->workerProfile->daily_wage) }}">
                        
                                    </div>
                        
                                </div>
                        
                                <div class="mb-3">

                                    <label class="form-label">
                                        Bio
                                    </label>
                                
                                    <textarea
                                        name="bio"
                                        rows="5"
                                        class="form-control"
                                        placeholder="Write a short description about the worker...">{{ old('bio', $worker->workerProfile?->bio) }}</textarea>
                                
                                </div>
                        
                            </div>
                        
                        </div>
                
                    </div>
                
                    <!-- Right Column -->
                
                    <div class="col-lg-6">

                        <!-- Address Details -->
                    
                        <div class="card shadow-sm mb-4">
                    
                            <div class="card-body">
                    
                                <h5 class="fw-bold mb-4">
                    
                                    <i class="fas fa-location-dot text-danger me-2"></i>
                    
                                    Address Details
                    
                                </h5>
                    
                                <div class="row">
                    
                                    <div class="col-md-6 mb-3">
                    
                                        <label class="form-label">
                    
                                            City
                    
                                        </label>
                    
                                        <input
                                            type="text"
                                            name="city"
                                            class="form-control"
                                            value="{{ old('city', $worker->workerProfile->city) }}">
                    
                                    </div>
                    
                                    <div class="col-md-6 mb-3">
                    
                                        <label class="form-label">
                    
                                            State
                    
                                        </label>
                    
                                        <input
                                            type="text"
                                            name="state"
                                            class="form-control"
                                            value="{{ old('state', $worker->workerProfile->state) }}">
                    
                                    </div>
                    
                                </div>
                    
                                <div>
                    
                                    <label class="form-label">
                    
                                        Address
                    
                                    </label>
                    
                                    <textarea
                                        name="address"
                                        rows="5"
                                        class="form-control"
                                        {{ old('address', $worker->workerProfile->address) }}></textarea>
                    
                                </div>
                    
                            </div>
                    
                        </div>
                    
                        <!-- Verification -->
                    
                        <div class="card shadow-sm">
                    
                            <div class="card-body">
                    
                                <h5 class="fw-bold mb-4">
                    
                                    <i class="fas fa-id-card text-warning me-2"></i>
                    
                                    Verification
                    
                                </h5>
                    
                                <div class="mb-3">
                    
                                    <label class="form-label">
                    
                                        Aadhaar Number
                    
                                    </label>
                    
                                    <input
                                        type="text"
                                        name="aadhaar_number"
                                        class="form-control"
                                        value="{{ old('aadhaar_number', $worker->workerProfile->aadhaar_number) }}">
                    
                                </div>
                    
                                <div class="mb-3">
                    
                                    <label class="form-label">
                    
                                        Aadhaar Image
                    
                                    </label>
                    
                                    @if($worker->workerProfile->aadhaar_image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/'.$worker->workerProfile->aadhaar_image) }}"
                                                width="150"
                                                class="img-thumbnail">
                                        </div>
                                    @endif

                                    <input
                                        type="file"
                                        name="aadhaar_image"
                                        class="form-control">
                    
                                </div>
                    
                                <div>
                    
                                    <label class="form-label">
                    
                                        Profile Image
                    
                                    </label>
                    

                                    @if($worker->workerProfile->profile_image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/'.$worker->workerProfile->profile_image) }}"
                                                width="150"
                                                class="img-thumbnail rounded-circle">
                                        </div>
                                    @endif

                                    <input
                                        type="file"
                                        name="profile_image"
                                        class="form-control">
                    
                                </div>
                    
                            </div>
                    
                        </div>
                    
                    </div>
                
                </div>
                
                <div class="d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4">

                    <a
                        href="{{ route('admin.workers.index') }}"
                        class="btn btn-outline-secondary">
                
                        <i class="fas fa-times me-2"></i>
                
                        Cancel
                
                    </a>
                
                    <button
                        type="submit"
                        class="btn btn-primary">
                
                        <i class="fas fa-save me-2"></i>
                        Update Worker
                
                    </button>
                
                </div>

            </form>

        </div>

    </div>

</div>

@endsection