@extends('backend.dashboard.layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">
        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Important Links</div>
            {{-- <div class="ms-auto">
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
            </div> --}}
        </div>
        <!--end breadcrumb-->

        <hr />

        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-5">
                        <div class="postbody">
                            <h5>Add New Link</h5>
                            <div class="mb-3">
                                <label for="exampleFormControlText" class="form-label">Link Name</label>
                                <input type="text" class="form-control" id="exampleFormControlText" placeholder="">
                                The name is how it appears on your site.
                            </div>
        
                            <div class="mb-3">
                                <label for="exampleFormControlText" class="form-label">Site URL</label>
                                <input type="text" class="form-control" id="exampleFormControlText" placeholder="">
                                <p>The “Site URL” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                            </div>
                        </div>
                        <a href="/admin/posts/add-new.php" class="btn btn-sm btn-outline-secondary mb-5">Add New Link</a>
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
                                        <th scope="col">Link Name</th>
                                        <th scope="col">Site URL</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="foo" value=""></td>
                                        <td>
                                            <a href="" title="মৎস্য ও প্রাণিসম্পদ মন্ত্রণালয়">            মৎস্য ও প্রাণিসম্পদ মন্ত্রণালয়                    </a>
                                            <div class="group-link">
                                                <a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                <a class="#" href="#" target="_blank"> View</a>
                                            </div>
                                        </td>
                                        <td> <a href="https://mofl.gov.bd/">https://mofl.gov.bd/</a> </td>
                                        <td><a href="">Md. Samsul Alam</a> </td>
                                        <td>2022/03/17 at 3:15 pm</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
                                        <th scope="col">Link Name</th>
                                        <th scope="col">Site URL</th>
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