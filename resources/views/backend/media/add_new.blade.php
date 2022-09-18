@extends('backend.dashboard.layouts.admin')

@section('content')

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Upload New Media</div>
					
						<div class="ms-auto">
							{{-- <div class="btn-group">
								<button type="button" class="btn btn-outline-dark">Settings</button>
								<button type="button" class="btn btn-outline-dark split-bg-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span></button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
									<a class="dropdown-item" href="javascript:;">Action</a>
									<a class="dropdown-item" href="javascript:;">Another action</a>
									<a class="dropdown-item" href="javascript:;">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="javascript:;">Separated link</a>
								</div>
							</div> --}}
						</div>
					</div>
					<!--end breadcrumb-->

					<hr />
					@include('backend.dashboard.includes.message')
					
					<div class="card">
						<div class="card-body">
							<form action="{{route('admin.media.store')}}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="postbox mb-5">
									<div class="postbox-body">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<p>file Upload</p>
											<img id="blah"  />
											<input name="featured_image" type='file' required onchange="readURL(this);" style="margin-top: 0px;" />
											<p>Maximum upload file size: 500 MB. for featured image</p>
										</div>
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<p>files Upload</p>
											<img id="blah"  />
											<input name="photo[]" type='file' required  style="margin-top: 0px;" multiple />
											<p>Maximum upload file size: 500 MB.</p>
										</div>
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<p>Title</p>
											<input name="title" type='text' required class="form-control" style="margin-top: 0px;"  />
										</div>
										<div class="fileinput fileinput-new"  data-provides="fileinput">
											<p>Publish Date</p>
											<input name="published_at" required type='date'  class="form-control" style="margin-top: 0px;"  />
											<br/>

											<input type="submit" value="Upload" class="btn btn-primary" />
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!--end card-->
				</div>
				<!-- end page content-->
			</div>
			<!--end page content wrapper-->


@endsection