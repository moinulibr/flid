<!-- Modal -->
{{-- <div class="modalEditShow modal fade modal-dialog modal-dialog-centered modal-dialog-photoMessable" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
    
    <form action="{{route('admin.necessary.other.service.status.changing',$photoMess->id)}}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
            
                    <div class="postbody">
                        @if ($photoMess->photo)
                        <img width="120" height="80" src="{{ asset('storage/photo-messages/'.$photoMess->photo) }}" class="attachment-60x60 size-60x60" alt="" loading="lazy">
                        @else
                        <img width="120" height="80" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy">
                        @endif
                    </div>
                    <select name="status" id="filter-by-date" class="btn btn-sm btn-outline-secondary" required>
                        <option {{$photoMess->status == "" ?'selected':''}} selected="selected" value="">News status</option>
                        <option {{$photoMess->status == 1 ?'selected':''}} value="1">Active</option>
                        <option {{$photoMess->status == 0?'selected':''}} value="0">Inactive</option>
                    </select>
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <input type="submit" value="Change Status"  class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
{{-- </div> --}}