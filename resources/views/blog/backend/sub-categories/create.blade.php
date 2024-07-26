@extends('layouts.main')
@section('header.title')
Sub Category: Create
@endsection

@section('main')


<div class="card">
	<div class="card-header header-elements-inline bg-teal-800">
		<h5 class="card-title">Create Sub Categories</h5>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<form action="{{ route('sub-categories.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Category details</legend>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Select your state:</label>
									<select data-placeholder="Select your state" name="category_id" class="form-control form-control-select2" data-fouc>
										<option></option>
										@foreach ($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Enter Category name:</label>
									<input type="text" name="name" class="form-control" placeholder="nter Category name">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label>Slug:</label>
									<input type="text" name="slug" class="form-control" placeholder="Slug">
								</div>
							</div>
						</div>



						{{-- <div class="form-group">
							<label>Attach screenshot:</label>
							<input type="file" class="form-input-styld" data-fouc>
							<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
						</div> --}}
						<div class="form-group form-group-feedback form-group-feedback-left">
							<div class="">
								<input name="image" type="file" class="form-input-styled" data-fouc>
								<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
							</div>								{{-- <div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div> --}}
						</div>

					</fieldset>
				</div>
			</div>

			<div class="text-right">
				<button type="submit" class="btn bg-teal legitRipple">Create Sub Category <i class="icon-plus-circle2 ml-2"></i></button>
			</div>
		</form>
	</div>
    <div class="card-footer text-right">
        <a href="{{ route('sub-categories.index') }}" class="btn btn-outline bg-teal border-teal text-teal-800 btn-icon border-2 legitRipple">
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

<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>


@endsection