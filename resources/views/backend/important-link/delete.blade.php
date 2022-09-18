<!-- Modal -->
{{-- <div class="modalEditShow modal fade modal-dialog modal-dialog-centered modal-dialog-scrollable" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
    
    <form action="{{route('admin.important.link.deleting',$inportLink->id)}}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Important Links</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
            
                    <div class="postbody">
                        <div class="mb-3">
                            <label for="exampleFormControlText" class="form-label">Link Name</label>
                            <input name="" value="{{$inportLink->link_name}}" type="text" disabled class="form-control" id="exampleFormControlText" placeholder="">
                        </div>
                    </div>
                   <span>Do you want to delete this??</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No Delete</button>
                
                    <input type="submit" value="Yes Delete"  class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
{{-- </div> --}}