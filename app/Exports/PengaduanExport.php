<?php

namespace App\Exports;

use App\Models\Pengaduan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class PengaduanExport implements FromQuery
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($array)
    {
    	$this->array = $array;
    }

    public function query()
    {
        return Pengaduan::query()->whereIn('id',$this->array);
    }
}
