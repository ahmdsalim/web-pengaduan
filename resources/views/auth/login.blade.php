@extends('layouts.master-out-nav')

@section('title','Login')
@section('content')
        <!-- Begin page -->
        <div class="container" style="margin-top: 10vh;">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <h3 class="text-center m-0">
                                <a href="{{route('landing')}}"><img src="{{ asset('public/assets/images/logo.png') }}" height="50" alt="logo"></a>
                            </h3>

                            <div class="p-3">
                                <h4 class="text-muted font-18 m-b-5 text-center">Login</h4>
                                @if($errors->any())
                                <div class="alert alert-danger">Email atau password salah!</div>
                                @endif
                                <form class="form-horizontal m-t-30" action="{{route('login')}}" method="POST">
                                    @csrf 
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email" name='email' placeholder="Enter email">
                                    </div>

                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" name='password' placeholder="Enter password" autocomplete="off">
                                    </div>

                                    <div class="form-group row m-t-20">
                                        <div class="col-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                <label class="custom-control-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <div class="m-t-40 text-center">
                <p>&copy;{{date('Y')}} Zona Aman Perempuan. Crafted with <i class="mdi mdi-heart text-danger"></i></p>
            </div>

        </div>
        
@endsection