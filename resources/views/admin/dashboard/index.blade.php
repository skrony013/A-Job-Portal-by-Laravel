@extends('layouts.admin_layout')

@section('content')

<div class="page-wrapper">
	<div class="content container-fluid">
		<div class="row">
			@foreach($categories as $key=>$cat_item)
			<div class="col-xl-3 col-sm-6 col-12">
				<div class="card">
					<div class="card-body">
						<div class="dash-widget-header">
							<span class="dash-widget-icon bg-2">
								<img src="{{ url('upload/category/'.$cat_item->cat_img) }}" alt="img not found" class="img-fluid">
							</span>
							<div class="dash-count">
								<div class="dash-title">{{ $cat_item->cat_title }}</div>
								<div class="dash-counts">
									<p>({{ $cat_item->jobs_count  }})</p>
								</div>
							</div>
						</div>
						{{-- <div class="progress progress-sm mt-3">
							<div class="progress-bar bg-6" role="progressbar" style="width: 65%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<p class="text-muted mt-3 mb-0"><span class="text-success mr-1"><i class="fas fa-arrow-up mr-1"></i>2.37%</span> since last week</p> --}}
					</div>
				</div>
			</div>
			@endforeach
		</div>
	
		
	</div>
</div>

@endsection