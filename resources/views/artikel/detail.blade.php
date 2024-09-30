@extends('layouts.app')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/extension.css') }}">
@endpush
@section('title', $artikel->title)
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('artikel.index') }}">Artikel</a></li>
                    <li class="breadcrumb-item active">{{ $artikel->title }}</li>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10 articles-box">
                <div class="card box-shadow">
                    <div class="card-body">
                        <div class="container">
                            <div class="heading">
                                <h1>{{ $artikel->title }}</h1>
                                <span>{{ tanggal($artikel->created_at->format('d-m-Y')) }} by {{ $artikel->users->name }}</span>
                                <div class="mt-2">
                                    <a class="btn btn-success btn-md" href="https://api.whatsapp.com/send?text={{urlencode($artikel->title)}}%20{{urlencode(url()->current())}}" rel="noopener" target="_blank"><i class="mdi mdi-whatsapp mdi-sharer"></i></a>
                                    <a class="btn btn-info btn-md" href="https://twitter.com/intent/tweet/?text={{urlencode($artikel->title)}}&amp;url={{urlencode(url()->current())}}" rel="noopener" target="_blank"><i class="mdi mdi-twitter text-white mdi-sharer"></i></a>
                                    <a class="btn btn-primary btn-md" href="https://facebook.com/sharer/sharer.php?u={{urlencode(url()->current())}}" rel="noopener" target="_blank"><i class="mdi mdi-facebook-box mdi-sharer"></i></a>
                                    <a class="btn btn-info btn-md" href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current())}}&amp;title={{urlencode($artikel->title)}}&amp;summary={{urlencode($artikel->title)}}&amp;source={{urlencode(url()->current())}}" rel="noopener" target="_blank"><i class="mdi mdi-linkedin text-white mdi-sharer"></i></a>
                                    <a class="btn btn-danger btn-md" href="https://pinterest.com/pin/create/button/?url={{urlencode(url()->current())}}&amp;media={{urlencode(url()->current())}}&amp;description={{urlencode($artikel->title)}}" rel="noopener" target="_blank"><i class="mdi mdi-pinterest mdi-sharer"></i></a>
                                </div>
                            </div>
                            <hr>
                            <div class="article-thumbnail text-center mb-2">
                                <img src="{{ Storage::url('images/articles/'.$artikel->thumb_image_name) }}" class="img-fluid">
                            </div>
                            <div class="content">
                                {!! $artikel->content  !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection