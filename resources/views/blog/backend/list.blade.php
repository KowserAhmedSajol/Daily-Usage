@extends('layouts.main')
@section('header.title')
BLogs: Index
@endsection

@section('main')

				<!-- Highlighting rows and columns -->
				<div class="card">
					<div class="card-header header-elements-inline bg-teal-800">
						<h5 class="card-title">Blogs List</h5>
						<div class="header-elements">
							<div class="list-icons">
								<a class="list-icons-item" data-action="collapse"></a>
							</div>
						</div>
					</div>
					<div class="card-body">
						@if(session()->has('success'))
							<div class="alert alert-success alpha-teal border-teal alert-styled-left alert-arrow-left alert-dismissible">
								<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
								<b>{{ session()->get('success') }}</b>
							</div>
						@endif
					</div>
					<table class="table table-bordered table-hover datatable-highlight">
						<thead>
							<tr>
								<th class="text-center">SL</th>
								<th class="text-center">Category</th>
								{{-- <th class="text-center">Sub Category</th> --}}
								<th class="text-center">Title</th>
								<th class="text-center">Slug</th>
								<th class="text-center">Image</th>
								<th class="text-center">Is Active</th>
								{{-- <th class="text-center">Serial</th> --}}
								<th class="text-center">Tags</th>
							</tr>
						</thead>
						<tbody>
							@if (count($blogs)>0)
                    @foreach ( $blogs as $blog )
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $blog->category->name }}</td>
                        {{-- <td class="text-center">{{ $blog->subCategory->name ?? '' }}</td> --}}
                        <td class="text-center">{{ $blog->title }}</td>
                        <td class="text-center">{{ $blog->slug }}</td>
                        <td class="text-center"> <img src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:150px; width:250px;" alt=""></td>
                        <td style="width: 8%;" class="text-center">
							@if ($blog->is_active == 0)
							<a href="{{ route('blogs.toggle-status',$blog->uuid) }}" class="btn btn-outline btn-warning border-warning text-warning btn-icon border-2 legitRipple">
								<i class="fas fa-lock"></i>
							</a>
							@else
							<a href="{{ route('blogs.toggle-status',$blog->uuid) }}" class="btn btn-outline btn-success border-success text-success btn-icon border-2 legitRipple">
								<i class="fas fa-lock-open"></i>
							</a>
							@endif
						</td>
                        {{-- <td class="text-center">{{ $blog->serial }}</td> --}}
                        <td class="text-center">
							@if (count($blog->tags)>0)
								@foreach ($blog->tags as $tag)
									<span class="badge badge-flat border-grey-800 text-default">{{ $tag->tag->title }}</span>
								@endforeach
							@else
								No Tag
							@endif
						</td>
                    </tr>
                    @endforeach
                    
                    @else
                    <tr>
                        <td colspan="9" class="text-center">No Blos posts Found</td>
                    </tr>
                    @endif
						</tbody>
					</table>
					
					<div class="card-footer text-right">
						<a href="{{ route('blogs.create') }}" class="btn btn-outline bg-teal border-teal text-teal-800 btn-icon border-2 legitRipple">
							<i class="icon-plus2"></i>
						</a>
					</div>
				</div>
				<!-- /highlighting rows and columns -->

{{-- <div class="card">
	<div class="card-header header-elements-inline bg-teal-800">
		<h5 class="card-title">Blogs List</h5>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>

	<div class="card-body">	

		@if(session()->has('success'))
			<div class="alert alert-success alpha-teal border-teal alert-styled-left alert-arrow-left alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
				<b>{{ session()->get('success') }}</b>
			</div>
		@endif
		<div class="card card-table table-responsive shadow-0 mb-0">
			<table class="table table-bordered">
				<thead class="bg-teal">
					<tr>
						<th class="text-center">SL</th>
						<th class="text-center">Category</th>
						<th class="text-center">Sub Category</th>
						<th class="text-center">Title</th>
						<th class="text-center">Slug</th>
						<th class="text-center">Image</th>
						<th class="text-center">Is Active</th>
						<th class="text-center">Serial</th>
						<th class="text-center">Tags</th>
					</tr>
				</thead>
				<tbody id="tbody">
                    @if (count($blogs)>0)
                    @foreach ( $blogs as $blog )
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $blog->category->name }}</td>
                        <td class="text-center">{{ $blog->subCategory->name ?? '' }}</td>
                        <td class="text-center">{{ $blog->title }}</td>
                        <td class="text-center">{{ $blog->slug }}</td>
                        <td class="text-center"> <img src="{{ asset('storage/blog/images') }}/{{ $blog->image }}" style="height:150px; width:250px;" alt=""></td>
                        <td style="width: 8%;" class="text-center">
							@if ($blog->is_active == 0)
							<a href="{{ route('blogs.toggle-status',$blog->uuid) }}" class="btn btn-outline btn-warning border-warning text-warning btn-icon border-2 legitRipple">
								<i class="fas fa-lock"></i>
							</a>
							@else
							<a href="{{ route('blogs.toggle-status',$blog->uuid) }}" class="btn btn-outline btn-success border-success text-success btn-icon border-2 legitRipple">
								<i class="fas fa-lock-open"></i>
							</a>
							@endif
						</td>
                        <td class="text-center">{{ $blog->serial }}</td>
                        <td class="text-center">
							@if (count($blog->tags)>0)
								@foreach ($blog->tags as $tag)
									<span class="badge badge-flat border-grey-800 text-default">{{ $tag->tag->title }}</span>
								@endforeach
							@else
								No Tag
							@endif
						</td>
                    </tr>
                    @endforeach
                    
                    @else
                    <tr>
                        <td colspan="9" class="text-center">No Blos posts Found</td>
                    </tr>
                    @endif
				</tbody>
			</table>

		</div>
	</div>
    <div class="card-footer text-right">
        <a href="{{ route('blogs.create') }}" class="btn btn-outline bg-teal border-teal text-teal-800 btn-icon border-2 legitRipple">
            <i class="icon-plus2"></i>
        </a>
    </div>
</div> --}}
@endsection


@section('css')

@endsection


@section('js')


<script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script> 
<script src="{{ asset('global_assets/js/demo_pages/datatables_advanced.js') }}"></script>


@endsection

