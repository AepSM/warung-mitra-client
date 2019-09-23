@extends('layouts.app')

@section('content')
<section class="section-content bg padding-y border-top">
    <div class="container">    
        <div class="row">
            <main class="col-sm-12">    
                <div class="card">
                    <table class="table table-hover shopping-cart-wrap">
                        <thead class="text-muted">
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col" width="160">Quantity</th>
                                <th scope="col" width="160">Bayar</th>
                                <th scope="col" class="text-right" width="200"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderSementaras as $orderSementara)
                                <tr>
                                    <td>
                                        <figure class="media">
                                            <div class="img-wrap"><img src="http://warung-mitra-admin.test/img/{{ $orderSementara->data_produk->gambar1 }}" class="img-thumbnail img-sm"></div>
                                            <figcaption class="media-body">
                                                <h6 class="title text-truncate">{{ $orderSementara->data_produk->nama }} </h6>
                                                <dl class="dlist-inline small">
                                                    <dt>Size: </dt>
                                                    <dd>XXL</dd>
                                                </dl>
                                                <dl class="dlist-inline small">
                                                    <dt>Color: </dt>
                                                    <dd>Orange color</dd>
                                                </dl>
                                            </figcaption>
                                        </figure> 
                                    </td>
                                    <td> 
                                        <input type="number" id="quantity" name="quantity" class="form-control input-number" value="{{ $orderSementara->sumQty }}" min="1" max="100">
                                    </td>
                                    <td> 
                                        <div class="price-wrap"> 
                                            <var class="price">Rp. {{ rupiah($orderSementara->sumHarga) }}</var> 
                                        </div> <!-- price-wrap .// -->
                                    </td>
                                    <td class="text-right"> 
                                        <a href="{{ route('hapus_keranjang', ['id' => $orderSementara->produk_id]) }}" class="btn btn-outline-danger"> × </a>
                                    </td>
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- card.// -->
                <hr>
                <div class="form-group text-right">
                    <a href="#" class="btn btn-success">Lanjut ke pembayaran</a>
                </div>    
            </main> <!-- col.// -->
        </div>    
    </div> <!-- container .//  -->
</section>
@endsection
