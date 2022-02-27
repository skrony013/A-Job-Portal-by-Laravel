@extends('layouts.frontend-layout')

@section('content')

	<!-- Start Banner Section Here -->
	<section class="banner-section d-none d-md-block d-lg-block d-xl-block" style="background-image: url('{{ asset('frontend/img/banner/main-banner-1.png') }}');">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12">
					<div class="main-banner">
						<div class="text-center">
							<div class="title">
								<h1>Welcome to <span style="color: #0cf;">Kormo365</span> </h1>
								
							</div>
							<div class="search-box text-center my-4">
								<form action="">
									<input type="text" placeholder="Search your dream jobs by job title....." name="search" value="{{ $search }}">
									<button type="submit"><i class="fas fa-search"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div> 
	</section>
	<!-- End Banner Section Here -->


	<!-- Start All Service Section Here-->
	<section class="all-service-section d-md-none" id="reach-to">
		<div class="container-fluid service-position">
			<div class="row service-area">
				<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-3">
					<div class="row">
						@foreach($categories as $key=>$category)
						<div class="col-6 col-md-6 col-lg-6 text-center">
							<div class="py-3 mb-2">
								<a href="{{url('category/'.$category->id)}}">
									<img src="{{ url('upload/category/'.$category->cat_img) }}" alt="img not found" class="img-fluid">
									<p class="mt-2">{{ $category->cat_title }}({{ $category->jobs_count  }})</p>
								</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End All Service Section Here-->

	

	<!-- Start Job List Section -->
	<section class="versity-list-section trending-service-section">
		<div class="container">
			<div class="row mb-3">
				<div class="col-8 col-md-8 col-lg-8">
					<div class="section-heading">
						<span class="subheading">Recent Jobs</span>
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

				@foreach($job_list as $key=>$job_item)
				@if($job_item->job_status=='1')
				<div class="col-md-6 col-lg-4">
					<div class="content-entry">
						<a class="plus-box" href="{{url('job-details/'.$job_item->id)}}">
							<div class="inner-block">
								<div class="articlelogo">
									<img src="{{url('upload/jobs/img/'.$job_item->institute_logo)}}" class="img-fluid" alt="">
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
										<h6 class="deadline">Deadline:
										{{ date('d-m-Y', strtotime($job_item->apply_end_at)); }}</h6>	
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
				
			</div>
			<div class="row mt-3">
				<div class="col-lg-12 d-flex justify-content-center text-center">
					<nav aria-label="...">
						<ul class="pagination pagination-box wow fadeInUp" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
							<li class="disabled">
								<a href="#" aria-label="Previous">
									<i class="fas fa-angle-double-left"></i>
								</a>
							</li>
							<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li>
								<a href="#" aria-label="Next">
									<i class="fas fa-angle-double-right"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div> 
			</div>
		</div>
	</section>
	<!-- End Job List Section -->

@endsection
