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
                                <th scope="col" width="160">Harga</th>
                                <th scope="col" class="text-right" width="200"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- data keranjang --}}
                        </tbody>
                    </table>
                </div> <!-- card.// -->
                <hr>
                <div class="form-group text-right">
                    <a href="#" class="btn btn-success"> Selanjutnya <i class="fa fa-arrow-right"></i></a>
                </div>    
            </main> <!-- col.// -->
        </div>    
    </div> <!-- container .//  -->
</section>
@endsection

@section('script')
<script>
    $('document').ready(function(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        tampil_keranjang();

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
        
        function tampil_keranjang() {
            $.ajax({
                url: '{{ URL::route('keranjang.data') }}',
                type: 'GET',
                success: function(response) {
                    $.each(response.data, function(i, value) {
                        var data = " " +
                            "<tr>" +
                            "   <td>" +
                            "      <figure class=\"media\">" +
                            "          <div class=\"img-wrap\"><img src=\"http://warung-mitra-admin.test/img/" + value.data_produk.gambar1 + "\" class=\"img-thumbnail img-sm\"></div>" +
                            "          <figcaption class=\"media-body\">" +
                            "              <h6 class=\"title text-truncate\">" + value.data_produk.nama + "</h6>" +
                            "          </figcaption>" +
                            "      </figure>" +
                            "   </td>" +
                            "   <td>" +
                            "       <input type=\"number\" id=\"quantity\" data-id=\"" + value.produk_id + "\" name=\"quantity\" class=\"form-control input-number\" value=\"" + value.qty + "\" min=\"1\" max=\"100\">" +
                            "   </td>" +
                            "   <td>" + 
                            "       <div class=\"price-wrap\">" +
                            "           <var class=\"\">Rp. " + rupiah(value.harga) + "</var>" + 
                            "       </div>" +
                            "   </td>" +
                            "   <td class=\"text-right\"> " +
                            "       <a href=\"{{ url('hapus_keranjang') }}/" + value.id + "\" class=\"btn btn-danger\"> × </a>" +
                            "   </td>" +
                            "</tr>";
                        $('tbody').append(data);
                    })
                }
            })
        }
        $('tbody').on('change', '.input-number', function() {
            $('tbody').empty();
            var produkId = $(this).attr('data-id');
            var valQty = $(this).val();

            $.ajax({
                url: '{{ URL::route('keranjang.tambah_data') }}',
                type: 'POST',
                data: {
                    _token: CSRF_TOKEN,
                    id: produkId,
                    qty: valQty
                },
                success: function(response) {
                    tampil_keranjang();
                }
            });
        });
    });
</script>
@endsection
