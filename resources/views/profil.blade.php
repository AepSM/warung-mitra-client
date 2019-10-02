@extends('layouts.app')

@section('content')
<section class="section-content bg padding-y-sm">
    <div class="container">
        <div class="row-sm">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <strong>PROFIL</strong>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-8">
                                    <strong>{{ $profil->nama }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <strong>{{ $profil->email }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jenkel" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <strong>{{ $profil->jenkel == 'L' ? 'Laki-Laki' : 'Perempuan' }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <strong>{{ $profil->alamat }}</strong>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nomor_hp" class="col-sm-4 col-form-label">Nomor HP</label>
                                <div class="col-sm-8">
                                    <strong>{{ $profil->nomor_hp }}</strong>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
