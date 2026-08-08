<footer class="kaarigar-footer">

    {{-- Decorative top accent --}}
    <div class="kaarigar-footer-accent"></div>

    <div class="container">

        {{-- TOP FOOTER --}}
        <div class="row gy-5">

            {{-- BRAND --}}
            <div class="col-lg-4 col-md-6">

                <a href="{{ url('/') }}" class="kaarigar-footer-brand">

                    <span class="brand-icon">
                        <i class="fas fa-screwdriver-wrench"></i>
                    </span>

                    <span>Kaarigar</span>

                </a>

                <p class="kaarigar-footer-description">

                    Your trusted platform for finding skilled and verified
                    professionals. From plumbing and electrical work to
                    cleaning, painting and repairs — we've got you covered.

                </p>

                <div class="kaarigar-socials">

                    <a href="#" aria-label="Facebook" class="social-fb">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="Instagram" class="social-ig">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="#" aria-label="X" class="social-x">
                        <i class="fab fa-x-twitter"></i>
                    </a>

                    <a href="#" aria-label="LinkedIn" class="social-li">
                        <i class="fab fa-linkedin-in"></i>
                    </a>

                </div>

                <div class="kaarigar-newsletter mt-4">
                    <h5 class="kaarigar-footer-title">
                        <i class="fas fa-paper-plane me-2"></i>
                        Newsletter
                    </h5>
                    <p class="newsletter-text">
                        Stay updated with new services and exclusive offers.
                    </p>
                    <form class="newsletter-form" onsubmit="return false;">
                        <input
                            type="email"
                            placeholder="Enter your email"
                            aria-label="Email address">
                        <button type="submit" aria-label="Subscribe">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                </div>

            </div>


            {{-- COMPANY --}}
            <div class="col-lg-3 col-md-6">

                <h5 class="kaarigar-footer-title">
                    Company
                </h5>

                <ul class="kaarigar-footer-links">

                    <li>
                        <a href="{{ url('/') }}">
                            <i class="fas fa-angle-right"></i>
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/#categories') }}">
                            <i class="fas fa-angle-right"></i>
                            Categories
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('/#services') }}">
                            <i class="fas fa-angle-right"></i>
                            Services
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}">
                            <i class="fas fa-angle-right"></i>
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}">
                            <i class="fas fa-angle-right"></i>
                            Contact Us
                        </a>
                    </li>

                </ul>

            </div>


            {{-- SERVICES --}}
            <div class="col-lg-3 col-md-6">

                <h5 class="kaarigar-footer-title">
                    Popular Services
                </h5>

                <ul class="kaarigar-footer-links">

                    <li>
                        <a href="{{ route('home', ['search' => 'Electrician']) }}">
                            <i class="fas fa-bolt"></i>
                            Electrician
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home', ['search' => 'Plumber']) }}">
                            <i class="fas fa-faucet"></i>
                            Plumber
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home', ['search' => 'Carpenter']) }}">
                            <i class="fas fa-hammer"></i>
                            Carpenter
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home', ['search' => 'Painter']) }}">
                            <i class="fas fa-paint-roller"></i>
                            Painter
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home', ['search' => 'Cleaning']) }}">
                            <i class="fas fa-broom"></i>
                            Cleaning
                        </a>
                    </li>

                </ul>

            </div>


            {{-- CONTACT --}}
            <div class="col-lg-2 col-md-6">

                <h5 class="kaarigar-footer-title">
                    Get In Touch
                </h5>

                <div class="kaarigar-contact-item">

                    <span class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </span>

                    <div>
                        <small>Email</small>
                        <a href="mailto:info@kaarigar.net">
                            info@kaarigar.net
                        </a>
                    </div>

                </div>


                <div class="kaarigar-contact-item">

                    <span class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </span>

                    <div>
                        <small>Phone</small>
                        <a href="tel:+918558008825">
                            +91 85580-08825
                        </a>
                    </div>

                </div>


                <div class="kaarigar-contact-item">

                    <span class="contact-icon">
                        <i class="fas fa-location-dot"></i>
                    </span>

                    <div>
                        <small>Location</small>
                        <span>India</span>
                    </div>

                </div>

            </div>

        </div>


        {{-- DIVIDER --}}
        <div class="kaarigar-footer-divider"></div>


        {{-- BOTTOM --}}
        <div class="kaarigar-footer-bottom">

            <p>
                © {{ date('Y') }}
                <strong>Kaarigar</strong>.
                All rights reserved.
            </p>

            <div class="footer-bottom-links">

                <a href="{{ route('privacy.policy') }}">
                    <i class="fas fa-shield-halved me-1"></i>
                    Privacy Policy
                </a>

                <a href="{{ route('terms') }}">
                    <i class="fas fa-file-contract me-1"></i>
                    Terms & Conditions
                </a>

            </div>

        </div>

    </div>

    {{-- Back to top --}}
    <button
        type="button"
        class="kaarigar-back-top"
        onclick="window.scrollTo({top:0,behavior:'smooth'})"
        aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </button>

