@extends('layouts.app')
@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('public/css/extension.css') }}">
<style type="text/css">
    .bg-svg{
        background-image: url('{{asset('public/assets/images/bg-svg.svg')}}');
    }
    .promise-text {
        font-family: Arial, sans-serif;
    }
</style>
@endpush
@section('title','Formulir Pengaduan')
@section('content')
    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            @if(session('success'))
            <div class="col-sm-8 mt-5">
                <div class="card box-shadow">
                    <div class="card-body text-center">
                        <i class="fa fa-check-circle text-success" style="font-size: 2.5rem;"></i>
                        <hr>
                        <h4>Berhasil Mengirim Data</h4>
                        <p>Data pengaduan Anda telah tersimpan.</p>
                    </div>
                </div>
            </div>
            @else
            <div class="col-sm-8 form-pengaduan">
                <div class="container bg-svg my-2 shadow-sm">
                    <h2 class="text-white py-3 px-2">Formulir Pengaduan</h2>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                <div class="card box-shadow">
                    <div class="card-body">
                        <form action="{{ route('pengaduan.store') }}"  method="POST" enctype="multipart/form-data" class="py-2 px-2">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label>Nama Pelapor<sup class="text-danger">*</sup></label>
                                <input class="form-control @error('pelapor') is-invalid @enderror" type="text" name="pelapor" required="true">
                                @error('pelapor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Usia<sup class="text-danger">*</sup></label>
                                <input class="form-control @error('usia') is-invalid @enderror" type="number" name="usia" required="true">
                                @error('usia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Isi<sup class="text-danger">*</sup></label>
                                <textarea class="form-control @error('isi') is-invalid @enderror" rows="3" name="isi" required="true"></textarea>
                                @error('isi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pelaku<sup class="text-danger">*</sup></label>
                                <select class="form-control @error('pelaku') is-invalid @enderror" name="pelaku" id="pelaku" onchange="change(this.value)" required="true">
                                    <option value="">Pilih</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Kerabat">Kerabat</option>
                                    <option value="Tetangga">Tetangga</option>
                                    <option value="Orang Tidak Dikenal">Orang Tidak Dikenal</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>   
                                <input class="form-control d-none" type="text" name="lainnya" id="lainnya">
                                @error('pelaku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Lokasi Kejadian<sup class="text-danger">*</sup></label>
                                <input class="form-control @error('lokasi') is-invalid @enderror" type="text" name="lokasi" required="true">
                                @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kejadian<sup class="text-danger">*</sup></label>
                                <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal" required="true">
                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori Pelecehan<sup class="text-danger">*</sup></label>
                                <select class="form-control @error('kategori') is-invalid @enderror" name="kategori" required="true">
                                    <option value="">Pilih</option>
                                    <option value="Pujian Bentuk Tubuh">Pujian Bentuk Tubuh</option>
                                    <option value="Hinaan Bentuk Tubuh">Hinaan Bentuk Tubuh</option>
                                    <option value="Kontak Fisik">Kontak Fisik</option>
                                    <option value="Sentuhan Area Sensitif">Sentuhan Area Sensitif</option>
                                    <option value="Kekerasan Pada Bagian Tubuh Tertentu">Kekerasan Pada Bagian Tubuh Tertentu</option>
                                    <option value="Serangan Seksual">Serangan Seksual</option>
                                </select>
                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Lampiran Bukti</label>
                                <div class="input-group">
                                    <input class="form-control @error('lampiran') is-invalid @enderror" type="text" name="lampiran[]" id="lampiran">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" id="add-btn" onclick="addInput()">
                                            <i class="fa fa-plus text-white"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="body-append"></div>
                                <span class="text-muted"> Data lampiran berupa link video/foto.</span>
                                @error('lampiran')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <hr class="my-3">
                            @if(config('services.recaptcha.key'))
                            <div class="g-recaptcha @error('g-recaptcha-response') is-invalid @enderror" data-sitekey="{{config('services.recaptcha.key')}}" data-callback="enableBtn"></div>
                                @error('g-recaptcha-response')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @endif
                            <div class="form-group mt-2">
                                <input type="checkbox" id="check" onclick="checking()"><span class="promise-text text-justify"> Dengan ini saya menyatakan bahwa data yang saya isi adalah sejujur-jujurnya dan dapat dipertanggungjawabkan.</span>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success btn-lg btn-block" type="submit" id="btn-submit" disabled="true">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('public/assets/js/jquery.min.js')}}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
        function change(selected) {
            let other = $('#lainnya')
            if(selected == 'Lainnya'){
                other.removeClass('d-none')
                other.attr('required',true)
                other.val('')
            }else{
                other.attr('required',false)
                if(!other.hasClass('d-none')){
                    other.addClass('d-none')
                }
            }
        }

        function checking(){
            let check = $('#check')
            let btn = $('#btn-submit')
            if(check.prop('checked')){
                btn.prop('disabled',false)
            }else{
                btn.prop('disabled',true)
            }
        }

        function enableBtn() {
            $('#check').prop('checked',true)
            $('#btn-submit').prop('disabled',false)
        }

        var countInput = 0;
        function cInput(count){
            if(count > 0){
                $('#lampiran').attr('required',true)
            }else{
                $('#lampiran').attr('required',false)
            }
        }
        function addInput(){
            countInput+=1;
            $('#body-append').append(`<div class="input-group mt-2">
                                    <input class="form-control" type="text" name="lampiran[]">
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" type="button" id="delete-btn" onclick="deleteInput(this)" required>
                                            <i class="fa fa-minus text-white"></i>
                                        </button>
                                    </div>
                                </div>`)
            cInput(this.countInput)
        }

        function deleteInput(el){
            countInput-=1;
            $(el).parent().parent().remove()
            cInput(this.countInput);
        }
    </script>
@endpush