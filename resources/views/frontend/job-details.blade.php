@extends('layouts.frontend-layout')
@section('content')

	<!-- Start sub-menu-banner-section -->
	<div class="sub-menu-banner-section-1 single-service-res">
		<div class="container">
			<div class="row">
				<div class="col-8 col-md-8">
					<div class="title">
						<h3 class="text-left mb-1">{{ $job_details_data->position }}</h3>
						<h6 class="text-white">{{ $job_details_data->institute_name }}</h6>
					</div>
				</div>
				<div class="col-4 col-md-4 btn-pos">
					<!-- Modal Button -->
					<div class="btn modal-btn apply-btn">
						<a href="{{ $job_details_data->apply_url }}" class="text-decoration-none" target="_blank"><input class="sbmt-btn" value="Apply Now" type="submit"></a>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- End sub-menu-banner-section -->

	<!-- Start Single Service Section -->
	<div class="single-service-section">
		<div class="container">
			<div class="row zndx">
				<div class="col-lg-9 col-md-8">
					<div class="single-service-area">
						<div class="title-img">
							<div class="img-container" style="background-image: url({{ url('upload/jobs/img/'.$job_details_data->institute_banner) }});">
							</div>
						</div>
						 <div class="detail-content">
                        <div class="section-title">
                            <h3>Position: <span>{{ $job_details_data->position }}</span></h3>
                             <h3>Vacancy: <span>{{ $job_details_data->vacancy }}</span></h3>
                        </div>
                        <div class="section-sub-title text-left">
                            <h4>Requirements</h4>
                            <p>{!! $job_details_data->requirements !!}</p>
                        </div>
                        {{-- <ul class="list-with-icon with-heading list-unstyled" style="padding-left:15px;">
                            <li>
                                <i class="fas fa-check-circle text-primary"></i>
                                <span>B.Sc in CS, CSE, IT (1st class or equivalent)</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-primary"></i>
                                <span>4 years experience as Trainer or Assistant instructor.</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle text-primary"></i>
                                <span>3+ papers publications on relative field</span>
                            </li>
                        </ul> --}}
                         <div class="section-title">
                            <h3>Apply Start: <span>{{ date('d-m-Y', strtotime($job_details_data->apply_start_at)); }}</span></h3>
                             <h3>Apply End: <span>{{ date('d-m-Y', strtotime($job_details_data->apply_end_at)); }}</span></h3>
                        </div>
                         <div class="section-title">
                             <h3>Application Fee: <span>{{ $job_details_data->apply_fee }}/-</span></h3>
                             <h3>Salary: <span>{{ $job_details_data->salary }}</span></h3>
                        </div>
                        <!-- Resource & Time -->
                        <div class="section-sub-title text-left">
                            <h4>Circular PDF: <span>
                            	<a style="color:tomato;" href="#" class="text-decoration-none">Download</a></span>
                            </h4>
                        </div>
                        <!-- Faq Start -->
                         <div class="section-sub-title faq-title text-left">
                            <a href="#" class="btn apply-btn">Apply Now</a>
                        </div>
                    </div>
					</div>
				</div>
				<div class="col-lg-3 col-md-4">
					<div class="widget recent_posts">
						<h3 class="widget-title">Job Summary</h3>
						<ul class="list-unstyled">
							<li>
								@foreach($categories as $key=>$category)
								@if($job_details_data->category_id == $category->id)
								<a href="#">Category: <span>{{ $category->cat_title }}</span>
								</a>
								@endif
								@endforeach
								
							</li>
							<li>
								<a href="#">Deadline: <span>{{ date('d-m-Y', strtotime($job_details_data->apply_end_at)); }}</span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Single Service Section -->

@endsection