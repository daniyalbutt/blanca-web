@extends('layouts.admin-app')

@section('content')
<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">Add Client</h3>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
					<li class="breadcrumb-item"><a href="#">Clients</a> </li>
					<li class="breadcrumb-item active">Add Client </li>
				</ol>
			</div>
		</div>
	</div>
	<div class="content-header-right col-md-6 col-12">
		<div class="btn-group float-md-right">
			<a href="{{ route('clients.index') }}" class="btn btn-info">Client List</a>
		</div>
	</div>
</div>

<div class="content-body">
	<!-- Basic form layout section start -->
	<section id="basic-form-layouts">
		<div class="row match-height">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title" id="basic-layout-form">Client Info</h4> <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
							@if (\Session::has('success'))
							<div class="alert alert-success">
								{!! \Session::get('success') !!}
							</div>
							@endif
							@if($errors->any())
							{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
							@endif
							<form class="form" method="post" action="{{ route('clients.store') }}">
								@csrf
								<div class="form-body">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="projectinput1">Name</label>
												<input type="text" id="projectinput1" class="form-control" placeholder="Name" name="name" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="projectinput3">E-mail</label>
												<input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="projectinput4">Contact Number</label>
												<input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone" required>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="projectinput5">Address</label>
												<input type="text" id="projectinput5" class="form-control" placeholder="address" name="address">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="projectinput8">About Client</label>
										<textarea id="projectinput8" rows="5" class="form-control" name="comment" placeholder="About Client"></textarea>
									</div>
								</div>
								<div class="form-actions">
									<button type="button" class="btn btn-warning mr-1"> <i class="ft-x"></i> Cancel </button>
									<button type="submit" class="btn btn-primary"> <i class="la la-check-square-o"></i> Save </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- // Basic form layout section end -->
</div>

@endsection