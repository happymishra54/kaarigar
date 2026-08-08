@extends('layouts.app')

@section('content')

<div class="contact-page">


{{-- HERO --}}
<section class="contact-hero position-relative overflow-hidden">

    {{-- Floating decorative shapes --}}
    <div class="hero-shape hero-shape-1"></div>
    <div class="hero-shape hero-shape-2"></div>

    <div class="container position-relative" style="z-index:1;">

        <div class="row justify-content-center text-center">

            <div class="col-lg-8">

                <span class="contact-badge">
                    <i class="fas fa-headset me-2"></i>
                    We're here to help
                </span>

                <h1>
                    Get in Touch with <span>Kaarigar</span>
                </h1>

                <p>
                    Have a question, need help with a booking, or want
                    to become a professional on Kaarigar?
                    Our team would love to hear from you.
                </p>

            </div>

        </div>

    </div>

</section>


{{-- CONTACT CONTENT --}}
<section class="contact-section">

    <div class="container">

        <div class="row g-4">

            {{-- CONTACT INFORMATION --}}
            <div class="col-lg-5">

                <div class="contact-info-card">

                    <h3>
                        Let's talk
                    </h3>

                    <p class="contact-info-description">
                        Whether you are a customer looking for a skilled
                        professional or a worker interested in joining
                        Kaarigar, feel free to reach out.
                    </p>


                    <div class="contact-detail">

                        <div class="contact-detail-icon">
                            <i class="fas fa-envelope"></i>
                        </div>

                        <div>
                            <small>Email us</small>
                            <a href="mailto:info@kaarigar.net">
                                info@kaarigar.net
                            </a>
                        </div>

                    </div>


                    <div class="contact-detail">

                        <div class="contact-detail-icon">
                            <i class="fas fa-phone"></i>
                        </div>

                        <div>
                            <small>Call us</small>
                            <a href="tel:+918558008825">
                                +91 85580-08825
                            </a>
                        </div>

                    </div>


                    <div class="contact-detail">

                        <div class="contact-detail-icon">
                            <i class="fas fa-location-dot"></i>
                        </div>

                        <div>
                            <small>Our location</small>
                            <span>India</span>
                        </div>

                    </div>


                    <div class="contact-help-box">

                        <i class="fas fa-circle-question"></i>

                        <div>

                            <strong>Need quick help?</strong>

                            <p>
                                For booking-related questions,
                                please include your booking number
                                in your message.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- CONTACT FORM --}}
            <div class="col-lg-7">

                <div class="contact-form-card">

                    <div class="mb-4">

                        <h3>
                            Send us a message
                        </h3>

                        <p>
                            Fill in the form below and our team
                            will get back to you.
                        </p>

                    </div>


                    @if(session('success'))

                        <div class="alert alert-success">
                            <i class="fas fa-circle-check me-2"></i>
                            {{ session('success') }}
                        </div>

                    @endif


                    @if($errors->any())

                        <div class="alert alert-danger">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form method="POST" action="#">

                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">

                                <label class="form-label">
                                    Your Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control contact-input"
                                    placeholder="Enter your name"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control contact-input"
                                    placeholder="you@example.com"
                                    required
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control contact-input"
                                    placeholder="+91"
                                >

                            </div>


                            <div class="col-md-6">

                                <label class="form-label">
                                    Subject
                                </label>

                                <select
                                    name="subject"
                                    class="form-select contact-input"
                                    required
                                >

                                    <option value="">
                                        Select a subject
                                    </option>

                                    <option value="booking">
                                        Booking Help
                                    </option>

                                    <option value="worker">
                                        Become a Worker
                                    </option>

                                    <option value="account">
                                        Account Issue
                                    </option>

                                    <option value="payment">
                                        Payment Issue
                                    </option>

                                    <option value="other">
                                        Other
                                    </option>

                                </select>

                            </div>


                            <div class="col-12">

                                <label class="form-label">
                                    Message
                                </label>

                                <textarea
                                    name="message"
                                    rows="6"
                                    class="form-control contact-input"
                                    placeholder="How can we help you?"
                                    required
                                ></textarea>

                            </div>


                            <div class="col-12">

                                <button
                                    type="submit"
                                    class="contact-submit"
                                >

                                    <i class="fas fa-paper-plane me-2"></i>

                                    Send Message

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>


</div>

<style>

.contact-page {
    background: #f8fafc;
    min-height: 100vh;
}


/* HERO */

