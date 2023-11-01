<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SISTEM INFORMASI GIS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="theme/img/favicon.png" rel="icon">
    <link href="theme/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="theme/vendor/aos/aos.css" rel="stylesheet">
    <link href="theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="theme/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="theme/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="theme/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="theme/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/zoomist/zoomist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/leaflet/leaflet.css') }}">
    <!-- Template Main CSS File -->
    <link href="theme/css/style.css" rel="stylesheet">
    <script src="{{ asset('vendor/zoomist/zoomist.min.js') }}"></script>
</head>
<style>
    .image {
        background-size: cover;
    }

    .leaflet-container {
        height: 400px;
        width: 600px;
        max-width: 100%;
        max-height: 100%;
    }
</style>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="theme/img/logo.jpg" alt="logo">
                <span>SIG PARIWISATA</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ Route('home') }}">Beranda</a></li>
                    <li class="active"><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#services">Tracking Wisata</a></li>
                    <li><a class="getstarted scrollto" href="{{Route('auth')}}">Masuk</a></li>
                </ul>`
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <main id="main">
        <section id="services py-4">
            <header class="section-header">
                <h2>Tentang Kami</h2>
            </header>
            <div class="container">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="text-dark">Strukture Organisasi</h4>
                    </div>
                    <div class="card-body">
                        <div id="my-zoomist" data-zoomist-src="{{ asset('assets/data/'.$data->strukture_image) }}"></div>
                    </div>
                </div>
                <div class="entry-content mt-4">
                    <p>
                        {!! $data->deskripsi_apps !!}
                    </p>
                </div>
                
            </div>

        </section>
    </main>
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-12 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="theme/img/logo.png" alt="">
                            <span>SIG PARIWISATA</span>
                        </a>
                        <p>Explore seluruh wisata di Bone Bolango dan temukan pesona indahnya! Nikmati pengalaman tak
                            terlupakan di setiap sudut destinasi wisata yang ada!</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Dinas Pariwisata</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="/">Jodi</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="theme/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="theme/vendor/aos/aos.js"></script>
    <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="theme/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="theme/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="theme/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="theme/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="theme/js/main.js"></script>
    <script>
        new Zoomist('#my-zoomist', {
            height: '50%',
            slider: true,
            zoomer: true
        })
    </script>
</body>

</html>
