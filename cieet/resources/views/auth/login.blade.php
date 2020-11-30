<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name', 'Sistema CIEET') }}</title>
        <link rel="icon" type="image/png" href="{{asset('img/icon.png')}}">
        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/bower_components/animate.css/animate.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
        <style>
            .login__block__header img {
                box-shadow: 0 0 0 0;
            }

            .color {
                color: #f19999d9
            }
        </style>
    </head>

    <body data-sa-theme="2">
        <div class="login">

            <!-- Login -->
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <img src="{{asset('img/icon.png')}}">
                    Inicio de sesión
                </div>

                <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="form-login">
                    {{ csrf_field() }}
                    <div class="login__block__body">
                        <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <input id="email" type="correo" class="form-control text-center" name="correo" value="{{ old('correo') }}" required autofocus placeholder="Correo">

                                @if ($errors->has('correo'))
                                <span class="help-block color">
                                    <strong>{{ $errors->first('correo') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control text-center" name="password" required placeholder="Contraseña">

                                @if ($errors->has('password'))
                                <span class="help-block color">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn--icon login__block__btn" style="cursor: pointer">
                            <i class="zmdi zmdi-long-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
            <!-- Vendors -->
            <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
            <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
            <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="{{ asset('js/jquery.validate.min.js')}}"></script>
            <script src="{{ asset('js/validadorLogin.js')}}"></script>

            <!-- App functions and actions -->
            <script src="js/app.min.js"></script>
    </body>
</html>