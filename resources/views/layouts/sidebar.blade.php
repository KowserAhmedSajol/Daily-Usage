		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center" style="margin-top: 4.25rem !important;">
							<a href="#">
								<img src="{{ asset('storage/profile/images/' . auth()->user()->image) }}" class="img-fluid rounded-circle shadow-1 mb-3" style="width:100px;height:100px;" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark">{{ auth()->user()->name }}</h6>
							<span class="font-size-sm text-white text-shadow-dark">{{ auth()->user()->email }}</span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="{{ route('profile') }}" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="icon-cog5"></i>
									<span>Account settings</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ route('logout') }}" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
								<i class="fas fa-chalkboard-teacher"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="" class="nav-link legitRipple "><i class="icon-blog"></i> <span>Blogs</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="categories">
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link legitRipple"><i class="icon-tree6"></i>Categories</a>
									<ul class="nav nav-group-sub" style="display: none;">
										<li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link legitRipple"><i class="icon-list"></i>List</a></li>
										<li class="nav-item"><a href="{{ route('categories.create') }}" class="nav-link legitRipple"><i class="icon-add-to-list"></i>Create</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link legitRipple"><i class="icon-tree6"></i>Sub Categories</a>
									<ul class="nav nav-group-sub" style="display: none;">
										<li class="nav-item"><a href="{{ route('sub-categories.index') }}" class="nav-link legitRipple"><i class="icon-list"></i>List</a></li>
										<li class="nav-item"><a href="{{ route('sub-categories.create') }}" class="nav-link legitRipple"><i class="icon-add-to-list"></i>Create</a></li>
									</ul>
								</li>
								<li class="nav-item nav-item-submenu">
									<a href="#" class="nav-link legitRipple"><i class="icon-price-tags"></i>Tags</a>
									<ul class="nav nav-group-sub" style="display: none;">
										<li class="nav-item"><a href="{{ route('tags.index') }}" class="nav-link legitRipple"><i class="icon-list"></i>List</a></li>
										<li class="nav-item"><a href="{{ route('tags.create') }}" class="nav-link legitRipple"><i class="icon-add-to-list"></i>Create</a></li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="{{ route('blogs.list') }}" class="nav-link legitRipple">
										<i style="font-weight: bold" class="icon-list"></i>
										<span>
											List
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('blogs.create') }}" class="nav-link legitRipple">
										<i style="font-weight: bold" class="icon-add-to-list"></i>
										<span>
											Create
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a target="_blank" href="{{ route('blogs.index') }}" class="nav-link legitRipple">
										<i style="font-weight: bold" class="icon-home2"></i>
										<span>
											Home
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('blogs.contacts') }}" class="nav-link legitRipple">
										<i style="font-weight: bold" class="fas fa-envelope"></i>
										<span>
											Contacts
										</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="{{ route('expence.index') }}" class="nav-link {{ request()->is('expence*') ? 'active' : '' }}">
								<i class="icon-folder-plus"></i>
								<span>
									Expences
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('income.index') }}" class="nav-link {{ request()->is('income') ? 'active' : '' }}">
								<i class="icon-folder-plus"></i>
								<span>
									Income
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('types.index') }}" class="nav-link {{ request()->is('types*') ? 'active' : '' }}">
								<i class="icon-flip-horizontal2"></i>
								<span>
									Types
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('income_types.index') }}" class="nav-link {{ request()->is('income_types*') ? 'active' : '' }}">
								<i class="icon-flip-horizontal2"></i>
								<span>
									Income Types
								</span>
							</a>
						</li>
						
						<li class="nav-item nav-item-submenu">
							<a href="" class="nav-link legitRipple {{ request()->is('reports*') ? 'active' : '' }}"><i class="icon-insert-template"></i> <span>Reports</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Reports">
								<li class="nav-item">
									<a href="{{ route('reports.index') }}" class="nav-link legitRipple {{ request()->is('reports') ? 'active' : '' }}">
										<i class="icon-chess"></i>
										<span>
											Dashboard
										</span>
									</a>
								</li>
								<li class="nav-item-divider"></li>
								<li class="nav-item">
									<a href="{{ route('reports.date-wise-daily-report') }}" class="nav-link legitRipple {{ request()->is('reports/date-wise-daily-report') ? 'active' : '' }}">
										<i class="icon-watch"></i>
										<span>
											Date Wise Daily Expence Report
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('reports.month-wise-expence-report') }}" class="nav-link legitRipple {{ request()->is('reports/month-wise-expence-report') ? 'active' : '' }}">
										<i class="icon-calendar52"></i>
										<span>
											Month Wise Expence Report
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('reports.type-wise-expence-report') }}" class="nav-link legitRipple {{ request()->is('reports/type-wise-expence-report') ? 'active' : '' }}">
										<i style="font-weight: bold" class="fab fa-buromobelexperte"></i>
										<span>
											Type Wise Expence Report
										</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ route('reports.type-and-month-wise-expence-report') }}" class="nav-link legitRipple {{ request()->is('reports/type-wise-expence-report') ? 'active' : '' }}">
										<i style="font-weight: bold" class="fab fa-buromobelexperte"></i>
										<span>
											Type And Month Wise Expence Report
										</span>
									</a>
								</li>
							</ul>
						</li>

						<!-- /main -->
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->