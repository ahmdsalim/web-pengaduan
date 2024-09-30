<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    //
    protected $table = 'pengaduan';
    protected $fillable = ['pelapor','usia','isi','pelaku','lokasi_kejadian','tanggal_kejadian','kategori_pelecehan','lampiran'];
}
