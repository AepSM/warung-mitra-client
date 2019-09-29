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
            .card-title {
                padding: 10px;
                background-color: #aaaaaa;
                color: #fff;
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
            .tf-aplikasi {
                max-width: 80px;
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
                                <p><strong>PEMBAYARAN</strong></p>
                            </div> <!-- widgets-wrap.// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- container.// -->
            </section> <!-- header-main .// -->
        </header> <!-- section-header.// -->
        <form action="{{ route('pembayaran.store') }}" method="POST">
            @csrf
            <section class="section-content bg padding-y border-top">
                <div class="container">        
                    <div class="row">
                        <main class="col-sm-8">        
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pilih Metode Pembayaran</h5>
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <label for="aplikasi"><input type="radio" name="metode_pembayaran" id="aplikasi"> Via Aplikasi</label>
                                                    </button>
                                                </h2>
                                            </div>
                                    
                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <table>
                                                        <tr>
                                                            <td><input type="radio" name="metode_pembayaran" id="warungmitra" value="1"></td>
                                                            <td><img src="{{ asset('client/images/logos/warung-mitra.jpeg') }}" alt="warung-image" class="tf-aplikasi"></td>
                                                            <td>Transfer warung mitra atas nama <strong>CV. Mitra pasar sejahtera</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="radio" name="metode_pembayaran" id="warungmitra" value="2"></td>
                                                            <td><img src="{{ asset('client/images/logos/koperasi-mitra.jpeg') }}" alt="warung-image" class="tf-aplikasi"></td>
                                                            <td>Transfer koperasi mitra berkah usaha atas nama <strong>CV. Mitra pasar sejahtera</strong></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <label for="transfer"><input type="radio" name="metode_pembayaran" id="transfer" value="3"> Transfer Bank</label>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <table>
                                                        <tr>
                                                            <td><img src="{{ asset('client/images/logos/logo-bank-bca.png') }}" alt="warung-image" class="tf-aplikasi"></td>
                                                            <td>Rekening atas nama <strong>CV. Mitra pasar sejahtera</strong></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        <label for="cod"><input type="radio" name="metode_pembayaran" id="cod" value="4"> Cash On Delivery (COD)</label>
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Untuk pembelian via <strong>COD</strong> bisa menghubungi kontak yang ada di website www.warungmitra.com
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                            <td class="nominal">Rp. <span>{{ rupiah($orders->total_harga) }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Ongkos Kirim:</td>
                                            <td class="nominal">Rp. <span class="ongkir">{{ rupiah($orders->ongkir) }}</span></td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <table class="table-bayar">
                                        <tr>
                                            <td><strong> Total Bayar: </strong></td>
                                            <td class="nominal"><strong> Rp. <span class="total_bayar">{{ rupiah($orders->total_bayar) }}</span> </strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div> <!-- card.// -->
                            <button type="sumbit" class="btn btn-warning btn-block">BAYAR</button>
                        </main> <!-- col.// -->
                    </div>
                </div> <!-- container .//  -->
            </section>
        </form>
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
                        $('.ongkir_hidden').val(ongkir);
                        total_bayar = parseInt(total_harga) + 3000;
                    } else if(kecamatanValue == 2) {
                        var ongkir = 5000;
                        $('.ongkir').append(rupiah(ongkir));
                        $('.ongkir_hidden').val(ongkir);
                        total_bayar = parseInt(total_harga) + 5000;
                    } else if(kecamatanValue == 3) {
                        var ongkir = 7000;
                        $('.ongkir').append(rupiah(ongkir));
                        $('.ongkir_hidden').val(ongkir);
                        total_bayar = parseInt(total_harga) + 7000;
                    } else {
                        $('.ongkir').append(0);
                    }
                    
                    $('.total_bayar').append(rupiah(total_bayar));
                    $('.total_bayar_hidden').val(total_bayar);
                });
            });
        </script>
    </body>
</html>
