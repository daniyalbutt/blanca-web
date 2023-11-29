@extends('layouts.user-app')

@section('content')
<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">Checklist Document</h3>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a> </li>
					<li class="breadcrumb-item"><a href="#">Client - {{ $client->name }}</a> </li>
					<li class="breadcrumb-item active">Checklist Document </li>
				</ol>
			</div>
		</div>
	</div>
	<div class="content-header-right col-md-6 col-12">
		<div class="btn-group float-md-right">
			
		</div>
	</div>
</div>  

<div class="row">
	<div class="col-12 col-lg-9">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Documents List</h4> <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
				<div class="heading-elements">
					<ul class="list-inline mb-0">
						<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
						<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
						<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
						<li><a data-action="close"><i class="ft-x"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="card-content collapse show">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">File</th>
								<th scope="col">Name</th>
								<th scope="col">Date</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($documents as $key => $document)
                            <tr>
                                <td>{{$document->id}}</td>
                                <td>
                                @php
                                    $temp= explode('.',$document->path);
                                    $extension = end($temp);
                                @endphp
                                @if(($extension == 'jpg') || ($extension == 'png') || (($extension == 'jpeg')))
                                <a href="{{asset('files/'.$document->path)}}" target="_blank">
                                    <img src="{{asset('files/'.$document->path)}}" alt="{{$document->name}}" width="100">
                                </a>
                                @else
                                <a href="{{asset('files/'.$document->path)}}" target="_blank">
                                    {{$document->name}}.{{$extension}}
                                </a>
                                @endif
                                </td>
                                <td>
                                    <button class="btn btn-dark btn-sm">{{$document->name}}</button>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm">{{$document->created_at->format('d M, y') }}</button>
                                </td>
                                <td>
                                    <a href="{{asset('files/'.$document->path)}}" download class="btn btn-icon btn-danger btn-sm"><i class="la la-download"></i></a>
                                </td> 
                            </tr>
                            @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
    <div class="col-xl-3 col-md-6 col-12">
		<div class="card profile-card-with-stats">
			<div class="text-center">
				<div class="card-body"> <img src="{{ asset('images/user.jpg') }}" class="rounded-circle  height-150" alt="Card image"> </div>
				<div class="card-body pb-1">
					<h4 class="card-title">{{ $client->name }}</h4>
					<ul class="list-inline list-inline-pipe">
						<li>{{ $client->email }}</li>
					</ul>
					<h6 class="card-subtitle text-muted">{{ $client->phone }}</h6>
                    <p>{{ $client->address }}</p>
				</div>
				<div class="card-body pt-0">
					<hr>
					<p>{{ $client->comment }}</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection