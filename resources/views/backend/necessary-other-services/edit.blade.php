

    <form action="{{route('admin.necessary.other.service.update',$otherService->id)}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Other Service </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="postbody">
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Serial</label>
                            <input  name="custom_serial" type="text" value="{{$otherService->custom_serial}}" class="form-control" id="" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlText" class="form-label">Name</label>
                            <input required value="{{$otherService->title}}" name="title" type="text" class="form-control" id="exampleFormControlText" placeholder="">
                            The name is how it appears on your site.
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleFormControlText" class="form-label">Site URL</label>
                            <input required value="{{$otherService->side_url}}" name="side_url" type="text" class="form-control" id="exampleFormControlText" placeholder="">
                            <p>The “Site URL” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                        </div>

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            @if ($otherService->photo)
                            <img width="120" height="80" src="{{ asset('storage/other-service/'.$otherService->photo) }}" class="attachment-60x60 size-60x60" alt="" loading="lazy">
                            @else
                            <img width="120" height="80" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy">
                            @endif
                        </div>
                        <hr>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <img id="blah"  />
                            <input type='file' name="photo" onchange="readURL(this);" style="margin-top: 10px;" />
                            <p>Maximum upload file size: 500 MB.</p>
                        </div>
                    </div>
                    {{-- <select name="status" id="filter-by-date" class="btn btn-sm btn-outline-secondary" required>
                        <option {{$otherService->status == "" ?'selected':''}} selected="selected" value="">News status</option>
                        <option {{$otherService->status == 1 ?'selected':''}} value="1">Active</option>
                        <option {{$otherService->status == 0?'selected':''}} value="0">Inactive</option>
                    </select> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Update Other Service"  class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>