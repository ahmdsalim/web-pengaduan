@extends('layouts.master')

@section('title', 'Ubah Password')

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Pengguna</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pengguna</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ubah Password</a></li>
                                    </ol>
  
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h4 class="mt-0 header-title">Ubah Password</h4>
                                            <a href="{{route('admin.users.index')}}" class="btn btn-link"><i class="fa fa-arrow-left"></i> Back</a>
                                        </div>
                                        <hr>
                                        <div class="container mb-3">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form action="{{route('admin.changepass',base64_encode(Auth::user()->id))}}" method="POST" enctype="multipart/form-data" class="mt-4">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group row">
                                                            <label for="" class='col-md-2 col-form-label'>Password Baru</label>
                                                            <div class="col-md-10">
                                                                <input type="password" name="password" class='form-control @error('password') is-invalid @enderror' required="">
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <button type="submit" class='btn btn-primary float-right'>Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            </div> <!-- end col -->
        
                        </div> <!-- end row -->        

                    </div> <!-- container-fluid -->
@endsection

@section('script')
        <script src="{{ asset('public/js/main.js') }}"></script>
@endsection