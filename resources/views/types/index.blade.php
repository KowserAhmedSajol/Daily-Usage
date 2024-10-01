@extends('layouts.main')
@section('header.title')
Types
@endsection

@section('main')
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Add New Type</h5>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<div class="card-body">
		@php
			$divisionOptions = $types->pluck('type', 'id')->toArray();
		@endphp
		{{-- <x-select
			table="tags"
		/> --}}
		<div class="row">
			<div class="col-md-12">
				<div class="form-group form-group-float">
					<label class="form-group-float-label animate">Type</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text"><i class="icon-statistics"></i></span>
						</span>
						<input type="text" id="type" class="form-control" placeholder="Add Type*">
					</div>
				</div>
			</div>
			<div class="col-md-12 text-center">
				<button id="submitBtn" type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left legitRipple"><b><i id="addBtnIcon" class="icon-plus3"></i></b> Add New Type</button>
			</div>
		</div>

	</div>
</div>

<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Added Data</h5>
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
						<th class="text-center">ID</th>
						<th class="text-center">Type</th>
						<th class="text-center">Date</th>
						<th class="text-center">Action</th>
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
			document.querySelector('#tbody').innerHTML = '';
			const tr = document.createElement('tr');
			tr.innerHTML = `
				<td colspan="5" class="text-center"><i class="icon-spinner6 spinner mr-2"></i></td>
			`;
			tbody.appendChild(tr);
			
			$.ajax({
					url      : `/api/types/all`,
					method   : "GET",
					dataType : "JSON",
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
						data.types.forEach(type => {
							const tr = document.createElement('tr');
							tr.innerHTML = `
								<td class="text-center">${serialNumber++}</td>
								<td class="text-center">${type.id}</td>
								<td class="text-center">${type.type}</td>
								<td class="text-center">${formatDate(type.created_at)}</td>
								<td class="text-center"></td>
								
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
			var addBtnIcon = document.getElementById('addBtnIcon');
			addBtnIcon.classList.remove('icon-plus3');
			addBtnIcon.classList.add('icon-spinner9');
			addBtnIcon.classList.add('spinner');
			let data = {};
			data.type      = $('#type').val();
			console.log(data)
			if(data.type == null ||data.type == '' ){
				new PNotify(
					{
						title: "<i class='icon-flip-horizontal2'></i> Type Input Error",
						text: "Type Must not be Null",
						addclass: "stack-bottom-right bg-danger border-danger",
						stack: $('html').attr('dir') == 'rtl' ? stack_bottom_right_rtl : stack_bottom_right
					}
				);
				return false;
			}
			
			$.ajax({
				url      : `/api/types/add`,
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
					$('#type').val('');
					var addBtnIcon = document.getElementById('addBtnIcon');
					addBtnIcon.classList.remove('icon-spinner9');
					addBtnIcon.classList.remove('spinner');
					addBtnIcon.classList.add('icon-plus3');
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
