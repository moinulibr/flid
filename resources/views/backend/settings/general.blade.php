@extends('backend.dashboard.layouts.admin')

@section('content')

            <!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					

					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">General Settings</div>
					</div>
					<!--end breadcrumb-->
					
					<hr>
					
					@include('backend.dashboard.includes.message')
					
					<div class="card">
						<div class="card-body"> 
							<form action="{{route('admin.setting.update',$setting->id)}}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="table-responsive-sm" style="padding-top: 20px;">
									<table class="form-table" role="presentation" style="width: 100%;">
										<tbody>
											<tr class="form-field form-required mb-3">
												<th scope="row" style="width: 20%;">
													<label for="site_title"> Site Title </label>
												</th>
												<td><input name="site_title" type="text"  class="form-control" value="{{$setting->site_title}}" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for="tagline"> Tagline </label>
												</th>
												<td><input name="tagline" type="text" class="form-control" value="{{$setting->tagline}}" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for="site_icon"> Site Icon </label>
												</th>
												<td>
													<div >
														<img src="{{ asset('storage/setting/site-icon/'.$setting->site_icon) }}" style="width:100px; height:auto;"alt="logo icon" />
													</div>
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<img id="blah"  />
														<input type='file' name="site_icon" onchange="readURL(this);" style="margin-top: 10px;" />
														<p>Maximum upload file size: 500 MB.</p>
													</div>
												</td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for="admin_logo"> Admin logo </label>
												</th>
												<td>
													<div >
														<img src="{{ asset('storage/setting/admin-logo/'.$setting->admin_logo) }}" style="width:100px; height:auto;"alt="logo icon" />
													</div>
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<img id="blah"  />
														<input type='file' name="admin_logo" onchange="readURL(this);" style="margin-top: 10px;" />
														<p>Maximum upload file size: 500 MB.</p>
													</div>
												</td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for="apps_logo"> Apps logo </label>
												</th>
												<td>
													<div >
														<img src="{{ asset('storage/setting/apps-logo/'.$setting->apps_logo) }}" style="width:100px; height:auto;"alt="logo icon" />
													</div>
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<img id="blah"  />
														<input type='file' name="apps_logo" onchange="readURL(this);" style="margin-top: 10px;" />
														<p>Maximum upload file size: 500 MB.</p>
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<input type="submit" value="Update" class="btn btn-primary" />
							</form>
						</div>
					</div>
					<!--end Card-->

					<br/>

					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">News Ticker Settings</div>
					</div>
					<!--end breadcrumb-->
					
					<hr>
					<div class="card">
						<div class="card-body"> 
							<form action="{{route('admin.setting.scroll.update',$setting->id)}}" method="POST">
								@csrf
								<div class="table-responsive-sm" style="padding-top: 20px;">
									<table class="form-table" role="presentation" style="width: 100%;">
										<tbody>
											<tr class="form-field form-required mb-3">
												<th scope="row" style="width: 20%;">
													<label for=""> Scrolling Speed </label>
												</th>
												<td><input name="scroll_speed" type="text" value="{{$setting->scroll_speed}}" class="form-control" aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for=""> Scrolling Color </label>
												</th>
												<td><input name="scroll_color" type="text" value="{{$setting->scroll_color}}"  class="form-control"  aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for=""> Scrolling Font Size </label>
												</th>
												<td><input name="scroll_font_size" type="text" value="{{$setting->scroll_font_size}}" class="form-control"  aria-required="true" autocapitalize="none" autocorrect="off" maxlength="60" /></td>
											</tr>
											
										</tbody>

									</table>
								</div>
								<input type="submit" value="Update" class="btn btn-primary" />
							</form>
						</div>
					</div>
					<!--end Card-->
					
					<hr>
					<div class="card">
						<div class="card-body"> 
							<form action="{{route('admin.setting.website.update',$setting->id)}}" method="POST">
								@csrf
								<div class="table-responsive-sm" style="padding-top: 20px;">
									<table class="form-table" role="presentation" style="width: 100%;">
										<tbody>
											<tr class="form-field form-required mb-3">
												<th scope="row" style="width: 20%;">
													<label for=""> FLID Website URL </label>
												</th>
												<td><input name="flid_website_url" type="text" value="{{$setting->flid_website_url}}" class="form-control" aria-required="true" autocapitalize="none" autocorrect="off"  /></td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for=""> FLID on Facebook URL </label>
												</th>
												<td><input name="flid_facebook_url" type="text" value="{{$setting->flid_facebook_url}}"  class="form-control"  aria-required="true" autocapitalize="none" autocorrect="off"  /></td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for=""> Rate this App </label>
												</th>
												<td><input name="rate_app" type="text" value="{{$setting->rate_app}}" class="form-control"  aria-required="true" autocapitalize="none" autocorrect="off"  /></td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for=""> Phone Number </label>
												</th>
												<td><input name="phone" type="text" value="{{$setting->phone}}" class="form-control"  aria-required="true" autocapitalize="none" autocorrect="off"  /></td>
											</tr>
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for=""> Facebook Messenger URL </label>
												</th>
												<td><input name="facebook_messenger_url" type="text" value="{{$setting->facebook_messenger_url}}" class="form-control"  aria-required="true" autocapitalize="none" autocorrect="off"  /></td>
											</tr>
											
										</tbody>

									</table>
								</div>
								<input type="submit" value="Update" class="btn btn-primary" />
							</form>
						</div>
					</div>
					<!--end Card-->
					
				</div>
			    <!-- end page content-->
    		</div>
    		<!--end page content wrapper-->


@endsection