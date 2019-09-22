@extends('layouts.app')

@section('content')
<section class="section-content bg padding-y-sm">
    <div class="container">
        <div id="produk" class="row-sm">
            @foreach ($produks as $produk)                
                <a href="{{ route('detail_produk', ['id' => $produk->id]) }}">
                    <div class="col-md-2 col-sm-6">
                        <figure class="card card-product">
                            <div class="img-wrap"> <img src="http://warung-mitra-admin.test/img/{{ $produk->gambar1 }}"></div>
                            <figcaption class="info-wrap" style="height: 100px;">
                                <div style="height: 50px;">
                                    <a href="#" class="title text-sm"><small>{{ substr($produk->nama, 0, 50) }}</small></a>
                                </div>
                                <div class="price-wrap">
                                    <div class="float-left">
                                        <span class="price-new"><b>Rp. {{ rupiah($produk->harga) }}</b></span>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </a>
            @endforeach
        </div> <!-- row.// -->
        {{ $produks->links() }}
    </div>
</section>
@endsection
