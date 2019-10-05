<link href="{{ asset('client/css/bootstrap.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('client/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('client/js/jquery-2.0.0.min.js') }}"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    <head>
        <title>Warung Mitra | Register</title>
        <!-- Font awesome 5 -->
        <link href="{{ asset('client/fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css" rel="stylesheet">
        <style>
                /* Coded with love by Mutiullah Samim */
            body,
            html {
                margin: 0;
                padding: 0;
                height: 100%;
                background: #60a3bc !important;
            }
            .user_card {
                height: 800px;
                width: 350px;
                margin-top: 10%;
                margin-bottom: 20px;
                background: #fff;
                position: relative;
                display: flex;
                justify-content: center;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 1), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -webkit-box-shadow: 0 4px 28px 0 rgba(0, 0, 0, 1), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                -moz-box-shadow: 0 4px 28px 0 rgba(0, 0, 0, 1), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                border-radius: 5px;

            }
            .brand_logo_container {
                position: absolute;
                height: 170px;
                width: 170px;
                top: -75px;
                border-radius: 50%;
                background: #fff;
                padding: 10px;
                text-align: center;
            }
            .brand_logo {
                height: 150px;
                width: 150px;
                border-radius: 50%;
                border: 2px solid white;
            }
            .form_container {
                margin-top: 100px;
            }
            .login_btn {
                width: 100%;
                background: #228B22 !important;
                color: white !important;
            }
            .login_btn:focus {
                box-shadow: none !important;
                outline: 0px !important;
            }
            .login_container {
                padding: 0 2rem;
            }
            .input-group-text {
                background: #228B22 !important;
                color: white !important;
                border: 0 !important;
                border-radius: 0.25rem 0 0 0.25rem !important;
            }
            .input_user,
            .input_pass:focus {
                box-shadow: none !important;
                outline: 0px !important;
            }
            .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
                background-color: #c0392b !important;
            }
            .label-persetujuan {
                font-size: 14px;
            }
            .text-error {
                height: 10px;
                margin-top: -10;
                margin-bottom: 20px;
                font-size: 12px;
                color: red;
            }
            .border-error {
                border-color: red;
            }
        </style>
    </head>
    <!--Coded with love by Mutiullah Samim-->
    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="brand_logo_container">
                            <img src="{{ asset('client/images/logos/logo-wm.png') }}" class="brand_logo" alt="Logo">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="nama" class="form-control input_user{{ $errors->has('nama') ? ' border-error' : '' }}" value="{{ old('nama') }}" placeholder="nama lengkap">
                            </div>
                            <div class="text-error">
                                @if ($errors->has('nama'))
                                    {{ $errors->first('nama') }}
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" name="email" class="form-control input_user{{ $errors->has('email') ? ' border-error' : '' }}" value="{{ old('email') }}" placeholder="email">
                            </div>
                            <div class="text-error">
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="nomor_hp" class="form-control input_user{{ $errors->has('nomor_hp') ? ' border-error' : '' }}" value="{{ old('nomor_hp') }}" placeholder="nomor hp">
                            </div>
                            <div class="text-error">
                                @if ($errors->has('nomor_hp'))
                                    {{ $errors->first('nomor_hp') }}
                                @endif
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio1" value="L" {{ old('jenkel')=="L" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" name="jenkel" id="inlineRadio2" value="P" {{ old('jenkel')=="P" ? 'checked='.'"'.'checked'.'"' : '' }}>
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>
                            <div class="text-error">
                                @if ($errors->has('jenkel'))
                                    {{ 'jenis kelamin tidak boleh kosong' }}
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                </div>
                                <input type="text" name="alamat" class="form-control input_user{{ $errors->has('alamat') ? ' border-error' : '' }}" value="{{ old('alamat') }}" placeholder="alamat">
                            </div>
                            <div class="text-error">
                                @if ($errors->has('alamat'))
                                    {{ $errors->first('alamat') }}
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="username" class="form-control input_user{{ $errors->has('username') ? ' border-error' : '' }}" value="{{ old('username') }}" placeholder="username" maxlength="8">
                            </div>
                            <div class="text-error">
                                @if ($errors->has('username'))
                                    {{ $errors->first('username') }}
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control input_pass{{ $errors->has('password') ? ' border-error' : '' }}" value="" placeholder="password">
                            </div>
                            <div class="text-error">
                                @if ($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="konfirmasi password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="setuju" id="customControlInline" value="1">
                                    <label class="custom-control-label label-persetujuan" for="customControlInline">Saya telah membaca dan menyetujui <a href="#">Aturan Penggunaan</a> dan <a href="#">Kebijakan Privasi</a> Warung Mitra</label>
                                </div>
                            </div>
                            <div class="text-error">
                                @if ($errors->has('setuju'))
                                    {{ 'persetujuan belum di centang' }}
                                @endif
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" name="button" class="btn login_btn btn-block">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>