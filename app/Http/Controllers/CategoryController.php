<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Setting;
use Session;

use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting_data = Setting::latest('created_at')->first();
        $cat_list = Category::all();
        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }
        return view('admin/category/categories', compact('setting_data','user_data','cat_list'));
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
        return view('admin/category/add-cat', compact('setting_data','user_data'));
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
            'cat_title'=>'required|unique:categories',
            'cat_icon'=>'required|unique:categories',
            'cat_desc'=>'required',
        ]);

        $category = new Category;
        $category->cat_title = $request->input('cat_title');
        if($request->hasfile('cat_img')){
            $file = $request->file('cat_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/category', $filename);
            $category->cat_img = $filename;
        }
        $category->cat_icon = $request->input('cat_icon');
        $category->cat_desc = $request->input('cat_desc');
        $category->save();
        return redirect()->back()->with('status', 'New Category Added Successfully!');
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
        $cat_data= Category::find($id);

        $user_data = array();
        if(Session::has('loginID')){
            $user_data = User::where('id', '=', Session::get('loginID'))->first();
        }

        return view('admin/category/edit-cat',compact('setting_data','cat_data', 'user_data'));
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
        $cat_data = Category::find($id);
        $cat_data->cat_title = $request->input('cat_title');
        if($request->hasfile('cat_img')){
            $destination='upload/category/'.$cat_data->cat_img;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('cat_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/category/', $filename);
            $cat_data->cat_img = $filename;
        }
        $cat_data->cat_icon = $request->input('cat_icon');
        $cat_data->cat_desc = $request->input('cat_desc');
        $cat_data->update();
        return redirect()->back()->with('status', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat_item = Category::find($id);
        $dest='upload/category/'.$cat_item->cat_img;
        if(File::exists($dest)){
            File::delete($dest);
        }
        $cat_item->delete();
        return redirect()->back()->with('status', 'Category Deleted Successfully!');
    }
}
