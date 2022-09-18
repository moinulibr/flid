<!-- Modal -->
{{-- <div class="modalEditShow modal fade modal-dialog modal-dialog-centered modal-dialog-scrollable" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
    
    <form action="{{route('admin.important.link.status.changing',$inportLink->id)}}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
            
                    <div class="postbody">
                        <div class="mb-3">
                            <label for="exampleFormControlText" class="form-label">Ticker News</label>
                            <textarea disabled type="text" class="form-control" id="exampleFormControlText">{{$inportLink->title}}</textarea>
                        </div>
                    </div>
                    <select name="status" id="filter-by-date" class="btn btn-sm btn-outline-secondary" required>
                        <option {{$inportLink->status == "" ?'selected':''}} selected="selected" value="">News status</option>
                        <option {{$inportLink->status == 1 ?'selected':''}} value="1">Active</option>
                        <option {{$inportLink->status == 0?'selected':''}} value="0">Inactive</option>
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