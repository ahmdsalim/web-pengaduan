<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotes;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quotes = Quotes::orderBy('id','asc')->get();

        return view('admin.quotes.index',compact('quotes'));
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
        $req->validate([
            'quote' => 'required',
            'name' => 'required'
        ]);

        Quotes::create([
            'quote' => $req->quote,
            'name' => $req->name
        ]);

        return back()->with('success','Berhasil Menambahkan Quotes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $quote = Quotes::findOrFail($id);

        return view('admin.quotes.edit',compact('quote'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $req->validate([
            'quote' => 'required',
            'name' => 'required'
        ]);

        Quotes::findOrFail($id)->update([
            'quote' => $req->quote,
            'name' => $req->name
        ]);

        return redirect()->route('admin.quotes.index')->with('success','Berhasil Mengupdate Quotes');
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
            Quotes::destroy($id);

            return back()->with('success', 'Berhasil Menghapus Quotes');
        } catch (\Exception $e) {
            return back()->with('failed', 'Terjadi kesalahan: '.$e->getMessage());
        }
    }
}
