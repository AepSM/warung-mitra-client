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

        <!-- custom style -->
        <link href="{{ asset('client/css/ui.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('client/css/responsive.css') }}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

        <style>
            .logo-text {
                font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            }
            .link-logo, .link-logo:hover {
                color: black;
            }
            .table-bayar {
                width: 100%;
            }
            .table-bayar tr td {
                padding: 10px;
            }
            .table-bayar .nominal {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <header class="section-header">
            <section class="header-main">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <div class="brand-wrap">
                                <a href="#" class="link-logo">
                                    <img class="logo" src="{{ asset('client/images/logos/logo-wm.png') }}">
                                    <h2 class="logo-text">Warung Mitra</h2>
                                </a>
                            </div> <!-- brand-wrap.// -->
                        </div>
                        <div class="col-2 pull-right">
                            <div class="d-flex justify-content-end">
                                <p><strong>DETAIL BELANJA</strong></p>
                            </div> <!-- widgets-wrap.// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- container.// -->
            </section> <!-- header-main .// -->
        </header> <!-- section-header.// -->
        <section class="section-content bg padding-y border-top">
            <div class="container">        
                <div class="row">
                    <main class="col-sm-8">        
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Detail Pembeli</h5>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="nama" value="{{ Auth::user()->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nomor_hp" class="col-sm-4 col-form-label">Nomor HP</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="nomor_hp" value="{{ Auth::user()->nomor_hp }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control-plaintext" id="alamat" value="{{ Auth::user()->alamat }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                    <div class="col-sm-4">
                                        <select name="kecamatan" id="kecamatan" class="form-control kecamatan">
                                            <option value="0">--Pilih Kecamatan--</option>
                                            <option value="1">Cilacap 1</option>
                                            <option value="2">Cilacap 2</option>
                                            <option value="3">Cilacap 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- card.// -->
                        <hr>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Produk</h5>
                                <table class="table table-hover shopping-cart-wrap">
                                    <thead class="text-muted">
                                        <tr>
                                            <th scope="col">Produk</th>
                                            <th scope="col" width="120">Quantity</th>
                                            <th scope="col" width="120">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)                                            
                                        <tr>
                                            <td>
                                                <figure class="media">
                                                    <div class="img-wrap"><img src="http://warung-mitra-admin.test/img/{{ $order->data_produk->gambar1 }}" class="img-thumbnail img-sm"></div>
                                                    <figcaption class="media-body">
                                                        <h6 class="title text-truncate">{{ $order->data_produk->nama }}</h6>
                                                    </figcaption>
                                                </figure> 
                                            </td>
                                            <td class="text-center">
                                                {{ $order->qty }}
                                            </td>
                                            <td>
                                                <div class="price-wrap"> 
                                                    <var class="price">Rp. {{ rupiah($order->data_produk->harga) }}</var> 
                                                </div> <!-- price-wrap .// -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- card.// -->
                    </main> <!-- col.// -->
                    <main class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Detail Pembayaran</h5>
                                <table class="table-bayar">
                                    <tr>
                                        <td>Total Harga:</td>
                                        <td class="nominal">Rp. <span>{{ rupiah($total_harga->sumHarga) }}</span></td>
                                        <input type="hidden" class="total_harga" value="{{ $total_harga->sumHarga }}">
                                    </tr>
                                    <tr>
                                        <td>Ongkos Kirim:</td>
                                        <td class="nominal">Rp. <span class="ongkir">{{ rupiah(0) }}</span></td>
                                    </tr>
                                </table>
                                <hr>
                                <table class="table-bayar">
                                    <tr>
                                        <td><strong> Total Bayar: </strong></td>
                                        <td class="nominal"><strong> Rp. <span class="total_bayar">{{ rupiah(0) }}</span> </strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div> <!-- card.// -->
                        <button type="sumbit" class="btn btn-warning btn-block">Pilih Metode Pembayaran</button>
                    </main> <!-- col.// -->
                </div>
            </div> <!-- container .//  -->
        </section>
        <!-- jQuery -->
        <script src="{{ asset('client/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>

        <!-- Bootstrap4 files-->
        <script src="{{ asset('client/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
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

        <script>
            $('document').ready(function() {
                function rupiah(bilangan) {
                    var bilangan = bilangan;
                        
                    var	number_string = bilangan.toString(),
                        sisa 	= number_string.length % 3,
                        rupiah 	= number_string.substr(0, sisa),
                        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                            
                    if (ribuan) {
                        separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    return rupiah;
                }
                $('.kecamatan').on('change', function() {
                    $('.ongkir').empty();
                    $('.total_bayar').empty();
                    var kecamatanValue = $(this).val();
                    var total_harga = $('.total_harga').val();

                    if(kecamatanValue == 1) {
                        var ongkir = 3000;
                        $('.ongkir').append(rupiah(ongkir));
                        total_bayar = parseInt(total_harga) + 3000;
                    } else if(kecamatanValue == 2) {
                        var ongkir = 5000;
                        $('.ongkir').append(rupiah(ongkir));
                        total_bayar = parseInt(total_harga) + 5000;
                    } else if(kecamatanValue == 3) {
                        var ongkir = 7000;
                        $('.ongkir').append(rupiah(ongkir));
                        total_bayar = parseInt(total_harga) + 7000;
                    } else {
                        $('.ongkir').append(0);
                    }
                    
                    $('.total_bayar').append(rupiah(total_bayar));
                });
            });
        </script>
    </body>
</html>
