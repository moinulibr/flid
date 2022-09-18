@extends('backend.dashboard.layouts.admin')

@section('content')

            <!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
				    
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Inactive Users</div> 
						<a href="{{route('admin.user.create')}}" class="btn btn-sm btn-outline-secondary">Add New</a>
						
						<div class="ms-auto">
							{{-- <div class="btn-group">
								<button type="button" class="btn btn-outline-dark">Settings</button>
								<button type="button" class="btn btn-outline-dark split-bg-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span></button>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
									<a class="dropdown-item" href="javascript:;">Action</a>
									<a class="dropdown-item" href="javascript:;">Another action</a>
									<a class="dropdown-item" href="javascript:;">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="javascript:;">Separated link</a>
								</div>
							</div> --}}
						</div>
					</div>
					<!--end breadcrumb-->

					<hr>

					@include('backend.dashboard.includes.message')
                    <div class="successMessage" style="display: none;">
                        <div class="alert alert-success alert-success-custom" role="alert">
                            <i class="fa fa-check"></i>
                            <span class="message"></span>
                        </div>  
                    </div>

					<div class="card">
						<div class="card-body">

							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$utyUrl == NULL ? 'active' : ''}}" href="{{route('admin.user.inactive.index','')}}">
										All <span>({{$userCountables->count()}})</span>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$utyUrl == 'administrator' ? 'active' : ''}}" href="{{route('admin.user.inactive.index','administrator')}}">
										Administrator
										<span>({{$userCountables->where('user_role_id',1)->count()}})</span>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$utyUrl == 'author' ? 'active' : ''}}" href="{{route('admin.user.inactive.index','author')}}">
										Author  
										<span>({{$userCountables->where('user_role_id',2)->count()}})</span>
									</a>
								</li>
								
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$utyUrl == 'editor' ? 'active' : ''}}" href="{{route('admin.user.inactive.index','editor')}}">
										Editor  
										<span>({{$userCountables->where('user_role_id',3)->count()}})</span>
									</a>
								</li>
							</ul>
							<div class="filter-button mt-2">
								<select name="bulk_action" id="filter-by-date" class="bulkActionButton btn btn-sm btn-outline-secondary">
									<option selected="selected" value="0">Bulk actions</option>
									<option value="1">Active</option>
								</select>
								<button type="button" class="deletedAllButton btn btn-sm btn-outline-secondary">Apply</button>
							</div>

							<div class="tab-content" id="myTabContent">

								<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
									<div class="table-responsive-sm" style="padding-top: 20px;">
										<table id="post-all" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													<th style="width: 1%;"><input class="check_all_class " type="checkbox" value="all" name="check_all" style=""></th>
													<th scope="col">Image</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Phone</th>
													<th scope="col">Status</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($users as $item)
													<tr>
														<td>
                                                            @if ($item->user_role_id != 1)
                                                            <input class="check_single_class" type="checkbox"  name="checked_id[]" value="{{ $item->id }}" id="{{$item->id}}" style="box-shadow:none;">
                                                            @else
                                                            <input  type="checkbox" disabled style="box-shadow:none;">
                                                            @endif
                                                        </td>
														<td>
															<span class="media-image">
																@if ($item->photo)
																<img width="60" height="50" src="{{ asset('storage/user/'.$item->photo) }}" class="attachment-60x60 size-60x60" alt="" loading="lazy">
																@else
																<img width="60" height="50" src="" class="attachment-60x60 size-60x60" alt="" loading="lazy">
																@endif
															</span> 
														</td>
														<td>
															<a >  {{$item->name}} </a>
															<div class="group-link">
                                                                @if ($item->user_role_id != 1)
																<a class="#" href="{{route('admin.user.edit',$item->id)}}"> Edit</a>  <span class="separetor"> | </span>
                                                                <a class="deleteClass" data-href="{{route('admin.user.change.status',[$item->id,1])}}" href="#"> Active</a> <span class="separetor"> | </span>
																<a class="#" href="{{route('admin.user.show',$item->id)}}"> View</a>
                                                                @endif
                                                             @if ($item->user_role_id == 1 && Auth::guard('web')->user()->id == $item->id )
                                                             	<a class="#" href="{{route('admin.user.edit',$item->id)}}"> Edit</a>  <span class="separetor"> | </span>
                                                                <a class="deleteClass" data-href="{{route('admin.user.change.status',[$item->id,2])}}" href="#"> Inactive</a> <span class="separetor"> | </span>
																<a class="#" href="{{route('admin.user.show',$item->id)}}"> View</a>
                                                             @endif
															</div>
														</td>
														<td> <a >   {{$item->email}} </a> </td>
														<td> <a >   {{$item->phone ?? NULL}} </a> </td>
														<td>
                                                            @if ($item->status == 1)
                                                                <span class="btn btn-sm btn-success">Active</span>
                                                                @else
                                                                <span class="btn btn-sm btn-danger">Inactive</span>
                                                            @endif
                                                        </td>
                                                        <td>
															{{$item->userRoles ? $item->userRoles->name : NULL}}
														</td>
														<td>
															<a href="">{{$item->postUser ? $item->postUser->count(): 0 }}</a>
														</td>
													</tr>
												@endforeach
											</tbody>
											<tfoot>
												<tr>
													<th style="width: 1%;"><input class="check_all_class " type="checkbox" value="all" name="check_all" style=""></th>
													<th scope="col">Image</th>
													<th scope="col">Name</th>
													<th scope="col">Email</th>
													<th scope="col">Phone</th>
													<th scope="col">Status</th>
													<th scope="col">Role</th>
													<th scope="col">Posts</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							
							</div>

						</div>
					</div>
					<!--end Card-->

					
					
				</div>
			    <!-- end page content-->
    		</div>
    		<!--end page content wrapper-->



			<div class="modal modalDeleteShow" id="modalDeleteShow"> </div>
			
