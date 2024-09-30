<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('public/favicon-32x32.png')}}">
    <meta charset="utf-8">
    <meta name="description" content="Zona Aman Perempuan adalah website berbasis pengaduan pelecehan seksual yang ditujukan bagi korban, orang-orang terdekat maupun saksi mata untuk mengisi kolom pengaduan pelecehan seksual.">
    <meta name="keyword" content="pengaduan pelecehan seksual, bantuan hukum, pelaporan pelecehan">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Build by Ahmad Salim Asshobri -->

    <title>@if(!Route::is('landing')) @yield('title') - @endif{{config('web_config')['WEB_TITLE']}}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
    @stack('styles')
</head>
<body>
    <div id="app">
            <nav class="navbar navbar-expand-md">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="@if(Route::is('landing')){{ Storage::url('/images/logo/'.config('web_config')['WEB_LOGO_LIGHT']) }}@else{{ Storage::url('/images/logo/'.config('web_config')['WEB_LOGO']) }}@endif" height="35" alt="logo"><span class="font-weight-bold"></span>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('profil')}}">Profil Kami</a>
                            </li>
                            @if(Route::is('landing'))
                            <li class="nav-item">
                                <a class="nav-link" href="#bantuan-hukum">Bantuan Hukum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#konseling">Konseling</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#quotes">Quotes</a>
                            </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('artikel.index') }}">Artikel</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        <main>
            @yield('content')
        </main>
        <footer class="footer footer-dark">
            <div class="container text-center">
                <span>&copy; {{date('Y')}} Zona Aman Perempuan.</span>
            </div>
        </footer>
    </div>
    @stack('scripts')
</body>
</html>
