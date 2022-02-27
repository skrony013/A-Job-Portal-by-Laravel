<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    //Login

    public function Login(){
        return view('auth.login');
    }

    public function Registration(){
        return view('auth.register');
    }

    public function AdminRegister(Request $request){
        $request->validate([
            'profile_img'=>'required',
            'name'=>'required',
            'address'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
        ]);
        $user = new User;
        if($request->hasfile('profile_img')){
            $file = $request->file('profile_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/profile', $filename);
            $user->profile_img = $filename;
        }
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if($res){
            return back()->with('success', 'New User Registered Successfully!');
        }
        else{
            return back()->with('fail', 'Something Wrong!'); 
        }
        
    }

    public function AdminLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loginID', $user->id);
                return redirect('dashboard');
            }
            else{
                return back()->with('fail', 'Password does not mathced!');
            }
        }
        else{
            return back()->with('fail', 'The email is not registered!');
        }
    }


    public function Logout()
    {
        if(Session::has('loginID')){
            Session::pull('loginID');
            return redirect('admin');
        }
    }

}
