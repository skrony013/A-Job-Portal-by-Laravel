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
					<form action="{{ url('admin-login') }}" method="POST" class="reg-form-width" enctype="multipart/form-data"> 
						@csrf
						<h4 class="reg-form-header text-center">Login</h4>
						<div class="row">
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
								<button class="btn btn-default col-md-5" type="submit">Login</button>
							</div>           
						</div> 
						<hr> 
						<div class="text-center">
							<text>Don't have an account ?</text>&nbsp;<a href="{{ url('registration') }}" class="text-danger">Register</a>
						</div>

					</form>
					<!-- end form -->

				</div>
			</div>
		</div>
	</section>
	<!-- End Registration Form-1 Section -->
@endsection

	