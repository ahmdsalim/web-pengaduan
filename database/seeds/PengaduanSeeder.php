<?php

use Illuminate\Database\Seeder;
use App\Models\Pengaduan;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 4; $i++) { 
        	Pengaduan::create([
	        	'pelapor' => 'Test'.$i,
	        	'usia' => 24+$i,
	        	'isi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
	        	'pelaku' => 'Tetangga',
	        	'lokasi_kejadian' => 'Tidak Diketahui',
	        	'tanggal_kejadian' => date('Y-m-d'),
	        	'kategori_pelecehan' => 'Kontak Fisik',
	        	'lampiran' => ''
	        ]);
        }
    }
}
