@extends('layouts.app')

@section('content')
<section class="section-main bg padding-top-sm">
    <div class="container">                
        <div class="row-sm">
            <div class="col-md-8">
                <!-- ================= main slide ================= -->
                <div class="row">
                    <aside class="col-md-12">
                        <!-- ================== 1-carousel bootstrap  ==================  -->
                        <div id="carousel1_indicator" class="carousel slide" data-ride="carousel">                    
                            <div id="slider" class="carousel-inner">
                                @foreach ($sliders as $slider)
                                    <div class="carousel-item {{ $slider->link }}">
                                        <img class="d-block w-100" src="http://warung-mitra-admin.test/img/{{ $slider->gambar }}" alt="First slide">
                                    </div>                                    
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div> 
                        <!-- ==================  1-carousel bootstrap ==================  .// -->		
                    </aside> <!-- col.// -->
                </div>
                <!-- ============== main slidesow .end // ============= -->        
            </div> <!-- col.// -->
            <aside id="sliderSide" class="col-md-4">                
                @foreach ($slidersides as $sliderside)                                    
                    <div class="card mb-3">
                        <figure class="itemside">
                            <div class="aside"><div class="img-wrap p-2 border-right"><img class="img-sm" src="http://warung-mitra-admin.test/img/{{ $sliderside->gambar1 }}"></div></div>
                            <figcaption class="text-wrap align-self-center">
                                <h6 class="title">{{ substr($sliderside->nama,0,50) }}</h6>
                                <a href="{{ url('search?attr=') }}">Lihat produk lainnya</a>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </aside>
        </div>
    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y-sm">
    <div class="container">
        <div id="produk" class="row-sm">
            @foreach ($produks as $produk)                
                <a href="{{ route('detail_produk', ['id' => $produk->id]) }}" target="blank">
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
