<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Str;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('name', 'asc')->get();
        $isSuper = false;
        Auth::user()->id_role == 1 ? $isSuper = true : '';
        return view('admin.users.index', compact('users','isSuper'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->id_role = 2;
        $user->save();

        return back()->with('success','Berhasil menambah data pengguna $req->name');
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
        $user = User::findOrFail($id);

        return view('admin.users.edit',compact('user'));
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|string|min:8',
            'photo' => 'nullable|mimes:jpg,jpeg,png|max:2040'
        ]);

        $user = User::findOrFail($id);

        if ($user->email != $req->email) {
            $this->validate($req,[
                'email' => 'required|email|unique:users',
            ]);    
        }

        $user->name = $req->name;
        $user->email = $req->email;
        !empty($req->password) ? $user->password = Hash::make($req->password) : '';

        $user->save();

        return redirect()->route('admin.users.index')->with('success','Berhasil Mengupdate Data Pengguna');
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
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success','Berhasil Menghapus Data Pengguna!');
    }

    public function editPass()
    {
        return view('admin.users.change');
    }

    public function changePassword(Request $req, $id)
    {
        $req->validate([
            'password' => 'required|min:8'
        ]);

        $user = User::findOrFail(decrypting($id));
        $user->password = Hash::make($req->password);
        $user->save();

        return redirect()->route('home')->with('success','Berhasil Merubah Password!');
    }
}
