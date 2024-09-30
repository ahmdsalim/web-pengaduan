@extends('layouts.master')

@push('css')
        <link href="{{ asset('public/assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet">
        <style type="text/css">
            .card-horizontal {
                display: flex;
                flex: 1 1 auto;
            }
            .card-border {
                box-shadow: none;
                border: solid 1px #f1f1f1;
            }

            .card-border:hover {
                cursor: pointer;
                box-shadow: 0 3px 10px rgba(0,0,0,0.12);
            }

            .dropdown:hover .dropdown-menu {
              display: block;
              margin-top: 0;
            }

            .dropdown {
                height: max-content;
            }

            .card-horizontal img{
                height: 150px; 
                object-fit: cover;
            }

        </style>
@endpush
@section('title','Kelola Artikel')
@section('content')
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Artikel</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Artikel</a></li>
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
        										<h4 class="mt-0 header-title">Seluruh Artikel</h4>
                                        		<p class="text-muted m-b-30 font-14">Berikut adalah daftar seluruh artikel</p>
        									</div>
	                                        <div class="col-md-6">
                                                <a class="btn btn-primary float-right" href="{{ route('admin.artikel.add') }}">Tambah</a>
	                                        </div>
        								</div>
                                        
                                        <hr>
                                        @if(session('success'))
                                            <div class="alert alert-success"><b>{{ session('success') }}</b></div>
                                        @elseif(session('failed'))
                                            <div class="alert alert-danger"><b>{{ session('failed') }}</b></div>
                                        @endif
                                        @foreach($artikel as $a)
                                        <div class="col-md-12">
                                            <a class="edit-link" href="{{ route('admin.artikel.edit',$a->id) }}">
                                                <div class="card card-border">
                                                    <div class="card-horizontal">
                                                        <img class="img-fluid py-3 px-3" src="{{Storage::url('images/articles/'.$a->thumb_image_name)}}">
                                                        <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                <div>
                                                                    <h4 class="header-title mb-3">@if($a->title != '') {{ $a->title }} @else Judul @endif</h4>
                                                                    <span>@if($a->status == 'draft')<b class="text-warning">Draft</b> | @endif {{ $a->created_at->format('d M y') }} @if($a->status != 'draft') | {{ $a->visitor_counts }} <i class="mdi mdi-poll"></i> @endif| <i class="mdi mdi-account-circle"></i> {{ $a->users->name }}</span>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-light"><i class="mdi mdi-dots-vertical" onclick="event.preventDefault()"></i></button>
                                                                    <div class="dropdown-menu">
                                                                        <form action="{{ route('admin.artikel.destroy',$a->id) }}" onclick="event.preventDefault()" method="POST">
                                                                            @csrf
                                                                            @method('delete')
                                                                            <a class="btn-delete dropdown-item" type="button"><i class="mdi mdi-delete"></i> Hapus</a>
                                                                        </form>
                                                                        @if($a->status == 'draft')
                                                                        <a href="{{ route('admin.artikel.publish',$a->id) }}" class="dropdown-item"><i class="mdi mdi-send"></i> Publish</a>
                                                                        @elseif($a->status == 'publish')
                                                                        <a href="{{ route('admin.artikel.drafted',$a->id) }}" class="dropdown-item"><i class="mdi mdi-bookmark"></i> Draft</a>
                                                                        @endif
                                                                        @if($a->status == 'publish')
                                                                        <a href="{{route('artikel.show',['slug' => $a->slug])}}" class="dropdown-item"><i class="mdi mdi-eye"></i> Lihat</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
        
                            </div> <!-- end col -->
        
                        </div> <!-- end row -->        

                    </div>
@endsection

@push('scripts')
<script src="{{ asset('public/assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>
@endpush