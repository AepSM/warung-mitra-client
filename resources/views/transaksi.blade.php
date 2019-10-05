@extends('layouts.app')

@section('content')
<section class="section-content bg padding-y-sm">
    <div class="container">
        <div class="row-sm">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <strong>TRANSAKSI</strong>
                    </div>
                    <div class="card-body">
                        @foreach ($orders as $order)
                            <div class="card" style="margin-top: 10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3-24"> <strong>Kode Tagihan</strong> </div> <!-- col.// -->
                                        <nav class="col-md-18-24"> 
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item">{{ $order->kode }}</li>
                                            </ol>  
                                        </nav> <!-- col.// -->
                                        @if ($order->status_bayar == 1)
                                            <div class="col-md-3-24 text-right"> 
                                                
                                            </div> <!-- col.// -->
                                            <div class="col-md-3-24"> <strong><button class="btn btn-default btn-sm">LUNAS</button></strong> </div>
                                        @elseif($order->status_bayar == 0 && $order->jenis_bayar == null)
                                            <div class="col-md-3-24 text-right"> 
                                                <a href="{{ route('transaksi.detail', ['kode' => $order->kode]) }}" class="btn btn-warning">DETAIL</a>
                                            </div> <!-- col.// -->
                                            <div class="col-md-3-24"> <button class="btn btn-default btn-sm">PILIH METODE PEMBAYARAN</button> </div>
                                        @elseif($order->status_bayar == 0 && $order->jenis_bayar != null)
                                            <div class="col-md-3-24 text-right"> 
                                                <a href="{{ route('invoice.index', ['kode' => $order->kode]) }}" class="btn btn-warning">DETAIL</a>
                                            </div> <!-- col.// -->
                                            <div class="col-md-3-24"> <button class="btn btn-default btn-sm">LANJUT PEMBAYARAN</button> </div>
                                        @else
                                            <div class="col-md-3-24 text-right"> 
                                                <a href="#" class="btn btn-warning">DETAIL</a>
                                            </div> <!-- col.// -->
                                            <div class="col-md-3-24"> <button class="btn btn-default btn-sm">BATAL / KADALUWARSA</button> </div>
                                        @endif
                                    </div> <!-- row.// -->
                                    <hr>
                                    @foreach ($order->data_order_detail as $key => $order_detail)
                                        <div class="row">
                                            <div class="col-md-3-24"><img style="max-width: 100px;" src="http://warung-mitra-admin.test/img/{{ $order_detail->data_produk->gambar1 }}"></div> <!-- col.// -->
                                            <nav class="col-md-18-24"> 
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item">{{ $order_detail->data_produk->nama }}</li>
                                                </ol>  
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item">Jumlah: {{ $order_detail->qty }}</li>
                                                </ol>  
                                            </nav> <!-- col.// -->
                                            @if ($key != 0)
                                                
                                            @else
                                                <div class="col-md-3-24 text-right"> 
                                                    Rp. {{ rupiah($order_detail->data_order->total_bayar) }}
                                                </div> <!-- col.// -->
                                            @endif
                                        </div> <!-- row.// -->
                                    @endforeach
                                </div> <!-- card-body .// -->
                            </div> <!-- card.// -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
