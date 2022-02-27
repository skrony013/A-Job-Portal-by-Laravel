
@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="row justify-content-lg-center">
			<div class="col-lg-10">
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Profile</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
								<li class="breadcrumb-item active">Profile</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="profile-cover">
					<div class="profile-cover-wrap">
						<img class="profile-cover-img" src="{{ asset('backend/img/cover-1.jpg') }}" alt="Profile Cover">

						<div class="cover-content">
							<div class="custom-file-btn">
								<input type="file" class="custom-file-btn-input" id="cover_upload">
								{{-- <label class="custom-file-btn-label btn btn-sm btn-white" for="cover_upload">
									<i class="fas fa-camera"></i>
									<span class="d-none d-sm-inline-block ml-1">Update Cover</span>
								</label> --}}
							</div>
						</div>

					</div>
				</div>
				<div class="text-center mb-5">
					<label class="avatar avatar-xxl profile-cover-avatar" for="avatar_upload">
						<img class="avatar-img" src="{{ url('upload/profile/'.$user_data->profile_img) }}" alt="Profile Image">
						{{-- <input type="file" id="avatar_upload">
						<span class="avatar-edit">
							<i data-feather="edit-2" class="avatar-uploader-icon shadow-soft"></i>
						</span> --}}
					</label>
					<h2>{{ $user_data->name }}</h2>
					<ul class="list-inline">
						<li class="list-inline-item">
							<i class="far fa-building"></i> <span>{{ $user_data->address }}</span>
						</li>
						{{-- <li class="list-inline-item">
							<i class="fas fa-map-marker-alt"></i> West Virginia, US
						</li> --}}
						<li class="list-inline-item">
							<i class="far fa-calendar-alt"></i> <span>Joined {{ $user_data->created_at->diffForHumans() }}</span>
						</li>
					</ul>
				</div>

			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-12">
				@if(session('status'))
				<h6 class="alert alert-success">{{ session('status') }}</h6>
				@endif
			</div>
		</div>
		<div class="row justify-content-lg-center">
			<div class="col-xl-9 col-md-9">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Profile</h5>
					</div>
					<div class="card-body">

						<form>
							<div class="row form-group">
								<label for="name" class="col-sm-3 col-form-label input-label">Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="name" placeholder="Your Name" value="{{ $user_data->name }}" readonly>
								</div>
							</div>
							<div class="row form-group">
								<label for="email" class="col-sm-3 col-form-label input-label">Email</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="email" placeholder="Email" value="{{ $user_data->email }}" readonly>
								</div>
							</div>
							<div class="row form-group">
								<label for="email" class="col-sm-3 col-form-label input-label">Address</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="email" placeholder="Email" value="{{ $user_data->address }}" readonly>
								</div>
							</div>
							{{-- <div class="text-right">
								<button type="submit" class="btn btn-primary">Save Changes</button>
							</div> --}}
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

{{-- <div class="col-xl-9 col-md-8">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Basic information</h5>
		</div>
		<div class="card-body">

			<form>
				<div class="row form-group">
					<label for="name" class="col-sm-3 col-form-label input-label">Name</label>
					<div class="col-sm-9">
						<div class="d-flex align-items-center">
							<label class="avatar avatar-xxl profile-cover-avatar m-0" for="edit_img">
								<img id="avatarImg" class="avatar-img" src="assets/img/profiles/avatar-02.jpg" alt="Profile Image">
								<input type="file" id="edit_img">
								<span class="avatar-edit">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 avatar-uploader-icon shadow-soft"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
								</span>
							</label>
						</div>
					</div>
				</div>
				<div class="row form-group">
					<label for="name" class="col-sm-3 col-form-label input-label">Name</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="name" placeholder="Your Name" value="Charles Hafner">
					</div>
				</div>
				<div class="row form-group">
					<label for="email" class="col-sm-3 col-form-label input-label">Email</label>
					<div class="col-sm-9">
						<input type="email" class="form-control" id="email" placeholder="Email" value="charleshafner@example.com">
					</div>
				</div>
				<div class="row form-group">
					<label for="phone" class="col-sm-3 col-form-label input-label">Phone <span class="text-muted">(Optional)</span></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="phone" placeholder="+x(xxx)xxx-xx-xx" value="+1 (304) 499-13-66">
					</div>
				</div>
				<div class="row form-group">
					<label for="location" class="col-sm-3 col-form-label input-label">Location</label>
					<div class="col-sm-9">
						<div class="mb-3">
							<input type="text" class="form-control" id="location" placeholder="Country" value="United States">
						</div>
						<div class="mb-3">
							<input type="text" class="form-control" placeholder="City" value="Charleston">
						</div>
						<input type="text" class="form-control" placeholder="State" value="West Virginia">
					</div>
				</div>
				<div class="row form-group">
					<label for="addressline1" class="col-sm-3 col-form-label input-label">Address line 1</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="addressline1" placeholder="Your address" value="2681  Columbia Mine Road">
					</div>
				</div>
				<div class="row form-group">
					<label for="addressline2" class="col-sm-3 col-form-label input-label">Address line 2 <span class="text-muted">(Optional)</span></label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="addressline2" placeholder="Your address">
					</div>
				</div>
				<div class="row form-group">
					<label for="zipcode" class="col-sm-3 col-form-label input-label">Zip code</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="zipcode" placeholder="Your zip code" value="25301">
					</div>
				</div>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Save Changes</button>
				</div>
			</form>

		</div>
	</div>
</div> --}}