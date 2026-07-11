<footer class="footer">

    <div class="container">

        <div class="row gy-5">


            {{-- BRAND --}}
            <div class="col-lg-4">


                <h3 class="footer-logo">

                    <i class="fas fa-screwdriver-wrench text-warning me-2"></i>

                    Kaarigar

                </h3>


                <p class="footer-text">

                    India's trusted platform to book verified electricians,
                    plumbers, carpenters, painters and other skilled professionals.

                </p>



                <div class="d-flex gap-3 mt-4">


                    <a href="#" class="footer-social">

                        <i class="fab fa-facebook"></i>

                    </a>


                    <a href="#" class="footer-social">

                        <i class="fab fa-instagram"></i>

                    </a>


                    <a href="#" class="footer-social">

                        <i class="fab fa-x-twitter"></i>

                    </a>


                    <a href="#" class="footer-social">

                        <i class="fab fa-linkedin"></i>

                    </a>


                </div>


            </div>




            {{-- QUICK LINKS --}}
            <div class="col-lg-2 col-md-6">


                <h5>

                    Quick Links

                </h5>


                <ul class="footer-links">


                    <li>

                        <a href="{{ url('/') }}">

                            Home

                        </a>

                    </li>


                    <li>

                        <a href="{{ url('/#categories') }}">

                            Categories

                        </a>

                    </li>


                    <li>

                        <a href="{{ url('/#services') }}">

                            Services

                        </a>

                    </li>


                    <li>

                        <a href="{{ url('/#about') }}">

                            About Us

                        </a>

                    </li>


                </ul>


            </div>





            {{-- SERVICES --}}
            <div class="col-lg-3 col-md-6">


                <h5>

                    Popular Services

                </h5>


                <ul class="footer-links">


                    <li>

                        <a href="#">

                            <i class="fas fa-bolt text-warning me-2"></i>

                            Electrician

                        </a>

                    </li>


                    <li>

                        <a href="#">

                            <i class="fas fa-faucet text-info me-2"></i>

                            Plumber

                        </a>

                    </li>


                    <li>

                        <a href="#">

                            <i class="fas fa-hammer text-success me-2"></i>

                            Carpenter

                        </a>

                    </li>


                    <li>

                        <a href="#">

                            <i class="fas fa-paint-roller text-danger me-2"></i>

                            Painter

                        </a>

                    </li>


                </ul>


            </div>





            {{-- CONTACT --}}
            <div class="col-lg-3">


                <h5>

                    Contact

                </h5>


                <p>

                    <i class="fas fa-envelope text-warning me-2"></i>

                    support@kaarigar.com

                </p>


                <p>

                    <i class="fas fa-phone text-success me-2"></i>

                    +91 XXXXX XXXXX

                </p>


                <p>

                    <i class="fas fa-location-dot text-danger me-2"></i>

                    India

                </p>


            </div>


        </div>





        <hr class="footer-divider">





        <div class="footer-bottom text-center">


            © {{ date('Y') }}

            <strong>Kaarigar</strong>

            • All Rights Reserved.



        </div>



    </div>


</footer>