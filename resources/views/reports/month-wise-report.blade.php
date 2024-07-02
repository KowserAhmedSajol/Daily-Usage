@extends('layouts.main')
@section('header.title')
Report - Month Wise Expence Report
@endsection

@section('main')
<div class="page-header page-header-light mb-2">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Month Wise Expence Report</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('reports.index') }}" class="breadcrumb-item">Reports</a>
                <span class="breadcrumb-item active">Month Wise Expence Report</span>
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
                    <thead class="bg-info">
                        <tr class="border-bottom-danger text-center">
                            <th class="text-center">SL</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Actual Amount</th>
                            <th class="text-center">Estimated Amount</th>
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
            
            let totalDays = getTotalDaysInMonth(data.year, data.month);
            document.querySelector('#tbody').innerHTML = '';
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td colspan="4" class="text-center"><i class="icon-spinner6 spinner mr-2"></i></td> 
            `;
            tbody.appendChild(tr);
            $('#resultDate').html('Date: '+months[$('#month').val()]+', '+ $('#year').val());
                $.ajax({
				url      : `/api/report/month-wise-expence-report`,
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
                    if(data.usages.length > 0)
                    {
                        let totalActualAmount =0;
                        let totalEstimatedAmount =0;
                        data.usages.forEach(usage => {
                            totalActualAmount = totalActualAmount+Number(usage.total_actual_amount);
                            totalEstimatedAmount = totalEstimatedAmount+Number(usage.total_estimated_amount);
                            let bg = null
                            if(usage.total_actual_amount > usage.total_estimated_amount)
                            {
                                bg = 'table-danger';
                            }else if (usage.total_actual_amount < usage.total_estimated_amount)
                            {
                                bg = 'table-success';
                            }else{
                                bg = 'table-info';
                            }
                            const tr = document.createElement('tr');
			                tr.classList.add(bg);
                            tr.innerHTML = `
                                    <td class="text-center">${serialNumber++}</td>
                                    <td class="text-center">${usage.date}</td>
                                    <td class="text-center">${usage.total_actual_amount}</td>
                                    <td class="text-center">${usage.total_estimated_amount}</td>
                            `;
                            tbody.appendChild(tr);
                        });

                        var tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td colspan="2" class="text-center bg-teal">Total</td>
                            <td class="text-center bg-grey-300">${totalActualAmount}</td>
                            <td class="text-center bg-grey-300">${totalEstimatedAmount}</td>
                        `;
                        tbody.appendChild(tr);
                        
                        if(Number(totalActualAmount)/data.usages.length < Number(totalEstimatedAmount)/data.usages.length)
                        {
                            bg = 'success';
                        }else if (Number(totalActualAmount)/data.usages.length == Number(totalEstimatedAmount)/data.usages.length){
                            bg = 'info';
                        }else if (Number(totalActualAmount)/data.usages.length > Number(totalEstimatedAmount)/data.usages.length){
                            bg = 'warning';
                        }
                        var tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td colspan="3" class="text-center bg-${bg}">Average Actual Amount</td>
                            <td class="text-center">${(Number(totalActualAmount)/data.usages.length).toFixed(2)}</td>
                        `;
                        tbody.appendChild(tr);
                        var tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td colspan="3" class="text-center bg-slate">Average Estimated Amount</td>
                            <td class="text-center">${(Number(totalEstimatedAmount)/data.usages.length).toFixed(2)}</td>
                        `;
                        tbody.appendChild(tr);
                        var tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td colspan="3" class="text-center bg-orange">Average Month Amount</td>
                            <td class="text-center">${(Number(totalEstimatedAmount)/totalDays).toFixed(2)}</td>
                        `;
                        tbody.appendChild(tr);
                    }else{
                        const tr = document.createElement('tr');
			            tr.classList.add('table-danger');
                        tr.innerHTML = `
                            <td colspan="6" class="text-center">No Data Available For ${ months[$('#month').val()]}, ${ $('#year').val()}</td>
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
    }

    function getTotalDaysInMonth(year, month) {
        return new Date(year, month, 0).getDate();
    }
    // function loadData()
    // {
    //     document.querySelector('#tbody').innerHTML = '';
    //     const tr = document.createElement('tr');
    //     tr.innerHTML = `
    //         <td colspan="7" class="text-center"><i class="icon-spinner6 spinner mr-2"></i></td> 
    //     `;
    //     tbody.appendChild(tr);
    //     let data = {};
	// 	   data.date      = $('#pickDate').val();
    //     $('#resultDate').html('Date: '+$('#pickDate').val());
    //     $.ajax({
	// 			url      : `/api/report/date-wise-daily-report`,
	// 			method   : "POST",
	// 			dataType : "JSON", 
    //             data     : data,
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
	// 			success     : function (data)
	// 			{
	// 				document.querySelector('#tbody').innerHTML = '';
	// 				const tbody = document.querySelector('#tbody');
	// 				let serialNumber = 1;
	// 				const formatDate = (dateString) => {
	// 					const options = { day: 'numeric', month: 'long', year: 'numeric' };
	// 					return new Date(dateString).toLocaleDateString('en-US', options);
	// 				};
    //                 console.log(data.usages.length)
    //                 console.log("data.usages.length")
    //                 if(data.usages.length > 0)
    //                 {
    //                     let totalActualAmount =0;
    //                     let totalEstimatedAmount =0;
    //                     data.usages.forEach(usage => {
    //                         totalActualAmount = totalActualAmount+Number(usage.actual_amount);
    //                         totalEstimatedAmount = totalEstimatedAmount+Number(usage.estimated_amount);
    //                         const tr = document.createElement('tr');
	// 		                tr.classList.add('table-info');
    //                         tr.innerHTML = `
    //                                 <td class="text-center">${serialNumber++}</td>
    //                                 <td class="text-center">${usage.title}</td>
    //                                 <td class="text-center">${usage.type.type}</td>
    //                                 <td class="text-center">${usage.important == 1 ? 'Important':'Not Important'}</td>
    //                                 <td class="text-center">${usage.actual_amount}</td>
    //                                 <td class="text-center">${usage.estimated_amount}</td>
    //                         `;
    //                         tbody.appendChild(tr);
    //                     });

    //                     const tr = document.createElement('tr');
    //                     tr.innerHTML = `
    //                         <td colspan="4" class="text-center bg-teal">Total</td>
    //                         <td class="text-center">${totalActualAmount}</td>
    //                         <td class="text-center">${totalEstimatedAmount}</td>
    //                     `;
    //                     tbody.appendChild(tr);
    //                 }else{
    //                     const tr = document.createElement('tr');
	// 		                tr.classList.add('table-danger');
    //                     tr.innerHTML = `
    //                         <td colspan="6" class="text-center">No Data Available For ${ $('#pickDate').val()}</td>
    //                     `;
    //                     tbody.appendChild(tr);
    //                 }
	// 			},
	// 			error(err){
	// 				console.log('error')
	// 				$("#po").select2({
	// 					data: ""
	// 				});
	// 				$("#po").prop('disabled', true);
	// 			}
	// 		}); 
    // }
</script>

@endsection

