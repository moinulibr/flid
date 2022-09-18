@extends('backend.dashboard.layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">
        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Other services</div>
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
                
                <div class="row">
                    <div class="col-md-5">
                        <div class="postbody">
                            <h5>Add New Other service</h5>
                            <div class="mb-3">
                                <label for="exampleFormControlText" class="form-label">Name</label>
                                <input type="text" class="form-control" id="exampleFormControlText" placeholder="">
                                The name is how it appears on your site.
                            </div>
            
                            <div class="mb-3">
                                <label for="exampleFormControlText" class="form-label">Site URL</label>
                                <input type="text" class="form-control" id="exampleFormControlText" placeholder="">
                                <p>The “Site URL” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                            </div>
                            
                            <div class="postbox-body mb-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <img id="blah"  />
                                    <input type='file' onchange="readURL(this);" style="margin-top: 10px;" />
                                    <p>Maximum upload file size: 500 MB.</p>
                                </div>
                            </div>
                        </div>
                        <a href="/admin/posts/add-new.php" class="btn btn-sm btn-outline-secondary mb-5"> Add New Other service </a>
                    </div>
                    <div class="col-md-7">
                        <div class="filter-button mt-2">
                            <select name="m" id="filter-by-date" class="btn btn-sm btn-outline-secondary">
                                <option selected="selected" value="0">Bulk actions</option>
                                <option value="delete">Delete</option>
                            </select>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Apply</button>
                        </div>
                        <div class="table-responsive-sm" style="padding-top: 20px;">
                            <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="foo" value=""></td>
                                        <td>
                                            <a href="">
                                                <span class="media-image">
                                                    <img width="60" height="50" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy">
                                                </span> 
                                            </a>
                                        </td>
                                        <td>
                                            <a href="https://motshoprani.org/">  ছুটি ব্যবস্থাপনা  </a>
                                            <div class="group-link">
                                                <a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                <a class="#" href="#"> View</a>
                                            </div>
                                        </td>
                                        <td> <a href="https://motshoprani.org/">  https://motshoprani.org/ </a> </td>
                                        <td><a href="">S Alom</a> </td>
                                        <td class="date column-date" data-colname="Date">
                                            Published<br>
                                            2022/03/17 at 3:15 pm
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                            Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the default category Uncategorized. The default category cannot be deleted.
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--end card-->
    </div>
    <!-- end page content-->
</div>
@endsection