@extends('layouts.main')
@section('header.title')
Income: Add New Income
@endsection

@section('main')

<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Add New Income</h5>
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
			<div class="col-md-4">
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
			<div class="col-md-4">
				<div class="form-group form-group-float">
					<label class="form-group-float-label animate">Amount</label>
					<div class="input-group">
						<span class="input-group-prepend">
							<span class="input-group-text"><i class="icon-coins"></i></span>
						</span>
						<input id="amount" type="text" class="form-control" placeholder="Add Amount*">
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group form-group-float">
					<label class="form-group-float-label animate">Type</label>
					<div class="input-group">
						<span style="width:100%">
							<select id="income_type_id" data-placeholder="Select an Income Type..."  class="form-control select-search" data-fouc>
									<option></option>
									@foreach ($incomeTypes as $type)
									<option value="{{ $type->id }}">{{ $type->income_type }}</option>
									@endforeach
							</select>
						</span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
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
			<div class="col-md-6 mt-4">
				<div class="form-group form-group-float">
                    <input type="text" id="pickDate" class="form-control pickadate" placeholder="Date&hellip;">
				</div>
			</div>
			<div class="col-md-12 text-center">
				<button id="submitBtn" type="button" class="btn bg-teal-400 btn-labeled btn-labeled-left legitRipple"><b><i id="addBtnIcon" class="icon-plus3"></i></b> Add New Income</button>
			</div>
		</div>

	</div>
</div>
<div class="card">
	<div class="card-header header-elements-inline">
		<h5 class="card-title">Incomes</h5>
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
						<th class="text-center">Income Type</th>
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

<script src="../../../../global_assets/js/plugins/forms/styling/uniform.min.js"></script>
<script src="../../../../global_assets/js/plugins/forms/styling/switchery.min.js"></script>
<script src="../../../../global_assets/js/plugins/forms/styling/switch.min.js"></script>

<script src="../../../../global_assets/js/demo_pages/form_checkboxes_radios.js"></script>

<script src="../../../../global_assets/js/plugins/ui/moment/moment.min.js"></script>
<script src="../../../../global_assets/js/plugins/pickers/daterangepicker.js"></script>
<script src="../../../../global_assets/js/plugins/pickers/anytime.min.js"></script>
<script src="../../../../global_assets/js/plugins/pickers/pickadate/picker.js"></script>
<script src="../../../../global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
<script src="../../../../global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
<script src="../../../../global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
<script src="../../../../global_assets/js/plugins/notifications/jgrowl.min.js"></script>
<script src="../../../../global_assets/js/demo_pages/picker_date.js"></script>



<script> 
	Pnotify.init();
	// SweetAlert.initComponents();
	$(document).ready(function() {
			loadTable();
			$(document).on('click','#submitBtn', addData);  

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            var mm = months[today.getMonth()];
            var yyyy = today.getFullYear();
            var formattedToday = dd + ' ' + mm + ', ' + yyyy;
            document.getElementById('pickDate').value = formattedToday;

		});


		function show_stack_bottom_right(type) {
			
			var stack_bottom_right = {"dir1": "left", "dir2": "up", "firstpos1": 20, "firstpos2": 20};
			var stack_bottom_right_rtl = {"dir1": "right", "dir2": "up", "firstpos1": 20, "firstpos2": 20};
            var opts = {
                title: "Over here",
                text: "Check me out. I'm in a different stack.",
                addclass: "stack-bottom-right bg-primary border-primary",
                stack: $('html').attr('dir') == 'rtl' ? stack_bottom_right_rtl : stack_bottom_right
            };
            switch (type) {
                
                case 'danger':
                opts.title = "Oh No danger";
                opts.text = "Watch out for that water tower!";
                opts.addclass = "stack-bottom-right bg-danger border-danger";
                opts.type = "error";
                break;
            }
            new PNotify(opts);
        }


		function loadTable()
		{
            document.querySelector('#tbody').innerHTML = '';
			const tr = document.createElement('tr');
			tr.innerHTML = `
				<td colspan="7" class="text-center"><i class="icon-spinner6 spinner mr-2"></i></td>
			`;
			tbody.appendChild(tr);
			$.ajax({
				url      : `/api/income/all`,
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
					data.incomes.forEach(income => {
						const tr = document.createElement('tr');
						
						tr.innerHTML = `
								<td class="text-center">${serialNumber++}</td>
								<td class="text-center">${income.title}</td>
								<td class="text-center">${income.amount}</td>
								<td class="text-center">${income.income_type.income_type}</td>
								<td class="text-center">${income.date}</td>
								<td class="text-center">${income.remark ?? ''}</td>
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
			data.title                  = $('#title').val();
			data.amount          		= $('#amount').val();
			data.income_type_id         = $('#income_type_id').val();
			data.remark                 = $('#remark').val();
			data.date                   = $('#pickDate').val();

			if(data.amount == null ||data.amount == '' ){
				new PNotify(
					{
						title: "<i class='icon-cash2'></i> Amount Input Error",
						text: "Amount Must not be Null",
						addclass: "stack-bottom-right bg-danger border-danger",
						stack: $('html').attr('dir') == 'rtl' ? stack_bottom_right_rtl : stack_bottom_right
					}
				);
				return false;
			}
			
			if(data.income_type_id == null ||data.income_type_id == '' ){
				new PNotify(
					{
						title: "<i class='icon-flip-horizontal2'></i>Type Input Error",
						text: "Income Type Must not be Null",
						addclass: "stack-bottom-right bg-danger border-danger",
						stack: $('html').attr('dir') == 'rtl' ? stack_bottom_right_rtl : stack_bottom_right
					}
				);
				return false;
			}
            $.ajax({
                url      : `/api/income/store`,
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
                    $('#amount').val('');
                    $('#income_type_id').val('');
                    $('#remark').val('');
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

