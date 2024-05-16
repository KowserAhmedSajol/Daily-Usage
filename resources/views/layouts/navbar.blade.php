	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-teal-800 fixed-top">
		<div class="navbar-brand" style="padding:10px">
			<a href="index.html" class="d-inline-block">
				<img src="{{ asset('logo.png') }}" style="height:50px; width:200px;" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="navbar-text ml-md-3">
				{{-- <span class="badge badge-mark border-orange-300 mr-2"></span> --}}
				<i class="icon-heart5 mr-2"></i>Hello, {{ auth()->user()->name }}..!
			</span>

			<ul class="navbar-nav ml-md-auto">
				


				<li class="nav-item">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">
						<img src="{{ asset('storage/profile/images/' . auth()->user()->image) }}" class="rounded-circle mr-2" width="34" height="34" alt="">
						<span>{{ auth()->user()->name }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
						<a href="{{ route('logout') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->