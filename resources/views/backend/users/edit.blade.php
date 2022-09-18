@extends('backend.dashboard.layouts.admin')

@section('content')
            <!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
				    
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Edit User</div>
						<!--div class="ps-3">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb mb-0 p-0 align-items-center">
									<li class="breadcrumb-item">
										<a href="javascript:;">
											<ion-icon name="home-outline"></ion-icon>
										</a>
									</li>
									<li class="breadcrumb-item active" aria-current="page">eCommerce</li>
								</ol>
							</nav>
						</div-->
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
					@include('backend.dashboard.includes.message')


					<div class="card">
						<div class="card-body">
							<form action="{{route('admin.user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="table-responsive-sm" style="padding-top: 20px;">
									<table class="form-table" role="presentation" style="width: 100%;">
										<tbody>
											<tr class="form-field form-required">
												<th scope="row">
													<label for="email">Email <span class="description">(required)</span></label>
												</th>
												<td><input type="email" class="form-control" disabled value="{{ $user->email }}" /></td>
											</tr>
											<tr class="form-field">
												<th scope="row">
													<label for="name">Name <span class="description">(required)</span></label>
												</th>
												<td><input name="name" required type="text" class="form-control" value="{{old('name') ?? $user->name }}" /></td>
											</tr>
											<tr class="form-field">
												<th scope="row">
													<label for="mobile">Phone <span class="description">(required)</span></label>
												</th>
												<td><input name="phone" required type="phone" class="form-control" value="{{old('phone') ?? $user->phone}}" /></td>
											</tr>
											<tr class="form-field">
												<th scope="row"><label for="password">Password (required)</label></th>
												<td><input name="password"  type="password" class="form-control" value="" /></td>
											</tr>
											<tr class="form-field">
												<th scope="row"><label for="password">Re-type Password (required)</label></th>
												<td><input name="password_confirmation"  type="password" id="password" class="form-control" value="" /></td>
											</tr>
											{{-- <tr class="form-field form-required user-pass2-wrap hide-if-js" style="display: none;">
												<th scope="row">
													<label for="pass2">Repeat Password <span class="description">(required)</span></label>
												</th>
												<td>
													<input name="pass2" type="password" id="pass2" autocomplete="off" aria-describedby="pass2-desc" />
													<p class="description" id="pass2-desc">Type the password again.</p>
												</td>
											</tr>
											<tr class="pw-weak" style="display: none;">
												<th>Confirm Password</th>
												<td>
													<label>
														<input type="checkbox" name="pw_weak" class="pw-checkbox" />
														Confirm use of weak password
													</label>
												</td>
											</tr> --}}
											<tr>
												<th scope="row">Send User Notification</th>
												<td>
													<input type="checkbox" value="1" name="send_user_notification" value="" @if ($user->send_user_notification == 1) checked="checked" @endif  />
													<label for="send_user_notification">Send the new user an email about their account.</label>
												</td>
											</tr>
											<tr class="form-field">
												<th scope="row"><label for="role">Role <span class="description">(required)</span></label></th>
												<td>
													<select name="user_role_id" id="role" required class="btn btn-sm btn-outline-secondary">
														@foreach ($userRoles as $item)	
															<option {{ $user->user_role_id == $item->id ?'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
														@endforeach
													</select>
												</td>
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
											<tr>
												<th scope="row"></th>
												<th>
													<div class="fileinput fileinput-new" data-provides="fileinput" style=" width: 200px;">
														<img id="blah"  />
														<input type='file' name="photo"  onchange="readURL(this);" />
													</div>
													<p>Maximum upload file size: 500 MB.</p>
												</th>
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
							</form>
						</div>
					</div>
					<!--end Card-->
					
					
				</div>
			    <!-- end page content-->
    		</div>
    		<!--end page content wrapper-->


@endsection