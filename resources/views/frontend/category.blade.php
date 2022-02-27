@extends('layouts.frontend-layout')
@section('content')

	<!-- Start sub-menu-banner-section -->
	<div class="sub-menu-banner-section-1 single-service-res">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12">
					<div class="title">
						<h3 class="text-left mb-1" style="text-transform: capitalize;"> Category: {{ $category->cat_title }}</h3>
						{{-- <h6 class="text-white">{{ $category->cat_desc }}</h6> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End sub-menu-banner-section -->

	<!-- Start University List Section -->
	<section class="versity-list-section trending-service-section">
		<div class="container">
			<div class="row mb-3">
				<div class="col-8 col-md-8 col-lg-8">
					<div class="section-heading">
						<span class="subheading">Recent {{ $category->cat_title }} Jobs</span>
						<h3>Available Recent Jobs</h3>
					</div>
				</div>
				<div class="col-4 col-md-4 col-lg-4 d-flex justify-content-end align-items-center">
					<div class="service-btn">
						<a href="#" class="btn btn-main"><i class="fa fa-store me-2"></i>All Jobs</a>
					</div>
				</div>
			</div>
			<div class="row">
				@if($jobs->count() > 0)
				@foreach($jobs as $key=>$job_item)
				@if($job_item->job_status=='1')
				<div class="col-md-6 col-lg-4">
					<div class="content-entry">
						<a class="plus-box" href="{{url('job-details/'.$job_item->id)}}">
							<div class="inner-block">
								<div class="articlelogo">
									<img src="{{ url('upload/jobs/img/'.$job_item->institute_logo) }}" class="img-fluid" alt="">
								</div>
								<div class="ranked">
									<div class="overtitle">	
										<h5 class="entry-title">
											<a href="{{url('job-details/'.$job_item->id)}}">{{ $job_item->position }}</a>
										</h5>
										<h6>{{ $job_item->institute_name }}</h6>
										<h6>
											<i class="bi bi-bookmark-check-fill"></i>
											@foreach($categories as $key=>$category)
												@if($job_item->category_id == $category->id)
												<span>{{ $category->cat_title }}</span>
												@endif
											@endforeach
										</h6>
										<h6 class="vac-style">Vacancy:{{ $job_item->vacancy }}</h6>		
										<h6 class="deadline">Deadline:{{ date('d-m-Y', strtotime($job_item->apply_end_at)); }}</h6>	
										<div class="view-btn">
											<a href="{{url('job-details/'.$job_item->id)}}" class="btn job-btn">Details <i class="ms-1 bi bi-eye"></i></a>
										</div>			
									</div>
								</div>
							</div>
						</a>
					</div>
				</div>
				@endif
				@endforeach
				@else
				<h6 class="alert alert-danger">No Jobs Available in <a href="{{url('category/'.$category->id)}}">{{ $category->cat_title }}</a> category! </h6 class="alert alert-danger">
				@endif
				
			</div>
		</div>
	</section>
	<!-- End University List Section -->

@endsection