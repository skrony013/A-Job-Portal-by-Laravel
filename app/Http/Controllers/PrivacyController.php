<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Privacy;
use App\Models\Setting;
use Session;


class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting_data = Setting::latest('created_at')->first();
        $privacy_list = Privacy::all();

        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        return view('admin/privacy/privacy', compact('setting_data','privacy_list','user_data'));
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
        return view('admin/privacy/add-privacy', compact('setting_data','user_data'));
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
        ]);

        $privacy = new Privacy;
        $privacy->title = $request->input('title');
        $privacy->description = $request->input('description');
        $privacy->save();
        return redirect()->back()->with('status', 'Privacy Info Added Successfully!');
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
        $privacy_data= Privacy::find($id);
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }

        return view('admin/privacy/edit-privacy',compact('setting_data','privacy_data', 'user_data'));
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
       $privacy = Privacy::find($id);
       $privacy->title = $request->input('title');
       $privacy->description = $request->input('description');
       $privacy->update();
       return redirect()->back()->with('status', 'Privacy Policy Info Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $privacy = Privacy::find($id);
        $privacy->delete();
        return redirect()->back()->with('status', 'Privacy Policy Info Deleted Successfully!');
    }
}
