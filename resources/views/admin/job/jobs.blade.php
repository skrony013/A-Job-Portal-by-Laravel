
@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">All Jobs</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">All Jobs</li>
					</ul>
				</div>
				<div class="col-auto">
					<a href="{{ url('dashboard/add-job') }}" class="btn btn-primary mr-1">
						<i class="fas fa-plus"></i>
					</a>
					<a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
						<i class="fas fa-filter"></i>
					</a>
				</div>
			</div>
		</div>


		<div id="filter_inputs" class="card filter-card">
			<div class="card-body pb-0">
				<div class="row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group">
							<label>Phone</label>
							<input type="text" class="form-control">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				@if(session('status'))
				<h6 class="alert alert-success">{{ session('status') }}</h6>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card card-table">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-center table-hover">
								<thead class="thead-light">
									<tr>
										<th>SL</th>
										<th>Job Position</th>
										<th>Institute Name</th>
										<th>Institute Logo</th>
										<th>Job Category</th>
										<th>Status</th>
										<th class="text-right">Actions</th>
									</tr>
								</thead>
								<tbody>
									@foreach($job_list as $key=>$job_item)
									<tr>
										<td>{{ $key+1 }}</td>
										<td>{{ $job_item->position }}</td>
										<td>{{ $job_item->institute_name }}</td>
										<td>
											<img src="{{url('upload/jobs/img/'.$job_item->institute_logo)}}" class="img-fluid bg-light p-1" style="width:110px; height: 70px; border:1px solid #ddd;" alt="">
										</td>

										@foreach($categories as $key=>$category)
											@if($job_item->category_id == $category->id)
											<td class="text-center">{{ $category->cat_title }}</td>
											@endif
										@endforeach

										

										{{-- <td class="text-center">{{ $job_item->category_id }}</td> --}}

										<td>
											@if($job_item->job_status=='1')
											<span class="badge badge-pill bg-success-light">Active</span>
											@else
											<span class="badge badge-pill bg-danger-light">Inactive</span>
											@endif
										</td>
										<td class="text-right">
											<a href="{{ url('dashboard/edit-job/'.$job_item->id) }}" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
											<a href="{{ url('dashboard/delete-job/'.$job_item->id) }}" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection