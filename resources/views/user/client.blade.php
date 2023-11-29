@extends('layouts.user-app')

@section('content')
<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">Client List</h3>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('user.home') }}">Home</a> </li>
					<li class="breadcrumb-item"><a href="#">Clients</a> </li>
					<li class="breadcrumb-item active">Client List </li>
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
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Client List</h4> <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach(auth()->user()->clients as $key => $value )
							<tr>
								<th scope="row">{{ ++$key }}</th>
								<td>{{ $value->user->name }}</td>
								<td>{{ $value->user->email }}</td>
								<td>{{ $value->user->phone }}</td>
								<td>
									<a href="{{ route('user.checklist', $value->user->id) }}" class="btn btn-sm btn-warning">Documents</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
