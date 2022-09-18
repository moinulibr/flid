@extends('backend.dashboard.layouts.admin')

@section('content')

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Edit Media</div>
					
						<div class="ms-auto">

						</div>
					</div>
					<!--end breadcrumb-->

					<hr />
					@include('backend.dashboard.includes.message')
					
					<div class="card">
						<div class="card-body">
							<form action="{{route('admin.media.update',$media->id)}}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="postbox mb-5">
									<div class="postbox-body">
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div>
												<img src="{{ asset('storage/media/'.$media->featured_image) }}"  alt="image" width="200" height="200" >
											</div>
											<br/>
											<p>file Upload</p>
											<img id="blah"  />
											<input name="featured_image" type='file'  onchange="readURL(this);" style="margin-top: 0px;" />
											<p>Maximum upload file size: 500 MB. for featured image</p>
										</div>
										<hr>
										<br/><br/>

										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div style="width: 100%;">
												@foreach ($media->MediaPhotos as $item)
													
													<div class="card" style="width: 18rem;float: left;border:1px solid rgb(164, 162, 162);">
														<img src="{{ asset('storage/media-photo/'.$item->photo) }}" class="card-img-top" alt="image" width="200" height="200" >
														<div class="card-body">
														  <a href="{{route('admin.media.single.photo.delete',$item->id)}}"><i class="fa fas-trash"></i>Delete</a>
														</div>
													</div>
												@endforeach
											</div>
											<br/>
											<div style="clear: both">
												<p>files Upload</p>
												<img id="blah"  />
												<input name="photo[]" type='file'   style="margin-top: 0px;" multiple />
												<p>Maximum upload file size: 500 MB.</p>
											</div>
										</div>
										<hr>
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<p>Title</p>
											<input name="title" type='text' value="{{ $media->title}}" required class="form-control" style="margin-top: 0px;"  />
										</div>
										<div class="fileinput fileinput-new"  data-provides="fileinput">
											<p>Publish Date</p>
											<input name="published_at" required type='date' value="{{ $media->published_at}}"  class="form-control" style="margin-top: 0px;"  />
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