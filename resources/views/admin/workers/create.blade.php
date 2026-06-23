@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="card shadow">

        <div class="card-body">

            <h2 class="mb-4">

                Add Worker

            </h2>

            <form
                method="POST"
                action="{{ route('admin.workers.store') }}"
                enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label>Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            >

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            >

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Mobile Number</label>

                        <input
                            type="text"
                            name="mobile"
                            class="form-control"
                            required limit="10">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>City</label>

                        <input
                            type="text"
                            name="city"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>State</label>

                        <input
                            type="text"
                            name="state"
                            class="form-control"
                            required>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Experience (Years)</label>

                        <input
                            type="number"
                            name="experience"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Daily Wage</label>

                        <input
                            type="number"
                            name="daily_wage"
                            class="form-control">

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Address</label>

                        <textarea
                            name="address"
                            rows="3"
                            class="form-control"
                            required></textarea>

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Bio</label>

                        <textarea
                            name="bio"
                            rows="4"
                            class="form-control"
                            required></textarea>

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Aadhaar Number</label>

                        <input
                            type="text"
                            name="aadhaar_number"
                            class="form-control">

                    </div>

                    <div class="col-md-6 mb-3">

                        <label>Aadhaar Image</label>

                        <input
                            type="file"
                            name="aadhaar_image"
                            class="form-control">

                    </div>

                    <div class="col-md-12 mb-3">

                        <label>Profile Image</label>

                        <input
                            type="file"
                            name="profile_image"
                            class="form-control">

                    </div>

                </div>

                <button class="btn btn-primary">

                    Create Worker

                </button>

            </form>

        </div>

    </div>

</div>

@endsection

