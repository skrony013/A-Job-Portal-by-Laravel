
@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Edit Job</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('dashboard/jobs') }}">All Jobs</a>
						</li>
						<li class="breadcrumb-item active">Edit Job</li>
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
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Enter Job Info</h5>
					</div>
					<div class="card-body">
						<form action="{{ url('dashboard/update-job/'.$job_data->id) }}" method="POST" enctype="multipart/form-data" id="form">
							@csrf
							@method('put')

							<div class="row">
								<div class="col-xl-6">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Job Position</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="position" value="{{ $job_data->position }}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Institute Name</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="institute_name" value="{{ $job_data->institute_name }}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Institute Logo</label>
										<div class="col-lg-9">
											<div class="img-holder"><img src="{{url('upload/jobs/img/'.$job_data->institute_logo)}}" class="img-fluid mb-2 bg-light" style="width:110px; height: 70px;border:1px solid #ddd;" alt="">
											</div>
											<input type="file" class="form-control" name="institute_logo">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Institute Banner</label>
										<div class="col-lg-9">
											<div class="banner-img-holder">
												<img src="{{url('upload/jobs/img/'.$job_data->institute_banner)}}" class="img-fluid mb-2 bg-light" style="width:110px; height: 70px;border:1px solid #ddd;" alt="">
											</div>
											<input type="file" class="form-control" name="institute_banner">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Job Category</label>
										<div class="col-lg-9">
											<select name="category_id" class="form-control" id="category_id">
												<option value="">--Choose Category--</option>
												@foreach($categories as $category)
												<option value="{{ $category->id }}" {{$job_data->category_id == $category->id  ? 'selected' : ''}}>{{ $category->cat_title }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Vacancy</label>
										<div class="col-lg-9">
											<input type="number" class="form-control" min="1" name="vacancy" value="{{ $job_data->vacancy }}">
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Apply Start</label>
										<div class="col-lg-9">
											<input type="date" class="form-control" name="apply_start_at" value="{{ $job_data->apply_start_at }}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Apply End</label>
										<div class="col-lg-9">
											<input type="date" class="form-control" name="apply_end_at" value="{{ $job_data->apply_end_at }}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Application Fee</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="apply_fee" value="{{ $job_data->apply_fee }}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Salary</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="salary" value="{{ $job_data->salary }}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Circular</label>
										<div class="col-lg-9">
											<div class="pdf_holder">
												<iframe src="{{url('upload/jobs/img/'.$job_data->institute_banner)}}" frameborder="0"></iframe>
											</div>
											<input type="file" class="form-control" name="circular" value="{{ old('circular') }}">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Apply URL</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="apply_url" value="{{ $job_data->apply_url }}">
										</div>
									</div>
									
								</div>
								<div class="col-xl-12">
									<div class="form-group row">
										<label class="col-lg-1 col-form-label">Requirements</label>

										<div class="col-lg-11 md-devic-res-fit" style="padding-left: 60px;">
											{{-- <input type="text" class="form-control" name="" > --}}
											<textarea name="requirements" class="form-control" id="summernote" rows="10">{{ $job_data->requirements }}</textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-1 col-form-label">Status</label>
										<div class="col-lg-11 md-devic-res-fit"  style="padding-left: 60px;">
											<select name="job_status" class="form-control">

												<option value="1"{{ $job_data->job_status =="1" ? 'selected' : '' }}>Active</option>
										<option value="0"{{ $job_data->job_status =="0" ? 'selected' : '' }}>Inactive</option>
											</select>
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