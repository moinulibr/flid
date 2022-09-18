4   @extends('backend.dashboard.layouts.admin')

@section('content')

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Media Library</div> 
						<a href="{{route('admin.media.create')}}" class="btn btn-sm btn-outline-secondary">Add New</a>
						<div class="ms-auto">
							
						</div>
					</div>
					<!--end breadcrumb-->

					<hr />

					<div class="card">
						<div class="card-body">
						    

							@include('backend.dashboard.includes.message')

							<div class="table-responsive" style=" padding-top: 10px;">
								<table id="post-pending" class="table table-striped table-bordered" style="width: 100%;">
									<thead>
										<tr>
											<th scope="col">Filter media</th>
											<th scope="col">Title</th>
											<th scope="col">Author</th>
											<th scope="col">Date</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($medias as $item)
										<tr>
											<td>
												<a href="#" class="box">
                                                    <img src="{{ asset('storage/media/'.$item->featured_image) }}"  alt="image" width="100px" >
												</a>
											</td>
											<td>
    										    <a href="">{{$item->title}}</a>
    											<div class="group-link">
    												<a class="#" href="{{route('admin.media.edit',$item->id)}}"> Edit</a> <span class="separetor"> | </span> 
    												<a class="deleteClass" data-href="{{route('admin.media.delete',$item->id)}}" href="#"> Trash</a>
    											</div>
    										</td>
    										<td>
    										    <a href="">{{$item->createdBY ? $item->createdBY->name : NULL }}</a>
    										</td>
											<td class="date column-date" data-colname="Date">
												{{ \Carbon\Carbon::parse($item->published_at)->format('Y/m/d h:i:s A')}}
											</td>
										</tr>
										@endforeach
									</tbody>
									<tfoot>
										<tr>
											<th scope="col">Filter media</th>
											<th scope="col">Title</th>
											<th scope="col">Author</th>
											<th scope="col">Date</th>
										</tr>
									</tfoot>
								</table>
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
                var url =  "{{ route('admin.media.bulk.deleting') }}";

                if(ids.length <= 0) return ;
                let decirectUrl = "{{route('admin.media.index')}}";
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