<link rel="shortcut icon" href="{{ Storage::url('/images/logo/'.config('web_config')['WEB_FAVICON']) }}">
<link href="{{ asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/assets/css/style.css')}}" rel="stylesheet" type="text/css">
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('public/assets/css/dataTables.bootstrap4.min.css')}}">
@stack('css')