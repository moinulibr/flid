@extends('backend.dashboard.layouts.admin')

@section('content')

<!-- start page content wrapper-->
<div class="page-content-wrapper">
	<!-- start page content-->
	<div class="page-content">
		<!--start breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Add New Post</div>
		</div>
		<!--end breadcrumb-->

		<hr />
        @include('backend.dashboard.includes.message')
        
		<div class="card">
			<div class="card-body">
                <form action="{{route('admin.flss.post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-9">
                            <div class="postbody">
                                <div class="mb-3">
                                    <input name="title" class="form-control mb-2" type="text" placeholder="Add Title" aria-label="add title" />
                                    {{-- <p class="d-inline">Permalink:</p>
                                    <a href="#" class="d-inline">flid.org/pagetitle</a> id="div_editor1" --}}
                                </div>
                                {{--  <a href="/rd/posts/add-new.php" class="btn btn-sm btn-outline-secondary mb-2"><i class="bi bi-images"></i> Add Media</a> --}}
                                <div id="">
                                    <textarea name="description"  ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="postbox mb-3">
                                <div class="postbox-header">
                                    <h2>Publish</h2>
                                </div>
                                <div class="postbox-body">
                                    <input type="submit" name="page_status" value="Save Draft" class="btn btn-sm btn-outline-secondary mb-3">
                                    {{-- <a href="#" class="btn btn-sm btn-outline-secondary mb-3" style="float: right;">Preview</a> --}}
                                    {{-- <div class="misc-pub-section mb-3"><i class="bi bi-bookmark-star"></i> Status: <span id="post-status-display"> Draft </span></div>
                                    <div class="misc-pub-section mb-3">
                                        <i class="bi bi-calendar-day"></i> Date: <span id="post-status-display"> <?php echo date("d-m-Y"); ?></span>
                                    </div>
                                    <div id="time" class="misc-pub-section mb-3">
                                        <i class="bi bi-clock-history"></i> Time: <span id="post-status-display"> <?php $time = date("g:i:s a"); echo $time; ?> </span>
                                    </div> --}}
                                </div>
                                <div class="postbox-footer">
                                    {{-- <input type="submit"  name="status" value="Move to Trash" class="d-inline btn btn-sm btn-outline-secondary"> --}}
                                    @AdministratorEditor
                                    <input type="submit"  name="page_status" value="Publish" class="d-inline btn btn-sm btn-outline-secondary">
                                    @endAdministratorEditor 
                                    @Author
                                    <input type="submit"  name="page_status" value="Request To Publish" class="d-inline btn btn-sm btn-outline-secondary">
                                    @endAuthor
                                </div>
                            </div>
                    
                            <div class="postbox mb-3">
                                <div class="postbox-header">
                                    <h2>All Categories</h2>
                                </div>
                                <div class="postbox-body" style="max-height: 250px; overflow: hidden; overflow-x: hidden; overflow-y: auto;">
                                    @foreach($categories as $category)
                                        @if ($category->main_cat)
                                            <div class="main-cat">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="category_id[]" type="checkbox" value="{{$category->id}}" id="flexCheckDefault" />
                                                    <label class="form-check-label" for="flexCheckDefault">{{$category->name}}</label>
                                                </div>
                                            </div>
                                            @foreach ($category->parentCategories() as $item)
                                                <div class="sub-cat">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="category_id[]" type="checkbox" value="{{$item->id}}" id="flexCheckDefault" />
                                                        <label class="form-check-label" for="flexCheckDefault">{{$item->name}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                    
                            
                    
                            <div class="postbox mb-5">
                                <div class="postbox-header">
                                    <h2>Featured image</h2>
                                </div>
                                <div class="postbox-body">
                                    <!-- Button trigger modal -->
                                {{--  <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#imageModal">
                                    Set featured image
                                    </button> --}}
                                    <img id="blah"  />
                                    <input type='file' name="featured_image" onchange="readURL(this);" style="margin-top: 10px;" />
                                </div>
                            </div>

                        </div>
                        
                    </div>
                </form>
			</div>
		</div>
		<!--end card-->
	</div>
	<!-- end page content-->
</div>
<!--end page content wrapper-->


@endsection

@push('js')
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('admin.flss.post.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>

@endpush