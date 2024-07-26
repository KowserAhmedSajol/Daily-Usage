@extends('layouts.main')
@section('header.title')
Category: Index
@endsection

@section('main')


<div class="card">
	<div class="card-header header-elements-inline bg-teal-800">
		<h5 class="card-title">Categories</h5>
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
						<th class="text-center">Title</th>
						<th class="text-center">Slug</th>
						<th class="text-center">Image</th>
						<th class="text-center">Is Active</th>
						<th class="text-center">Serial</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody id="tbody">
                    @if (count($categories)>0)
                    @foreach ( $categories as $category )
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $category->name }}</td>
                        <td class="text-center">{{ $category->slug }}</td>
						<td style="width:10%" class="text-center"> <img src="{{ asset('storage/blog/category/images') }}/{{ $category->image }}" style="height:100px; width:300px;" alt=""></td>
                        <td style="width: 8%;" class="text-center">
							@if ($category->is_active == 0)
							<a href="{{ route('categories.toggle-status',$category->uuid) }}" class="btn btn-outline btn-warning border-warning text-warning btn-icon border-2 legitRipple">
								<i class="fas fa-lock"></i>
							</a>
							@else
							<a href="{{ route('categories.toggle-status',$category->uuid) }}" class="btn btn-outline btn-success border-success text-success btn-icon border-2 legitRipple">
								<i class="fas fa-lock-open"></i>
							</a>
							@endif
						</td>
                        <td class="text-center">{{ $category->serial }}</td>
                        <td class="text-center">
							<a href="{{ route('categories.destroy',$category->uuid) }}" class="btn btn-outline btn-danger border-danger text-danger btn-icon border-2 legitRipple">
								<i class="icon-bin2"></i>
							</a>
						</td>
                    </tr>
                    @endforeach
                    
                    @else
                    <tr>
                        <td colspan="7" class="text-center">No categories Found</td>
                    </tr>
                    @endif
				</tbody>
			</table>
		</div>
	</div>
    <div class="card-footer text-right">
        <a href="{{ route('categories.create') }}" class="btn btn-outline bg-teal border-teal text-teal-800 btn-icon border-2 legitRipple">
            <i class="icon-plus2"></i>
        </a>
    </div>
</div>
@endsection


@section('css')

@endsection


@section('js')




@endsection

