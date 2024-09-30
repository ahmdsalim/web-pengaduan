@extends('layouts.app')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/extension.css') }}">
@endpush
@section('title', 'Profil Kami')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-10 articles-box">
                <div class="card box-shadow">
                    <div class="card-body">
                        <div class="container">
                            <div class="section-header text-center">
                                <h2 class="font-weight-bold mb-2">Profil Kami</h2>
                                <div class="divider mx-auto"></div>
                            </div>
                            <p>Berangkat dari maraknya kasus pelecehan seksual yang disuarakan melalui thread di Twitter, kami Tim PKM Zona Aman Perempuan tergerak untuk menciptakan website berbasis pengaduan pelecehan seksual yang ditujukan bagi korban, orang-orang terdekat maupun saksi mata untuk mengisi kolom pengaduan pelecehan seksual.</p>
                            <p class="mt-2 mb-2">Menurut kami, fenomena thread pelecehan seksual lahir atas keterbatasan ruang pengaduan bagi para perempuan korban pelecehan seksual ke pihak berwajib. Sehingga, Twitter menjadi jalan pintas untuk memberi hukum sosial kepada pelaku. Tak hanya itu, para korban juga butuh didengarkan dan diberi dukungan agar cepat pulih kembali.</p>
                            <p class="mb-4">Terkait itu, Zona Aman Perempuan menyediakan kolom pengaduan serta konseling bagi para korba pelecehan seksual, tidak perlu khawatir untuk mengisi formulir yang kami sediakan karena kami bekerja sama dengan Komnas Perempuan untuk segala tindak lanjut.</p>
                            <p class="text-right"><strong>-Elvita, Harista, Khotifah, Arin, Febbi-</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection