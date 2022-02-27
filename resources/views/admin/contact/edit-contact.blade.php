
@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Edit Service</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('dashboard/contact') }}">Contact</a>
						</li>
						<li class="breadcrumb-item active">Edit Service</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-8 offset-1">
				@if(session('status'))
				<h6 class="alert alert-success">{{ session('status') }}</h6>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-xl-8 d-flex offset-1">
				<div class="card flex-fill">
					<div class="card-header">
						<h5 class="card-title">Edit Service Info</h5>
					</div>
					<div class="card-body">
						<form action="{{ url('dashboard/contact/update-contact/'.$contact_data->id) }}" method="POST" enctype="multipart/form-data">

							@csrf
							@method('PUT')

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Name</label>
								<div class="col-lg-9">
									<input type="text" value="{{ $contact_data->name }}" class="form-control" name="name">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Email</label>
								<div class="col-lg-9">
									<input type="email" value="{{ $contact_data->email }}" class="form-control" name="email">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Subject</label>
								<div class="col-lg-9">
									<input type="text" value="{{ $contact_data->subject }}" class="form-control" name="subject">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Phone</label>
								<div class="col-lg-9">
									<input type="text" value="{{ $contact_data->phone }}" class="form-control" name="phone" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Message</label>
								<div class="col-lg-9">
									<textarea name="message" rows="4" cols="5" class="form-control" placeholder="Enter message">{{ $contact_data->message }}</textarea>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection