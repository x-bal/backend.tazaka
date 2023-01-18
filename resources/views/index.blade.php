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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('front') }}/css/style.css" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="#hero" class="logo scrollto">
                <img src="{{ asset('front') }}/img/logo1.png" alt="" class="img-fluid">
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <!-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li> -->
                    <li><a class="nav-link scrollto active" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#clients">Clients</a></li>
                    <li><a class="nav-link scrollto" href="#testimonials">Support Project</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="nav-link scrollto " href="#product">Product</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container-fluid" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>{{ App\Models\Home::find(1)->title ?? '-' }}</h1>
                    <h2>{{ App\Models\Home::find(1)->sub_title ?? '-' }}</h2>
                    <div><a href="#about" class="btn-get-started scrollto">Get Started</a></div>
                </div>
                <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                    <img src="{{ asset('/storage') }}/{{ App\Models\Home::find(1)->image ?? '-' }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 text-center order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
                        <img src="{{ asset('/storage') }}/{{ App\Models\About::find(1)->image ?? '-' }}" class="" width="250" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
                        <h3>{{ App\Models\About::find(1)->title ?? '-' }}</h3>
                        <p class="fst-italic">
                            {{ App\Models\About::find(1)->sub_title ?? '-' }}
                        </p>
                        <p>
                            {{ App\Models\About::find(1)->content ?? '-' }}
                        </p>
                        <a href="#" class="read-more">Read More <i class="bi bi-long-arrow-right"></i></a>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row counters">

                    @foreach(App\Models\Counts::get() as $count)
                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $count->total }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>{{ $count->title }}</p>
                    </div>
                    @endforeach

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Services</h2>
                    <p>{{ App\Models\Section::where('section', 'Service')->first()->content ?? 'This is our service' }}</p>
                </div>

                <div class="row gy-4">
                    @foreach(App\Models\Service::get() as $service)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box iconbox-blue" style="min-width: 100%;">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426">
                                    </path>
                                </svg>
                                {!! $service->icon !!}
                            </div>
                            <h4><a href="">{{ $service->title }}</a></h4>
                            <p>{!! $service->description !!}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Features Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Our Clients</h2>
                    <p>{{ App\Models\Section::where('section', 'Client')->first()->content ?? 'This is our clients' }}</p>
                </div>

                <div class="row">
                    @foreach(App\Models\Client::get() as $client)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('/storage/'.$client->logo) }}" alt="" class="img-fluid">

                        <div class="mt-3 text-center">
                            <h5>{{ $client->name }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Support Project</h2>
                    <p>{{ App\Models\Section::where('section', 'Testimonial')->first()->content ?? 'This is our support projects' }}</p>
                </div>
                <div class="row">
                    @foreach(App\Models\Testimonial::get() as $testi)
                    <div class="col-md-2 mb-3">
                        <img src="{{ asset('/storage/'.$testi->image) }}" alt="" class="img-fluid">

                        <div class="mt-3 text-center">
                            <h6>{{ $testi->name }}</h6>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Portfolio</h2>
                    <p>{{ App\Models\Section::where('section', 'Portfolio')->first()->content ?? 'This is our portfolio' }}</p>
                </div>

                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            @foreach(App\Models\Category::get() as $category)
                            <li data-filter=".filter-{{ $category->name }}">{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" id="portfolio-list">
                    @foreach(App\Models\Portfolio::get() as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $portfolio->category->name }}">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('storage/'. $portfolio->image) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $portfolio->name }}</h4>
                                <p>{{ $portfolio->category->name }}</p>
                            </div>
                            <div class="portfolio-links">
                                <a href="{{ asset('storage/'. $portfolio->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $portfolio->name }}"></a>
                                <a href="{{ route('detail.portfolio', $portfolio->id) }}" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <section id="team" class="team section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Team</h2>
                    <p>{{ App\Models\Section::where('section', 'Team')->first()->content ?? 'This is our team' }}</p>
                </div>

                <div class="row">
                    @foreach(App\Models\Team::get() as $team)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{ asset('/storage/'.$team->image) }}" class="img-fluid" alt="">
                                <div class="social">
                                    <a href="{{ $team->twitter }}"><i class="bi bi-twitter"></i></a>
                                    <a href="{{ $team->facebook }}"><i class="bi bi-facebook"></i></a>
                                    <a href="{{ $team->instagram }}"><i class="bi bi-instagram"></i></a>
                                    <a href="{{ $team->linkedin }}"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>{{ $team->name }}</h4>
                                <span>{{ $team->position }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- ======= Procuct Section ======= -->
        <section id="product" class="portfolio section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Our Product</h2>
                    <p>{{ App\Models\Section::where('section', 'Product')->first()->content ?? 'This is our product' }}</p>
                </div>

                <div class="row portfolio-container" id="">
                    @foreach(App\Models\Product::get() as $product)
                    <div class="col-md-3 portfolio-item">
                        <div class="portfolio-wrap text-center">
                            <img src="{{ asset('storage/'. $product->image) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $product->name }}</h4>
                            </div>
                            <div class="portfolio-links">
                                <a href="{{ asset('storage/'. $product->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $product->name }}"></a>
                                <a href="{{ route('detail.product', $product->id) }}" title="More Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Procuct Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>{{ App\Models\Section::where('section', 'Contact')->first()->content ?? 'This is our contact' }}</p>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p id="addres"></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p id="email"></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p id="telp"></p>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-6 ">
                        <iframe class="mb-4 mb-lg-0" id="maps" src="" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen>
                        </iframe>
                    </div>

                    <div class="col-lg-6">
                        <form action="#" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email-form" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit" class="btn-send">Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <img src="{{ asset('front') }}/img/logo1.png" alt="" class="img-fluid" width="300"><br><br>

                        <p id="footer-contact">

                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
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
                            <input type="text" name="msg" id="msg-news">
                            <input type="button" id="btn-news" value="Subscribe">
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
    <script src="{{ asset('front') }}/vendor/purecounter/purecounter.js"></script>
    <script src="{{ asset('front') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('front') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('front') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('front') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- <script src="{{ asset('front') }}/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="{{ asset('front') }}/js/main.js"></script>
    <script src="{{ asset('front') }}/js/app.js"></script>

</body>

</html>