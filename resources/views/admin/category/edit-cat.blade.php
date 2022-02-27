
@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Edit Category</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('dashboard/categories') }}">Categories</a>
						</li>
						<li class="breadcrumb-item active">Edit Category</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-10 offset-1">
				@if(session('status'))
				<h6 class="alert alert-success">{{ session('status') }}</h6>
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-xl-10 d-flex offset-1">
				<div class="card flex-fill">
					<div class="card-header">
						<h5 class="card-title">Edit Category</h5>
					</div>
					<div class="card-body">
						<form action="{{ url('dashboard/categories/update-category/'.$cat_data->id) }}" method="POST" enctype="multipart/form-data">

							@csrf
							@method('PUT')

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Category Title</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="cat_title" value="{{ $cat_data->cat_title }}">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Category Image</label>
								<div class="col-lg-9">
									<div class="cat_img_holder"><img src="{{url('upload/category/'.$cat_data->cat_img)}}" class="img-fluid mb-2 bg-light" style="width:110px; height: 70px;border:1px solid #ddd;" alt="">
									</div>

									<input type="file" class="form-control" name="cat_img" value="{{ $cat_data->cat_img }}">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Category Icon Class</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="cat_icon" value="{{ $cat_data->cat_icon }}">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Category Description</label>
								<div class="col-lg-9">
									<textarea name="cat_desc" rows="4" cols="5" class="form-control" placeholder="Enter message">{{ $cat_data->cat_desc }}</textarea>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection