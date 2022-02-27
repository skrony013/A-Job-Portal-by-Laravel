@extends('layouts.login-register-layout')
@section('content')
	<!-- Start Registration Form-1 Section -->
	<section class="reg-form-1-section my-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 m-auto col-12 col-lg-5">
					@if(Session::has('success'))
						<div class="alert alert-success">{{ Session::get('success') }}</div>
					@endif
					@if(Session::has('fail'))
						<div class="alert alert-danger">{{ Session::get('fail') }}</div>
					@endif
					<div class="logo-kormo365 text-center mb-4">
						<a href="{{ url('/') }}">
							<img src="frontend/img/logo.png" width="150" alt="" class="img-fluid">
						</a>
					</div>
					<form action="{{ url('admin-register') }}" method="POST" enctype="multipart/form-data" class="reg-form-width">
					@csrf 
						<h4 class="reg-form-header text-center">Register</h4>
						<div class="row">
							<div class="mb-3 col-md-3">
								<label>Profile Image:</label>
							</div>
							<div class="mb-3 col-md-9">
								<input type="file" class="form-control" name="profile_img">
								<span class="text-danger">@error('profile_img') {{ $message }} @enderror</span>
							</div> 
							<div class="mb-3 col-md-3">
								<label>Name:</label>
							</div>
							<div class="mb-3 col-md-9">
								<input name="name" value="{{old('name')}}" type="text" class="form-control">
								<span class="text-danger">@error('name') {{ $message }} @enderror</span>
							</div> 
							<div class="mb-3 col-md-3">
								<label>Address:</label>
							</div>
							<div class="mb-3 col-md-9">
								<input name="address" value="{{old('address')}}" type="text" class="form-control">
								<span class="text-danger">@error('address') {{ $message }} @enderror</span>
							</div> 
							<div class="mb-3 col-md-3">
								<label>Email:</label>
							</div>
							<div class="mb-3 col-md-9">
								<input type="text" class="form-control" name="email" value="{{ old('email') }}">
								<span class="text-danger">@error('email') {{ $message }} @enderror</span>
							</div> 
							<div class="mb-3 col-md-3">
								<label>Password:</label>
							</div>
							<div class="mb-3 col-md-9">
								<input type="password" class="form-control" name="password" value="{{ old('password') }}">
								<span class="text-danger">@error('password') {{ $message }} @enderror</span>
							</div>
							<div class="mb-3 col-md-3"></div>
							<div class="mb-3 col-md-9">
								<button class="btn btn-default col-md-5" type="submit">Register</button>
							</div>           
						</div>
						<!-- <div class="mb-3 text-right">
							<button class="btn btn-default col-md-5" type="submit">Register</button>
						</div>  --> 
						<hr> 
						<div class="text-center">
							<text>Already have an account ?</text>&nbsp;<a href="{{url('admin')}}" class="text-danger">Login</a>
						</div>

					</form>
					<!-- end form -->

				</div>
			</div>
		</div>
	</section>
	<!-- End Registration Form-1 Section -->


@endsection