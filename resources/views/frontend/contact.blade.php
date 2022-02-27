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
							<h3 class="text-center">Contact</h3>
						</div>
						<nav aria-label="breadcrumb" style="display: flex; justify-content: center; z-index: 999;">
							<ol class="breadcrumb" style="z-index: 9;">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<span class="test-separator"></span>
								<li class="breadcrumb-item active" aria-current="page">Contact</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End sub-menu-banner-section -->

	<!-- Start Contact Section -->
	<section class="contact-section">
		<div class="container">
			<div class="row zndx">
				<div class="col-lg-5 col-md-5 wow slideInLeft" data-wow-duration ="1.5s" style="visibility: visible; animation-name:slideInLeft;">
					<div class="contact-details">
						<div class="details-title">
							<h3 class="d-flex">
								<sapn class=""><h3>Contact <span>Details</span></h3> </sapn>
								<sapn class="bar mt-4 ml-2"></sapn>
							</h3>
						</div>
						<div class="address hov-effect">
							<div class="row">
								<div class="col-sm-2 col-md-2 icon-pos">
									<div class="icon">
										<i class="fas fa-map-marker-alt"></i>
									</div>
								</div>
								<div class="col-sm-10 col-md-10">
									<h2>Company Address</h2>
									<p>10/3, Victoria Road, Dhaka</p>
								</div>
							</div>
						</div>
						<div class="phone hov-effect mt-3">
							<div class="row">
								<div class="col-md-2 icon-pos">
									<div class="icon">
										<i class="fas fa-phone-volume"></i>
									</div>
								</div>
								<div class="col-md-10">
									<h2>Phone</h2>
									<p>+880-1533504533</p>
								</div>
							</div>
						</div>
						<div class="email hov-effect  mt-3">
							<div class="row">
								<div class="col-md-2 icon-pos">
									<div class="icon">
										<i class="fas fa-envelope-open-text"></i>
									</div>
								</div>
								<div class="col-md-10">
									<h2>Email Address</h2>
									<p>info@builderagency.com</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7 col-md-7 wow fadeInUP" data-wow-delay="0.4s" style="visibility: visible; animation-name: fadeInUp;">
					<div class="contact-form-area">
						<div class="contact-info text-center">
							<h2>Let's Talk About The Project</h2>
							<p style="color: #999;">We are always ready to listen you first</p>
						</div>
						<form id="contatc_form" method="POST" action="{{ url('contact') }}" name="myform" enctype="multipart/form-data">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="name" id="contact_name" placeholder="Name*" value="{{ old('name') }}">
										<div class="mt-2 text-danger">@error('name') {{ $message }} @enderror</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="email" name="email" id="contact_email" placeholder="E-mail*" value="{{ old('email') }}">
										<div class="mt-2 text-danger">@error('email') {{ $message }} @enderror</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="subject" id="contact_subject" placeholder="Subject*" restrict="A-Z\a-z\0-9" value="{{ old('subject') }}">
										<div class="mt-2 text-danger">@error('subject') {{ $message }} @enderror</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" name="phone" id="contact_phone" placeholder="Phone*" value="{{ old('phone') }}" restrict="A-Z\a-z\0-9">
										<div class="mt-2 text-danger">@error('phone') {{ $message }} @enderror</div>
									</div>
								</div>
							</div>
							<div class="form-group mb-18">
								<textarea name="message" id="contact_message" rows="6" placeholder="Message*" restrict="A-Z\a-z\0-9" spellcheck="false">{{ old('message') }}</textarea>
								<div class="mt-2 text-danger">@error('message') {{ $message }} @enderror</div>
							</div>
							<div class="text-left">
								<div id="contact_send_status">
									@if(session('status'))
									<h6 class="alert alert-success">{{ session('status') }}</h6>
									@endif
								</div>
								<input type="submit" class="sbmt-btn mt-2" value="Send Message">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Contact Section -->
@endsection