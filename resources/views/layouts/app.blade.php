@php
$url = url('/');
$url_manifest = url('manifest.json');        

if(getenv('APP_ENV') != 'local' && getenv('APP_ENV') != 'dev'){
    $url = secure_url('/');
    $url_manifest = secure_url('manifest.json');
}
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffffff">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @if(getenv('APP_ENV') == 'local' || getenv('APP_ENV') == 'dev')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/calculo.css') }}" rel="stylesheet">
    @else
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('css/calculo.css') }}" rel="stylesheet">
    @endif
    <link rel="manifest" href="{{ $url_manifest }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="" href="{{ $url }}">
                        <img src="{{ asset('images/logotipo.jpg') }}" width="150" alt="">
                    </a>

                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Cadastrar</a></li>
                        @else
                            <li><a href="{{ route('calculo') }}">Calcular</a></li>
                            <li><a href="{{ route('calculo.list') }}">Histórico</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>                            
                        @endguest
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    @if(getenv('APP_ENV') == 'local' || getenv('APP_ENV') == 'dev')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/calculo.js')}}"></script>
    @else
    <script src="{{ secure_asset('js/app.js') }}"></script>
    <script src="{{ secure_asset('js/jquery.min.js')}}"></script>
    <script src="{{ secure_asset('js/calculo.js')}}"></script>
    @endif
    <script>    
    // if ('serviceWorker' in navigator && 'PushManager' in window) {
    //     navigator.serviceWorker.register('service-worker.js').then(function(registration) {
    //         console.log('ServiceWorker registration successful with scope: ', registration.scope);
    //     }, function(err) {
    //         console.log('ServiceWorker registration failed: ', err);
    //     });
    // }
    </script>
</body>
</html>
