
@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Setting</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard/setting') }}">Setting</a>
                        </li>
                        <li class="breadcrumb-item active">Add Setting</li>
                    </ul>
                </div>
               {{--  <div class="col-auto">
                    <a href="{{ url('admin/setting/add-setting') }}" class="btn btn-primary mr-1">
                         <i class="fas fa-plus"></i>
                    </a>
                </div> --}}
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
                    <div class="card-header">
                        <h5 class="card-title">Add Setting Info</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/dashboard/setting/add-setting') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="site_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Tagline</label>
                                        <input type="text" name="site_tagline" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="site_desc" rows="5" cols="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Site Logo</label>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input type="file" name="site_logo" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="site_logo_holder"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Footer Logo</label>
                                        <div class="row">
                                             <div class="col-md-10">
                                                <input type="file" name="footer_logo" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="admin_logo_holder"></div>
                                            </div>
                                           
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Favicon</label>
                                        <div class="row">
                                            
                                            <div class="col-md-10">
                                                <input type="file" name="site_favicon" class="form-control">
                                            </div>

                                            <div class="col-md-2">
                                                <div class="site_favicon_holder"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Facebook</label>
                                        <input name="facebook" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Twitter</label>
                                        <input name="twitter" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Instagram</label>
                                        <input name="instagram" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>LinkedIn</label>
                                        <input name="linkedin" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input name="phone" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection