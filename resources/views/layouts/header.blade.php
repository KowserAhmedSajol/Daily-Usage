<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>
        @yield('header.title')
    </title>
    <link rel="icon" type="image/png" href="{{ asset('rel-icon.png') }}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
	
	<link href="{{ asset('global_assets/css/icons/fontawesome/styles.min.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
	<style>
		.nav-group-sub .nav-link{

		    padding: .625rem 0.25rem .625rem 1.5rem;
		}
	</style>
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/ui/ripple.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

	<script src="{{ asset('assets/js/app.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/streamgraph.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/sparklines.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/lines.js') }}"></script>	
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/areas.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/donuts.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/bars.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/progress.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/heatmaps.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/pies.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_charts/pages/dashboard/light/bullets.js') }}"></script>

	<script src="{{ asset('global_assets/js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script> 
	
	<script src="{{ asset('global_assets/js/plugins/notifications/pnotify.min.js') }}"></script>
	<script src="{{ asset('global_assets/js/demo_pages/extra_pnotify.js') }}"></script>
	
	<script>
		var stack_bottom_right = {"dir1": "left", "dir2": "up", "firstpos1": 20, "firstpos2": 20};
		var stack_bottom_right_rtl = {"dir1": "right", "dir2": "up", "firstpos1": 20, "firstpos2": 20};
	</script>
	
	<!-- /theme JS files -->

</head>