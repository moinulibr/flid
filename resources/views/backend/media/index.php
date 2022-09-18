<?php include '../header.php';?>

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Media Library</div> <a href="/rd/media/add-new.php" class="btn btn-sm btn-outline-secondary">Add New</a>
						<div class="ms-auto">
							<div class="btn-group">
								<button type="button" class="btn btn-outline-dark">Settings</button>
								<button type="button" class="btn btn-outline-dark split-bg-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span></button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
									<a class="dropdown-item" href="javascript:;">Action</a>
									<a class="dropdown-item" href="javascript:;">Another action</a>
									<a class="dropdown-item" href="javascript:;">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="javascript:;">Separated link</a>
								</div>
							</div>
						</div>
					</div>
					<!--end breadcrumb-->

					<hr />

					<div class="card">
						<div class="card-body">
						    
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

							<div class="table-responsive" style=" padding-top: 10px;">
								<table id="post-all" class="table table-striped table-bordered" style="width: 100%;">
									<thead>
                                        <tr>
                                            <th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" name="foo" value=""></td>
                                            <td>
                                                <a href=""><span class="media-image"><img width="60" height="50" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy"></span>  
                        				            received_297835542392423
                                                </a>
                                                <p class="filename">
                                                    received_297835542392423.jpeg		
                                                </p>
                                                <div class="group-link">
                                                    <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                    <a class="#" href="#"> View</a>
                                                </div>
                                            </td>
                                            <td><a href="">Md. Samsul Alam</a> </td>
                                            <td class="date column-date" data-colname="Date">
                                                2022/03/17 at 3:15 pm
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="foo" value=""></td>
                                            <td>
                                                <a href=""><span class="media-image"><img width="60" height="50" src="https://motshoprani.org/wp-content/uploads/2022/03/274676793_370398131609192_1095899830870672975_n-768x597.jpg" class="attachment-60x60 size-60x60" alt="" loading="lazy"></span>  
                        				            received_297835542392423
                                                </a>
                                                <p class="filename">
                                                    received_297835542392423.jpeg		
                                                </p>
                                                <div class="group-link">
                                                    <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                    <a class="#" href="#"> View</a>
                                                </div>
                                            </td>
                                            <td><a href="">Md. Samsul Alam</a> </td>
                                            <td class="date column-date" data-colname="Date">
                                                2022/03/17 at 3:15 pm
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </tfoot>
								</table>
							</div>
							
						</div>
					</div>
					<!--end card-->
				</div>
				<!-- end page content-->
			</div>
			<!--end page content wrapper-->


<?php include '../footer.php';?>