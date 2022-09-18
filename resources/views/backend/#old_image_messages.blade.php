@extends('backend.dashboard.layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">
        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">  ছবি বার্তা  </div>
        </div>
        <!--end breadcrumb-->

        <hr />

        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-5">
                        <div class="postbody">
                            <h5>Add New Image</h5>
                            <div class="postbox-body mb-3">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <img id="blah"  />
                                    <input type='file' onchange="readURL(this);" style="margin-top: 10px;" />
                                    <p>Maximum upload file size: 500 MB.</p>
                                </div>
                            </div>
                        </div>
                        <select name="m" id="filter-by-date" class="btn btn-sm btn-outline-secondary">
                            <option selected="selected" value="0">Image status</option>
                            <option value="202203">Active</option>
                            <option value="202104">inactive</option>
                        </select>
                        <a href="/admin/posts/add-new.php" class="btn btn-sm btn-outline-secondary">Add New Image</a>
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
                                        <th style="width: 51%;">Image</th>
                                        <th style="width: 19%;">Status</th>
                                        <th style="width: 19%;">Author</th>
                                        <th style="width: 10%;">Date</th>
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
                                        <td> Active 
                                            <div class="group-link">
                                                <a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                <a class="#" href="#"> Trash</a>
                                            </div>
                                        </td>
                                        <td><a href="">Md. Samsul Alam</a> </td>
                                        <td>2022/03/17 at 3:15 pm</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
                                        <th style="width: 51%;">Image</th>
                                        <th style="width: 19%;">Status</th>
                                        <th style="width: 19%;">Author</th>
                                        <th style="width: 10%;">Date</th>
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