    <header class="tv-header-height  ">
        <!-- header-area-start -->
        <div id="header-sticky" class="tv-header-area header-style-3 tv-header-transparent  tv-header-ptb p-relative">
            <div class="container container-1750 ">
                <div class="p-relative">
                    <div class="row align-items-center">
                        <div class="col-xxl-2 col-xl-2 col-6">
                            <div class="tv-header-logo">
                                <a href="{{ route('home') }}"><img src="assets/img/logo/logo-white2.png" alt=""></a>
                            </div>
                        </div>
                        <div class=" col-xxl-7 col-xl-7 d-none d-xl-block text-center">
                            <div class="tv-header-menu tv-header-dropdown">
                                <nav class="tv-menu-content">
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about') }}">Sobre Nós</a>
                                        </li>
                                        {{-- <li class="has-dropdown">
                                            <a href="service.html">Serviços</a>
                                            <ul class="tv-submenu submenu">
                                                <li><a href="service.html">Service</a></li>
                                                <li><a href="service-details.html">Services Details</a></li>
                                            </ul>
                                        </li> --}}
                                        <li>
                                            <a href="{{ route('contact') }}">Contato</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-3 col-6">
                            <div class="tv-header-right-action d-flex justify-content-end align-items-center">
                                <a href="{{ route('contact') }}" class="tv-btn-primary p-relative d-none d-xxl-block">
                                    <span class="btn-wrap">
                                        <span class="btn-text1">Solicite um Orçamento</span>
                                        <span class="btn-text2">Solicite um Orçamento</span>
                                    </span>
                                </a>
                                <div class="tv-header-bar">
                                    <button class="tv-menu-bar">
                                        <span>
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area-end -->
    </header>