.contact-hero {
    padding: 80px 0 100px;
    background: linear-gradient(
        135deg,
        #0f172a,
        #1f2937,
        #111827
    );
    color: white;
}

/* Floating decorative shapes */
.contact-hero .hero-shape {
    position: absolute;
    border-radius: 50%;
    opacity: .10;
    background: #f59e0b;
    filter: blur(30px);
    pointer-events: none;
}

.contact-hero .hero-shape-1 {
    width: 300px;
    height: 300px;
    top: -80px;
    right: -80px;
    animation: contactFloat 8s ease-in-out infinite;
}

.contact-hero .hero-shape-2 {
    width: 200px;
    height: 200px;
    bottom: -50px;
    left: -50px;
    animation: contactFloat 10s ease-in-out infinite reverse;
}

@keyframes contactFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20px); }
}

.contact-badge {
    display: inline-flex;
    align-items: center;
    padding: 9px 16px;
    border-radius: 30px;
    background: rgba(245,158,11,.12);
    color: #fbbf24;
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 20px;
}

.contact-hero h1 {
    font-size: clamp(36px, 5vw, 56px);
    font-weight: 800;
    margin-bottom: 18px;
}

.contact-hero h1 span {
    color: #f59e0b;
}

.contact-hero p {
    color: #d1d5db;
    font-size: 17px;
    line-height: 1.8;
    max-width: 700px;
    margin: auto;
}


/* SECTION */

.contact-section {
    padding: 0 0 80px;
    margin-top: -55px;
}


/* INFO */

.contact-info-card,
.contact-form-card {
    background: white;
    border-radius: 22px;
    padding: 35px;
    box-shadow: 0 15px 45px rgba(15,23,42,.08);
    height: 100%;
    transition: transform .3s ease, box-shadow .3s ease;
}

.contact-info-card:hover,
.contact-form-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 22px 55px rgba(15,23,42,.14);
}

.contact-info-card {
    background: linear-gradient(160deg, #0f172a, #111827);
    color: white;
}

.contact-info-card h3,
.contact-form-card h3 {
    font-size: 26px;
    font-weight: 750;
    margin-bottom: 10px;
}

.contact-info-card h3 {
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
}

.contact-info-card h3::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 34px;
    height: 3px;
    border-radius: 3px;
    background: #f59e0b;
}

.contact-form-card h3 {
    color: #111827;
}

.contact-info-description,
.contact-form-card > div p {
    color: #6b7280;
    line-height: 1.7;
}

.contact-info-description {
    color: #9ca3af;
    margin-bottom: 30px;
}


/* DETAILS */

.contact-detail {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 22px;
}

.contact-detail-icon {
    width: 46px;
    height: 46px;
    min-width: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    background: rgba(245,158,11,.12);
    color: #f59e0b;
}

.contact-detail small {
    display: block;
    color: #6b7280;
    font-size: 12px;
    margin-bottom: 3px;
}

.contact-detail a,
.contact-detail span {
    color: #e5e7eb;
    text-decoration: none;
    font-size: 14px;
}

.contact-detail a:hover {
    color: #f59e0b;
}


/* HELP BOX */

.contact-help-box {
    display: flex;
    gap: 14px;
    margin-top: 35px;
    padding: 18px;
    border-radius: 15px;
    background: #1f2937;
}

.contact-help-box > i {
    color: #f59e0b;
    font-size: 22px;
    margin-top: 2px;
}

.contact-help-box strong {
    font-size: 14px;
}

.contact-help-box p {
    color: #9ca3af;
    font-size: 13px;
    line-height: 1.6;
    margin: 5px 0 0;
}


/* FORM */

.form-label {
    color: #374151;
    font-size: 14px;
    font-weight: 600;
}

.contact-input {
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 12px 14px;
    box-shadow: none !important;
}

.contact-input:focus {
    border-color: #f59e0b;
    box-shadow: 0 0 0 3px rgba(245,158,11,.10) !important;
}

.contact-submit {
    width: 100%;
    border: none;
    border-radius: 12px;
    padding: 14px 20px;
    background: #f59e0b;
    color: #111827;
    font-size: 15px;
    font-weight: 700;
    transition: all .25s ease;
}

.contact-submit:hover {
    background: #d97706;
    color: white;
    transform: translateY(-2px);
}


@media(max-width:768px) {

    .contact-hero {
        padding: 60px 0 90px;
    }

    .contact-info-card,
    .contact-form-card {
        padding: 25px;
    }

}

</style>

@endsection
