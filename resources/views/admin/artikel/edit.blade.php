@extends('layouts.master')

@push('css')
        <link href="{{ asset('public/assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet">
@endpush
@section('title','Kelola Artikel')
@section('content')
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Artikel</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Artikel</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tambah Artikel</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                    	<form action="{{ route('admin.artikel.update',$artikel->id) }}" enctype="multipart/form-data" method="POST">
        								<div class="row justify-content-between">
        									<div class="col-md-6">
        										<h4 class="mt-0 header-title">Edit Artikel</h4>
        									</div>
	                                        <div class="col-md-6">
	                                        	<div class="row">
	                                        		<div class="col-md-3 mb-2">
                                                        @csrf
                                                        @method('PUT')
	                                        			<button class="btn btn-success btn-md btn-block" type="submit">Simpan</button>
	                                        		</div>
                                                    @if($artikel->status == 'draft')
	                                        		<div class="col-md-3 mb-2">
	                                        			<a href="{{ route('admin.artikel.publish',$artikel->id) }}" class="btn btn-warning btn-md btn-block">Publish</a>
	                                        		</div>
                                                    @elseif($artikel->status == 'publish')
                                                    <div class="col-md-3 mb-2">
                                                        <a href="{{ route('admin.artikel.drafted',$artikel->id) }}" class="btn btn-warning btn-md btn-block">Batalkan Publish</a>
                                                    </div>
                                                    @endif
                                                    <div class="col-md-3 mb-2">
                                                        <a class="btn btn-primary btn-md btn-block" href="{{ route('admin.artikel.pratinjau',$artikel->id) }}" target="_blank">Pratinjau</a>
                                                    </div>
	                                        		<div class="col-md-3">
	                                        			<a class="btn btn-info btn-md btn-block" href="{{ route('admin.artikel.index') }}">Kembali</a>
	                                        		</div>
	                                        	</div>
	                                        </div>
        								</div>
                                        <div class="row">
	                                       <div class="col-md-12">
	                                           <div class="alert alert-info">
	                                               <i class="fa fa-info-circle"></i> Simpan terlebih dahulu sebelum melakukan pratinjau.
	                                           </div>
	                                       </div>
	                                   </div>
                                        <hr>
                                        @if(session('success'))
                                            <div class="alert alert-success"><b>{{ session('success') }}</b></div>
                                        @elseif(session('failed'))
                                            <div class="alert alert-danger"><b>{{ session('failed') }}</b></div>
                                        @endif
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">
                                            	<div class="form-row">
    	                                        	<div class="form-group col-md-8">
                                                        <label>Judul</label>
    	                                        		<input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ $artikel->title }}" autocomplete="off" required="true">
                                                        @error('title')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
    	                                        	</div>
    	                                        	<div class="form-group col-md-4">
                                                        <label>Thumbnail @if($artikel->thumb_image_name != 'default.jpg') <span class="text-mute">(Sudah Ada)</span> @endif</label>
    	                                        		<input class="form-control @error('quote') is-invalid @enderror" type="file" name="thumb_image" accept=".jpg,.jpeg,.png,.webp">
                                                        <span class="text-muted">Ukuran Gambar Maksimal 2 MB.</span>
                                                        @error('thumb_image')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
    	                                        	</div>
                                            	</div>
                                            	<div class="form-group">
                                                    <textarea class="form-control @error('content') is-invalid @enderror" id="my-editor" name="content">{!! $artikel->content !!}</textarea>
                                                    @error('content')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            	</div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
        
                            </div> <!-- end col -->
        
                        </div> <!-- end row -->        

                    </div>
@endsection

@push('scripts')
<script src="{{ asset('public/assets/plugins/sweet-alert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('public/js/main.js') }}"></script>
<script type="text/javascript" src="//cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>
<script type="text/javascript">
    let token = $('meta[name="csrf-token"]').attr('content');
    var options = {
        height: 500,
        extraPlugins: ['image2','justify'],
        filebrowserImageBrowseUrl: '/zap-filemanager?type=Images',
        filebrowserImageUploadUrl: `/zap-filemanager/upload?type=Images&_token=${token}`,
        filebrowserBrowseUrl: '/zap-filemanager?type=Files',
        filebrowserUploadUrl: `/zap-filemanager/upload?type=Files&_token=${token}`,
        format_tags: 'p;h1;h2;h3;pre'
    };
</script>
<script type="text/javascript">
	CKEDITOR.replace('my-editor', options);
</script>
@endpush