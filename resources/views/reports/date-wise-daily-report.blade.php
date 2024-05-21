@extends('layouts.main')
@section('header.title')
Report - Date Wise Daily Expence Report
@endsection

@section('main')
<div class="page-header page-header-light mb-2">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Date Wise Daily Expence Report</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('reports.index') }}" class="breadcrumb-item">Reports</a>
                <span class="breadcrumb-item active">Date Wise Daily Report</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-watch icon-2x"></i></span>
                        </span>
                        <input type="text" id="pickDate" class="form-control pickadate" placeholder="Try me&hellip;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title"><span style="font-size:16px" class="badge badge-light badge-striped badge-striped-left border-left-info"><b id="resultDate">Date: {{ \Carbon\Carbon::today()->format('d M, Y') }}</b></span></h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>


            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-info">
                        <tr class="border-bottom-danger text-center">
                            <th class="text-center">SL</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Is Important</th>
                            <th class="text-center">Actual Amount</th>
                            <th class="text-center">Estimated Amount</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr class="table-info">
                            <td colspan="6" class="text-center">Select A Date</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection


@section('css')

@endsection


@section('js')

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
    $(document).ready(function() {
			$(document).on('change','#pickDate', loadData);
	});

    function loadData()
    {
        document.querySelector('#tbody').innerHTML = '';
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td colspan="7" class="text-center"><i class="icon-spinner10 spinner mr-2"></i><i class="icon-spinner6 spinner mr-2"></i><i class="icon-spinner2 spinner mr-2"></i></td> 
        `;
        tbody.appendChild(tr);
        let data = {};
		data.date      = $('#pickDate').val();
        $('#resultDate').html('Date: '+$('#pickDate').val());
        $.ajax({
				url      : `/api/report/date-wise-daily-report`,
				method   : "POST",
				dataType : "JSON", 
                data     : data,
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
                    console.log(data.usages.length)
                    console.log("data.usages.length")
                    if(data.usages.length > 0)
                    {
                        let totalActualAmount =0;
                        let totalEstimatedAmount =0;
                        data.usages.forEach(usage => {
                            totalActualAmount = totalActualAmount+Number(usage.actual_amount);
                            totalEstimatedAmount = totalEstimatedAmount+Number(usage.estimated_amount);
                            const tr = document.createElement('tr');
			                tr.classList.add('table-info');
                            tr.innerHTML = `
                                    <td class="text-center">${serialNumber++}</td>
                                    <td class="text-center">${usage.title}</td>
                                    <td class="text-center">${usage.type.type}</td>
                                    <td class="text-center">${usage.important == 1 ? 'Important':'Not Important'}</td>
                                    <td class="text-center">${usage.actual_amount}</td>
                                    <td class="text-center">${usage.estimated_amount}</td>
                            `;
                            tbody.appendChild(tr);
                        });

                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td colspan="4" class="text-center bg-teal">Total</td>
                            <td class="text-center">${totalActualAmount}</td>
                            <td class="text-center">${totalEstimatedAmount}</td>
                        `;
                        tbody.appendChild(tr);
                    }else{
                        const tr = document.createElement('tr');
			                tr.classList.add('table-danger');
                        tr.innerHTML = `
                            <td colspan="6" class="text-center">No Data Available For ${ $('#pickDate').val()}</td>
                        `;
                        tbody.appendChild(tr);
                    }
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