</footer>

<style>

.kaarigar-footer {
    position: relative;
    background: #0f172a;
    background-image:
        radial-gradient(circle at 10% 20%, rgba(245,158,11,.06), transparent 40%),
        radial-gradient(circle at 90% 80%, rgba(245,158,11,.05), transparent 40%),
        linear-gradient(135deg, #0f172a 0%, #111827 100%);
    color: #ffffff;
    padding: 80px 0 30px;
    margin-top: 70px;
    overflow: hidden;
}

/* Decorative top accent */
.kaarigar-footer-accent {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #f59e0b, #fbbf24, #f59e0b);
    background-size: 200% 100%;
    animation: kaarigarAccent 4s linear infinite;
}

@keyframes kaarigarAccent {
    0% { background-position: 0% 0; }
    100% { background-position: 200% 0; }
}

.kaarigar-footer-brand {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    color: #fff;
    text-decoration: none;
    font-size: 28px;
    font-weight: 800;
    margin-bottom: 18px;
    transition: transform .3s ease;
}

.kaarigar-footer-brand:hover {
    transform: translateY(-2px);
    color: #fff;
}

.brand-icon {
    width: 46px;
    height: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #f59e0b, #fbbf24);
    color: #111827;
    border-radius: 14px;
    font-size: 21px;
    box-shadow: 0 6px 18px rgba(245,158,11,.25);
}

.kaarigar-footer-description {
    max-width: 390px;
    line-height: 1.8;
    font-size: 14px;
    color: #cbd5e1;
    margin-bottom: 25px;
}

.kaarigar-socials {
    display: flex;
    gap: 10px;
}

.kaarigar-socials a {
    width: 40px;
    height: 40px;
    border-radius: 11px;
    background: #1e293b;
    color: #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: all .3s ease;
    border: 1px solid rgba(255,255,255,.06);
}

.kaarigar-socials a:hover {
    transform: translateY(-4px) scale(1.05);
    border-color: transparent;
}

.kaarigar-socials .social-fb:hover { background: #1877f2; color: #fff; box-shadow: 0 8px 20px rgba(24,119,242,.35); }
.kaarigar-socials .social-ig:hover { background: radial-gradient(circle at 30% 110%, #fdf497 0%, #fd5949 45%, #d6249f 60%, #285AEB 90%); color: #fff; box-shadow: 0 8px 20px rgba(214,36,159,.35); }
.kaarigar-socials .social-x:hover { background: #000; color: #fff; box-shadow: 0 8px 20px rgba(0,0,0,.4); }
.kaarigar-socials .social-li:hover { background: #0a66c2; color: #fff; box-shadow: 0 8px 20px rgba(10,102,194,.35); }

.kaarigar-footer-title {
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 22px;
    position: relative;
    padding-bottom: 10px;
    letter-spacing: .3px;
}

.kaarigar-footer-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 30px;
    height: 2px;
    background: #f59e0b;
    border-radius: 2px;
}

.kaarigar-footer-links {
    padding: 0;
    margin: 0;
    list-style: none;
}

.kaarigar-footer-links li {
    margin-bottom: 13px;
}

.kaarigar-footer-links a {
    color: #cbd5e1;
    text-decoration: none;
    font-size: 14px;
    transition: all .25s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.kaarigar-footer-links a i {
    font-size: 11px;
    color: #f59e0b;
    transition: transform .25s ease;
}

.kaarigar-footer-links a:hover {
    color: #f59e0b;
    transform: translateX(4px);
}

.kaarigar-footer-links a:hover i {
    transform: translateX(2px);
}

.kaarigar-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 13px;
    margin-bottom: 18px;
}

.contact-icon {
    min-width: 40px;
    height: 40px;
    border-radius: 11px;
    background: #1e293b;
    color: #f59e0b;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .3s ease;
}

.kaarigar-contact-item:hover .contact-icon {
    background: #f59e0b;
    color: #111827;
    transform: scale(1.08);
}

.kaarigar-contact-item small {
    display: block;
    font-size: 11px;
    color: #94a3b8;
    margin-bottom: 3px;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.kaarigar-contact-item a,
.kaarigar-contact-item span {
    color: #e2e8f0;
    text-decoration: none;
    font-size: 14px;
    line-height: 1.4;
    word-break: break-word;
}

.kaarigar-contact-item a:hover {
    color: #f59e0b;
}

/* Newsletter */
.kaarigar-newsletter {
    padding-top: 5px;
}

.newsletter-text {
    color: #94a3b8;
    font-size: 13px;
    line-height: 1.6;
    margin-bottom: 14px;
}

.newsletter-form {
    display: flex;
    background: #1e293b;
    border: 1px solid rgba(255,255,255,.08);
    border-radius: 12px;
    padding: 5px;
    max-width: 320px;
    transition: border-color .3s ease;
}

.newsletter-form:focus-within {
    border-color: #f59e0b;
}

.newsletter-form input {
    flex: 1;
    background: transparent;
    border: none;
    outline: none;
    padding: 9px 12px;
    color: #fff;
    font-size: 13px;
    min-width: 0;
}

.newsletter-form input::placeholder {
    color: #64748b;
}

.newsletter-form button {
    width: 38px;
    height: 38px;
    border: none;
    border-radius: 9px;
    background: #f59e0b;
    color: #111827;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all .25s ease;
}

.newsletter-form button:hover {
    background: #fbbf24;
    transform: scale(1.05);
}

.kaarigar-footer-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent, #273244, transparent);
    margin: 50px 0 25px;
}

.kaarigar-footer-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.kaarigar-footer-bottom p {
    margin: 0;
    font-size: 13px;
    color: #94a3b8;
}

.kaarigar-footer-bottom strong {
    color: #f59e0b;
}

.footer-bottom-links {
    display: flex;
    gap: 25px;
}

.footer-bottom-links a {
    color: #94a3b8;
    font-size: 13px;
    text-decoration: none;
    transition: color .25s ease;
}

.footer-bottom-links a:hover {
    color: #f59e0b;
}

/* Back to top */
.kaarigar-back-top {
    position: fixed;
    right: 24px;
    bottom: 24px;
    width: 46px;
    height: 46px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #111827;
    font-size: 18px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 24px rgba(245,158,11,.4);
    transition: all .3s ease;
    z-index: 999;
    opacity: .9;
}

.kaarigar-back-top:hover {
    transform: translateY(-4px);
    opacity: 1;
    box-shadow: 0 12px 30px rgba(245,158,11,.5);
}

@media (max-width: 768px) {

    .kaarigar-footer {
        padding: 55px 0 25px;
    }

    .kaarigar-footer-bottom {
        flex-direction: column;
        text-align: center;
        justify-content: center;
    }

    .footer-bottom-links {
        flex-direction: column;
        gap: 10px;
    }

}

</style>
