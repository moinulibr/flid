@extends('backend.dashboard.layouts.admin')

@section('content')

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Posts</div> 
						<a href="{{route('admin.post.create')}}" class="btn btn-sm btn-outline-secondary">Add New</a>
					</div>
					<!--end breadcrumb-->

					<hr />
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
									<a class="nav-link {{$ptyUrl == NULL ? 'active' : ''}}" href="{{route('admin.post.index','')}}">
										All <span>({{$postCountables->count()}})</span>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$ptyUrl == 'published' ? 'active' : ''}}" href="{{route('admin.post.index','published')}}">
										Published
										<span>({{$postCountables->where('status',1)->count()}})</span>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$ptyUrl == 'draft' ? 'active' : ''}}" href="{{route('admin.post.index','draft')}}">
										Draft  
										<span>({{$postCountables->where('status',2)->count()}})</span>
									</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link {{$ptyUrl == 'reqtopub' ? 'active' : ''}}" href="{{route('admin.post.index','reqtopub')}}">
										Request To Publish    
										<span>({{$postCountables->where('status',3)->count()}})</span>
									</a>
								</li>
								{{-- <li class="nav-item" role="presentation">
									<a class="nav-link {{$ptyUrl == 'pending' ? 'active' : ''}}" href="{{route('admin.post.index','pending')}}">
										Pending  
										<span>({{$postCountables->where('status',0)->count()}})</span>
									</a>
								</li> --}}
							</ul>

							{{-- <div class="filter-button mt-2">
								<select name="bulk_action" id="filter-by-date" class="bulkActionButton btn btn-sm btn-outline-secondary">
									<option selected="selected" value="0">Bulk actions</option>
									<option value="1">Delete</option>
								</select>
								<button type="button" class="deletedAllButton btn btn-sm btn-outline-secondary">Apply</button>
							</div> --}}
							{{-- <div class="filter-button mt-2">
								<select name="m" id="filter-by-date" class="btn btn-sm btn-outline-secondary">
									<option selected="selected" value="0">All dates</option>
									<option value="202203">March 2022</option>
									<option value="202104">April 2021</option>
									<option value="201712">December 2017</option>
									<option value="201711">November 2017</option>
									<option value="201710">October 2017</option>
								</select>
								<select name="cat" id="cat" class="btn btn-sm btn-outline-secondary">
									<option value="0">All Categories</option>
									<option class="level-0" value="16">Business</option>
									<option class="level-0" value="17">Entertaiment</option>
									<option class="level-0" value="18">Fashion</option>
									<option class="level-0" value="19">Life Style</option>
									<option class="level-0" value="20">Others</option>
									<option class="level-0" value="21">Technology</option>
									<option class="level-0" value="1">Uncategorized</option>
								</select>
								<button type="button" class="btn btn-sm btn-outline-secondary">Filter</button>
							</div> --}}

							<div class="tab-content" id="myTabContent">
								<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
									<div class="table-responsive" style=" padding-top: 10px;">
										<table id="post-all" class="table table-striped table-bordered" style="width: 100%;">
											<thead>
												<tr>
													{{-- <th style="width: 1%;">
														<input class="check_all_class " type="checkbox" value="all" name="check_all" style="">	
													</th> --}}
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($posts as $item)
												<tr>
													{{-- <td>
														<input class="check_single_class" type="checkbox"  name="checked_id[]" value="{{ $item->id }}" id="{{$item->id}}" style="box-shadow:none;">
													</td> --}}
													<td>
														@php
															$title = $item->title;
															if(strlen($item->title) > 60)
															{
																$len = substr($item->title,0,60);
																if(str_word_count($len) > 1)
																{
																	$title = implode(" ",(explode(' ',$len,-1)));
																}else{
																	$title = $len;
																}
																$title = $title ."...";
															}
														@endphp
															<a href="">{{$item->title}}</a>
														- @if ($item->status == 1)
															Publish
															@elseif ($item->status == 2)
															Draft
															@elseif ($item->status == 0)
															Pending
															@elseif ($item->status == 3)
															Request To Publish
															@endif
														<div class="group-link">
															<a class="#" href="{{route('admin.post.edit',$item->id)}}"> Edit</a> <span class="separetor"> | </span> 
															<a class="deleteClass" data-href="{{route('admin.post.delete',$item->id)}}" href="#"> Trash</a> <span class="separetor"> | </span>
															<a class="#" href="#"> View</a>
														</div>
													</td>
													<td>
														<a href="">{{$item->createdBY ? $item->createdBY->name : NULL }}</a>
													</td>
													<td>
														@foreach($item->cats()->whereNotNull('category_id')->get() as $index => $cat)
															<a href="#">{{$cat->category?$cat->category->name: 'No cat found' }}</a>
															@if ( ($index +(1)) < count($item->cats()->whereNotNull('category_id')->get()))
																,
															@endif
														@endforeach
													</td>
													{{-- <td>
														@foreach($item->cats()->whereNotNull('parent_id')->get() as $cat)
														<a href="">{{$cat->parentCategory->name}}</a>
														@endforeach
													</td> --}}
													<td class="date column-date" data-colname="Date">
														@if ($item->status == 1)
															Publish
															@elseif ($item->status == 2)
															Draft
															@elseif ($item->status == 0)
															Pending
														@endif
														<br />
														{{ \Carbon\Carbon::parse($item->updated_at)->format('Y/m/d h:i:s A')}}
													</td>
												</tr>
												@endforeach

												
											</tbody>
											<tfoot>
												<tr>
													{{-- <th style="width: 1%;">
														<input class="check_all_class " type="checkbox" value="all" name="check_all" style="">	
													</th> --}}
													<th scope="col">Title</th>
													<th scope="col">Author</th>
													<th scope="col">Categories</th>
													<th scope="col">Status Date</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>

							</div>
						</div>
					</div>
					<!--end card-->	
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
                var ids = [];
                $('input.check_single_class[type=checkbox]').each(function () {
                    if(this.checked){
                        var v = $(this).val();
                        ids.push(v);
                    }
                });
                var url =  "{{ route('admin.post.bulk.deleting') }}";

                if(ids.length <= 0) return ;
                let decirectUrl = "{{route('admin.post.index')}}";
                $.ajax({
                    url: url,
                    data: {ids: ids},
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