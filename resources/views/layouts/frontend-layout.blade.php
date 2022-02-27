<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $setting_data->site_name }} | {{ $setting_data->site_tagline }} </title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ url('upload/setting/'.$setting_data->site_favicon) }}"/>
	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css')}}">
	<!-- Modal Video CSS Plugin -->
	<link rel="stylesheet" href="{{ asset('frontend/css/modal-video.min.css') }}">
	<!-- Bootstrap CSS Here -->
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
	<!-- Font Awesome CSS Here -->
	<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">
	<!-- Bootstrap Icons CDN Link Here -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
	<!-- Main CSS Here -->
	<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
</head>
<body>
	<!-- Start Header Section Here -->
	<header class="header-section h-sticky">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<div class="container-fluid">
							<div class="logo">
								<a class="navbar-brand " href="{{ url('/') }}">
									<img src="{{ url('upload/setting/'.$setting_data->site_logo) }}" alt="logo not found" class="img-fluid">
								</a>
							</div>
							<button class="navbar-toggler" type="button" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class=""><i class="bi bi-text-right"></i></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<div class="main-nav mx-auto p-1">
									<ul class="navbar-nav mb-2 mb-lg-0">
										@foreach($categories as $key=>$category)
										<li class="nav-item">
											{{-- <a class="nav-link active" aria-current="page" href="{{url('category', ['slug' => $category->slug])}}">
												<span class="mx-1"><i class="{{ $category->cat_icon }}"></i></span>
												<span class="me-2">{{ $category->cat_title }}</span>
											</a> --}}
											<a class="nav-link active" aria-current="page" href="{{url('category/'.$category->id)}}">
												<span class="mx-1"><i class="{{ $category->cat_icon }}"></i></span>
												<span class="me-2">{{ $category->cat_title }}</span>
											</a>
										</li>
										@endforeach
										</ul>
									</div>
								<!-- <div class="nav-end p-1">
									<a href="#" class="login-btn btn">
										<span class="me-1"><i class="fa fa-sign-in-alt mr-2"></i></span>
										<span>Log in</span>
									</a>
								</div> -->
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<!-- End Header Section Here -->

	@yield('content')

	
	<!-- Start Footer Section Here -->
	<footer class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="footer-logo text-center">
						<img src="{{ url('upload/setting/'.$setting_data->footer_logo) }}" class="img-fluid" style="width: 170px;" alt="">
					</div>
					<div class="subscribe-form required-ulr text-center">
						<ul>
							<li>
								<a href="{{ url('about') }}">About</a> |
								<a href="{{ url('terms-condition') }}">Terms & Condition</a> |
								<a href="{{ url('privacy') }}">Privacy Policy</a> |
								<a href="{{ url('faq') }}">FAQ</a> |
								<a href="{{ url('contact') }}">Contact</a>
							</li>
						</ul>
					</div>

				</div>
				
				
			</div>
			<div class="row">
				<div class="col-ml-12">
					<hr class="m-0 my-2 text-white mx-auto" style="width:50%">
					<p class="text-center" style="font-size: 14px; color: #999;">Copyright &copy; <script>document.write(new Date().getFullYear())</script> All Rights Reserved by<a class="ms-1" href="#" style="text-decoration: none; color:#0cf;">{{ $setting_data->site_name }}</a> 
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer Section Here -->

	

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

	<!-- OWL Carousel JS -->
	<script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
	<!-- Custom Javascript -->
	

	<!-- Sticky Menu jQuery -->
	<script>
		$(window).on('scroll', function(){
			if($(this).scrollTop()>80){
				$('.h-sticky').addClass("sticky");
			}
			else{
				$('.h-sticky').removeClass("sticky");
			}
		})
	</script>
</body>
</html>