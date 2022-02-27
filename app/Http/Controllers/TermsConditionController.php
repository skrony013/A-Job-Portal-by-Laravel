<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TermsCondition;
use App\Models\Setting;
use Session;



use Illuminate\Support\Facades\File;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting_data = Setting::latest('created_at')->first();
        $terms_condition_list = TermsCondition::all();

        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        return view('admin/terms-condition/terms-condition', compact('setting_data','terms_condition_list','user_data'));
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
        return view('admin/terms-condition/add-terms-condition', compact('setting_data','user_data'));
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

        $terms_condition = new TermsCondition;
        $terms_condition->title = $request->input('title');
        $terms_condition->description = $request->input('description');
        $terms_condition->save();
        return redirect()->back()->with('status', 'Terms & Condition Info Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        $terms_condition_data= TermsCondition::find($id);
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }

        return view('admin/terms-condition/edit-terms-condition',compact('setting_data','terms_condition_data', 'user_data'));
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
        $terms_condition = TermsCondition::find($id);
        $terms_condition->title = $request->input('title');
        $terms_condition->description = $request->input('description');
        $terms_condition->update();
        return redirect()->back()->with('status', 'Terms & Condition Info Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terms_condition = TermsCondition::find($id);
        $terms_condition->delete();
        return redirect()->back()->with('status', 'Terms & Condition Info Deleted Successfully!');
    }
}
