<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN PENGADUAN - Zona Aman Perempuan</title>
    <link rel="stylesheet" type="text/css" href="@php echo public_path('css/app.css'); @endphp">
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            background-color: white;
        }

        h2 {
            font-family: Arial;
        }

        li {
            list-style-type: none;
        }

        /*table{
            border-collapse: collapse; 
            width: 700px;
        }

        table tbody tr td{
            text-align: center;
        }

        th{
            width:100%;
            position:fixed;
            height:40px;
            background-color : #d3d3d3;
        }*/
    </style>
</head>
<body> 

	<center>
		<h4>LAPORAN PENGADUAN</h4>
	</center>
    <hr>
	<table class="table table-bordered" style="width: 100%;">
		<thead>
			<tr>
                <th>No</th>
                <th>Nama Pelapor</th>
                <th>Usia</th>
                <th style="width: 100px;">Isi</th>
                <th>Pelaku</th>
                <th>Lokasi Kejadian</th>
                <th>Tanggal Kejadian</th>
                <th>Kategori Pelecehan</th>
                <th>Lampiran</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $key => $r)
			<tr>
                <td>{{$key+=1}}</td>
                <td>{{$r->pelapor}}</td>
                <td>{{$r->usia}}</td>
                <td>{{$r->isi}}</td>
                <td>{{$r->pelaku}}</td>
                <td>{{$r->lokasi_kejadian}}</td>
                <td>{{ Carbon\Carbon::parse($r->tanggal_kejadian)->format('d-m-Y') }}</td>
                <td>{{$r->kategori_pelecehan}}</td>
                <td>
                    @php $l=json_decode($r->lampiran, true);@endphp
                        @if($r->lampiran != '')
                            @foreach($l as $i => $link)
                            <li><a href="{{ $link }}">Lampiran {{$key}}</a></li>
                            @endforeach
                        @else
                            <li>-</li>
                        @endif
                </td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>