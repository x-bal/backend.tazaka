<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tazaka Elektrik Teknologi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('front') }}/img/favicon-32x32.png" rel="icon">
    <link href="{{ asset('front') }}/img/apple-icon-180x180.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('front') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('front') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('front') }}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('front') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('front') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('front') }}/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" style="background: rgba(4, 10, 94, 0.9);">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="/" class="logo scrollto">
                <img src="{{ asset('front') }}/img/logo1.png" alt="" class="img-fluid">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Detail Portfolio</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Detail Portfolio</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <img src="{{ asset('/storage/'.$portfolio->image) }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="portfolio-description">
                            <h2>{{ $portfolio->name }}</h2>
                            <p>
                                {!! $portfolio->description !!}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Tazaka</h3>
                        <p id="footer-contact">

                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul id="our-service">

                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>{{ App\Models\Section::where('section', 'Newsletter')->first()->content ?? 'This is our newsletter' }}</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">

            <div class="copyright-wrap d-md-flex py-4">
                <div class="me-md-auto text-center text-md-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Tazaka</span></strong>. All Rights Reserved
                    </div>
                </div>
                <div class="social-links text-center text-md-right pt-3 pt-md-0">
                    @foreach(App\Models\Sosmed::where('is_active', 1)->get() as $sosmed)
                    <a href="https://{{ $sosmed->link }}" target="__blank"><i class="{{ $sosmed->icon }}"></i></a>
                    @endforeach
                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('front') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('front') }}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('front') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('front') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('front') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('front') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('front') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('front') }}/js/main.js"></script>
    <script src="{{ asset('front') }}/js/app.js"></script>
</body>

</html>