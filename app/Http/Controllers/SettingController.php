<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.setting');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        //
         $req->validate([
            'WEB_TITLE' => 'required',
            'WEB_LOGO' => 'nullable|mimes:jpg,jpeg,png|max:2040',
            'WEB_LOGO_LIGHT' => 'nullable|mimes:jpg,jpeg,png|max:2040',
            'HEADING_TITLE' => 'required',
            'SUBHEADING_TITLE' => 'required',
            'LANDING_BG_IMG' => 'nullable|mimes:jpg,jpeg,png|max:2040'
        ]);

        $updates = $req->except(['_token','_method']);

        foreach ($updates as $key => $val) {
            if($key == 'WEB_LOGO' || $key == 'WEB_LOGO_LIGHT' || $key == 'LANDING_BG_IMG'){
                if($req->hasFile('WEB_LOGO') || $req->hasFile('WEB_LOGO_LIGHT') || $req->hasFile('LANDING_BG_IMG')){
                    $img = $req->file($key);
                    $setting = Setting::where('key',$key)->first();
                    $imgname_db = $setting->value;
                    $img_name = '';
                    if($req->hasFile('WEB_LOGO') || $req->hasFile('WEB_LOGO_LIGHT')){
                        if($req->hasFile('WEB_LOGO')){
                            $img_name = 'logo-'.time().'.'.$img->extension();
                        }elseif($req->hasFile('WEB_LOGO_LIGHT')){
                            $img_name = 'logo-light-'.time().'.'.$img->extension();
                        }
                        Storage::delete('public/images/logo/'.$imgname_db);
                        $img->storeAs('images/logo',$img_name, 'public');
                    }elseif($req->hasFile('LANDING_BG_IMG')){
                        $img_name = 'landing-bg-'.time().'.'.$img->extension();
                        Storage::delete('public/images/landing/'.$imgname_db);
                        $img->storeAs('images/landing',$img_name, 'public');
                    }
                    $val = $img_name == '' ? $imgname_db : $img_name;
                    if($val != ''){
                        Setting::where('key',$key)->update(['value' => $val]);  
                    }
                }
            }else{
                Setting::where('key',$key)->update(['value' => $val]);
            }
        }

        return redirect()->route('admin.setting.index')->with('success','Berhasil Mengubah Pengaturan!');
    }

}
