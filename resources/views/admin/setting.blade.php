@extends('layouts.master')

@section('title', 'Pengaturan Web')

@section('content')
            <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Pengaturan Web</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pengaturan</a></li>
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
                                            <h4 class="mt-0 header-title">Pengaturan Web</h4>
                                            <a href="{{route('home')}}" class="btn btn-link"><i class="fa fa-arrow-left"></i> Back</a>
                                        </div>
                                        @if(session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif
                                        <hr>
                                        <div class="container mb-3">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form action="{{route('admin.setting.update')}}" method="POST" enctype="multipart/form-data" class="mt-4">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group row">
                                                            <label class='col-md-3 col-form-label'>Judul Web</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="WEB_TITLE" class='form-control @error('WEB_TITLE') is-invalid @enderror' value="{{config('web_config')['WEB_TITLE']}}">
                                                                @error('WEB_TITLE')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class='col-md-3 col-form-label'>Logo</label>
                                                            <div class="col-md-9">
                                                                <input type="file" name="WEB_LOGO" class='form-control @error('WEB_LOGO') is-invalid @enderror' onchange="readImage(event,'imgout')">
                                                                @error('WEB_LOGO')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                <img id="imgout" src="{{ Storage::url('/images/logo/'.config('web_config')['WEB_LOGO']) }}" alt="logo" height="50" class="card shadow-sm mt-4">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class='col-md-3 col-form-label'>Logo (Light)</label>
                                                            <div class="col-md-9">
                                                                <input type="file" name="WEB_LOGO_LIGHT" class='form-control @error('WEB_LOGO_LIGHT') is-invalid @enderror' onchange="readImage(event,'imgout2')">
                                                                @error('WEB_LOGO_LIGHT')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                <img id="imgout2" src="{{ Storage::url('/images/logo/'.config('web_config')['WEB_LOGO_LIGHT']) }}" alt="logo" height="50" class="card bg-dark shadow-sm mt-4">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class='col-md-3 col-form-label'>Teks Heading</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="HEADING_TITLE" class='form-control @error('HEADING_TITLE') is-invalid @enderror' value="{{config('web_config')['HEADING_TITLE']}}">
                                                                @error('HEADING_TITLE')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class='col-md-3 col-form-label'>Teks Subheading</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="SUBHEADING_TITLE" class='form-control @error('SUBHEADING_TITLE') is-invalid @enderror' value="{{config('web_config')['SUBHEADING_TITLE']}}">
                                                                @error('SUBHEADING_TITLE')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class='col-md-3 col-form-label'>Landing Background Image {{config('web_config')['LANDING_BG_IMG']}}</label>
                                                            <div class="col-md-9">
                                                                <input type="file" name="LANDING_BG_IMG" class='form-control @error('LANDING_BG_IMG') is-invalid @enderror' onchange="readImage(event,'imgout4')">
                                                                @error('LANDING_BG_IMG')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                                <img id="imgout4" src="{{ Storage::url('/images/landing/'.config('web_config')['LANDING_BG_IMG']) }}" alt="logo" height="230" width="100%" class="card shadow-sm mt-4" style="object-fit: cover;">
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

@push('scripts')
        <script src="{{ asset('public/js/main.js') }}"></script>
        <script type="text/javascript">
            readImage = (file,id) => {
                var input = file.target
                var reader = new FileReader()
                reader.onload = () => {
                    var imgURL = reader.result
                    var output = document.getElementById(`${id}`)
                    output.src = imgURL
                }
                reader.readAsDataURL(input.files[0])
            }
        </script>
@endpush