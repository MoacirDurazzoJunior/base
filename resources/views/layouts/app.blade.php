<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Base') }}</title>

        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/bower_components/animate.css/animate.min.css') }}">

        <!-- App styles -->
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        
        <!-- Login styles -->
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>

    <body data-ma-theme="indigo">
        <div class="login">
            <div class="login__block active" id="l-login">
                <div class="login__block__header">
                    <img src='{{ url("img/logo/sabs-branco.png") }}' alt='{{ config('app.name', 'Base') }}' title='{{ config('app.name', 'Base') }}' />
                </div>
                @if (session('status'))
                    @include('elements.alert.login', ['message' => session('status')])
                @endif
                @yield('content')
            </div>
        </div>

        <!-- Older IE warning message -->
        <!--[if IE]>
            <div class="ie-warning">
                <h1>Warning!!</h1>
                <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                <div class="ie-warning__downloads">
                    <a href="http://www.google.com/chrome">
                        <img src="img/browsers/chrome.png" alt="">
                    </a>

                    <a href="https://www.mozilla.org/en-US/firefox/new">
                        <img src="img/browsers/firefox.png" alt="">
                    </a>

                    <a href="http://www.opera.com">
                        <img src="img/browsers/opera.png" alt="">
                    </a>

                    <a href="https://support.apple.com/downloads/safari">
                        <img src="img/browsers/safari.png" alt="">
                    </a>

                    <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                        <img src="img/browsers/edge.png" alt="">
                    </a>

                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="img/browsers/ie.png" alt="">
                    </a>
                </div>
                <p>Sorry for the inconvenience!</p>
            </div>
        <![endif]-->

<!-- Javascript -->
<!-- Vendors -->
<script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>

<!-- App functions and actions -->
<script src="{{ asset('js/app.min.js') }}"></script>

<!-- CUSTOM FUNCTIONS -->
<script src="{{ asset('js/login.js') }}"></script>
</body>
</html>