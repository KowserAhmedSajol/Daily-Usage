@extends('layouts.main')
@section('header.title')
Tag: Create
@endsection

@section('main')


<div class="card">
	<div class="card-header header-elements-inline bg-teal-800">
		<h5 class="card-title">Create Tags</h5>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<form action="{{ route('tags.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Tag details</legend>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Enter tag name:</label>
									<input type="text" name="title" class="form-control" placeholder="Enter Tag name">
								</div>
							</div>
						</div>

					</fieldset>
				</div>
			</div>

			<div class="text-right">
				<button type="submit" class="btn bg-teal legitRipple">Create Tag <i class="icon-plus-circle2 ml-2"></i></button>
			</div>
		</form>
	</div>
    <div class="card-footer text-right">
        <a href="{{ route('tags.index') }}" class="btn btn-outline bg-teal border-teal text-teal-800 btn-icon border-2 legitRipple">
            <i class="icon-home2"></i>
        </a>
    </div>
</div>
@endsection


@section('css')

{{-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> --}}
<link href="../../../../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/layout.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/components.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/colors.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->
@endsection


@section('js')


<!-- Core JS files -->
<script src="../../../../global_assets/js/main/jquery.min.js"></script>
<script src="../../../../global_assets/js/main/bootstrap.bundle.min.js"></script>
<script src="../../../../global_assets/js/plugins/loaders/blockui.min.js"></script>
<script src="../../../../global_assets/js/plugins/ui/ripple.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script src="assets/js/app.js"></script>

<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script> 
<script src="{{ asset('global_assets/js/demo_pages/form_layouts.js') }}"></script> 


@endsection