<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DMTA - Desenvolvimento de Sites e Sistemas | Soluções Digitais</title>
    <meta name="description"
        content="DMTA - Especialistas em desenvolvimento de sites e sistemas personalizados. Transformamos suas ideias em soluções digitais eficientes.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

</head>

<body id="body" class="tv-magic-cursor">

    <!-- preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- preloader end  -->

    <div id="magic-cursor">
        <div id="ball"></div>
    </div>

    <!-- back-to-top-start  -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="far fa-angle-double-up"></i>
    </button>
    <!-- back-to-top-end  -->

    <!-- tv-offcanvus-area-start -->
    <div class="tv-offcanvas-area">
        <div class="itoffcanvas">
            <div class="itoffcanvas__close-btn">
                <button class="close-btn"><i class="fal fa-times"></i></button>
            </div>
            <div class="itoffcanvas__logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logo/logo-white.png') }}" alt="">
                </a>
            </div>
            <div class="itoffcanvas__text">
                <p>A DMTA é especializada em desenvolvimento de sites e sistemas sob medida. Transformamos suas ideias
                    em soluções digitais inovadoras e eficientes.</p>
            </div>
            <div class="tv-menu-mobile d-xl-none"></div>
            <div class="itoffcanvas__info">
                <h3 class="offcanva-title">Entre em Contato</h3>
                <div class="tv-info-wrapper mb-20 d-flex align-items-center">
                    <div class="itoffcanvas__info-icon">
                        <a href="#"><i class="fal fa-envelope"></i></a>
                    </div>
                    <div class="itoffcanvas__info-address">
                        <span>Email</span>
                        <a href="mailto:contato@dmta.dev.br">contato@dmta.dev.br</a>
                    </div>
                </div>
                <div class="tv-info-wrapper mb-20 d-flex align-items-center">
                    <div class="itoffcanvas__info-icon">
                        <a href="#"><i class="fal fa-phone-alt"></i></a>
                    </div>
                    <div class="itoffcanvas__info-address">
                        <span>Telefone</span>
                        <a href="tel:+5519982624408">(19) 98262-4408</a>
                    </div>
                </div>
                <div class="tv-info-wrapper mb-20 d-flex align-items-center">
                    <div class="itoffcanvas__info-icon">
                        <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                    </div>
                    <div class="itoffcanvas__info-address">
                        <span>Website</span>
                        <a href="https://dmta.dev.br" target="_blank">dmta.dev.br</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- tv-offcanvus-area-end -->

    @include('layouts.inc.header')

    <main>
        {{ $slot }}
    </main>

    @include('layouts.inc.footer')

    <!-- JS here -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/range-slider.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/isotope-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded-pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/main-tv.js') }}"></script>
    <script src="{{ asset('assets/js/custom-gsap.js') }}"></script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>