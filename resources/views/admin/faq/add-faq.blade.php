
@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
	<div class="content container-fluid">

		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Add FAQ</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ url('dashboard/faq') }}">FAQ</a>
						</li>
						<li class="breadcrumb-item active">Add FAQ</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-10 offset-1">
				@if(session('status'))
				<h6 class="alert alert-success">{{ session('status') }}</h6>
				@endif
			</div>
		</div>
		<div class="row">
			<div class="col-xl-10 d-flex offset-1">
				<div class="card flex-fill">
					<div class="card-header">
						<h5 class="card-title">Enter FAQ Info</h5>
					</div>
					<div class="card-body">
						<form action="{{ url('dashboard/faq/add-faq') }}" method="POST" enctype="multipart/form-data" id="form">

							@csrf

							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Title</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" name="title" value="{{ old('title') }}">
									<div class="mt-2 text-danger">@error('title') {{ $message }} @enderror</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">FAQ</label>
								<div class="col-lg-9">
									<textarea name="faq" id="summernote" class="form-control" rows="4">{{ old('faq') }}</textarea>
									<div class="mt-2 text-danger">@error('faq') {{ $message }} @enderror</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label">Image</label>

								<div class="col-lg-9">
									<div class="faq_img_holder"></div>
									<input type="file" class="form-control" name="img" value="{{ old('img') }}">
									<div class="mt-2 text-danger">@error('img') {{ $message }} @enderror</div>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Add</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection