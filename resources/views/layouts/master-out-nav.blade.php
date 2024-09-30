<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('public/favicon-32x32.png')}}">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title') - {{config('web_config')['WEB_TITLE']}}</title>
        @include('layouts.head')
  </head>
<body>
    <!-- Begin page -->
        <div id="wrapper">
            @yield('content')
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('public/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('public/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{ asset('public/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('public/assets/js/waves.min.js')}}"></script>

        <script src="{{ asset('public/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('public/assets/js/app.js')}}"></script>  
    </body>
</html>