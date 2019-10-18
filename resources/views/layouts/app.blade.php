<!-- Copyright &copy 2018 http://bootstrap-ecommerce.com -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Warung Mitra') }}</title>
    
    <link rel="icon" type="image/png" href="{{ asset('logreg/images/icons/favicon.ico') }}"/>

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

    <!-- chat whatsapp -->
    <link href="{{ asset('css/floating-wpp.css') }}" rel="stylesheet" type="text/css"/>

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
                    <div class="col-lg-3 col-sm-4">
                        <div class="brand-wrap">
                            <a href="{{ url('/') }}" class="link-logo">
                                <img class="logo" src="{{ asset('client/images/logos/logo-wm.png') }}">
                                <h2 class="logo-text">Warung Mitra</h2>
                            </a>
                        </div> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-lg-4 col-xl-5 col-sm-8">
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
                    <div class="col-lg-5 col-xl-4 col-sm-12">
                        <div class="widgets-wrap float-right">
                            @guest
                                <div class="widget-header">
                                    <small class="title text-muted">WELCOME</small>
                                    <div>
                                        <a href="{{ route('login') }}">Login</a> <span class="dark-transp"> | </span>
                                        <a href="{{ route('register') }}"> Register</a>
                                    </div>
                                </div>
                            @else
                                <div class="widget-header mr-3">
                                    <a href="{{ route('transaksi.index') }}"><small class="title text-muted">TRANSAKSI</small></a>
                                    <div class="text-center">
                                        <a href="{{ route('transaksi.index') }}">
                                            @if ($transaksi == 0)
                                                <span>0</span>
                                            @else
                                                <span class="badge badge-pill badge-danger notif-cart">{{ $transaksi }}</span>                                                
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="widget-header mr-3">
                                    <small class="title text-muted">POIN</small>
                                    <div>
                                        {{ rupiah(Auth::user()->poin) }}
                                    </div>
                                </div>
                                <div class="widget-header">                                
                                    <small class="title text-muted">{{ strtoupper(Auth::user()->username) }}</small>
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
                                </div>
                                <a href="{{ route('keranjang.index') }}" class="widget-header border-left pl-3 ml-3 shopping-cart">
                                    <div class="icontext">
                                        <div class="icon-wrap icon-sm round border"><i class="fa fa-shopping-cart"></i></div>
                                    </div>
                                    <span class="badge badge-pill badge-danger notify notif-cart" id="notifcart">{{ $order_sementara == 0 ? '' : $order_sementara }}</span>
                                </a>
                            @endauth
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
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kebutuhan pokok</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown07">
                                <a class="dropdown-item" href="{{ url('search?attr=Bahan masak') }}">Bahan masak</a>
                                <a class="dropdown-item" href="{{ url('search?attr=Kopi') }}">Kopi</a>
                                <a class="dropdown-item" href="{{ url('search?attr=Makanan') }}">Makanan</a>
                                <a class="dropdown-item" href="{{ url('search?attr=Mie') }}">Mie</a>
                                <a class="dropdown-item" href="{{ url('search?attr=Minuman') }}">Minuman</a>
                                <a class="dropdown-item" href="{{ url('search?attr=Renceng') }}">Renceng</a>
                                <a class="dropdown-item" href="{{ url('search?attr=Sembako') }}">Sembako</a>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('search?attr=Barang paketan') }}">Barang paketan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('search?attr=Kesehatan dan kecantikan') }}">Kesehatan dan kecantikan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('search?attr=Perlengkapan rumah tangga') }}">Perlengkapan rumah tangga</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('search?attr=Kebutuhan bayi') }}">Kebutuhan bayi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('search?attr=Promo') }}">Promo</a></li>
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
                                <strong>Phone / WhatsApp: </strong> 085228348588 <br>
                                <strong>Phone / WhatsApp: </strong> 088215425668 <br>
                            </p>

                            <div class="btn-group white">
                                <a class="btn btn-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/warungMitraa/"><i class="fab fa-facebook-f  fa-fw"></i></a>
                                <a class="btn btn-instagram" title="Instagram" target="_blank" href="https://www.instagram.com/warungmitra/"><i class="fab fa-instagram  fa-fw"></i></a>
                                <a class="btn btn-youtube" title="Youtube" target="_blank" href="https://youtu.be/xcL1po_LHzw"><i class="fab fa-youtube  fa-fw"></i></a>
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
        <div id="btnWhatsapp"></div>
    </footer>
    <!-- ========================= FOOTER END // ========================= -->

    <!-- jQuery -->
    <script src="{{ asset('client/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap4 files-->
    <script src="{{ asset('client/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('client/plugins/slickslider/slick.min.js') }}"></script>
    <!-- custom javascript -->

    <script src="{{ asset('js/floating-wpp.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $('#btnWhatsapp').floatingWhatsApp({
                phone: '+6281337667055',
                popupMessage: 'Ada yang bisa kami bantu?',
                message: "",
                showPopup: true,
                showOnIE: false,
                headerTitle: 'Welcome!',
                headerColor: 'crimson',
                backgroundColor: 'crimson',
                buttonImage: '<img src="http://warung-mitra-client.test/whatsapp.svg" />',
                position: "right"
            });
        });
    </script>

    @yield('script')
</body>
</html>
