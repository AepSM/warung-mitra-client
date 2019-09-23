<!-- Copyright &copy 2018 http://bootstrap-ecommerce.com -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Warung Mitra') }}</title>

    <link href="{{ asset('client/css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Font awesome 5 -->
    <link href="{{ asset('client/fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">

    <!-- plugin: owl carousel  -->
    <link href="{{ asset('client/plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/plugins/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">

    <!-- plugin: slickslider -->
    <link href="{{ asset('client/plugins/slickslider/slick.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('client/plugins/slickslider/slick-theme.css') }}" rel="stylesheet" type="text/css" />

    <!-- custom style -->
    <link href="{{ asset('client/css/ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('client/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

    @yield('style')

    <style>
        .logo-text {
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .link-logo, .link-logo:hover {
            color: black;
        }
    </style>
</head>
<body>
    <header class="section-header">
        <section class="header-main">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5-24 col-sm-5 col-4">
                        <div class="brand-wrap">
                            <a href="{{ url('/') }}" class="link-logo">
                                <img class="logo" src="{{ asset('client/images/logos/logo-wm.png') }}">
                                <h2 class="logo-text">Warung Mitra</h2>
                            </a>
                        </div> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-lg-13-24 col-sm-12 order-3 order-lg-2">
                        <form action="{{ route('search') }}" method="GET">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" name="attr" style="width:60%;" placeholder="Search">                        
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form> <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-lg-6-24 col-sm-7 col-8  order-2  order-lg-3">
                        <div class="d-flex justify-content-end">
                            <div class="widget-header">
                                @guest
                                    <small class="title text-muted">Selamat Datang</small>
                                    <div>
                                        <a href="{{ route('login') }}">Login</a> <span class="dark-transp"> | </span>
                                        <a href="{{ route('register') }}"> Register</a>
                                    </div>
                                @else
                                    <small class="title text-muted">{{ Auth::user()->nama }}</small>
                                    <div>
                                        <a class="dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Setting</a>
                                        
                                        <div class="dropdown-menu" aria-labelledby="dropdown07">
                                            <a class="dropdown-item" href="{{ route('profil') }}">Profil</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    Logout
                                            </a>
                                        </div>
                                            
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @endauth
                                
                            </div>
                            <a href="{{ route('keranjang') }}" class="widget-header border-left pl-3 ml-3 shopping-cart">
                                <div class="icontext">
                                    <div class="icon-wrap icon-sm round border"><i class="fa fa-shopping-cart"></i></div>
                                </div>
                                <span class="badge badge-pill badge-danger notify notif-cart" id="notifcart">{{ $order_sementara == 0 ? '' : $order_sementara }}</span>
                            </a>
                        </div> <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container"> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>All category</strong></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown07">
                                @foreach ($kategoris as $kategori)
                                    <a class="dropdown-item" href="{{ url('search?attr=' . $kategori->nama) }}">{{ $kategori->nama }}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div> <!-- collapse .// -->
            </div> <!-- container .// -->
        </nav>
    </header> <!-- section-header.// -->

    @yield('content')

    <!-- ========================= FOOTER ========================= -->
    <footer class="section-footer bg-secondary">
        <div class="container">
            <section class="footer-top padding-top">
                <div class="row">
                    <aside class="col-sm-3 col-md-3 white">
                        <h5 class="title">Warung Mitra</h5>
                        <ul class="list-unstyled">
                            <li> <a href="#">Aturan Penggunaan</a></li>
                            <li> <a href="#">Kebijakan Privasi</a></li>
                        </ul>
                    </aside>
                    <aside class="col-sm-3  col-md-3 white">
                        <h5 class="title">Pelanggan</h5>
                        <ul class="list-unstyled">
                            <li> <a href="#"> Cara Beli </a></li>
                        </ul>
                    </aside>
                    <aside class="col-sm-3  col-md-3 white">
                        <h5 class="title">Tentang</h5>
                        <ul class="list-unstyled">
                            <li> <a href="#"> Sejarah </a></li>
                        </ul>
                    </aside>
                    <aside class="col-sm-3">
                        <article class="white">
                            <h5 class="title">Kontak</h5>
                            <p>
                                <strong>Phone: </strong> +123456789 <br> 
                                <strong>Phone: </strong> +123456789 <br> 
                                <strong>WhatsApp: </strong> +123456789 
                            </p>

                            <div class="btn-group white">
                                <a class="btn btn-facebook" title="Facebook" target="_blank" href="#"><i class="fab fa-facebook-f  fa-fw"></i></a>
                                <a class="btn btn-instagram" title="Instagram" target="_blank" href="#"><i class="fab fa-instagram  fa-fw"></i></a>
                                <a class="btn btn-youtube" title="Youtube" target="_blank" href="#"><i class="fab fa-youtube  fa-fw"></i></a>
                                <a class="btn white bg-green" title="whatsapp" target="_blank" href="#"><i class="fab fa-whatsapp  fa-fw"></i></a>
                            </div>
                        </article>
                    </aside>
                </div> <!-- row.// -->
                <br> 
            </section>
            <section class="footer-bottom row border-top-white">
                <div class="col-sm-6"> 
                    <p class="text-white-50">
                        Copyright &copy 2019 <a href="#" class="text-white-50">warungmitra.com</a> <br>  
                    </p>
                </div>
            </section> <!-- //footer-top -->
        </div><!-- //container -->
    </footer>
    <!-- ========================= FOOTER END // ========================= -->

    <!-- jQuery -->
    <script src="{{ asset('client/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="{{ asset('client/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/plugins/slickslider/slick.min.js') }}"></script>
    <!-- custom javascript -->

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/5d646faa77aa790be330de31/default';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

    @yield('script')
</body>
</html>
