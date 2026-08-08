@extends('layouts.app')

@section('title', 'Terms & Conditions | Kaarigar')

@section('content')

<div class="terms-page">

    {{-- HERO --}}
    <section class="terms-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <span class="terms-badge">
                        <i class="fas fa-file-contract me-2"></i>
                        Please Read Carefully
                    </span>
                    <h1>Terms & <span>Conditions</span></h1>
                    <p>
                        These Terms & Conditions govern your use of the Kaarigar
                        platform. By accessing or using our services, you agree
                        to be bound by these terms.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="terms-section">
        <div class="container">
            <div class="terms-card">

                <div class="terms-block">
                    <h2><i class="fas fa-circle-check me-2"></i>1. Acceptance of Terms</h2>
                    <p>
                        By registering, accessing or using Kaarigar, you confirm that
                        you accept these Terms & Conditions and agree to comply with
                        them. If you do not agree, you should not use our services.
                    </p>
                </div>

                <div class="terms-block">
                    <h2><i class="fas fa-user me-2"></i>2. Eligibility</h2>
                    <p>
                        You must be at least 18 years old to use our platform. By using
                        Kaarigar, you represent that you have the legal capacity to enter
                        into these terms and that you will provide accurate information
                        during registration.
                    </p>
                </div>

                <div class="terms-block">
                    <h2><i class="fas fa-briefcase me-2"></i>3. Services Offered</h2>
                    <p>
                        Kaarigar acts as a marketplace connecting customers with verified
                        service professionals. We facilitate bookings but do not directly
                        perform the services. The quality and completion of work is the
                        responsibility of the service professional.
                    </p>
                </div>

                <div class="terms-block">
                    <h2><i class="fas fa-shield-halved me-2"></i>4. Worker Verification</h2>
                    <p>
                        All worker profiles are subject to verification before being listed
                        on the platform. However, Kaarigar does not guarantee the accuracy
                        of all details and encourages customers to review worker profiles
                        before booking.
                    </p>
                </div>

                <div class="terms-block">
                    <h2><i class="fas fa-hand-holding-dollar me-2"></i>5. Payments & Pricing</h2>
                    <ul>
                        <li>Service prices are set by the service professional.</li>
                        <li>Payment terms are agreed upon between the customer and the professional at the time of booking.</li>
                        <li>Kaarigar may, from time to time, charge a service or platform fee which will be communicated transparently.</li>
                    </ul>
                </div>

                <div class="terms-block">
                    <h2><i class="fas fa-ban me-2"></i>6. Prohibited Activities</h2>
                    <p>You agree not to:</p>
                    <ul>
                        <li>Misuse, hack or attempt to compromise the platform.</li>
                        <li>Provide false or misleading information.</li>
                        <li>Violate any applicable laws or regulations.</li>
                        <li>Infringe on the intellectual property rights of others.</li>
                        <li>Harass, abuse or harm other users or professionals.</li>
                    </ul>
                </div>

                <div class="terms-block">
                    <h2><i class="fas fa-triangle-exclamation me-2"></i>7. Limitation of Liability</h2>
                    <p>
                        To the fullest extent permitted by law, Kaarigar shall not be liable
                        for any indirect, incidental, special, consequential or punitive
                        damages, or any loss of profits or revenues, whether incurred
                        directly or indirectly.
                    </p>
                </div>

                <div class="terms-block">
                    <h2><i class="fas fa-file-pen me-2"></i>8. Modifications</h2>
                    <p>
                        We reserve the right to modify these Terms & Conditions at any time.
                        Any changes will be effective immediately upon posting on this page.
                        Your continued use of the platform constitutes acceptance of the
                        updated terms.
                    </p>
                </div>

                <div class="terms-block">
                    <h2><i class="fas fa-envelope me-2"></i>9. Contact Us</h2>
                    <p>
                        If you have any questions about these Terms & Conditions, please
                        contact us at
                        <a href="mailto:info@kaarigar.net">info@kaarigar.net</a>.
                    </p>
                </div>

            </div>
        </div>
    </section>

</div>

<style>

.terms-page {
    background: #f8fafc;
    min-height: 100vh;
}

.terms-hero {
    padding: 80px 0 100px;
    background: linear-gradient(135deg, #111827, #1f2937);
    color: white;
}

.terms-badge {
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

.terms-hero h1 {
    font-size: clamp(36px, 5vw, 52px);
    font-weight: 800;
    margin-bottom: 18px;
}

.terms-hero h1 span {
    color: #f59e0b;
}

.terms-hero p {
    color: #d1d5db;
    font-size: 17px;
    line-height: 1.8;
    max-width: 720px;
    margin: auto;
}

.terms-section {
    padding: 0 0 80px;
    margin-top: -55px;
}

.terms-card {
    background: white;
    border-radius: 22px;
    padding: 45px;
    box-shadow: 0 15px 45px rgba(15,23,42,.08);
}

.terms-block {
    margin-bottom: 35px;
}

.terms-block:last-child {
    margin-bottom: 0;
}

.terms-block h2 {
    font-size: 22px;
    font-weight: 750;
    color: #111827;
    margin-bottom: 14px;
}

.terms-block h2 i {
    color: #f59e0b;
}

.terms-block p {
    color: #4b5563;
    line-height: 1.8;
    font-size: 15px;
}

.terms-block ul {
    padding-left: 20px;
    color: #4b5563;
    line-height: 1.9;
    font-size: 15px;
}

.terms-block ul li {
    margin-bottom: 6px;
}

.terms-block a {
    color: #f59e0b;
    font-weight: 600;
    text-decoration: none;
}

.terms-block a:hover {
    text-decoration: underline;
}

@media(max-width:768px) {
    .terms-hero {
        padding: 60px 0 90px;
    }
    .terms-card {
        padding: 25px;
    }
}

</style>

@endsection
