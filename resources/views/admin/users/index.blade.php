@extends('layouts.master')

@push('css')
        <link href="{{ asset('public/assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet">
@endpush
@section('title','Kelola Pengguna')
@section('content')
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Pengguna</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pengguna</a></li>
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
        										<h4 class="mt-0 header-title">Seluruh Pengguna</h4>
                                        		<p class="text-muted m-b-30 font-14">Berikut adalah daftar seluruh pengguna</p>
        									</div>
        									@if($isSuper)
	                                        <div class="col-md-6">
	                                            <button class="btn btn-primary float-right" type="button" id="btn-add">@if(!$errors->any())Tambah @else Sembunyikan @endif</button>
	                                        </div>
	                                        @endif
        								</div>
                                        
                                        <hr>
                                        @if($isSuper)
                                        <div class="container mb-3">
                                            <div class="row" id="form-add" @if(!$errors->any()) style="display: none;" @endif >
                                                <div class="col-md-8">
                                                    <h4 class="mt-0 header-title">Tambah Pengguna</h4>
                                                    <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label for="" class='col-md-2 col-form-label'>Nama</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="name" class='form-control @error('name') is-invalid @enderror' required="">
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class='col-md-2 col-form-label'>Email</label>
                                                            <div class="col-md-10">
                                                                <input type="text" name="email" class='form-control @error('email') is-invalid @enderror' required="">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="" class='col-md-2 col-form-label'>Password</label>
                                                            <div class="col-md-10">
                                                                <input type="password" name="password" class='form-control @error('password') is-invalid @enderror' required="">
                                                                @error('password')
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
                                        @endif
                                        @if(session('success'))
                                            <div class="alert alert-success"><b class="text-primary">{{ session('success') }}</b></div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                <tr>
                                                    <th style="width: 100px;">#</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    @if($isSuper)
                                                    <th>Action</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $key => $user)
                                                    @if($user->id_role == 2)
                                                    <tr>
                                                        <td>{{$key+=1}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>
                                                        @if($isSuper)
                                                        <td>
                                                            <div class="d-inline-flex">
                                                                <a href="{{ route('admin.users.edit',['user' => $user->id]) }}">
                                                                    <button class="btn btn-warning mr-2"><i class="fa fa-edit"></i></button>
                                                                </a>
                                                                <form action="{{ route('admin.users.destroy',['user' => $user->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger btn-delete" type="button"><i class="fa fa-trash"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    @endif
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