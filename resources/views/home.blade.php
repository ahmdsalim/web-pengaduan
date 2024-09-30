@extends('layouts.app')
@push('styles')
<style type="text/css">
    .carousel-content {
        align-items: center;
        padding: 10px 20%;
    }
    .bg-svg{
        background-image: url('{{asset('public/assets/images/bg-svg.svg')}}');
        background-size: cover;
        background-attachment: fixed;
    }
</style>
@endpush
@section('content')
<section class="hero" style="background-image: linear-gradient(to bottom right, rgba(150, 0, 255, 0.9), rgba(174, 186, 248, 0.9)), url('{{ Storage::url('/images/landing/'.config('web_config')['LANDING_BG_IMG']) }}')">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="hero-text text-center">
                    <div class="text-title font-weight-bold heading-title">{{config('web_config')['HEADING_TITLE']}}</div>
                    <p class="lead subheading-title">{{config('web_config')['SUBHEADING_TITLE']}}</p>
                    <a class="btn-pengaduan box-shadow" href="#layanan-pengaduan"><strong>PENGADUAN</strong></a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="associate container-fluid py-2 bg-white">
    <div class="text-right">
        <span><b>Berasosiasi dengan: </b></span><img src="{{ asset('public/assets/images/supported-logo.png') }}" alt="Logo">
    </div>
</div>

<section id="layanan-pengaduan">
  <div class="container">
    <div class="section-header text-center">
        <h2 class="font-weight-bold mb-4 ">Layanan Pengaduan</h2>
        <div class="divider mx-auto"></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-5 mb-4">
            <a href="#bantuan-hukum">
              <img class="card-img-top" src="{{ asset('public/assets/images/ilustrasi-bantuan-hukum.svg') }}" alt="Ilustrasi Bantuan Hukum">
              <div class="text-center text-dark font-weight-bold h3">Bantuan Hukum</div>
            </a>
        </div>
        <div class="col-sm-5">
            <a href="#konseling">
              <img class="card-img-top" src="{{ asset('public/assets/images/ilustrasi-konseling.svg') }}" alt="Ilustrasi Bantuan Hukum">
              <div class="text-center text-dark font-weight-bold h3">Konseling</div>
            </a>
        </div>
    </div>
  </div>
</section>

<section id="bantuan-hukum" class="bantuan-hukum">
  <div class="container">
    <div class="section-header">
        <h2 class="font-weight-bold mb-4 ">Bantuan Hukum</h2>
        <div class="divider"></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-4 mb-4">
            <img class="img-fluid" src="{{ asset('public/assets/images/ilustrasi-bantuan-hukum.svg') }}" alt="Ilustrasi Bantuan Hukum">
        </div>
        <div class="col-sm-8">
            <div class="container py-4 px-3 text-justify">
                <p>Lembaga Bantuan Hukum (LBH) di dalam organisasi profesi hukum dan undang-undang memiliki harapan untuk mencegah terjadinya hal negatif yang dapat merugikan masyarakat pengguna jasa hukum, dengan cara meminimalkan dalam praktik penegakan hukum sehari-hari. Merupakan lembaga non profit yang didirikan guna memberikan pelayanan bantuan hukum secara gratis kepada masyarakat yang membutuhkan bantuan hukum. Selanjutnya Zona Aman Perempuan akan bekerjasama dalam menyampaikan laporan aduan yang telah diperoleh kepada lembaga bantuan hukum.</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-end mt-2 mr-2">
      <div class="col-sm-2">
        <a class="btn btn-info btn-lg text-white float-right" href="{{route('pengaduan.index')}}">Pengaduan</a>
      </div>
    </div>
  </div>
</section>

<section id="konseling">
  <div class="container">
    <div class="section-header">
        <h2 class="font-weight-bold mb-4">Konseling</h2>
        <div class="divider"></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-sm-8 mb-4">
            <div class="container py-4 px-3 text-justify">
                <p>Layanan konseling atau penyuluhan merupakan proses pemberian bantuan yang dilakukan oleh seorang ahli, kepada seseorang yang mengalami suatu permasalahan berkaitan dengan pelecehan seksual.  Konseling terhadap perempuan korban pelecehan dilakukan secara online dengan memperhatikan kebutuhan dari para klien. Zona Aman Perempuan berkolaborasi dengan sejumlah lembaga yang akan melakukan pendampingan secara langsung dengan korban untuk proses selanjutnya.</p>
            </div>
        </div>
        <div class="col-sm-4">
            <img class="img-fluid" src="{{ asset('public/assets/images/ilustrasi-konseling.svg') }}" alt="Ilustrasi Konseling">
        </div>
    </div>
    <div class="row mt-3 ml-2">
      <div class="col-sm-2">
        <a class="btn btn-info btn-lg text-white" href="">Pengaduan</a>
      </div>
    </div>
  </div>
</section>

<section id="quotes" class="bg-svg">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
              <ol class="carousel-indicators">
                @forelse($quotes as $no => $q)
                <li data-target="#myCarousel" data-slide-to="{{$no}}" @if($no == 0) class="active" @endif></li>
                @empty
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                @endforelse
              </ol>
                  <div class="carousel-inner">
                    @forelse($quotes as $no => $q)
                    <div class="carousel-item @if($no == 0) active @endif">
                      <div class="carousel-content">
                          <div class="text-justify text-center text-white">
                              <blockquote class="blockquote mb-4">"{{$q->quote}}"</blockquote>
                              <h3 class="blockquote-footer text-white">{{$q->name}}</h3>
                          </div>
                      </div>
                    </div>
                    @empty
                    <div class="carousel-item active">
                      <div class="carousel-content">
                          <div class="text-center text-white">
                              <blockquote class="blockquote mb-4" style="font-size: 1.7em;">"This is Quotes"</blockquote>
                              <h3 class="blockquote-footer text-white" style="font-size: 1.4rem;">Name</h3>
                          </div>
                      </div>
                    </div>
                    @endforelse
                  </div>
                  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
        </div>
    </div>
</section>

<section id="artikel">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="font-weight-bold mb-4">Artikel</h2>
            <div class="divider mx-auto"></div>
        </div>
        <div class="row @if(count($artikel) == 1) justify-content-center @endif">
          @forelse($artikel as $a)
            <div class="col-md-4 mb-2">
                <div class="card box-shadow">
                    <img class="thumbnail-img" src="{{ Storage::url('images/articles/'.$a->thumb_image_name) }}" alt="{{ $a->title }}" class="card-img-top card-fluid">
                    <div class="card-body">
                        <h3 class="card-title"><a class="article-link" href="{{ route('artikel.show',['slug' => $a->slug]) }}">{{ $a->title }}</a></h3>
                        <p class="card-description">{!! substr(strip_tags($a->content), 0, 200) !!}... <a class="more" href="{{ route('artikel.show',['slug' => $a->slug]) }}">Lihat Selengkapnya<i class="mdi mdi-chevron-double-right"></i></a></p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
              <div class="card box-shadow">
                <div class="card-body">
                  <div class="text-center">
                    Tidak ada artikel yang ditemukan.
                  </div>
                </div>
              </div>
            </div>
            @endforelse
        </div>
        <div class="text-right mt-3">
            <a class="more" href="{{ route('artikel.index') }}">Lihat Semua Artikel <i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<section class="support">
  <div class="container">
    <div class="supported-header mb-5">
        <h2 class="font-weight-bold  text-center">Supported by</h2>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col-12">
            <img src="{{ asset('public/assets/images/supported-logo.png') }}" width="150" height="150">
        </div>
    </div>
  </div>
</section>
@endsection
