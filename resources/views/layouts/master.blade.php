<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Tazaka</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('/') }}vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/app.css">
    <link rel="shortcut icon" href="{{ asset('/') }}images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('/') }}vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/summernote/summernote-lite.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}vendors/toastify/toastify.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="/dashboard">
                                <!-- <img src="{{ asset('/') }}images/logo/tzk.png" alt="Logo" srcset=""> -->
                                Tazaka
                            </a>
                        </div>
                        <div class="toggler">
                            <a href="#" class='sidebar-hide d-xl-none d-block'><i class='bi bi-x bi-middle'></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class='sidebar-title'>Menu</li>

                        <li class="sidebar-item  ">
                            <a href="/dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('home.index') }}" class='sidebar-link'>
                                <i class="fas fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('about.index') }}" class='sidebar-link'>
                                <i class="fas fa-info-circle"></i>
                                <span>About</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('count.index') }}" class='sidebar-link'>
                                <i class="fas fa-stopwatch-20"></i>
                                <span>Count</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Components</span>
                            </a>
                            <ul class="submenu ">
                                <li>
                                    <a href="{{ route('service.index') }}">Service</a>
                                </li>
                                <li>
                                    <a href="{{ route('category.index') }}">Category</a>
                                </li>
                                <li>
                                    <a href="{{ route('client.index') }}">Client</a>
                                </li>
                                <li>
                                    <a href="{{ route('portfolio.index') }}">Portfolio</a>
                                </li>
                                <li>
                                    <a href="{{ route('team.index') }}">Team</a>
                                </li>
                                <li>
                                    <a href="{{ route('product.index') }}">Product</a>
                                </li>
                                <li>
                                    <a href="{{ route('testimonial.index') }}">Testimonial</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('section.index') }}" class='sidebar-link'>
                                <i class="fas fa-list"></i>
                                <span>Section</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('contact.index') }}" class='sidebar-link'>
                                <i class="fas fa-location-arrow"></i>
                                <span>Contact</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('sosmed.index') }}" class='sidebar-link'>
                                <i class="fas fa-list"></i>
                                <span>Sosmed</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class='burger-btn d-block '>
                            <i class='bi bi-justify fs-3'></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class='mb-0 text-gray-600'>{{ auth()->user()->name }}</h6>
                                            <p class='mb-0 text-sm text-gray-600'>Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{ asset('/') }}images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{ auth()->user()->name }}!</h6>
                                    </li>
                                    <li>
                                        <a class='dropdown-item' href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a>
                                    </li>
                                    <li>
                                        <a class='dropdown-item' href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>{{ $title }}</h3>
                            </div>
                        </div>
                    </div>
                    <section class="section">
                        @yield('content')
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>2021 &copy; Mazer</p>
                        </div>
                        <div class="float-end">
                            <p>Crafted with <span class='text-danger'><i class="bi bi-heart-fill icon-mid"></i></span> by <a href="">Mxbal</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('/') }}vendors/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('/') }}vendors/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('/') }}vendors/fontawesome/all.min.js"></script>
    <script src="{{ asset('/') }}vendors/toastify/toastify.js"></script>
    <script src="{{ asset('/') }}vendors/summernote/summernote-lite.min.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="{{ asset('/') }}js/main.js"></script>
    <script>
        // $('.summernote').summernote({
        //     tabsize: 2,
        //     height: 120,
        // })
    </script>

    @if(session('success'))
    <script>
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#4fbe87",
        }).showToast();
    </script>
    @endif

    @if(session('error'))
    <script>
        Toastify({
            text: "{{ session('error') }}",
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right",
            backgroundColor: "#dc3545",
        }).showToast();
    </script>
    @endif
</body>

</html>