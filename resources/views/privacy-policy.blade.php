@extends('layouts.app')

@section('title', 'Privacy Policy | Kaarigar')

@section('content')

<div class="privacy-page">

    {{-- HERO --}}
    <section class="privacy-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <span class="privacy-badge">
                        <i class="fas fa-shield-halved me-2"></i>
                        Your Privacy Matters
                    </span>
                    <h1>Privacy <span>Policy</span></h1>
                    <p>
                        At Kaarigar, we are committed to protecting your personal
                        information and being transparent about how we collect,
                        use and safeguard your data.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="privacy-section">
        <div class="container">
            <div class="privacy-card">

                <div class="privacy-block">
                    <h2><i class="fas fa-circle-info me-2"></i>1. Introduction</h2>
                    <p>
                        This Privacy Policy explains how Kaarigar ("we", "our", "us")
                        collects, uses, shares and protects the information you provide
                        when you use our website and services. By accessing or using
                        Kaarigar, you agree to the practices described in this policy.
                    </p>
                </div>

                <div class="privacy-block">
                    <h2><i class="fas fa-database me-2"></i>2. Information We Collect</h2>
                    <p>We may collect the following types of information:</p>
                    <ul>
                        <li><strong>Personal Information:</strong> name, email address, phone number, and location.</li>
                        <li><strong>Account Information:</strong> username, password (hashed), and role (customer/worker/admin).</li>
                        <li><strong>Usage Data:</strong> pages visited, time spent, and browsing behaviour.</li>
                        <li><strong>Device Information:</strong> IP address, browser type, and operating system.</li>
                    </ul>
                </div>

                <div class="privacy-block">
                    <h2><i class="fas fa-gears me-2"></i>3. How We Use Your Information</h2>
                    <p>We use the collected information to:</p>
                    <ul>
                        <li>Provide, maintain and improve our services.</li>
                        <li>Process bookings, payments and service requests.</li>
                        <li>Verify worker profiles and maintain platform trust.</li>
                        <li>Send you service updates, notifications and promotional content.</li>
                        <li>Respond to your queries and provide customer support.</li>
                        <li>Ensure security, prevent fraud and comply with legal obligations.</li>
                    </ul>
                </div>

                <div class="privacy-block">
                    <h2><i class="fas fa-lock me-2"></i>4. Data Security</h2>
                    <p>
                        We implement appropriate technical and organisational measures to
                        protect your personal information against unauthorised access,
                        alteration, disclosure or destruction. However, no method of
                        transmission over the internet is 100% secure.
                    </p>
                </div>

                <div class="privacy-block">
                    <h2><i class="fas fa-share-nodes me-2"></i>5. Sharing of Information</h2>
                    <p>We do not sell your personal information. We may share your data with:</p>
                    <ul>
                        <li><strong>Service Professionals:</strong> when you book a worker, relevant details are shared to complete the service.</li>
                        <li><strong>Service Providers:</strong> trusted third parties who assist in operating our platform.</li>
                        <li><strong>Legal Authorities:</strong> when required by law or to protect our rights.</li>
                    </ul>
                </div>

                <div class="privacy-block">
                    <h2><i class="fas fa-cookie-bite me-2"></i>6. Cookies</h2>
                    <p>
                        We use cookies and similar technologies to enhance your browsing
                        experience, analyse site traffic and remember your preferences.
                        You can control or disable cookies through your browser settings.
                    </p>
                </div>

                <div class="privacy-block">
                    <h2><i class="fas fa-user-check me-2"></i>7. Your Rights</h2>
                    <p>You have the right to:</p>
                    <ul>
                        <li>Access and review the personal data we hold about you.</li>
                        <li>Request correction of inaccurate information.</li>
                        <li>Request deletion of your account and associated data.</li>
                        <li>Opt out of marketing communications at any time.</li>
                    </ul>
                </div>

                <div class="privacy-block">
                    <h2><i class="fas fa-envelope me-2"></i>8. Contact Us</h2>
                    <p>
                        If you have any questions about this Privacy Policy or how we
                        handle your data, please contact us at
                        <a href="mailto:info@kaarigar.net">info@kaarigar.net</a>.
                    </p>
                </div>

            </div>
        </div>
    </section>

</div>

<style>

.privacy-page {
    background: #f8fafc;
    min-height: 100vh;
}

.privacy-hero {
    padding: 80px 0 100px;
    background: linear-gradient(135deg, #111827, #1f2937);
    color: white;
}

.privacy-badge {
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

.privacy-hero h1 {
    font-size: clamp(36px, 5vw, 52px);
    font-weight: 800;
    margin-bottom: 18px;
}

.privacy-hero h1 span {
    color: #f59e0b;
}

.privacy-hero p {
    color: #d1d5db;
    font-size: 17px;
    line-height: 1.8;
    max-width: 720px;
    margin: auto;
}

.privacy-section {
    padding: 0 0 80px;
    margin-top: -55px;
}

.privacy-card {
    background: white;
    border-radius: 22px;
    padding: 45px;
    box-shadow: 0 15px 45px rgba(15,23,42,.08);
}

.privacy-block {
    margin-bottom: 35px;
}

.privacy-block:last-child {
    margin-bottom: 0;
}

.privacy-block h2 {
    font-size: 22px;
    font-weight: 750;
    color: #111827;
    margin-bottom: 14px;
}

.privacy-block h2 i {
    color: #f59e0b;
}

.privacy-block p {
    color: #4b5563;
    line-height: 1.8;
    font-size: 15px;
}

.privacy-block ul {
    padding-left: 20px;
    color: #4b5563;
    line-height: 1.9;
    font-size: 15px;
}

.privacy-block ul li {
    margin-bottom: 6px;
}

.privacy-block a {
    color: #f59e0b;
    font-weight: 600;
    text-decoration: none;
}

.privacy-block a:hover {
    text-decoration: underline;
}

@media(max-width:768px) {
    .privacy-hero {
        padding: 60px 0 90px;
    }
    .privacy-card {
        padding: 25px;
    }
}

</style>

@endsection
