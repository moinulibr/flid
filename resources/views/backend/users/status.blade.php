<!-- Modal -->
{{-- <div class="modalEditShow modal fade modal-dialog modal-dialog-centered modal-dialog-otherServiceable" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> --}}
    
    <form action="{{route('admin.user.changing.status',[$user->id,$changingStatus])}}" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Change User Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
            
                    <div class="postbody">
                        @if ($user->photo)
                        <img width="120" height="80" src="{{ asset('storage/user/'.$user->photo) }}" class="attachment-60x60 size-60x60" alt="" loading="lazy">
                        @else
                        <img width="120" height="80" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy">
                        @endif
                    </div>
                    <div class="postbody">
                        Name : <strong>{{$user->name}}</strong>
                    </div>
                   <span>Do you want to change status ??</span>
                   <input type="hidden" name="changing_status" value="{{$changingStatus}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <input type="submit" value="Yes"  class="btn btn-primary">
                </div>
            </div>
        </div>
    </form>
{{-- </div> --}}