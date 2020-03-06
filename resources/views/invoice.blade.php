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
            .card-body {
                text-align: center;
            }
            .total_bayar {
                font-size: 2em;
            }
            .kode_tagihan {
                margin-top: 10%;
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
                                <a href="{{ route('home') }}" class="link-logo">
                                    <img class="logo" src="{{ asset('client/images/logos/logo-wm.png') }}">
                                    <h2 class="logo-text">Warung Mitra</h2>
                                </a>
                            </div> <!-- brand-wrap.// -->
                        </div>
                        <div class="col-2 pull-right">
                            <div class="d-flex justify-content-end">
                                <p><strong>INVOICE</strong></p>
                            </div> <!-- widgets-wrap.// -->
                        </div> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- container.// -->
            </section> <!-- header-main .// -->
        </header>
        <section class="section-content bg padding-y-sm">
            <div class="container">
                <div class="row-sm">
                    <div class="col-12 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <strong>Pembayaran via
                                    @if ($order->jenis_bayar == 1)
                                        <span>Transfer aplikasi Warung Mitra</span>
                                    @elseif ($order->jenis_bayar == 2)
                                        <span>Transfer aplikasi Koperasi Mitra</span>
                                    @elseif ($order->jenis_bayar == 3 || $order->jenis_bayar == 4)
                                        <span>Transfer bank</span>
                                    @else
                                        <span>Cash On Delivery</span>
                                    @endif
                                    
                                </strong>
                            </div>
                            <div class="card-body">
                                <p class="batas_pembayaran">Batas Pembayaran: <strong>2 Jam</strong></p>

                                <p class="jumlah_tagihan">Jumlah tagihan:</p>
                                <p><strong class="total_bayar">Rp. {{ rupiah($order->total_bayar) }}</strong></p>

                                <p class="kode_tagihan">Kode Tagihan:</p>
                                <p>
                                    <input type="text" style="border: none; font-weight: bold;" value="{{ $order->kode }}" id="kodeTagihan" readonly/>
                                    <button type="button" style="border: none; background: none; color: grey;" id="copyKodeTagihan" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Salin</button>
                                </p>

                                @if ($order->jenis_bayar == 2)
                                    <p class="title_rekening">Pembayaran dapat dilakukan ke rekening a.n <strong>Warung mitra</strong> berikut: </p>        
                                    <p>
                                        <input type="text" style="border: none; font-weight: bold;" value="11100-00093-0000001" id="no_rek" readonly/>
                                        <button type="button" style="border: none; background: none; color: grey;" id="copy" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Salin</button>
                                    </p>
                                @elseif ($order->jenis_bayar == 3)
                                    <p class="title_rekening">Pembayaran dapat dilakukan ke rekening a.n <strong>Endro prasetyo,se</strong> berikut:  </p>        
                                    <p>
                                        <strong>Bank BCA, </strong><input type="text" style="border: none; font-weight: bold;" value="434-0071-439" id="no_rek" readonly/>
                                        <button type="button" style="border: none; background: none; color: grey;" id="copy" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Salin</button>
                                    </p>
                                @elseif ($order->jenis_bayar == 4)
                                    <p class="title_rekening">Pembayaran dapat dilakukan ke rekening a.n <strong>Endro prasetyo,se</strong> berikut:  </p>        
                                    <p>
                                        <strong>Bank Mandiri, </strong><input type="text" style="border: none; font-weight: bold;" value="139-00-1002330-1" id="no_rek" readonly/>
                                        <button type="button" style="border: none; background: none; color: grey;" id="copy" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Salin</button>
                                    </p>
                                @else
                                    <span>bertemu langsung dengan penjual</span>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" style="margin-top: 10px;">
                                <p style="text-align: justify;">
                                    Warung mitra akan melakukan verifikasi paling lama 30 menit setelah kamu melakukan pembayaran. Jika kamu menghadapi kendala mengenai pembayaran, silahkan langsung hubungi melalui kontak atau chat yang tersedia di website <a href="http://warungmitra.com" target="blank">www.warungmitra.com</a>.
                                </p>
                                <p><button class="btn btn-warning btn-block btn-cetak">CETAK</button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- jQuery -->
        <script src="{{ asset('client/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>

        <!-- Bootstrap4 files-->
        <script src="{{ asset('client/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
        <!-- custom javascript -->

        <script>
            $('document').ready(function() {
                $('.btn-cetak').on('click', function() {
                    window.print();
                })
                $('#copy').on('click', function(){
                    $('#no_rek').select();
                    document.execCommand("copy");
                    $('#copy').text('Tersalin');
                    $('#copyKodeTagihan').text('Salin');
                })
                $('#copyKodeTagihan').on('click', function(){
                    $('#kodeTagihan').select();
                    document.execCommand("copy");
                    $('#copyKodeTagihan').text('Tersalin');
                    $('#copy').text('Salin');
                })
            });
        </script>
    </body>
</html>
