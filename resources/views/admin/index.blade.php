@extends('layouts.master')

@push('css')
<link rel="stylesheet" href="{{ asset('public/assets/plugins/morris/morris.css')}}">
@endpush
@section('title', 'Dashboard')
@section('content')
            <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">
                                            Hello {{ Auth::user()->name }}, Welcome to Zona Aman Perempuan
                                        </li>
                                    </ol>
                                    @if(session('success'))
                                        <div class="alert alert-success mt-2"><b>{{ session('success') }}</b></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="mdi mdi-account float-right"></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3">Total Pengguna</h6>
                                                <h4 class="mb-4">{{$user}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="fa fa-volume-up float-right"></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3">Total Pengaduan</h6>
                                                <h4 class="mb-4">{{$pengaduan}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="fa fa-newspaper float-right"></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3">Total Artikel</h6>
                                                <h4 class="mb-4">{{$artikel}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card mini-stat bg-primary">
                                        <div class="card-body mini-stat-img">
                                            <div class="mini-stat-icon">
                                                <i class="fa fa-chart-bar float-right"></i>
                                            </div>
                                            <div class="text-white">
                                                <h6 class="text-uppercase mb-3">Views Artikel</h6>
                                                <h4 class="mb-4">{{$viewer_count}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row" id="chart-row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h4 class="header-title font-weight-bold">Persentase Kategori Pelecehan</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="canvas-holder">
                                                <canvas id="chart-area"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div> <!-- container-fluid -->
@endsection

@push('scripts')
        <script src="{{ asset('public/assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{ asset('public/assets/plugins/raphael/raphael-min.js')}}"></script>

        <script type="text/javascript" src="{{asset('public/assets/plugins/chart.js/Chart.min.js')}}"></script>
        <script type="text/javascript" defer>
            var config = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: {{json_encode($jumlah)}},
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(122, 111, 190, 0.2)',
                            'rgba(56, 193, 114, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(122, 111, 190, 0.2)',
                            'rgba(56, 193, 114, 0.2)'
                        ],
                        label: 'Persentase Kategori Pelecehan'
                    }],
                    labels: @php echo json_encode($kategori); @endphp
                },
                options: {
                    responsive: true
                }
            };

            window.onload = () => {
                var ctx = document.getElementById('chart-area').getContext('2d');
                window.myPie = new Chart(ctx, config);
            }
        </script>
@endpush