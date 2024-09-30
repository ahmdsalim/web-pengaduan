@extends('layouts.app')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/extension.css') }}">
@endpush
@section('title','Artikel')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm-3 mb-4 search-box">
                <div class="card box-shadow">
                    <div class="card-body">
                        <form action="">
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" name="search" placeholder="Cari..">
                              <div class="input-group-append">
                                <button class="btn btn-info" type="submit"><i class="fa fa-search text-white"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 articles-box">
                <div class="card box-shadow">
                    <div class="card-body">
                        <div class="container-fluid">
                            @forelse($artikel as $no => $a)
                            @if($no > 0)
                            <hr>
                            @endif
                            <div class="article-heading">
                                <h1><a class="article-link" href="{{ route('artikel.show',['slug' => $a->slug]) }}">{{ $a->title }}</a></h1>
                                <span>{{ tanggal($a->created_at->format('d-m-Y')) }} by {{ $a->users->name }}</span>
                            </div>
                            <div class="thumbnail text-center mb-2">
                                <img src="{{ Storage::url('images/articles/'.$a->thumb_image_name) }}" class="img-fluid">
                            </div>
                            <p>{!! substr(strip_tags($a->content), 0, 300) !!}... <a href="{{ route('artikel.show',['slug' => $a->slug]) }}" class="more">Lihat Selengkapnya<i class="mdi mdi-chevron-double-right"></i></a></p>
                            @empty
                            <div class="text-center">
                                <span class="text-muted">Tidak ada artikel yang ditemukan.</span>
                            </div>
                            @endforelse
                        </div>
                        {{ $artikel->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
