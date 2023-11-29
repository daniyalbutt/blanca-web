@extends('layouts.admin-app')
@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/fileinput.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.1/css/all.min.css" integrity="sha512-ioRJH7yXnyX+7fXTQEKPULWkMn3CqMcapK0NNtCN8q//sW7ZeVFcbMJ9RvX99TwDg6P8rAH2IqUSt2TLab4Xmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .assign-wrapper .select2-container .select2-selection--single {
        height: 34px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
    }
    .assign-wrapper .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 34px;
        padding-left: 15px;
    }
    .assign-wrapper .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 34px;
        top: 1px;
        right: 4px;
    }
    .assign-wrapper .input-group{
        flex-wrap: nowrap;
    }
    button.btn.btn-default.btn-secondary.fileinput-remove.fileinput-remove-button {
        background-color: #f44336 !important;
        color: white !important;
        border-right: 2px solid white;
    }

    a.btn.btn-default.btn-secondary.fileinput-upload.fileinput-upload-button {
        background-color: #003473 !important;
        color: white !important;
        border-right: 2px solid white;
    }
</style>
@endpush
@section('content')
<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">Checklist Documents</h3>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a> </li>
					<li class="breadcrumb-item"><a href="#">Clients</a> </li>
					<li class="breadcrumb-item active">Checklist Documents </li>
				</ol>
			</div>
		</div>
	</div>
	<div class="content-header-right col-md-6 col-12">
		<div class="btn-group float-md-right">
			<a href="#" class="btn btn-info">Nutritionist: {{ $data->nutritionist->name }} </a>
            <a href="#" class="btn btn-primary">Client: {{ $data->user->name }} </a>
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
						<h4 class="card-title" id="basic-layout-form">Attach Document</h4> <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
							<form class="form" method="post" action="{{ route('checklist.store') }}">
                                <input type="hidden" name="nutritionist_client_id" value="">
								@csrf
								<div class="form-body">
									<div class="row">
										<!-- <div class="col-md-12">
											<div class="form-group">
												<label for="comment">Comment</label>
												<input type="text" id="comment" class="form-control" placeholder="Comment" name="comment">
											</div>
										</div> -->
                                        <div class="col-md-12">
                                            <div class="form-group">
												<label for="image-file">Document</label>
                                                <input id="image-file" type="file" name="images[]" multiple data-browse-on-zone-click="true">
                                            </div>
                                        </div>
									</div>
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

<div class="row">
	<div class="col-12">
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
							@foreach($data->documents as $key => $document)
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
                                    <a href="#" class="btn btn-icon btn-danger btn-sm"><i class="la la-trash"></i></a>
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

@push('scripts')
<script src="{{ asset('js/fileinput.js') }}"></script>
<script src="{{ asset('js/fileinput-theme.js') }}"></script>
<script>
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    $(document).ready(function(){
        $("#image-file").fileinput({
            showUpload: true,
            theme: 'fa',
            dropZoneEnabled : true,
            uploadUrl: "{{ route('insert.files', $data->id) }}",
            overwriteInitial: false,
            maxFileSize:20000000,
            maxFilesNum: 20,
            uploadExtraData: function() {
                return {
                    created_at: $('.created_at').val()
                };
            }
        });
        $("#image-file").on('fileuploaded', function(event, data, previewId, index, fileId) {
            location.reload();
            var month_names_short = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            var response = data.response;
            $('.files').DataTable().destroy();
            for(var i = 0; i < response.files.length; i++){
                var formattedDate = new Date(response.files[i].created_at);
                var d = formattedDate.getDate();
                var m =  month_names_short[formattedDate.getMonth()];
                var y = formattedDate.getFullYear().toString().substr(-2);
                var hours = formattedDate.getHours();
                var minutes = formattedDate.getMinutes();
                var ampm = hours >= 12 ? 'pm' : 'am';
                hours = hours % 12;
                hours = hours ? hours : 12; // the hour '0' should be '12'
                minutes = minutes < 10 ? '0'+minutes : minutes;
                var strTime = hours + ':' + minutes + ' ' + ampm;
                var newDateTime = d + " " + m + ", " + y;
                $('#zero_configuration_table tbody').prepend('<tr>\
                                        <td>'+response.files[i].id+'</td>\
                                        <td>\
                                            <a href="/files/'+response.files[i].path+'" target="_blank">\
                                                <img src="/files/'+response.files[i].path+'" alt="'+response.files[i].name+'" width="100">\
                                            </a>\
                                        </td>\
                                        <td><button class="btn btn-dark btn-sm">'+response.files[i].name+'</button></td>\
                                        <td><button class="btn btn-secondary btn-sm">'+response.uploaded_by+'</button></td>\
                                        <td><button class="btn btn-primary btn-sm">'+newDateTime+'</button></td>\
                                        <td>\
                                            <div class="btn-group float-md-right ml-1">\
                                                <button class="btn btn-info dropdown-toggle btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Edit"></i></button>\
                                                <div class="dropdown-menu arrow">\
                                                    <a class="dropdown-item" href="/files/'+response.files[i].path+'" target="_blank"> View</a>\
                                                    <a class="dropdown-item" href="/files/'+response.files[i].path+'" download> Download</a>\
                                                    <a class="dropdown-item" href="#" onclick="deleteFile('+response.files[i].id+')"> Delete</a>\
                                                </div>\
                                            </div>\
                                        </td>\
                                    </tr>');
            }
            $("#image-file").fileinput('refresh');
            $("#image-file").fileinput('reset');
            toastr.success('Image Updated Successfully', '', {timeOut: 5000})
            $('.files').DataTable({
                order:[[0,"desc"]],
                responsive: true,
            });
        });
    })
</script>
@endpush