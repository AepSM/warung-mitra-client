<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Warung Mitra</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('logreg/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('logreg/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('logreg/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					@csrf
					<span class="login100-form-logo">
						<img src="{{ asset('logreg/images/logo.png') }}" alt="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
                        Register <br>
                        <i style="font-size: 0.4em; color: black;">
                            @if ($errors->has('nama'))
                                {{ $errors->first('nama') }}
                            @endif
                            @if ($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                            @if ($errors->has('nomor_hp'))
                                {{ $errors->first('nomor_hp') }}
                            @endif
                            @if ($errors->has('jenkel'))
                                {{ 'jenis kelamin tidak boleh kosong' }}
                            @endif
                            @if ($errors->has('alamat'))
                                {{ $errors->first('alamat') }}
                            @endif
                            @if ($errors->has('username'))
                                {{ $errors->first('username') }}
                            @endif
                            @if ($errors->has('password'))
                                {{ $errors->first('password') }}
                            @endif
                            @if ($errors->has('setuju'))
                                {{ 'persetujuan belum di centang' }}
                            @endif
                        </i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter nama">
						<input class="input100" type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Lengkap">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter email">
						<input class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter nomor hp">
						<input class="input100" type="text" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Nomor HP">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <label class="radio-inline"><input type="radio" name="jenkel" value="L"> <span style="color: white;"> Laki - Laki </span></label>
                    <label class="radio-inline"><input type="radio" name="jenkel" value="P"> <span style="color: white;"> Perempuan </span></label>
					<br><br>

					<div class="wrap-input100 validate-input" data-validate = "Enter alamat">
						<input class="input100" type="text" name="alamat" value="{{ old('alamat') }}" placeholder="alamat">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" value="{{ old('username') }}" placeholder="username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter password">
						<input class="input100" type="password" name="password" value="{{ old('password') }}" placeholder="password">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password confirm">
						<input class="input100" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Password Confirm">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="setuju" value="1">
						<label class="label-checkbox100" for="ckb1">
							Saya telah membaca dan menyetujui <a href="#" style="color: white; text-decoration-line: underline;">Aturan Penggunaan</a> dan <a href="#" style="color: white; text-decoration-line: underline;">Kebijakan Privasi</a> Warung Mitra
						</label>
					</div>
                    
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('logreg/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('logreg/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('logreg/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('logreg/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('logreg/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('logreg/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('logreg/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('logreg/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('logreg/js/main.js') }}"></script>

</body>
</html>

{{-- <link href="{{ asset('client/css/bootstrap.css') }}" rel="stylesheet" id="bootstrap-css">
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
</html> --}}