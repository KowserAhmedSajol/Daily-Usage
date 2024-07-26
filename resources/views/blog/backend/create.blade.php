@extends('layouts.main')
@section('header.title')
Blog Post: Create
@endsection

@section('main')


<div class="card">
	<div class="card-header header-elements-inline bg-teal-800">
		<h5 class="card-title">Create Blog Post</h5>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Blog details</legend>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Select your Category:</label>
									<select data-placeholder="Select Category" name="category_id" id="category_id" class="form-control form-control-select2" data-fouc>
										<option></option>
										@foreach ($categories as $category)
											<option value="{{ $category->id }}">{{ $category->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							{{-- <div class="col-6">
								<div class="form-group">
									<label>Select your Sub Category:</label>
									<select data-placeholder="Select Sub Category" name="sub_category_id" id="sub_category_id" class="form-control form-control-select2" data-fouc>
										<option></option>
									</select>
								</div>
							</div> --}}
							<div class="col-12">
								<div class="form-group">
									<label>Enter Post Title:</label>
									<input type="text" name="title" id="title" class="form-control" placeholder="Enter Category name">
								</div>
							</div>
							<div class="col-12 mb-3">
								<div class="form-group" style="border-bottom:1px solid #DDDDDD">
									<label>Select Tags</label>
									<select name="tags[]" multiple="multiple" data-placeholder="Select a State..." class="form-control form-control-sm select" data-container-css-class="select-sm" data-fouc>
										<option></option>
										@foreach ($tags as $tag)
										<option value="{{ $tag->id }}">{{ $tag->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
                            <div class="col-12">
                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <div class="">
                                        <input name="image" type="file" title="image" class="form-input-styled" data-fouc>
                                        <span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
                                    </div>	
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea  name="description" rows="5" cols="5" class="form-control" placeholder="Enter Description here"></textarea>
                                </div>
                            </div> --}}
                            <div class="col-12">
                                <div id="description-section" class="mb-3">
									<textarea id="summernote" name="description"></textarea>
								</div>
                            </div>
						</div>

					</fieldset>
				</div>
			</div>

			<div class="text-right">
				<button type="submit" id="submitBtn" class="btn bg-teal legitRipple">Create <i class="icon-plus-circle2 ml-2"></i></button>
			</div>
		</form>
	</div>
    <div class="card-footer text-right">
        <a href="{{ route('blogs.list') }}" class="btn btn-outline bg-teal border-teal text-teal-800 btn-icon border-2 legitRipple">
            <i class="icon-home2"></i>
        </a>
    </div>
</div>
@endsection


@section('css')

{{-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> --}}
<link href="../../../../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}assets/css/layout.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}assets/css/components.min.css" rel="stylesheet" type="text/css">
<link href="{{ asset('') }}assets/css/colors.min.css" rel="stylesheet" type="text/css">
<!-- /global stylesheets -->
@endsection


@section('js')

<script>
	$(document).ready(function() {
		$('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });
		// $(document).on('change','#category_id', loadSubCategory);  
		// $(document).on('click','#submitBtn', saveBlog);  
	});
	// function loadSubCategory()
	// {
	// 	let data = {};
	// 	data.category_id  = $('#category_id').val();

	// 	$.ajax({
    //             url      : `/api/blogs/get-sub-category`,
    //             method   : "POST",
    //             data     : data,
    //             dataType : "JSON",
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success     : function (data)
    //             {
    //                 console.log(data);
	// 				$('#sub_category_id').empty();
	// 				$('select[name="sub_category_id"]').append('<option value="" disabled selected>Select PO</option>');
	// 				$.each(data.data, function(key, value) {
	// 					$('select[name="sub_category_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
	// 				});
    //             },
    //             error(err){
    //                 console.log('error')

    //             }
    //         });
	// }

</script>



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
<script src="{{ asset('global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/media/fancybox.min.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/blog_single.js') }}"></script>

<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/form_multiselect.js') }}"></script>

{{-- <script src="../../../../global_assets/js/demo_pages/form_multiselect.js"></script> --}}


@endsection