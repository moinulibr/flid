
<!-- The Modal -->
{{-- <div class="modal" id="myModal"> --}}
    {{-- <div class="modal-dialog">
      <div class="modal-content modal-sm">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div> --}}
 {{--  </div> --}}



<!-- Modal -->
{{-- <div class="modalEditShow modal fade modal-dialog modal-dialog-centered modal-dialog-scrollable" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
    
    <form action="{{route('admin.important.link.update',$inportLink->id)}}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Update Important Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
            
                    <div class="postbody">
                        <h5>Update Link</h5>
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Serial</label>
                            <input  name="custom_serial" type="text" value="{{$inportLink->custom_serial}}" class="form-control" id="" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlText" class="form-label">Link Name</label>
                            <input  required name="link_name" value="{{$inportLink->link_name}}" type="text" class="form-control" id="exampleFormControlText" placeholder="">
                            The name is how it appears on your site.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlText" class="form-label">Site URL</label>
                        <input required  name="side_url" value="{{$inportLink->side_url}}" type="text" class="form-control" id="exampleFormControlText" placeholder="">
                        <p>The “Site URL” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Update Link"  class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
{{-- </div> --}}