@endsection



@push('js')
    <script>
         $(document).on('click','.deleteClass',function(e){
            e.preventDefault();
            url = $(this).data('href');
            $.ajax({
                url:url,
                success:function(response){
                    if(response.status == true)
                    {
                        $('.modalDeleteShow').html(response.html).modal('show');
                    }
                },
            });
        });

         

          // checked all order list 
          $(document).on('click','.check_all_class',function()
            { 
                displayNone();
                if (this.checked == false)
                {   
                    $('.check_single_class').prop('checked', false).change();
                    $(".check_single_class").each(function ()
                    {
                        var id = $(this).attr('id');
                        $(this).val('').change();
                    });
                }
                else
                {
                    $('.check_single_class').prop("checked", true).change();
                    $(".check_single_class").each(function ()
                    {
                        var id = $(this).attr('id');
                        $(this).val(id).change();
                    });
                }
            });
        // checked all order list 

        
        //check single order list
            $(document).on('click','.check_single_class',function()
            {
                displayNone();
                var $b = $('input[type=checkbox]');
                if($b.filter(':checked').length <= 0)
                {
                    $('.check_all_class').prop('checked', false).change();
                }

                var id = $(this).attr('id');
                if (this.checked == false)
                {
                    $(this).prop('checked', false).change();
                    $(this).val('').change();
                }else{
                    $(this).prop("checked", true).change();
                    $(this).val(id).change();
                }
                
                var ids = [];
                $('input.check_single_class[type=checkbox]').each(function () {
                    if(this.checked){
                        var v = $(this).val();
                        ids.push(v);
                    }
                });
                if(ids.length <= 0)
                {
                    $('.check_all_class').prop('checked', false).change();
                }
            });
        //check single order list
            
        //bulk deleting (route for all checked product deleting)
       /*  $(document).on('click', '.deletedAll', function (){
            $('.alert-success').hide();
            $('#delete_modal').modal('show');
        }); */
        

            $(document).on('click', '.deletedAllButton', function (){
                displayNone();
               var option =  $('.bulkActionButton option:selected').val();
               if(option == 0)
               {
                   alert('Select Bulk Action : delete');
                   return 0;
               }
               var cstatus = 1;
                var ids = [];
                $('input.check_single_class[type=checkbox]').each(function () {
                    if(this.checked){
                        var v = $(this).val();
                        ids.push(v);
                    }
                });
                var url =  "{{ route('admin.user.bulk.change.status') }}";

                if(ids.length <= 0) return ;
                let decirectUrl = "{{route('admin.user.inactive.index')}}";
                $.ajax({
                    url: url,
                    data: {ids: ids,cstatus:cstatus},
                    type: "POST",
                    beforeSend:function(){
                        //$('#delete_modal').modal('hide');
                        //$('.loading').fadeIn();
                        //$('.loadingText').show();
                    },
                    success: function(response){
                        if(response.status == true)
                        {
                            $('.successMessage').show();
                            $('.alert-success-custom').show();
                            $('.message').text(response.mess);
                            setTimeout(function () {
                                $(location).attr('href', decirectUrl);
                            }, 2000);
                        }
                    },
                    complete:function(){
                        //$('.loading').fadeOut(); 
                        //$('.loadingText').hide();
                    },
                });
            });
        //bulk product deleting end
            function displayNone()
            {
                $('.alert-success').css({
                    "display" : 'none'
                });
                $('.alert-success-custom').css({
                    "display" : 'none'
                });
                $('.successMessage').hide();
                $('.message').text('');
            }
    </script>
@endpush