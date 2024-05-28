@extends('layouts.main')
@section('header.title')
Report - Type Wise Expence Report
@endsection

@section('main')
<div class="page-header page-header-light mb-2">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Type Wise Expence Report</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('reports.index') }}" class="breadcrumb-item">Reports</a>
                <span class="breadcrumb-item active">Type Wise Expence Report</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="input-group">
                        <span style="width:100%">
                            <select id="month" data-placeholder="Select a Month..."  class="form-control select-search" data-fouc>
                                    <option></option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="input-group">
                        <span style="width:100%">
                            <select id="year" data-placeholder="Select a Year..."  class="form-control select-search" data-fouc>
                                    <option></option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024" selected>2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                            </select>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title"><span style="font-size:16px" class="badge badge-light badge-striped badge-striped-left border-left-info"><b id="resultDate">Date: {{ \Carbon\Carbon::today()->format('M, Y') }}</b></span></h5>
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
                    <thead class="bg-teal-800">
                        <tr class="border-bottom-danger text-center">
                            <th class="text-center">SL</th>
                            <th class="text-center">Type</th>
                            <th class="text-center" width="15%">Actual Amount</th>
                            <th class="text-center" width="15%">Estimated Amount</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <tr class="table-info">
                            <td colspan="6" class="text-center">Select Month</td>
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
			$(document).on('change','#month', loadData);
			$(document).on('change','#year', loadData);
	});
    
    function loadData()
    {
        const months = ["","January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let data = {};
		data.month      = $('#month').val();
		data.year      = $('#year').val();
        if(data.month != '' && data.year != '' ){
            document.querySelector('#tbody').innerHTML = '';
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td colspan="4" class="text-center"><i class="icon-spinner6 spinner mr-2"></i></td> 
            `;
            tbody.appendChild(tr);
            $('#resultDate').html('Date: '+months[$('#month').val()]+', '+ $('#year').val());
                $.ajax({
				url      : `/api/report/type-wise-expence-report`,
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
                    // var m =null;
                    
                    
                        let totalActualAmount =0;
                        let totalItem =0;
                        let totalEstimatedItem =0;
                        let totalTypeItem =0;
                        for (const date in data.usages) {

                            const tr = document.createElement('tr');
			                tr.classList.add('bg-teal-400');
                            tr.innerHTML = `
                                    <td colspan="4" class="text-center">${date}</td>
                            `;
                            tbody.appendChild(tr);
                            for (const type in data.usages[date]) {
                                for (const item of data.usages[date][type]) {
                                    totalItem +=+item.actual_amount;
                                    totalEstimatedItem +=+item.estimated_amount;
                                }
                                const tr = document.createElement('tr');
                                tr.classList.add('table-info');
                                tr.innerHTML = `
                                        <td colspan="1" class="text-center">${serialNumber++}</td>
                                        <td colspan="1" class="text-center">${type}</td>
                                        <td colspan="1" class="text-center">${totalItem}</td>
                                        <td colspan="1" class="text-center">${totalEstimatedItem}</td>
                                `;
                                tbody.appendChild(tr);
                                totalItem = 0;
                                totalEstimatedItem = 0;
                            }
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
    }

</script>

@endsection

