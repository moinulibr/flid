@extends('backend.dashboard.layouts.admin')

@section('content')

            <!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
				    
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Profile</div>
						
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
			
					<hr>
					<form action="{{route('admin.user.profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="card">
							<div class="card-body">
								
								@include('backend.dashboard.includes.message')

								<div class="table-responsive-sm" style="padding-top: 20px;">
									<table class="form-table" role="presentation" style="width: 100%;">
										<tbody>
											<tr class="form-field form-required">
												<th scope="row">
													<label for="email">Email</label>
												</th>
												<td>
													<input value="{{$user->email}}" disabled type="email" id="email" class="form-control" value="" />
													<input type="hidden" name="email" value="{{$user->email}}">
												</td>
											</tr>
											<tr class="form-field">
												<th scope="row"><label for="name">Name </label></th>
												<td>
													<input name="name" type="text" class="form-control" value="{{$user->name}}" />
												</td>
											</tr>
											<tr class="form-field">
												<th scope="row"><label for="mobile">Mobile</label></th>
												<td><input name="phone" type="phone" id="phone" class="form-control" value="{{$user->phone}}" /></td>
											</tr>
											<tr class="form-field">
												<th scope="row"><label for="password">Password (required:if change)</label></th>
												<td><input name="password" type="password"  class="form-control" /></td>
											</tr>
											<tr class="form-field">
												<th scope="row"><label for="password_confirmation">Re-type Password (required:if change password)</label></th>
												<td><input name="password_confirmation" type="password"  class="form-control" value="" /></td>
											</tr>
											@if ($user->photo)	
											<tr>
												<th scope="row"></th>
												<th>
													<div class="fileinput fileinput-new" data-provides="fileinput" style=" width: 200px;">
														<img src="{{ asset('storage/user/'.$user->photo) }}" alt="" style="height:120px;  margin-top: 10px;">
													</div>
												</th>
											</tr>
											@endif
											<tr class="form-field">
												<th scope="row"><label for="photo">Profile Picture</label></th>
												<td><input name="photo" type="file"  class="form-control"/></td>
											</tr>
											
											<tr>
												<th scope="row">Send User Notification</th>
												<td>
													<input type="checkbox" name="send_user_notification" id="send_user_notification" value="1" checked="checked" />
													<label for="send_user_notification">Send the new user an email about their account.</label>
												</td>
											</tr>

											
											<tr class="form-field">
												<th scope="row"><label for="designation">Designation</label></th>
												<td><input name="designation" type="text" id="designation" class="form-control" value="{{$user->designation}}" /></td>
											</tr>
											<tr class="form-field">
												<th scope="row"><label for="office_address">Office Address</label></th>
												<td>
													<textarea name="office_address" id="office_address" cols="4"  class="form-control"  rows="2">{{$user->office_address}}</textarea>
												</td>
											</tr>
											<tr>
												<th scope="row"></th>
												<td>
													<input type="submit" value="Update" class="btn btn-primary" />
												</td>
											</tr>

										</tbody>

									</table>
								</div>
							

							</div>
						</div>
						<!--end Card-->
					</form>
					
				</div>
			    <!-- end page content-->
    		</div>
    		<!--end page content wrapper-->

@endsection