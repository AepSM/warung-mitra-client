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
            .table-bayar {
                width: 100%;
            }
            .table-bayar tr td {
                padding: 10px;
            }
            .table-bayar .nominal {
                text-align: right;
            }
            .text-error {
                height: 10px;
                margin-top: -10;
                margin-bottom: 20px;
                font-size: 12px;
                color: red;
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
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <section class="section-content bg padding-y border-top">
                <div class="container">        
                    <div class="row">
                        <main class="col-sm-8">        
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Detail Pembeli</h5>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="nama" id="nama" value="{{ Auth::user()->nama }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nomor_hp" class="col-sm-4 col-form-label">Nomor HP</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" value="{{ Auth::user()->nomor_hp }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ Auth::user()->alamat }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="desa" class="col-sm-4 col-form-label">Kelurahan / Desa</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="desa" id="desa" value="">
                                        </div>
                                        <div class="text-error">
                                            @if ($errors->has('desa'))
                                                {{ $errors->first('desa') }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rt" class="col-sm-4 col-form-label">RT</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="rt" id="rt" value="">
                                        </div>
                                        <div class="text-error">
                                            @if ($errors->has('rt'))
                                                {{ $errors->first('rt') }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="rw" class="col-sm-4 col-form-label">RW</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="rw" id="rw" value="">
                                        </div>
                                        <div class="text-error">
                                            @if ($errors->has('rw'))
                                                {{ $errors->first('rw') }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kecamatan" class="col-sm-4 col-form-label"><span class="label-kecamatan"> Kecamatan </span></label>
                                        <div class="col-sm-4">
                                            <select name="kecamatan" id="kecamatan" class="form-control kecamatan">
                                                <option value="">--Pilih Kecamatan--</option>
                                                <option value="Cilacap Utara">Cilacap Utara</option>
                                                <option value="Cilacap Tengah">Cilacap Tengah</option>
                                                <option value="Cilacap Selatan">Cilacap Selatan</option>
                                                <option value="4">Lainnya...</option>
                                            </select>
                                        </div>
                                        <div class="text-error">
                                            @if ($errors->has('kecamatan'))
                                                {{ $errors->first('kecamatan') }}
                                            @endif

                                            @if ($errors->has('kecamatan2'))
                                                {{ $errors->first('kecamatan2') }}
                                            @endif
                                            
                                            @if ($errors->has('kabupaten'))
                                                {{ $errors->first('kabupaten') }}
                                            @endif

                                            @if ($errors->has('kode_pos'))
                                                {{ $errors->first('kode_pos') }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-kabupaten-kodepos">
                                        <p style="font-size: 0.8em;"><i>Note: untuk kecamatan lainnya ada tambahan ongkir</i></p>
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="kecamatan2" id="kecamatan" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kabupaten" class="col-sm-4 col-form-label">Kabupaten</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="kabupaten" id="kabupaten" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kode_pos" class="col-sm-4 col-form-label">Kode Pos</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="kode_pos" id="kode_pos" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="dropshipper" class="col-sm-4 col-form-label">
                                            <label for="dropshipper"><input type="checkbox" name="dropshipper" class="dropshipper" id="dropshipper" value="1"> Dropshipper </label>
                                        </label>
                                    </div>
                                    <div class="form-dropshipper">
                                        <div class="form-group row">
                                            <label for="dropshipper_nama" class="col-sm-4 col-form-label">Nama Penerima</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="dropshipper_nama" id="dropshipper_nama" value="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dropshipper_detail" class="col-sm-4 col-form-label">Alamat Lengkap</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" name="dropshipper_detail" id="dropshipper_detail" value="">
                                            </div>
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
                                            @foreach ($orders as $key => $order)
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
                                            <input type="hidden" name="total_harga" class="total_harga" value="{{ $total_harga->sumHarga }}">
                                        </tr>
                                        <tr>
                                            <td>Tas Plastik:</td>
                                            <td class="nominal">Rp. <span class="plastik">{{ rupiah(100) }}</span></td>
                                            <input type="hidden" name="plastik" class="plastik_hidden" value="100">
                                        </tr>
                                    </table>
                                    <hr>
                                    <table class="table-bayar">
                                        <tr>
                                            <td><strong> Total Bayar: </strong></td>
                                            <td class="nominal"><strong> Rp. <span class="total_bayar">{{ rupiah($total_harga->sumHarga + 100) }}</span> </strong></td>
                                            <input type="hidden" name="total_bayar" class="total_bayar_hidden" value="{{ $total_harga->sumHarga + 100 }}">
                                        </tr>
                                    </table>
                                </div>
                            </div> <!-- card.// -->
                            <button type="sumbit" class="btn btn-warning btn-block">Pilih Metode Pembayaran</button>
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
                    var kecamatanValue = $(this).val();

                    if(kecamatanValue == "Cilacap Utara") {
                        $('.form-kabupaten-kodepos').hide();
                        $('.label-kecamatan').show();
                    } else if(kecamatanValue == "Cilacap Tengah") {
                        $('.form-kabupaten-kodepos').hide();
                        $('.label-kecamatan').show();
                    } else if(kecamatanValue == "Cilacap Selatan") {
                        $('.form-kabupaten-kodepos').hide();
                        $('.label-kecamatan').show();
                    } else if(kecamatanValue == 4) {
                        $('.label-kecamatan').hide();
                        $('.form-kabupaten-kodepos').show();
                    } else {
                        $('.ongkir').append(0);
                    }
                    
                });
                $('.form-kabupaten-kodepos').hide();
                $('.form-dropshipper').hide();

                $('#dropshipper').on('change', function() {
                    if(this.checked) {
                        $('.form-dropshipper').show();
                    } else {
                        $('.form-dropshipper').hide();
                    }
                });
            });
        </script>
    </body>
</html>
