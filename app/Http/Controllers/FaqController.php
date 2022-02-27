<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\FAQ;
use App\Models\Setting;
use Session;

use Illuminate\Support\Facades\File;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting_data = Setting::latest('created_at')->first();
        $faq_list = FAQ::all();

        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        return view('admin/faq/faq', compact('setting_data','faq_list','user_data'));
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
        return view('admin/faq/add-faq', compact('setting_data','user_data'));
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
            'faq'=>'required',
            'img'=>'required',
        ]);

        $faq = new FAQ;
        $faq->title = $request->input('title');
        $faq->faq = $request->input('faq');
         if($request->hasfile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/faq', $filename);
            $faq->img = $filename;
        }
        $faq->save();
        return redirect()->back()->with('status', 'FAQ Info Added Successfully!');
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
        $faq_data= FAQ::find($id);
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }

        return view('admin/faq/edit-faq',compact('setting_data','faq_data', 'user_data'));
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
        $faq = FAQ::find($id);
        $faq->title = $request->input('title');
        $faq->faq = $request->input('faq');

        if($request->hasfile('img')){
            $destination='upload/faq/'.$faq->img;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/faq/', $filename);
            $faq->img = $filename;
        }
        $faq->update();
        return redirect()->back()->with('status', 'FAQ Info Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = FAQ::find($id);

        $dest='upload/faq/'.$faq->img;
        if(File::exists($dest)){
            File::delete($dest);
        }
        $faq->delete();
        return redirect()->back()->with('status', 'FAQ Info Deleted Successfully!');
    }
}
