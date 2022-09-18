   
    <form action="{{route('admin.flss.category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Update Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <div class="postbody">
                        <h5>Edit New Category</h5>
                        <div class="mb-3">
                            <label for="exampleFormControlText" class="form-label">Name</label>
                            <input type="text" name="name"  value="{{old('name') ?? $category->name }}"  id="nameEdit" class="form-control" placeholder="">
                            The name is how it appears on your site.
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleFormControlText" class="form-label">Slug</label>
                            <input type="text"  id="slugEdit"  value="{{old('slug') ?? $category->slug }}" name="slug" class="form-control" placeholder="">
                            <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                        </div>
        
                        <div class="mb-3">
                            <label for="" class="form-label">Category Type</label>
                            <select name="category_type"  class="form-control category_type"  id="category_type">
                                <option {{ $category->main_cat == 1 ? 'selected':'' }} value="1">Main Category</option>
                                <option {{ $category->main_cat != 1 ? 'selected':'' }} value="2">Sub Category</option>
                            </select>
                        </div>

                        <div class="parentCategoryDiv"  style="display: none;">
                            <label for="" class="form-label">Parent Category</label><br>
                            <select name="parent_id"  class="form-control category_id">
                                <option value="" hidden>Select A Catgeory</option>
                                @foreach ($maincategories as $item)
                                    <option {{ $category->parent_id == $item->id ? 'selected' : '' }} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            <br> <p> You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</p>
                        </div>

                        <input type="hidden" value="{{ $category->main_cat ?? 0 }} " class="main_cat">
                        <div class="mb-3 custom_serial"  style="display:none;">
                            <label for="" class="form-label">Serial</label>
                            <input  name="custom_serial" type="text" value="{{$category->custom_serial}}" class="form-control" id="" placeholder="">
                        </div>
        
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description"  class="form-control"  rows="3">{{$category->description}}</textarea>
                            <p>The description is not prominent by default; however, some themes may show it.</p>
                        </div>
                        <div class="fileinput fileinput-new mb-3" data-provides="fileinput">
                            
                            <div>
                                <div class="fileinput fileinput-new" data-provides="fileinput" style=" width: 200px;">
                                    <img src="{{ asset('storage/flss-category/'.$category->photo) }}" alt="" style="height:120px;  margin-top: 10px;">
                                </div>
                                <span class="btn btn-default btn-file">
                                    <input type="file" name="cat_photo" accept="image/*" />
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Update"  class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>