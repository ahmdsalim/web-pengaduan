@extends('layouts.master')

@section('title', 'Update Quote')

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Quote</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Quote</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Update Quote</a></li>
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
                                            <h4 class="mt-0 header-title">Update Quote</h4>
                                            <a href="{{route('admin.quotes.index')}}" class="btn btn-link"><i class="fa fa-arrow-left"></i> Back</a>
                                        </div>
                                        <hr>
                                        <div class="container mb-3">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form action="{{ route('admin.quotes.update',$quote->id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group row">
                                                            <label for="" class='col-md-2 col-form-label'>Quote</label>
                                                            <div class="col-md-10">
                                                                <textarea class='form-control @error('quote') is-invalid @enderror' name="quote" required="true">{{$quote->quote}}</textarea>
                                                                @error('quote')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class='col-md-2 col-form-label'>Nama</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="name" class='form-control @error('name') is-invalid @enderror' value="{{$quote->name}}" required="true">
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <button type="submit" class='btn btn-primary float-right'>Submit</button>
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