@extends('layouts.main')
@section('header.title')
Contacts: Index
@endsection

@section('main')


<div class="card">
	<div class="card-header header-elements-inline bg-teal-800">
		<h5 class="card-title">Contacts</h5>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>

	<div class="card-body">
		{{-- <p class="mb-3">Example of <code>bordered framed</code> table inside card body. By default bordered table also doesn't have a border, to use border around the bordered table add <code>.table-framed</code> to the <code>&lt;table&gt;</code>.</p> --}}
		<div class="card shadow">
			<div class="card-header header-elements-inline">
				<h6 class="card-title">Status</h6>
			</div>
			@php
				$total = count($contacts);
				$totalRead = count($contacts->where('status','1'));
				$totalUnRead = count($contacts->where('status','0'));
				$totalReadRate = (string)($totalRead/$total)*100;
				$totalUnReadRate = (string)($totalUnRead/$total)*100;
			@endphp
			<div class="card-body">
				<ul class="list-unstyled mb-0">
					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"><b>Read</b> <span class="text-muted ml-auto"><b>{{ $totalReadRate }}%</b></span></div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-info" style="width: {{ $totalReadRate }}%">
								<span class="sr-only">{{ $totalReadRate }}% Complete</span>
							</div>
						</div>
					</li>

					<li class="mb-3">
						<div class="d-flex align-items-center mb-1"><b>Unread</b> <span class="text-muted ml-auto"><b>{{ $totalUnReadRate }}%</b></span></div>
						<div class="progress" style="height: 0.375rem;">
							<div class="progress-bar bg-danger" style="width: {{ $totalUnReadRate }}%">
								<span class="sr-only">{{ $totalUnReadRate }}% Complete</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		
		@if(session()->has('success'))
			<div class="alert alert-success alpha-teal border-teal alert-styled-left alert-arrow-left alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
				<b>{{ session()->get('success') }}</b>
			</div>
		@endif
		<div class="card card-table table-responsive shadow mb-0">
			
			<table class="table table-bordered">
				<thead class="bg-teal">
					<tr>
						<th style="width:5%;" class="text-center">SL</th>
						<th style="width:15%;" class="text-center">Email</th>
						<th class="text-center">Subject</th>
						{{-- <th style="width:10%;" class="text-center">Status</th> --}}
						<th style="width:20%;" class="text-center">Action</th>
					</tr>
				</thead>
				<tbody id="tbody">
                    @if (count($contacts)>0)
                    @foreach ( $contacts as $contact )
					@php
						if ($contact->status == 0) {
							$table_bg = 'bg-warning';
						}elseif($contact->status == 1)
						{
							$table_bg = 'bg-success';
						}
					@endphp
                    <tr class="">
                        <td class="text-center {{ $table_bg }}">{{ $loop->iteration }}</td>
                        <td class="text-center {{ $table_bg }}">{{ $contact->email }}</td>
                        <td class="">{{ $contact->subject }}</td>
                        {{-- <td class="text-center">{{ $contact->status }}</td> --}}
                        <td class="text-center">
							<a href="{{ route('blogs.contacts.view',$contact->id) }}" class="btn btn-outline bg-teal border-teal text-teal-800 btn-icon border-2 legitRipple">
								<i class="fas fa-eye"></i>
							</a>
						</td>
                        
                    </tr>
                    @endforeach
                    
                    @else
                    <tr>
                        <td colspan="6" class="text-center">No Tags Found</td>
                    </tr>
                    @endif
				</tbody>
			</table>
		</div>
	</div>
    {{-- <div class="card-footer text-right">
        
    </div> --}}
</div>
@endsection


@section('css')

@endsection


@section('js')




@endsection

