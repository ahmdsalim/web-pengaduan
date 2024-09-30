<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::count();
        $p = Pengaduan::all();
        $pengaduan = count($p);
        $artikel = Article::count();
        $viewer_count = Article::sum('visitor_counts');

        $jumlah = array();
        $kategori = ['Pujian Bentuk Tubuh','Hinaan Bentuk Tubuh','Kontak Fisik','Sentuhan Area Sensitif','Kekerasan Pada Bagian Tubuh Tertentu','Serangan Seksual'];
        foreach($kategori as $i => $k){
            $jmlh = Pengaduan::where('kategori_pelecehan',$k)->count();
            array_push($jumlah, $jmlh);
        }
        return view('admin.index',compact('user','pengaduan','artikel','viewer_count','jumlah','kategori'));
    }
}
