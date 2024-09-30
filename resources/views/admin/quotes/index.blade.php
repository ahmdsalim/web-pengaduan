@extends('layouts.master')

@push('css')
        <link href="{{ asset('public/assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet">
@endpush
@section('title','Kelola Quotes')
@section('content')
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Quotes</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Quotes</a></li>
                                    </ol>
  
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-20">
                                    <div class="card-body">
        								<div class="row justify-content-between">
        									<div class="col-md-6">
        										<h4 class="mt-0 header-title">Seluruh Quotes</h4>
                                        		<p class="text-muted m-b-30 font-14">Berikut adalah daftar seluruh Quotes</p>
        									</div>
	                                        <div class="col-md-6">
	                                            <button class="btn btn-primary float-right" type="button" id="btn-add">@if(!$errors->any())Tambah @else Sembunyikan @endif</button>
	                                        </div>
        								</div>
                                        
                                        <hr>
                                        <div class="container mb-3">
                                            <div class="row" id="form-add" @if(!$errors->any()) style="display: none;" @endif >
                                                <div class="col-md-8">
                                                    <h4 class="mt-0 header-title">Tambah Quotes</h4>
                                                    <form action="{{ route('admin.quotes.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label for="" class='col-md-2 col-form-label'>Quote</label>
                                                            <div class="col-md-10">
                                                                <textarea class='form-control @error('quote') is-invalid @enderror' name="quote" required="true"></textarea>
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
                                                                <input type="text" name="name" class='form-control @error('name') is-invalid @enderror' required="true">
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
                                        @if(session('success'))
                                            <div class="alert alert-success"><b class="text-primary">{{ session('success') }}</b></div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr>
                                                    <th style="width: 100px;">#</th>
                                                    <th>Quote</th>
                                                    <th>Oleh</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($quotes as $no => $quote)
                                                    <tr>
                                                        <td>{{$no+1}}</td>
                                                        <td>{{$quote->quote}}</td>
                                                        <td>{{$quote->name}}</td>
                                                        <td>
                                                            <div class="d-inline-flex">
                                                                <a href="{{ route('admin.quotes.edit',$quote->id) }}">
                                                                    <button class="btn btn-warning mr-2"><i class="fa fa-edit"></i></button>
                                                                </a>
                                                                <form action="{{ route('admin.quotes.destroy',$quote->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger btn-delete" type="button"><i class="fa fa-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach 
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="paginate float-right mt-3">
                                        </div>
                                    </div>
                                </div>
        
                            </div> <!-- end col -->
        
                        </div> <!-- end row -->        

                    </div>
@endsection

@push('scripts')
<script src="{{ asset('public/assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.table').DataTable();
	})
</script>
@endpush