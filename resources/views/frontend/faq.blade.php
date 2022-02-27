@extends('layouts.frontend-layout')
@section('content')

	<!-- Start sub-menu-banner-section -->
	<div class="sub-menu-banner-section" style="background-image: url('{{asset('frontend/img/services/b-2.jpg')}}');">
		<div class="overlay"></div>
		<div class="container" style="z-index: 9999;">
			<div class="row wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
				<div class="col-md-12">
					<div>
						<div class="title">
							<h3 class="text-center">FAQ</h3>
						</div>
						<nav aria-label="breadcrumb" style="display: flex; justify-content: center; z-index: 999;">
							<ol class="breadcrumb" style="z-index: 9;">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<span class="test-separator"></span>
								<li class="breadcrumb-item active" aria-current="page">FAQ</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End sub-menu-banner-section -->



	<!-- Start About Section Here -->
	<section class="about-section faq-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="section-heading mb-4">
						<span class="subheading">FAQ</span>
						<h3>Frequently Asked Question!</h3>
					</div>
				</div>
			</div>
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-md-6 col-lg-6 d-flex align-items-center">
					<div>
						<h4 class="pb-2" style="font-weight:700;">What is Kormo365.com?</h4>
						<h5 class="mb-4">
							<li class="list-unstyled" style="font-weight:500;">
								<i class="fas fa-check-circle text-primary me-2" style="color:#0cf !important;"></i>Komro365 is an online job portal site for job seekers.
							</li>
						</h5>
						<h4 class="pb-2" style="font-weight:700;">Which categories of jobs are post here?</h4>
						<h5 class="mb-4">
							<li class="list-unstyled" style="font-weight:500;">
								<i class="fas fa-check-circle text-primary me-2" style="color:#0cf !important;"></i>Now, you will git all govt. and non-govt. jobs circualr here.
							</li>
						</h5>
						<h4 class="pb-2" style="font-weight:700;">Is Kormo365.com provide any job related blog?</h4>
						<h5 class="mb-4">
							<li class="list-unstyled" style="font-weight:500;">
								<i class="fas fa-check-circle text-primary me-2" style="color:#0cf !important;"></i>You will get some essential blog for the job preparation in kormo365 blog page.
							</li>
						</h5>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div class="about-img" style="padding-left: 30px;">
						<img src="{{ asset('frontend/img/faq/faq.png')}}" alt="" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Section Here -->

	@endsection