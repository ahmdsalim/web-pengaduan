@extends('layouts.master')

@push('css')
        <link href="{{ asset('public/assets/plugins/sweet-alert2/sweetalert2.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
        <style type="text/css">
            ul {
                list-style-type: none;
                padding-left: 0;
            }

            table.dataTable.dtr-column.collapsed > tbody > tr.child > td.child > ul.dtr-details .isi {
                white-space: normal;
            }
        </style>
@endpush
@section('title','Kelola Pengaduan')
@section('content')
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Pengaduan</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pengaduan</a></li>
                                    </ol>
  
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-20">
                                    <div class="card-body">
                                        <form action="{{ route('admin.pengaduan.export') }}" method="POST" style="display: contents;" id="form-export">
                                            @csrf
            								<div class="row justify-content-between">
            									<div class="col-md-6">
            										<h4 class="mt-0 header-title">Seluruh Pengaduan</h4>
                                            		<p class="text-muted m-b-30 font-14">Berikut adalah daftar seluruh pengaduan</p>
            									</div>
    	                                        <div class="col-md-6 text-right">
                                                    <span class="header-title h4">Export/Delete | </span>
                                                    <button class="btn btn-success" type="submit" name="export" value="excel" disabled="true"><strong>EXCEL</strong></button>
    	                                            <button class="btn btn-danger" type="submit" name="export" value="pdf" disabled="true"><strong>PDF</strong></button>
                                                    <button class="btn btn-danger" id="del" type="submit" name="export" value="delete" disabled="true"><strong>DELETE</strong></button>
    	                                        </div>
            								</div>
                                            <hr>
                                            @if(session('success'))
                                                <div class="alert alert-success"><b>{{ session('success') }}</b></div>
                                            @endif
                                            @if(session('failed'))
                                                <div class="alert alert-danger"><b>{{ session('failed') }}</b></div>
                                            @endif
                                            <div class="container-fluid table-responsive">
                                                <table id="table" class="table table-hover nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th><input id="c-all" type="checkbox" onclick="cekAll(this)" disabled="true"></th>
                                                            <th>Nama Pelapor</th>
                                                            <th>Usia</th>
                                                            <th>Pelaku</th>
                                                            <th>Kategori Pelecehan</th>
                                                            <th>Tanggal Kejadian</th>
                                                            <th>Isi</th>
                                                            <th>Lokasi Kejadian</th>
                                                            <th>Lampiran</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($report as $r)
                                                        <tr>
                                                            <td></td>
                                                            <td><input class="check" type="checkbox" name="select[]" value="{{$r->id}}" onclick="event.stopPropagation();" disabled="true"></td>
                                                            <td>{{ $r->pelapor }}</td>
                                                            <td>{{ $r->usia }}</td>
                                                            <td>{{ $r->pelaku }}</td>
                                                            <td>{{ $r->kategori_pelecehan }}</td>
                                                            <td>{{ Carbon\Carbon::parse($r->tanggal_kejadian)->format('d-m-Y') }}</td>
                                                            <td><ul class="isi">
                                                                <li>{{ $r->isi }}</li>
                                                            </ul></td>
                                                            <td>{{ $r->lokasi_kejadian }}</td>
                                                            <td>
                                                                @php $l=json_decode($r->lampiran, true);@endphp
                                                                <ul>
                                                                @if($r->lampiran != '')
                                                                    @foreach($l as $i => $link)
                                                                    <li><a href="{{ $link }}">Link {{$i+=1}}</a></li>
                                                                    @endforeach
                                                                @else
                                                                    <li>-</li>
                                                                @endif
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-danger btn-destroy" href="{{route('admin.pengaduan.destroy',$r->id)}}"><i class="mdi mdi-delete-forever"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('public/js/main.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $('input[type=checkbox]').prop('disabled',false);
		$('#table').DataTable( {
                responsive: {
                    details: {
                        type: 'column',
                        target: 'tr'
                    }
                },
                columnDefs: [ {
                    className: 'control',
                    orderable: false,
                    targets:   0
                },
                {
                    orderable: false,
                    targets: 1
                } ]
            } );
	})

    function cekAll(el) {
        let inputs = document.querySelectorAll('.check');
        if(el.checked){
            var countcb = 0;
            for(var i = 0; i < inputs.length; i++){
                inputs[i].checked = true;
                countcb++;
            }
            if(countcb > 0){
                $(':input[type=submit]').prop('disabled',false);
            }
        }else{
            for(var i = 0; i < inputs.length; i++){
                inputs[i].checked = false;
            }
            $(':input[type=submit]').prop('disabled',true);
        }
    }

    $('.check').change(function(){
        let inputs = document.querySelectorAll('.check');
        let a = 0;
        for (var i = 0; i < inputs.length; i++) {
            if(inputs[i].checked == true){
                a+=1;
            }
        }
        if(a > 0){
            $(':input[type=submit]').prop('disabled',false);
        }else{
            $(':input[type=submit]').prop('disabled',true);
            $('#c-all').prop('checked',false);
            console.log('trumin')
        }
    })

    $('.btn-destroy').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        let btn = $(this);
        let url = btn.attr('href');
        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: "Apakah anda yakin ingin menghapus?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#7a6fbe',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Dihapus!',
                    'Berhasil menghapus data.',
                    'success'
                );
                window.location.href = url;
            }
        })
    })

    var lots = false;
    $('#del').click(function(e) {
        if(lots){
            $(this).parent().parent().parent('form').submit();
        }else{
            e.preventDefault();
            e.stopPropagation();
            let btn = $(this);
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: "Apakah anda yakin ingin menghapus?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#7a6fbe',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Dihapus!',
                        'Berhasil menghapus data.',
                        'success'
                    );
                    lots = true;
                    btn.trigger('click');
                }
            })
        }
    })
</script>
@endpush