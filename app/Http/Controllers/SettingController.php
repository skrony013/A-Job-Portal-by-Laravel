<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Setting;
use Session;

use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        $setting_data = Setting::latest('created_at')->first();
        return view('admin/setting/setting', compact('user_data','setting_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        $setting_data = Setting::latest('created_at')->first();
        return view('admin/setting/add-setting', compact('user_data','setting_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $setting = new Setting;
        $setting->site_name = $request->input('site_name');
        $setting->site_tagline = $request->input('site_tagline');
        $setting->site_desc = $request->input('site_desc');

        if($request->hasfile('site_logo')){
            $file = $request->file('site_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/setting', $filename);
            $setting->site_logo = $filename;
        }
        
        if($request->hasfile('footer_logo')){
            $file = $request->file('footer_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/setting', $filename);
            $setting->footer_logo = $filename;
        }

        if($request->hasfile('site_favicon')){
            $file = $request->file('site_favicon');
            $extension_fav = $file->getClientOriginalExtension();
            $filename_fav = time().'.'.$extension_fav;
            $file->move('upload/setting', $filename_fav);
            $setting->site_favicon = $filename_fav;
        }

        $setting->facebook = $request->input('facebook');
        $setting->twitter = $request->input('twitter');
        $setting->instagram = $request->input('instagram');
        $setting->linkedin = $request->input('linkedin');
        $setting->address = $request->input('address');
        $setting->email = $request->input('email');
        $setting->phone = $request->input('phone');

       

        $setting->save();
        return redirect()->back()->with('status', 'Setting Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        $setting_data= Setting::find($id);
        return view('admin/setting/edit-setting', compact('user_data','setting_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $setting = Setting::first();
        $setting->site_name = $request->input('site_name');
        $setting->site_tagline = $request->input('site_tagline');
        $setting->site_desc = $request->input('site_desc');

        if($request->hasfile('site_logo')){
            $destination='upload/setting/'.$setting->site_logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('site_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/setting/', $filename);
            $setting->site_logo = $filename;
        }

        if($request->hasfile('footer_logo')){
            $destination='upload/setting/'.$setting->footer_logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('footer_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/setting/', $filename);
            $setting->footer_logo = $filename;
        }


        if($request->hasfile('site_favicon')){
            $destination='upload/setting/'.$setting->site_favicon;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('site_favicon');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/setting/', $filename);
            $setting->site_favicon = $filename;
        }

        $setting->facebook = $request->input('facebook');
        $setting->twitter = $request->input('twitter');
        $setting->instagram = $request->input('instagram');
        $setting->linkedin = $request->input('linkedin');
        $setting->address = $request->input('address');
        $setting->email = $request->input('email');
        $setting->phone = $request->input('phone');

        $setting->update();
        return redirect()->back()->with('status', 'Setting Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $destination='upload/setting/'.$setting->site_logo;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $destination_1='upload/setting/'.$setting->footer_logo;
        if(File::exists($destination_1)){
            File::delete($destination_1);
        }
        $dest='upload/setting/'.$setting->site_favicon;
        if(File::exists($dest)){
            File::delete($dest);
        }
        $setting->delete();
        return redirect()->back()->with('status', 'Setting Deleted Successfully!');
    }
}
