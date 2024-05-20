@extends('layouts.main')
@section('header.title')
Reports-Dashboard
@endsection

@section('main')
<div class="row">
    <div class="col-md-8">
        <div class="card bg-green-300">
            <div class="card-header bg-green-400" style="border-bottom:1px solid rgb(245, 244, 244)">
                <h5>Expences</h5>
            </div>
            <div class="card-body">
                <legend class="text-uppercase font-size-sm font-weight-bold">Overall</legend>
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-cart-remove icon-3x text-success-400"></i>
                                </div>
    
                                <div class="media-body text-right">
                                    <h3 style="color: black;" class="font-weight-semibold mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $total->totalUsage }}</h3>
                                    <span class="text-uppercase font-size-sm text-muted">total Expence</span>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-price-tag icon-3x text-indigo-400"></i>
                                </div>
    
                                <div class="media-body text-right">
                                    <h3 style="color: black;" class="font-weight-semibold mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $total->estimated_amount }}</h3>
                                    <span class="text-uppercase font-size-sm text-muted">Estimated</span>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h3 style="color: black;" class="font-weight-semibold mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $total->actual_amount }}</h3>
                                    <span class="text-uppercase font-size-sm text-muted">Actual</span>
                                </div>
    
                                <div class="ml-3 align-self-center">
                                    <i class="icon-file-check2 icon-3x text-blue-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h3 style="color: black;" class="font-weight-semibold mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $total->estimated_amount - $total->actual_amount }}</h3>
                                    <span class="text-uppercase font-size-sm text-muted">Saved</span>
                                </div>
    
                                <div class="ml-3 align-self-center">
                                    <i class="icon-piggy-bank icon-3x text-danger-400"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <legend class="text-uppercase font-size-sm font-weight-bold">This Month</legend>
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-blue-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $lastMonthTotal->totalUsage }}</h3>
                                    <span class="text-uppercase font-size-xs">Total expence this month</span>
                                </div>
    
                                <div class="ml-3 align-self-center">
                                    <i class="icon-cart-remove icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-danger-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $lastMonthTotal->estimated_amount }}</h3>
                                    <span class="text-uppercase font-size-xs">Estimated</span>
                                </div>
    
                                <div class="ml-3 align-self-center">
                                    <i class="icon-price-tag icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-success-400 has-bg-image">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-file-check2 icon-3x opacity-75"></i>
                                </div>
    
                                <div class="media-body text-right">
                                    <h3 class="mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $lastMonthTotal->actual_amount }}</h3>
                                    <span class="text-uppercase font-size-xs">Actual</span>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-sm-6 col-xl-3">
                        <div class="card card-body bg-indigo-400 has-bg-image">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-piggy-bank icon-3x opacity-75"></i>
                                </div>
    
                                <div class="media-body text-right">
                                    <h3 class="mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $lastMonthTotal->estimated_amount - $lastMonthTotal->actual_amount }}</h3>
                                    <span class="text-uppercase font-size-xs">Saved</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-teal-300">
            <div class="card-header bg-teal-400" style="border-bottom:1px solid rgb(245, 244, 244)">
                <h5>Incomes</h5>
            </div>
            <div class="card-body">
                <legend class="text-uppercase font-size-sm font-weight-bold">Overall</legend>
                <div class="row">
                    {{-- <div class="col-sm-12 col-xl-12">
                        <div class="card card-body">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-pointer icon-3x text-success-400"></i>
                                </div>
    
                                <div class="media-body text-right">
                                    <h3 style="color: black;" class="font-weight-semibold mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $incomeTotal->amount }}</h3>
                                    <span class="text-uppercase font-size-sm text-muted">total income</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-sm-12 col-xl-12">
                        <div class="card card-body bg-success-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $incomeTotal->amount }}</h3>
                                    <span class="text-uppercase font-size-xs">Total income</span>
                                </div>
    
                                <div class="ml-3 align-self-center">
                                    <i class="icon-credit-card icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
                <legend class="text-uppercase font-size-sm font-weight-bold">This Month</legend>
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="card card-body bg-info-400 has-bg-image">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $incomeLastMonthTotal->amount }}</h3>
                                    <span class="text-uppercase font-size-xs">Total income this month</span>
                                </div>
    
                                <div class="ml-3 align-self-center">
                                    <i class="icon-credit-card2 icon-3x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
    
    
                    {{-- <div class="col-sm-6 col-xl-6">
                        <div class="card card-body bg-success-400 has-bg-image">
                            <div class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-pointer icon-3x opacity-75"></i>
                                </div>
    
                                <div class="media-body text-right">
                                    <h3 class="mb-0"><i class="icon-coin-dollar icon-2x"></i> {{ $incomeLastMonthTotal->amount }}</h3>
                                    <span class="text-uppercase font-size-xs">Actual</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
    
                </div>
            </div>
        </div>
    </div>
</div>




{{-- reports --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Reports</h5>
                <div class="row row-tile no-gutters">
                    <div class="col-3">
                        <a href="{{ route('reports.date-wise-daily-report') }}" target="_blank" style="text-decoration: none" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-calendar icon-2x"></i>
                            <span>Date wise Daily Report</span>
                        </a>
        
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-dropbox text-blue-400 icon-2x"></i>
                            <span>Type Wise Report</span>
                        </button>
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-dropbox text-blue-400 icon-2x"></i>
                            <span>Date & Type Wise Report</span>
                        </button>
                    </div>
                    
                    <div class="col-3">
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-calendar2 text-info-400 icon-2x"></i>
                            <span>Week Wise Report</span>
                        </button>
        
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-google-drive text-success-400 icon-2x"></i>
                            <span>Google Drive</span>
                        </button>
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-google-drive text-success-400 icon-2x"></i>
                            <span>Google Drive</span>
                        </button>
                    </div>
                    <div class="col-3">
                        <a href="{{ route('reports.month-wise-expence-report') }}" target="_blank" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-calendar52 text-success-400 icon-2x"></i>
                            <span>Month Wise Report</span>
                        </a>
        
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-google-drive text-success-400 icon-2x"></i>
                            <span>Google Drive</span>
                        </button>
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-google-drive text-success-400 icon-2x"></i>
                            <span>Google Drive</span>
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-calendar3 text-pink-400 icon-2x"></i>
                            <span>All Time Report</span>
                        </button>
        
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-google-drive text-success-400 icon-2x"></i>
                            <span>Google Drive</span>
                        </button>
                        <button type="button" class="btn bg-white btn-block btn-float m-0 legitRipple">
                            <i class="icon-google-drive text-success-400 icon-2x"></i>
                            <span>Google Drive</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- /reports --}}
@endsection


@section('css')
<style>
	legend {
        
		padding-bottom:4px !important;
		margin-bottom:10px !important;
	}
</style>
@endsection


@section('js')

<script>
    $(document).ready(function() {
        $('.sidebar-control').click();
	});
</script>
@endsection
