@extends('layouts.app')

@section('content')
<section class="section-content bg padding-y-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="height: 300px;">
                <div class="input-group">
                    <input type="text" id="kode" class="form-control" name="kode" style="width:60%;" placeholder="Masukkan kode transaksi">                        
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-kode" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <br>
                <div class="card">
                    <ul class="list-group list-group-flush">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script>
        $('document').ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('.alert').hide();
            $('.form-kirim').hide();

            $('.btn-kode').on('click', function() {
                var kode = $('#kode').val();
                $.ajax({
                    url: '{{ URL::route('tracking.show', 'kode') }}',
                    type: 'POST',
                    data: {
                        _token: CSRF_TOKEN,
                        kode: kode
                    },
                    success: function(response) {
                        console.log(response);
                        $('.list-group-flush').empty();

                        $.each(response.data, function(i, value){

                            var dataTimeline = "<li class=\"list-group-item\">" + value.keterangan + "</li>";                                
                            
                            $('.list-group-flush').append(dataTimeline);
                        });
                    }
                });
            });
        });
    </script>
@endsection
