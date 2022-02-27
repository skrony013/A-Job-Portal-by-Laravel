
@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Add Job</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('dashboard/jobs') }}">All Jobs</a>
						</li>
						<li class="breadcrumb-item active">Add Job</li>
					</ul>
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
			{{-- <div class="col-xl-8 d-flex offset-1">
				<div class="card flex-fill">
					<div class="card-header">
						<h5 class="card-title">Enter Job Info</h5>
					</div>
					<div class="card-body">
						<form action="{{ url('admin/services/add-service') }}" method="POST" enctype="multipart/form-data" id="form">

							@csrf

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Service Title</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="service_title" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Service Desriptioin</label>
								<div class="col-lg-9">
									<textarea name="service_short_desc" class="form-control" rows="4"></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Service Image</label>

								<div class="col-lg-9">
									<div class="img-holder"></div>
									<input type="file" class="form-control" name="service_img" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Service Gallery Image</label>
								<div class="col-lg-9">
									<div class="d-flex flex-wrap justify-content-start mb-2" id="container"></div>
									<input type="file" name="images[]" id="t_img" multiple class="form-control" onchange="image_select()">
									
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Category</label>
								<div class="col-lg-9">
									<select name="service_cat" class="form-control" required>
									<option value="">---Select Category---</option>
									@foreach($categories as $category)
									<option>{{ $category->cat_title }}</option>
									@endforeach
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Status</label>
								<div class="col-lg-9">
									<select name="service_status" class="form-control" required>
										<option value="">---Select Status---</option>
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div> --}}
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Enter Job Info</h5>
					</div>
					<div class="card-body">
						<form action="{{ url('dashboard/add-job') }}" method="POST" enctype="multipart/form-data" id="form">
							@csrf
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Job Position</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="position" value="{{ old('position') }}">
											<div class="mt-2 text-danger">@error('position') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Institute Name</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="institute_name" value="{{ old('institute_name') }}">
											<div class="mt-2 text-danger">@error('institute_name') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Institute Logo</label>
										<div class="col-lg-9">
											<div class="img-holder"></div>
											<input type="file" class="form-control" name="institute_logo" value="{{ old('institute_logo') }}" >
											<div class="mt-2 text-danger">@error('institute_logo') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Institute Banner</label>
										<div class="col-lg-9">
											<div class="banner-img-holder"></div>
											<input type="file" class="form-control" name="institute_banner" value="{{ old('institute_banner') }}">
											<div class="mt-2 text-danger">@error('institute_banner') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Job Category</label>
										<div class="col-lg-9">
											<select name="category_id" class="form-control">
												<option value="">--Choose Category--</option>
												@foreach($categories as $category)
												<option value="{{ $category->id }}">{{ $category->cat_title }}</option>
												@endforeach
											</select>
											<div class="mt-2 text-danger">@error('category_id') {{ $message }} @enderror</div>
										</div>
									</div>
									{{-- <div class="form-group row">
										<label class="col-lg-3 col-form-label">Category ID</label>
										<div class="col-lg-9">
											<select name="job_cat" class="form-control">
												<option value="">--Choose Category--</option>
												@foreach($categories as $category)
												<option>{{ $category->cat_title }}</option>
												@endforeach
											</select>
											<div class="mt-2 text-danger">@error('job_cat') {{ $message }} @enderror</div>
										</div>
									</div> --}}
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Vacancy</label>
										<div class="col-lg-9">
											<input type="number" class="form-control" min="1" name="vacancy" value="{{ old('vacancy') }}">
											<div class="mt-2 text-danger">@error('vacancy') {{ $message }} @enderror</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Apply Start</label>
										<div class="col-lg-9">
											<input type="date" class="form-control" name="apply_start_at" value="{{ old('apply_start_at') }}">
											<div class="mt-2 text-danger">@error('apply_start_at') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Apply End</label>
										<div class="col-lg-9">
											<input type="date" class="form-control" name="apply_end_at" value="{{ old('apply_end_at') }}">
											<div class="mt-2 text-danger">@error('apply_end_at') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Application Fee</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="apply_fee" value="{{ old('apply_fee') }}">
											<div class="mt-2 text-danger">@error('apply_fee') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Salary</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="salary" value="{{ old('salary') }}">
											<div class="mt-2 text-danger">@error('salary') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Circular</label>
										<div class="col-lg-9">
											<div class="pdf_holder"></div>
											<input type="file" class="form-control" name="circular" value="{{ old('circular') }}">
											<div class="mt-2 text-danger">@error('circular') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Apply URL</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="apply_url" value="{{ old('apply_url') }}">
											<div class="mt-2 text-danger">@error('apply_url') {{ $message }} @enderror</div>
										</div>
									</div>
									
								</div>
								<div class="col-xl-12">
									<div class="form-group row">
										<label class="col-lg-1 col-form-label">Requirements</label>

										<div class="col-lg-11 md-devic-res-fit" style="padding-left: 60px;">
											{{-- <input type="text" class="form-control" name="" > --}}
											<textarea name="requirements" class="form-control" id="summernote" rows="10">{{ old('requirements') }}</textarea>
											<div class="mt-2 text-danger">@error('requirements') {{ $message }} @enderror</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-1 col-form-label">Status</label>
										<div class="col-lg-11 md-devic-res-fit"  style="padding-left: 60px;">
											<select name="job_status" class="form-control">
												<option value="">---Select Status---</option>
												<option value="1">Active</option>
												<option value="0">Inactive</option>
											</select>
											<div class="mt-2 text-danger">@error('job_status') {{ $message }} @enderror</div>
										</div>
									</div>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Add</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection