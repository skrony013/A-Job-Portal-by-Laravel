<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Job;
use Session;

class DashboardController extends Controller
{
    public function index(){
        // $jobs = Job::where('cateId', $category->id)->where('status','1')->get();

      // $categories = Category::with('jobs')->get();

        // $categories = Category::all();
        $categories = Category::withCount('jobs')->get(); 


        $setting_data = Setting::latest('created_at')->first();
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        return view('admin/dashboard/index', compact('categories','user_data','setting_data'));
    }
}
