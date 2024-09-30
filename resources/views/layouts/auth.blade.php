<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('public/favicon-32x32.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Built by Ahmad Salim Asshobri -->
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(!Route::is('landing')) @yield('title') - @endif{{config('web_config')['WEB_TITLE']}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{ Storage::url('/images/logo/'.config('web_config')['WEB_FAVICON']) }}">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
    @stack('styles')
</head>
<body>
    <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('public/assets/images/logo.png') }}" height="35"><span class="font-weight-bold"> Zona Aman Perempuan</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item mr-2">
                                <a class="nav-link" href="">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-light btn-md" href="#">Daftar</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <main>
            @yield('content')
        </main>
        <footer class="sticky-footer footer-light">
              <div class="container text-center">
                <span class="text-muted">&copy;Copyright Zona Aman Perempuan</span>
              </div>
        </footer>
    </div>
    @stack('scripts')
</body>
</html>
