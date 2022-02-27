<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Job;
use App\Models\Setting;
use Session;

use Illuminate\Support\Facades\File;



class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting_data = Setting::latest('created_at')->first();
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }

        $job_list = Job::with('category')->get();
        $categories = Category::withCount('jobs')->get(); 

        return view('admin/job/jobs', compact('setting_data','user_data','job_list','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting_data = Setting::latest('created_at')->first();
        $categories = Category::all();
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        return view('admin/job/add-job', compact('setting_data','categories','user_data'));
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
            'position'=>'required',
            'institute_name'=>'required',
            'institute_logo'=>'required',
            'institute_banner'=>'required',
            'category_id'=>'required',
            'vacancy'=>'required',
            'apply_start_at'=>'required',
            'apply_end_at'=>'required',
            'apply_fee'=>'required',
            'salary'=>'required',
            'circular'=>'required',
            'apply_url'=>'required',
            'requirements'=>'required',
            'job_status'=>'required',
        ]);


        $job = new Job;
        $job->position = $request->input('position');
        $job->institute_name = $request->input('institute_name');

        if($request->hasfile('institute_logo')){
            $file = $request->file('institute_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/jobs/img', $filename);
            $job->institute_logo = $filename;
        }

        if($request->hasfile('institute_banner')){
            $file = $request->file('institute_banner');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/jobs/img', $filename);
            $job->institute_banner = $filename;
        }
        $job->category_id = $request->input('category_id');
        $job->vacancy = $request->input('vacancy');
        $job->apply_start_at = $request->input('apply_start_at');
        $job->apply_end_at = $request->input('apply_end_at');
        $job->apply_fee = $request->input('apply_fee');
        $job->salary = $request->input('salary');

        if($request->hasfile('circular')){
            $file = $request->file('circular');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/jobs/pdf', $filename);
            $job->circular = $filename;
        }

        $job->apply_url = $request->input('apply_url');
        $job->requirements = $request->input('requirements');
        $job->job_status = $request->input('job_status');
        $job->save();
        return redirect()->back()->with('status', 'Job Info Added Successfully!');
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
        $categories = Category::all();
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        $job_data= Job::find($id);
        return view('admin/job/edit-job', compact('setting_data','categories', 'user_data','job_data'));
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
        $job = Job::find($id);

        $job->position = $request->input('position');
        $job->institute_name = $request->input('institute_name');

        if($request->hasfile('institute_logo')){
            $destination='upload/jobs/img/'.$job->institute_logo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('institute_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/jobs/img/', $filename);
            $job->institute_logo = $filename;
        }

        if($request->hasfile('institute_banner')){
            $destination='upload/jobs/img/'.$job->institute_banner;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('institute_banner');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/jobs/img/', $filename);
            $job->institute_banner = $filename;
        }

        $job->category_id = $request->input('category_id');
        $job->vacancy = $request->input('vacancy');
        $job->apply_start_at = $request->input('apply_start_at');
        $job->apply_end_at = $request->input('apply_end_at');
        $job->apply_fee = $request->input('apply_fee');
        $job->salary = $request->input('salary');


        if($request->hasfile('circular')){
            $destination='upload/jobs/pdf/'.$job->circular;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('circular');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/jobs/pdf/', $filename);
            $job->circular = $filename;
        }

        $job->apply_url = $request->input('apply_url');
        $job->requirements = $request->input('requirements');
        $job->job_status = $request->input('job_status');

        $job->update();
        return redirect()->back()->with('status', 'Job Info Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $destination='upload/jobs/img/'.$job->institute_logo;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $destination_1='upload/jobs/img/'.$job->institute_banner;
        if(File::exists($destination_1)){
            File::delete($destination_1);
        }
        $dest='upload/jobs/pdf/'.$job->circular;
        if(File::exists($dest)){
            File::delete($dest);
        }
        $job->delete();
        return redirect()->back()->with('status', 'Job Deleted Successfully!');
    }
}
