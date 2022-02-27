<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Job;

class FrontendController extends Controller
{
    // Home
    public function Home(Request $request){
      $search = $request['search'] ?? "";
      if($search != ""){
       $job_list = Job::where('position','LIKE',"%$search%")->orWhere('institute_name','LIKE',"%$search%")->get();
      }
      else{
         $job_list = Job::with('category')->paginate(1);
      }
      
      $categories = Category::withCount('jobs')->get(); 
      $setting_data = Setting::latest('created_at')->first();
      return view('frontend.index', compact('search','job_list','categories','setting_data'));
    }

    public function JobByCategory($id){
        $category = Category::where('id', $id)->first();
        $categories = Category::withCount('jobs')->get(); 
        $setting_data = Setting::latest('created_at')->first();
        if($category){
            $jobs = Job::where('category_id', $category->id)->paginate(2);
            return view('frontend.category', compact('category','categories','setting_data','jobs'));
        }
    }

    public function JobDetails($id){
        $setting_data = Setting::latest('created_at')->first();
        $job_details_data = Job::find($id);
        $categories = Category::withCount('jobs')->get();
        return view('frontend.job-details', compact('setting_data','job_details_data','categories'));
    }

    // About
    public function About(){
        return view('frontend.about');
    }

    // Contact
    public function TermsCondition(){
        return view('frontend.terms-condition');
    }


    // Privacy
    public function Privacy(){
        return view('frontend.privacy');
    }

    // FAQ
    public function Faq(){
        return view('frontend.faq');
    }


    // Contact
    public function Contact(){
        return view('frontend.contact');
    }

    public function Send_Message(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:contacts',
            'subject'=>'required',
            'phone'=>'required',
            'message'=>'required',
        ]);
        
        $contat = new Contact;
        $contat->name = $request->input('name');
        $contat->email = $request->input('email');
        $contat->subject = $request->input('subject');
        $contat->phone = $request->input('phone');
        $contat->message = $request->input('message');
        $contat->save();
        return redirect()->back()->with('status', 'Your Message Send Successfully!');
    }

    

  
}
