<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\Pengaduan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengaduanExport;
use PDF;
use Validator;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pengaduan.index');
    }

    public function admin()
    {
        $report = Pengaduan::orderBy('created_at','desc')->get();
        return view('admin.pengaduan.index',compact('report'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        try {
            $validator = Validator::make($req->all(), [
                'pelapor' => 'required|string',
                'usia' => 'required|integer',
                'isi' => 'required',
                'pelaku' => 'required|string',
                'lainnya' => 'nullable|string',
                'lokasi' => 'required',
                'tanggal' => 'required',
                'kategori' => 'required|string',
                'lampiran' => 'nullable|array',
                'g-recaptcha-response' => 'required|recaptcha'
            ],
            [
                'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
                'g-recaptcha-response.required' => 'Please complete the captcha'
            ]
        );

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $pengaduan = new Pengaduan;
            $pengaduan->pelapor = $req->pelapor;
            $pengaduan->usia = $req->usia;
            $pengaduan->isi = $req->isi;
            $pengaduan->pelaku = $req->lainnya == '' ? $req->pelaku : $req->lainnya;
            $pengaduan->lokasi_kejadian = $req->lokasi;
            $pengaduan->tanggal_kejadian = $req->tanggal;
            $pengaduan->kategori_pelecehan = $req->kategori;
            $pengaduan->lampiran = $req->lampiran[0] != null ? json_encode($req->lampiran) : '';
            $pengaduan->save();

            return back()->with('success','Success');
        } catch (\Exception $e) {
            return back()->with('error','Error: '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $pengaduan = Pengaduan::findOrFail($id)->delete();
            return back()->with('success','Berhasil Menghapus Data!');
        } catch (\Exception $e) {
            return back()->with('failed','Terjadi Kesalahan: $e->getMessage()');
        }
    }

    public function export(Request $req)
    {
        try {
            $export_type = $req->export;
            $ids = $req->select;
            if($export_type == 'excel'){
                return (new PengaduanExport($ids))->download(date('d-m-Y').'_'.time().'-PENGADUAN.xlsx');
            }elseif($export_type == 'pdf'){
                $data = Pengaduan::whereIn('id',$ids)->get();

                view()->share('pengaduan',compact('data'));
                $pdf = PDF::loadView('admin.pengaduan.cetak',compact('data'));
                return $pdf->download(date('d-m-Y').'_'.time().'-PENGADUAN.pdf');
                
                // return $pdf->stream();
            }elseif($export_type == 'delete'){
                Pengaduan::whereIn('id',$ids)->delete();

                return back()->with('success','Berhasil Menghapus Data!');
            }  
        } catch (Exception $e) {
            return back()->with('Terjadi Kesalahan: '.$e->getMessage());
        }
        
    }
}
