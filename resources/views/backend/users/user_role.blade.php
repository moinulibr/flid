@extends('backend.dashboard.layouts.admin')

@section('content')
            <!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
				    
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Posts</div>
					</div>
					<!--end breadcrumb-->

					<hr />

					<div class="card">
						<div class="card-body">

							<div class="table-responsive-sm" style="padding-top: 20px;">
								<table id="example" class="table table-striped table-bordered" role="presentation" style="width: 100%;">
									<thead>
										<tr>
											<th scope="col">Roles</th>
											{{-- <th scope="col">Action</th> --}}
										</tr>
									</thead>
									<tbody>
										@foreach ($userRoles as $item)
											<tr class="form-field form-required mb-3">
												<th scope="row">
													<label for="user_login">{{$item->name}}</label>
												</th>
											</tr>
										@endforeach
										{{-- <tr class="form-field form-required mb-3">
											<th scope="row">
												<label for="user_login">Editor</label>
											</th>
											<td>
												<a href="#" class="btn btn-sm btn-outline-success px-5"><i class="bi bi-pencil-square"></i> Edit</a> &nbsp;
                                				<button data-href="#" class="btn btn-sm btn-outline-danger px-5"><i class="bi bi-trash"></i> Delete</button>
											</td>
										</tr>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for="user_login">Author</label>
											</th>
											<td>
												<a href="#" class="btn btn-sm btn-outline-success px-5"><i class="bi bi-pencil-square"></i> Edit</a> &nbsp;
                                				<button data-href="#" class="btn btn-sm btn-outline-danger px-5"><i class="bi bi-trash"></i> Delete</button>
											</td>
										</tr>
										<tr class="form-field form-required mb-3">
											<th scope="row">
												<label for="user_login">Contributor</label>
											</th>
											<td>
												<a href="#" class="btn btn-sm btn-outline-success px-5"><i class="bi bi-pencil-square"></i> Edit</a> &nbsp;
                                				<button data-href="#" class="btn btn-sm btn-outline-danger px-5"><i class="bi bi-trash"></i> Delete</button>
											</td>
										</tr> --}}
									</tbody>

								</table>
							</div>
						

						</div>
					</div>
					<!--end Card-->



				</div>
			    <!-- end page content-->
    		</div>
    		<!--end page content wrapper-->

@endsection		