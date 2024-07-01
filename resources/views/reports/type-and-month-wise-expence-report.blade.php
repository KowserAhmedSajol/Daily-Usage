@extends('layouts.main')
@section('header.title')
Report - Type And Month Wise Expence Report
@endsection

@section('main')
<div class="page-header page-header-light mb-2">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Type And Month Wise Expence Report</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="{{ route('reports.index') }}" class="breadcrumb-item">Reports</a>
                <span class="breadcrumb-item active">Type And Month Wise Expence Report</span>
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
                            <th class="text-center" width="20%">Actual Amount</th>
                            <th class="text-center" width="20%">Estimated Amount</th>
                        </tr>
                    </thead>
                    <tbody class="tbodySection" id="tbody">
                        <div id="overlay_2">
                            <div class="cv-spinner">
                                <div class="loader"></div>
                            </div>
                        </div>
                        @foreach ($types as $type)
                        <tr class="table-info">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $type->type }}</td>
                            <td class="text-center">0</td>
                            <td class="text-center">0</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection


@section('css')
    <style>
        /* HTML: <div class="loader"></div> */
        .loader {
        width: fit-content;
        font-weight: bold;
        font-family: monospace;
        white-space: pre;
        font-size: 30px;
        line-height: 1.2em;
        height:1.2em;
        overflow: hidden;
        }
        .loader:before {
        content:"Loading...\A⌰oading...\A⌰⍜ading...\A⌰⍜⏃ding...\A⌰⍜⏃⎅ing...\A⌰⍜⏃⎅⟟ng...\A⌰⍜⏃⎅⟟⋏g...\A⌰⍜⏃⎅⟟⋏☌...\A⌰⍜⏃⎅⟟⋏☌⟒..\A⌰⍜⏃⎅⟟⋏☌⟒⏁.\A⌰⍜⏃⎅⟟⋏☌⟒⏁⋔"; 
        white-space: pre;
        display: inline-block;
        animation: l39 1s infinite steps(11) alternate;
        }

        @keyframes l39 {
        100%{transform: translateY(-100%)}
        }


        #overlay_2 {
            position: absolute;
            top: 0;
            z-index: 1000;
            width: 100%;
            height: 100%;
            display: none;
            background: white;
        }

        .tbodySection {
            position: relative;
        }

        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 8px #ddd solid;
            border-top: 8px #0a3fd0 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }
        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
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
        $("#overlay_2").fadeIn(300);
        const months = ["","January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        let data = {};
		data.month      = $('#month').val();
		data.year      = $('#year').val();
        if(data.month != '' && data.year != '' ){
            
            $('#resultDate').html('Date: '+months[$('#month').val()]+', '+ $('#year').val());
            $.ajax({
                url      : `/api/report/type-and-month-wise-expence-report`,
                method   : "POST",
                dataType : "JSON", 
                data     : data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    var tbody = $('#tbody');
                    tbody.empty();

                    if (data.usages.length > 0) {
                        $.each(data.usages, function (index, usage) {
                            var row = `
                                <tr class="table-info">
                                    <td class="text-center">${index + 1}</td>
                                    <td class="text-center">${usage.type.type}</td>
                                    <td class="text-center">${usage.total_actual_amount}</td>
                                    <td class="text-center">${usage.total_estimated_amount}</td>
                                </tr>
                            `;
                            tbody.append(row);
                        });
                    } else {
                        var row = `
                            <tr class="table-info">
                                <td class="text-center" colspan="4">No data available for the selected month and year.</td>
                            </tr>
                        `;
                        tbody.append(row);
                    }
                    
                    $("#overlay_2").fadeOut(300);
                },
                error: function(err){
                    console.log('error', err);
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

