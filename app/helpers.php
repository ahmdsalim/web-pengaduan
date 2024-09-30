<?php

	function tanggal($tgl)
	{
		$day = Carbon\Carbon::parse($tgl)->format('D');

		$month = array(
			1 => 'Januari',
			2 => 'Febuari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember'
		);

		switch ($day) {
			case 'Sun':
				$d = 'Minggu';	
			break;

			case 'Mon':
				$d = 'Senin';	
			break;

			case 'Tue':
				$d = 'Selasa';	
			break;

			case 'Wed':
				$d = 'Rabu';	
			break;

			case 'Thu':
				$d = 'Kamis';	
			break;

			case 'Fri':
				$d = 'Jumat';	
			break;

			case 'Sat':
				$d = 'Sabtu';
			break;
			
			default:
				$d = 'Undefined';
			break;
		}

		$explode = explode('-', $tgl);
		$date = $explode[0] < 10 ? str_replace('0', '', $explode[0]) : $explode[0];

		return $d.', '.$date.' '.$month[(int)$explode[1]].' '.$explode[2];
	}

	function encrypting($s) {
	    $qEncoded = base64_encode($s);
	    return $qEncoded;
	}
	 
	function decrypting($s) {
	    $qDecoded  = base64_decode($s);
	    return $qDecoded;
	}
?>