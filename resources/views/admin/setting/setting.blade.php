
@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Setting</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ul>
                </div>
                <div class="col-auto">
                    <a href="{{ url('dashboard/setting/add-setting') }}" class="btn btn-primary mr-1">
                         {{-- Add --}}<i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                @if(session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Setting</h5>
                        @if (collect($setting_data)->isEmpty())
                        
                        @else
                        <div style="position:absolute; right: 10px;">
                         <a href="{{ url('/dashboard/setting/edit-setting/'.$setting_data->id) }}" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit"></i></a>

                         <a href="{{ url('/dashboard/setting/delete-setting/'.$setting_data->id) }}" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                     </div>
                     @endif
                       
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/dashboard/setting') }}" method="POST" enctype="multipart/form-data" >
                            @csrf

                            @if (collect($setting_data)->isEmpty())
                                 <p>There is no record available!</p>
                            @else
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" value="{{ $setting_data->site_name }}" name="site_name" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Tagline</label>
                                        <input type="text" value="{{ $setting_data->site_tagline }}" name="site_tagline" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="site_desc" rows="5" cols="5" class="form-control" readonly>{{ $setting_data->site_desc }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Site Logo</label>
                                        <div class="row">
                                            {{-- <div class="col-md-10">
                                                <input type="file" name="site_logo" class="form-control" readonly>
                                            </div> --}}
                                             <div class="col-md-10">
                                                <div class="site_logo_holder">
                                                    <img src="{{url('upload/setting/'.$setting_data->site_logo)}}" class="img-fluid mb-2" style="width:150px; height: 70px; border:1px solid #ddd; padding:10px;" alt="">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Logo</label>
                                        <div class="row">
                                          
                                            {{-- <div class="col-md-10">
                                                <input type="file" name="admin_logo" class="form-control">
                                            </div> --}}
                                              <div class="col-md-10">
                                                <div class="admin_logo_holder">
                                                    <img src="{{url('upload/setting/'.$setting_data->footer_logo)}}" class="img-fluid mb-2" style="width:150px; height: 70px; border:1px solid #ddd; padding:10px;" alt="">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Favicon</label>
                                        <div class="row">
                                            {{-- <div class="col-md-10">
                                                <input type="file" name="site_favicon" class="form-control">
                                            </div> --}}
                                             <div class="col-md-10">
                                                <div class="site_favicon_holder">
                                                    <img src="{{url('upload/setting/'.$setting_data->site_favicon)}}" class="img-fluid mb-2" style="width:150px; height: 70px; border:1px solid #ddd; padding:10px;" alt="">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input name="facebook" value="{{ $setting_data->facebook }}" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input name="twitter" value="{{ $setting_data->twitter }}" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input name="instagram" value="{{ $setting_data->instagram }}" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>LinkedIn</label>
                                        <input name="linkedin" value="{{ $setting_data->linkedin }}" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" value="{{ $setting_data->address }}" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" value="{{ $setting_data->email }}" type="text" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" value="{{ $setting_data->phone }}" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                              
                            </div>
                            @endif
                           {{--  <div class="text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection