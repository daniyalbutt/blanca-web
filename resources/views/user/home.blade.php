@extends('layouts.user-app')

@section('content')
            <div class="content-header row"> </div>
			<div class="content-body">
				<!-- Revenue, Hit Rate & Deals -->
				<div class="row">
					<div class="col-xl-6 col-12">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="card pull-up">
									<div class="card-content">
										<div class="card-body">
											<div class="media d-flex">
												<div class="media-body text-left">
													<h6 class="text-muted">Total Clients </h6>
													<h3>{{ count(auth()->user()->clients) }}</h3>
												</div>
												<div class="align-self-center"> <i class="icon-user success font-large-2 float-right"></i> </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ Revenue, Hit Rate & Deals -->
			</div>
@endsection
