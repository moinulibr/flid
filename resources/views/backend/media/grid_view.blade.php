@extends('backend.dashboard.layouts.admin')

@section('content')

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Media Library</div> 
						<a href="{{route('admin.media.create')}}" class="btn btn-sm btn-outline-secondary">Add New</a>
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

					<div class="card">
						<div class="card-body">
						    {{-- 
								<div class="view-switch media-grid-view-switch">
									<a href="/rd/media/index.php" class="view-list pe-3">
										<span class="screen-reader-text"><i class="bi bi-list-task"></i> List view</span>
									</a>
									<a href="/rd/media/grid-view.php" class="view-grid current" aria-current="page">
										<span class="screen-reader-text"><i class="bi bi-grid"></i> Grid view</span>
									</a>
								</div>
								
								<div class="filter-button mt-2">    
									<select name="m" id="filter-by-date" class="btn btn-sm btn-outline-secondary">
										<option selected="selected" value="0">All dates</option>
										<option value="202203">March 2022</option>
										<option value="202104">April 2021</option>
										<option value="201712">December 2017</option>
										<option value="201711">November 2017</option>
										<option value="201710">October 2017</option>
									</select>
									<select name="cat" id="cat" class="btn btn-sm btn-outline-secondary">
										<option value="0">All media items</option>
										<option class="level-0" value="16">Business</option>
										<option class="level-0" value="17">Entertaiment</option>
										<option class="level-0" value="18">Fashion</option>
										<option class="level-0" value="19">Life Style</option>
										<option class="level-0" value="20">Others</option>
										<option class="level-0" value="21">Technology</option>
										<option class="level-0" value="1">Uncategorized</option>
									</select>
									<button type="button" class="btn btn-sm btn-outline-secondary">Filter</button>
								</div>
							--}}
							
							<div class="table-responsive" style=" padding-top: 10px;">
										<table id="post-pending" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th scope="col">Filter media</th>
												</tr>
											</thead>
											<tbody>
                                                <tr style="width:25%; display: inline-block;">
													<td>
                                                        <a href="main-category.php" class="box">
                                                        <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                                        </a>
                                                        <span class="">imge name1</span>
													</td>
												</tr>
                                                <tr style="width:25%; display: inline-block;">
													<td>
                                                        <a href="main-category.php" class="box">
                                                        <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                                        </a>
                                                        <span class="">imge name2</span>
													</td>
												</tr>
                                                <tr style="width:25%; display: inline-block;">
													<td>
                                                        <a href="main-category.php" class="box">
                                                        <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                                        </a>
                                                        <span class="">imge name3</span>
													</td>
												</tr>
                                                <tr style="width:25%; display: inline-block;">
													<td>
                                                        <a href="main-category.php" class="box">
                                                        <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                                        </a>
                                                        <span class="">imge name4</span>
													</td>
												</tr>
                                                <tr style="width:25%; display: inline-block;">
													<td>
                                                        <a href="main-category.php" class="box">
                                                        <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                                        </a>
                                                        <span class="">imge name5</span>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
							
						</div>
					</div>
					<!--end card-->
				</div>
				<!-- end page content-->
			</div>
			<!--end page content wrapper-->


@endsection