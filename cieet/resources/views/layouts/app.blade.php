<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Sistema Cieet') }}</title>
        <!-- Styles -->

        <!-- Scripts -->
        <!-- De plantilla -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
        <link href="{{ asset('css/switchButton.css') }}" rel="stylesheet">
        <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
        
        <!-- Global site tag (gtag.js) - Google Analytics >
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121642637-2"></script-->
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-121642637-2');
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    </head>
    <body>
        <!-- Navigation -->
        @include('layouts.navigation')

        <div>
            @yield('content')
        </div>

        @include('layouts.footer')
        <script src="{{ asset('js/vendor.js') }}"></script>
        <script src="{{ asset('js/effects.js') }}"></script>
        <!--script src="{{ asset('js/app.js') }}"></script-->
    </body>
</html>