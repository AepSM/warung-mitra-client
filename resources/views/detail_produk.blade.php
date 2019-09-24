@extends('layouts.app')

@section('content')
<section class="section-content bg padding-y-sm">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12">
                <main class="card">
                    <div class="row no-gutters">
                        <aside class="col-sm-6 border-right">
                            <article class="gallery-wrap"> 
                                <div class="img-big-wrap">
                                    <div> 
                                        <img src="http://warung-mitra-admin.test/img/{{ $produk->gambar1 }}">
                                    </div>
                                </div>
                            </article> <!-- gallery-wrap .end// -->
                        </aside>
                        <aside class="col-sm-6">
                            <article class="card-body">
                                <!-- short-info-wrap -->
                                <h3 class="title mb-3">{{ $produk->nama }}</h3>    
                                <div class="mb-3"> 
                                    <var class="price h3 text-warning"> 
                                        <span class="currency">Rp. </span><span class="num">{{ rupiah($produk->harga) }}</span>
                                    </var>
                                </div> <!-- price-detail-wrap .// -->
                                <hr>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <dl class="dlist-inline">
                                            <dt>Stok: </dt>
                                            <dd> 
                                                {{ $produk->stok }}
                                            </dd>
                                        </dl>  <!-- item-property .// -->
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                                <div class="row">
                                    <div class="col-sm-5">
                                        <dl class="dlist-inline">
                                            <dt>Terjual: </dt>
                                            <dd> 
                                                {{ $produk->terjual == null ? '0' : $produk->terjual }}
                                            </dd>
                                        </dl>  <!-- item-property .// -->
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->
                                <hr>
                                <!-- PRODUCT DETAIL -->
                                <article class="card mt-3">
                                    <div class="card-body">
                                        <h5>Deskripsi</h5>
                                        <p>{!! $produk->deskripsi !!}</p>
                                    </div> <!-- card-body.// -->
                                </article> <!-- card.// -->
                                <hr>
                                @if(session('stok'))
                                    <div class="alert alert-danger">
                                        {{session('stok')}}
                                    </div>
                                @endif
                                @if(session('status'))
                                    <div class="alert alert-success">
                                        {{session('status')}}
                                    </div>
                                @endif
                                @if ($produk->stok > 0)
                                    <div class="row">
                                        <div class="col-sm">
                                            <a href="{{ route('keranjang.masukkan_keranjang', ['id' => $produk->id]) }}" id="btnCart" class="btn btn-warning btn-block btn-cart" data-id="{{ $produk->id }}"> <i class="fa fa-shopping-cart"></i> Masukkan Keranjang </a>
                                        </div>
                                        <div class="col-sm">
                                            <a href="{{ route('keranjang.beli', ['id' => $produk->id]) }}" class="btn btn-warning btn-block btn-beli"> Beli </a>
                                        </div>
                                    </div>                                    
                                @endif
                                <!-- short-info-wrap .// -->
                            </article> <!-- card-body.// -->
                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->
                </main> <!-- card.// -->
            </div> <!-- col // -->
        </div> <!-- row.// -->
    </div><!-- container // -->
</section>
@endsection
