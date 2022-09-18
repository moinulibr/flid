

    <form action="{{route('admin.photo.message.update',$photoMess->id)}}" method="POST"  enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Update Photo </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
            
                    <div class="postbody">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            @if ($photoMess->photo)
                            <img width="120" height="80" src="{{ asset('storage/photo-messages/'.$photoMess->photo) }}" class="attachment-60x60 size-60x60" alt="" loading="lazy">
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
                    <select name="status" id="filter-by-date" class="btn btn-sm btn-outline-secondary" required>
                        <option {{$photoMess->status == "" ?'selected':''}} selected="selected" value="">News status</option>
                        <option {{$photoMess->status == 1 ?'selected':''}} value="1">Active</option>
                        <option {{$photoMess->status == 0?'selected':''}} value="0">Inactive</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Update News Ticker"  class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>