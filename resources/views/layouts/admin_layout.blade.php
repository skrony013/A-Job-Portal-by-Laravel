<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

	<title>{{ $setting_data->site_name }} | {{ $setting_data->site_tagline }} </title>

	<link rel="shortcut icon" href="{{url('upload/setting/'.$setting_data->site_favicon)}}">

	<link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('backend/css/summernote-bs4.min.css')}}">

	<link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('backend/flaticon/flaticon.css')}}">

	<link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
<!--[if lt IE 9]>
			<script src="backend/js/html5shiv.min.js"></script>
			<script src="backend/js/respond.min.js"></script>
		<![endif]-->
		</head>
		<body>

			<div class="main-wrapper">

				<div class="header">

					<div class="header-left">
						<a href="{{url('dashboard')}}" class="logo">
							<img src="{{url('upload/setting/'.$setting_data->site_logo)}}" alt="Logo">
						</a>
						<a href="{{url('dashboard')}}" class="logo logo-small">
							<img src="{{url('upload/setting/'.$setting_data->site_logo)}}" alt="Logo" width="30" height="30">
						</a>
					</div>

					<a href="javascript:void(0);" id="toggle_btn">
						<i class="fas fa-bars"></i>
					</a>
					<div class="top-nav-search">
						<form>
							<input type="text" class="form-control" placeholder="Search here">
							<button class="btn" type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
					<a class="mobile_btn" id="mobile_btn">
						<i class="fas fa-bars"></i>
					</a>
					<ul class="nav user-menu">
						<li class="nav-item dropdown has-arrow main-drop">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img src="{{ url('upload/profile/'.$user_data->profile_img) }}" alt="">
									<span class="status online"></span>
								</span>
								<span>{{ $user_data->name }}</span>
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{ url('dashboard/profile') }}"><i data-feather="user" class="mr-1"></i> Profile</a>
								{{-- <a class="dropdown-item" href="settings.html"><i data-feather="settings" class="mr-1"></i> Settings</a> --}}
								<a class="dropdown-item" href="{{ url('logout') }}"><i data-feather="log-out" class="mr-1"></i> Logout</a>
							</div>
						</li>

					</ul>

				</div>


				<div class="sidebar" id="sidebar">
					<div class="sidebar-inner slimscroll">
						<div id="sidebar-menu" class="sidebar-menu">
							<ul>
								<li class="menu-title"><span>Main</span></li>
								<li class="active">
									<a href="{{url('dashboard')}}"><i data-feather="home"></i> <span>Dashboard</span></a>
								</li>

								<li class="submenu">
									<a href="#"><i data-feather="check-square"></i> <span> Job Category</span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="{{ url('dashboard/categories') }}">All Categories</a></li>
										<li><a href="{{ url('dashboard/categories/add-category') }}"> Add New Category</a></li>
									</ul>
								</li>
								<li class="submenu">
									<a href="#"><i data-feather="grid"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
									<ul>
										<li><a href="{{ url('dashboard/jobs') }}">All Jobs </a></li>
										<li><a href="{{ url('dashboard/add-job') }}">Add New Job</a></li>
									</ul>
								</li>

								<li>
									<a href="{{ url('dashboard/about') }}"><i data-feather="info"></i> <span>About</span></a>
								</li>
								<li>
									<a href="{{ url('dashboard/terms-condition') }}"><i data-feather="command"></i> <span>Terms And Condition</span></a>
								</li>
								<li>
									<a href="{{ url('dashboard/privacy') }}"><i data-feather="shield-off"></i> <span>Privacy Policy</span></a>
								</li>
								<li>
									<a href="{{ url('dashboard/faq') }}"><i data-feather="help-circle"></i> <span>FAQ</span></a>
								</li>

								

								<li>
									<a href="{{ url('dashboard/contact') }}"><i data-feather="user-check"></i> <span>Contact</span></a>
								</li>
								{{-- <li>
									<a href="{{ url('dashboard/blogs') }}"><i data-feather="layout"></i> <span>Blogs</span></a>
								</li> --}}
								<li>
									<a href="{{ url('dashboard/setting') }}"><i data-feather="settings"></i> <span>Setting</span></a>
								</li>

							</ul>
						</div>
					</div>
				</div>


				@yield('content')

			</div>


			<script src="{{ asset('backend/js/jquery-3.5.1.min.js')}}"></script>

			<script src="{{ asset('backend/js/popper.min.js')}}"></script>
			<script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>

			{{-- Summernote Text Editor --}}
			<script src="{{ asset('backend/js/summernote-bs4.min.js')}}"></script>
			<script>
				$('#summernote').summernote({
					placeholder: 'Write Requirements....',
					tabsize: 2,
					height: 100
				});
			</script>

			<script src="{{ asset('backend/js/feather.min.js')}}"></script>

			<script src="{{ asset('backend/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

			<script src="{{ asset('backend/plugins/apexchart/apexcharts.min.js')}}"></script>
			<script src="{{ asset('backend/plugins/apexchart/chart-data.js')}}"></script>

			<script src="{{ asset('backend/js/script.js')}}"></script>
			<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
			<script type="text/javascript">
				$(document).on('click', 'ul li', function(){
					$(this).addClass('active').siblings().removeClass('active')
				})
			</script>

			{{-- Image Preview JS here --}}
			<script src="{{ asset('backend/js/img_preview.js')}}"></script>

			{{-- Multiple Image Preview Here --}}
			<script src="{{ asset('backend/js/multiple-img-preview.js')}}"></script>

			{{-- Ajax Gallery Image Delete Start From Here --}}
			<script>
				function deleteimage(id){
					if(confirm("Do you really want to delte this image?")){
						$.ajax({
							url:'/backend/services/update-service/'+id,
							type:'POST',
							data:{
								_token:$("input[name=_token]").val()
							},
							success:function(response){
								$("#img_id"+id).remove();
							}

						});
					}
				}
			</script>
			{{-- Ajax Gallery Image Delete Ended Here --}}
			
</body>
</html>