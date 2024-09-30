<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\Article;
use Auth;
use Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $artikel = Article::with('users')->orderBy('status','asc')->get();

        return view('admin.artikel.index',compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        try {
            $article = Article::create([
                'title' => '',
                'slug' => '',
                'author_id' => Auth::user()->id,
                'thumb_image_name' => 'default.jpg',
                'content' => '',
                'visitor_counts' => 0,
                'status' => 'draft'
            ]);

            return redirect()->route('admin.artikel.edit',$article->id);
        } catch (\Exception $e) {
            return back()->with('failed','Terjadi Kesalahan: '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        try {
            $artikel = Article::with('users')->where([['slug',$slug],['status','publish']])->first();
            $artikel->visitor_counts += 1;
            $artikel->save();

            return view('artikel.detail',compact('artikel'));
        } catch (\Exception $e) {
            abort(500,$e->getMessage());
        }
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
        try {
            $artikel = Article::findOrFail($id);

            return view('admin.artikel.edit',compact('artikel'));
        } catch (\Exception $e) {
            return back()->with('Terjadi Kesalahan: '.$e->getMessage());
        }
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
        try {
            
            $req->validate([
                'title' => 'required',
                'thumb_image' => 'nullable|mimes:jpg,jpeg,png,webp|max:2040'
            ]);

            $thumb_name = '';
            $artikel = Article::findOrFail($id);

            if($req->hasFile('thumb_image')){
                $thumb = $req->file('thumb_image');

                $gambar_name = '';
                $pdf_name = '';
                // if($request->file('img','filepdf')){
	               //  $gambar_ext = $request->file('img')->extension();
	               //  $pdf_ext = $request->file('filepdf')->extension();

	               //  $gambar_name = $request->judulbuku.'.'.now()->timestamp.'.'.$gambar_ext;

	               //  $pdf_name = $request->judulbuku.'.'.now()->timestamp.'.'.$pdf_ext;
	               //  $request->file('img')->storeAs('gambar',$gambar_name,'public');
	               //  $request->file('filepdf')->storeAs('file',$pdf_name,'public');

	               //  echo $gambar_name;
                // }

                // $request['img'] = $gambar_name;
                // $request['filepdf'] = $pdf_name;
                // $buku = Buku::create($request->all());

                $thumb_ext = $thumb->extension();
                $thumb_name = $artikel->slug.'.'.$thumb_ext;
                Storage::delete('public/images/articles/'.$artikel->thumb_image_name);
                $thumb->storeAs('/images/articles',$thumb_name,'public');
            }

            $artikel->title = $req->title;
            $artikel->slug = Str::slug($req->title);
            if($thumb_name != ''){
                $artikel->thumb_image_name = $thumb_name;
            }
            $artikel->content = $req->content != null ? $req->content : '';
            $artikel->save();

            return back()->with('success','Berhasil Menyimpan Artikel!');
        } catch (\Exception $e) {
            return back()->with('failed','Terjadi Kesalahan: '.$e->getMessage());
        }
    }

    public function publish($id)
    {
        try {
            $artikel = Article::findOrFail($id);
            $artikel->status = 'publish';
            $artikel->save();

            return redirect()->route('admin.artikel.index')->with('success','Artikel berhasil dipublish!');
        } catch (\Exception $e) {
            return back()->with('failed','Terjadi Kesalahan: '.$e->getMessage());
        }
    }

    public function drafted($id)
    {
        try {
            $artikel = Article::findOrFail($id);
            $artikel->status = 'draft';
            $artikel->save();

            return redirect()->route('admin.artikel.index')->with('success','Artikel berhasil dijadikan draft!');
        } catch (\Exception $e) {
            return back()->with('failed','Terjadi Kesalahan: '.$e->getMessage());            
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
            $artikel = Article::findOrFail($id);
            Storage::delete('public/images/articles/'.$artikel->thumb_image_name);
            $artikel->delete();

            return back()->with('success','Berhasil Menghapus Artikel!');
        } catch (\Exception $e) {
            return back()->with('failed','Terjadi Kesalahan: '.$e->getMessage());
        }
    }

    public function articles(Request $req)
    {
        $search = $req->get('search');
        $artikel = Article::with('users')->where([['title','LIKE', "%$search%"],['status','publish']])->orderBy('created_at','desc')->paginate(5);
        $artikel->appends(['search'=>$search]);

        return view('artikel.index', compact('artikel'));
    }

    public function pratinjau($id)
    {
        //
        try {
            $artikel = Article::with('users')->where('id',$id)->first();

            return view('admin.artikel.pratinjau',compact('artikel'));
        } catch (\Exception $e) {
            abort(500,$e->getMessage());
        }
    }

}
