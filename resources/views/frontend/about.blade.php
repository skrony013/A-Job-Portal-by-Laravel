@extends('layouts.frontend-layout')
@section('content')

	<!-- Start sub-menu-banner-section -->
	<div class="sub-menu-banner-section" style="background-image: url('{{ asset('frontend/img/services/b-2.jpg') }}');">
		<div class="overlay"></div>
		<div class="container" style="z-index: 9999;">
			<div class="row wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
				<div class="col-md-12">
					<div>
						<div class="title">
							<h3 class="text-center">About</h3>
						</div>
						<nav aria-label="breadcrumb" style="display: flex; justify-content: center; z-index: 999;">
							<ol class="breadcrumb" style="z-index: 9;">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<span class="test-separator"></span>
								<li class="breadcrumb-item active" aria-current="page">About</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End sub-menu-banner-section -->



	<!-- Start About Section Here -->
	<section class="about-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="section-heading mb-4">
						<span class="subheading">About</span>
						<h3>Kormo365 at a glance!</h3>
					</div>
				</div>
			</div>
			<div class="row flex-column-reverse flex-lg-row" style="margin-top: -82px;">
				<div class="col-md-6 col-lg-6 d-flex align-items-center">
					<div>
						<div class="about-intro">
							<p class="pb-3">Living by the moto, <span style="color: #0cf;">"শিক্ষা প্রতিষ্ঠানের জন্য সব"</span> which literally means <span>"Everything for an Educational Institute"</span>, thats what our goal is. Kormo365 is an educational management software. With the latest cutting edge technologies and features, we are here to revolutionize the usage of management system in educational institutes in Bangladesh.</p>
							<p>By covering the entire country of Bangladesh, we dream to make it reach the International Levels as soon as possible. Because we would not want the whole world from missing out on this amazing software!</p>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6">
					<div class="about-img" style="padding-left: 30px;">
						<img src="{{ asset('frontend/img/about/about-1.png') }}" alt="" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Section Here -->

@endsection