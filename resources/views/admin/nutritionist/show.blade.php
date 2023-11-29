@extends('layouts.admin-app')

@section('content')
<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">{{ $data->name }}</h3>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
					<li class="breadcrumb-item"><a href="#">Nutritionist</a> </li>
					<li class="breadcrumb-item active">{{ $data->name }} </li>
				</ol>
			</div>
		</div>
	</div>
	<div class="content-header-right col-md-6 col-12">
		<div class="btn-group float-md-right">
			<a href="{{ route('nutritionist.index') }}" class="btn btn-info">Back to Nutritionist </a>
		</div>
	</div>
</div>

<section id="user-profile-cards-with-stats" class="row mt-2">
	<div class="col-xl-9">
		<section id="form-repeater">
			<div class="row">
				<div class="col-12">
					@if($errors->any())
					{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
					@endif
					@if (\Session::has('success'))
					<div class="alert alert-success">
						{!! \Session::get('success') !!}
					</div>
					@endif
					<div class="card">
						<div class="card-header">
							<h4 class="card-title" id="repeat-form">Add Client to {{ $data->name }}</h4>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
							<div class="card-body">
								<ul class="list-group">
									@foreach($data->clients as $key => $nut_clients)
									<li class="list-group-item">
										<a href="{{ route('checklist.show', $nut_clients->id) }}" class="btn btn-sm btn-warning float-right">Documents</a>
										<i class="la la-user"></i> {{ $nut_clients->user->name }} - {{ $nut_clients->user->email }}
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<h4 class="card-title" id="repeat-form">Add Client to {{ $data->name }}</h4>
							<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
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
							<div class="card-body">
								<form class="form row" action="{{ route('store.client') }}" method="post">
									<input type="hidden" value="{{ $data->id }}" name="nutritionist_id">
									@csrf
									<div class="form-group mb-1 col-sm-12 col-md-5">
										<label for="client">Client Name</label>
										<br>
										<select class="form-control" id="client" required name="client_id">
											<option value="">Select Client</option>
											@foreach($clients as $key => $client)
											<option value="{{ $client->id }}">{{ $client->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group col-sm-12 col-md-2 text-center mt-2">
										<button type="submit" class="btn btn-info btn-block" data-repeater-delete style="margin-top: 6px;"> Save Client</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="col-xl-3 col-md-6 col-12">
		<div class="card profile-card-with-stats">
			<div class="text-center">
				<div class="card-body"> <img src="{{ asset('images/user.jpg') }}" class="rounded-circle  height-150" alt="Card image"> </div>
				<div class="card-body pb-1">
					<h4 class="card-title">{{ $data->name }}</h4>
					<ul class="list-inline list-inline-pipe">
						<li>{{ $data->email }}</li>
					</ul>
					<h6 class="card-subtitle text-muted">{{ $data->phone }}</h6>
				</div>
				<div class="card-body pt-0">
					<hr>
					<p>{{ $data->comment }}</p>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection


@push('scripts')

@endpush