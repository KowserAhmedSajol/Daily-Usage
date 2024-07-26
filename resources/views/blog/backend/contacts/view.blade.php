@extends('layouts.main')
@section('header.title')
{{ $contact->subject ?? '' }}
@endsection

@section('main')


<div class="card">
	<div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <span style="font-size: 20px;" class="badge badge-flat border-grey text-grey-800 d-flex p-3 mb-2">Email: {{ $contact->email }}</span>
            </div>
            <div class="col-md-12">
                <span style="font-size: 20px;" class="badge badge-flat border-grey text-grey-800 d-flex p-3 mb-2">Subject: {{ $contact->subject }}</span>
            </div>
            <div class="col-md-12" style="">
                <div style="font-size: 20px; min-height: 300px; border:1px solid black; color:black;" class="border-grey text-grey-800 d-flex p-3 mb-2">{{ $contact->message }}</div>
            </div>
        </div>
	</div>
</div>
@endsection


@section('css')

@endsection


@section('js')




@endsection

