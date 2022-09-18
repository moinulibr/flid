@extends('backend.dashboard.layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">
        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">   স্ক্রলিং নিউজ টিকার   </div>
            <!-- <div class="ms-auto">
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
            </div> -->
        </div>
        <!--end breadcrumb-->

        <hr />

        <div class="card">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{route('admin.scrolling.news.ticker.store')}}">
                            @csrf
                            <div class="postbody">
                                <h5>Add News Ticker</h5>
                                <div class="mb-3">
                                    <label for="exampleFormControlText" class="form-label">Ticker News</label>
                                    <textarea name="title" type="text" class="form-control" id="exampleFormControlText" placeholder=""></textarea>
                                    The nes is how it appears on your site.
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="exampleFormControlText" class="form-label">Site URL</label>
                                    <input type="text" class="form-control" id="exampleFormControlText" placeholder="">
                                    <p>The “Site URL” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                                </div> -->
                            </div>
                            <select name="status" id="filter-by-date" class="btn btn-sm btn-outline-secondary">
                                <option selected="selected" value="0">News status</option>
                                <option value="1">Active</option>
                                <option value="0">inactive</option>
                            </select>
                            <input type="submit" value="Add News Ticker" class="btn btn-sm btn-outline-secondary">
                        </form>
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
                                        <th style="width: 1%;">
                                            <input type="checkbox" onclick="toggle(this)">
                                        </th>
                                        <th style="width: 51%;">Ticker News</th>
                                        <th style="width: 19%;">Status</th>
                                        <th style="width: 19%;">Author</th>
                                        <th style="width: 10%;">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($datas as $item)
                                        <td>
                                            <input type="checkbox" name="foo" value="">
                                        </td>
                                        <td>
                                            <a href=""> 
                                                {{$item->title}}    
                                            </a>
                                        </td>
                                        <td> 
                                            @if ($item->status == 1)
                                                <span class="btn btn-sm btn-success"> Active</span>
                                                @else
                                                <span class="btn btn-sm btn-danger"> Inactive</span>
                                            @endif
 
                                            <div class="group-link">
                                                <a class="#" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                <a class="#" href="#"> Trash</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#">
                                                {{$item->createdBY?$item->createdBY->name:""}} 
                                            </a> 
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->from_date)->format('Y/m/d h:i:s A')}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 1%;"><input type="checkbox" onclick="toggle(this)"></th>
                                        <th style="width: 51%;">Ticker News</th>
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