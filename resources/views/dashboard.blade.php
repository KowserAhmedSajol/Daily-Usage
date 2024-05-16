@extends('layouts.main')
@section('header.title')
Dashboard: Add New Expence
@endsection

@section('main')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Add New Expence</h5>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<div class="card-body">

		<div class="row">
			<div class="col-md-3">
				<div class="form-group form-group-float">
					<label class="form-group-float-label animate">Title</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text"><i class="icon-pen-plus"></i></span>
						</span>
						<input id="title" type="text" class="form-control" placeholder="Add title">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-group-float">
					<label class="form-group-float-label animate">Actual Amount</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text"><i class="icon-coins"></i></span>
						</span>
						<input id="actual_amount" type="text" class="form-control" placeholder="Add Actual Amount*">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-group-float">
					<label class="form-group-float-label animate">Estimated Amount</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text"><i class="icon-coins"></i></span>
						</span>
						<input id="estimated_amount" type="text" class="form-control" placeholder="Add Estimated Amount*">
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group form-group-float">
					<label class="form-group-float-label animate">Type</label>
					<div class="input-group">
						<span style="width:100%">
							<select id="type" data-placeholder="Select a Type..."  class="form-control select-search" data-fouc>
									<option></option>
									@foreach ($types as $type)
									<option value="{{ $type->id }}">{{ $type->type }}</option>
									@endforeach
							</select>
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group form-group-float">
					<label class="form-group-float-label animate">Remark</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text"><i class="icon-info22"></i></span>
						</span>
						<input id="remark" type="text" class="form-control" placeholder="Add Remark">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-center">
				<button id="submitBtn" type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left legitRipple"><b><i class="icon-plus3"></i></b> Add New Expence</button>
			</div>
		</div>

	</div>
</div>
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Expences</h5>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<div class="card-body">
		{{-- <p class="mb-3">Example of <code>bordered framed</code> table inside card body. By default bordered table also doesn't have a border, to use border around the bordered table add <code>.table-framed</code> to the <code>&lt;table&gt;</code>.</p> --}}

		<div class="card card-table table-responsive shadow-0 mb-0">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">SL</th>
						<th class="text-center">Title</th>
						<th class="text-center">Actual Amount</th>
						<th class="text-center">Estimated Amount</th>
						<th class="text-center">Type</th>
						<th class="text-center">Date</th>
						<th class="text-center">Remark</th>
					</tr>
				</thead>
				<tbody id="tbody">
					
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection


@section('css')

@endsection


@section('js')



<script>
	$(document).ready(function() {
			loadTable();
			$(document).on('click','#submitBtn', addData);  

		});
	function loadTable()
		{
			$.ajax({
					url      : `/api/usage/all`,
					method   : "GET",
					dataType : "JSON", 
					headers: {
						"X-CSRF-TOKEN": $(document).find('[name="_token"]').val()
					},
					success     : function (data)
					{
						document.querySelector('#tbody').innerHTML = '';
						const tbody = document.querySelector('#tbody');
						let serialNumber = 1;
						const formatDate = (dateString) => {
							const options = { day: 'numeric', month: 'long', year: 'numeric' };
							return new Date(dateString).toLocaleDateString('en-US', options);
						};
						data.usages.forEach(usage => {
							
							
							const tr = document.createElement('tr');
							if(usage.actual_amount < usage.estimated_amount)
							{
								tr.classList.add('table-danger');
							}else if(usage.actual_amount > usage.estimated_amount){
								tr.classList.add('table-success');
							}else if(usage.actual_amount == usage.estimated_amount){
								tr.classList.add('table-info');
							}
							tr.innerHTML = `
									<td class="text-center">${serialNumber++}</td>
									<td class="text-center">${usage.title}</td>
									<td class="text-center">${usage.actual_amount}</td>
									<td class="text-center">${usage.estimated_amount}</td>
									<td class="text-center">${usage.type.type}</td>
									<td class="text-center">${formatDate(usage.created_at)}</td>
									<td class="text-center">${usage.remark ?? ''}</td>
							`;
							tbody.appendChild(tr);
						});
					},
					error(err){
						console.log('error')
						$("#po").select2({
							data: ""
						});
						$("#po").prop('disabled', true);
					}
				}); 
		}

		function addData()
		{
			let data = {};
			data.title      = $('#title').val();
			data.actual_amount      = $('#actual_amount').val();
			data.estimated_amount      = $('#estimated_amount').val();
			data.type      = $('#type').val();
			data.remark      = $('#remark').val();
			console.log(data)
			if(data.type == null ||data.type == '' ){
				pl_swal(`Sewing Input Man Null!`);
				// alert('Type null');
				return false;
			}
			
				$.ajax({
					url      : `/api/usage/store`,
					method   : "POST",
					data     : data,
					dataType : "JSON",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					success     : function (data)
					{
						console.log('success');
						loadTable();
						$('#title').val('');
						$('#actual_amount').val('');
						$('#estimated_amount').val('');
						$('#type').val('');
						$('#remark').val('');
					},
					error(err){
						console.log('error')
						$("#po").select2({
							data: ""
						});
						$("#po").prop('disabled', true);
					}
				}); 
		}
</script>
@endsection

