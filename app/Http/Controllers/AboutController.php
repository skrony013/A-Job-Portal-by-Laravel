<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\About;
use App\Models\Setting;
use Session;



use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $setting_data = Setting::latest('created_at')->first();
        $about_list = About::all();
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        return view('admin/about/about', compact('setting_data','about_list','user_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting_data = Setting::latest('created_at')->first();
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        return view('admin/about/add-about-info', compact('setting_data','user_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'about_img'=>'required',
        ]);

        $about = new About;
        $about->title = $request->input('title');
        $about->description = $request->input('description');
         if($request->hasfile('about_img')){
            $file = $request->file('about_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/about', $filename);
            $about->about_img = $filename;
        }
        $about->save();
        return redirect()->back()->with('status', 'About Info Added Successfully!');
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
        $setting_data = Setting::latest('created_at')->first();
        $about_data= About::find($id);
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }

        return view('admin/about/edit-about-info',compact('setting_data','about_data', 'user_data'));
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
        $about = About::find($id);
        $about->title = $request->input('title');
        $about->description = $request->input('description');

        if($request->hasfile('about_img')){
            $destination='upload/about/'.$about->about_img;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('about_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/about/', $filename);
            $about->about_img = $filename;
        }
        $about->update();
        return redirect()->back()->with('status', 'About Info Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);

        $dest='upload/about/'.$about->about_img;
        if(File::exists($dest)){
            File::delete($dest);
        }
        $about->delete();
        return redirect()->back()->with('status', 'About Info Deleted Successfully!');
    }
}
