@extends('backend.dashboard.layouts.admin')

@section('content')

			<!-- start page content wrapper-->
			<div class="page-content-wrapper">
				<!-- start page content-->
				<div class="page-content">
					<!--start breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
						<div class="breadcrumb-title pe-3">Categories</div>
						<div class="ms-auto">
							
						</div>
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
                            <form action="{{route('admin.flss.category.store')}}" method="POST" enctype="multipart/form-data">
							@csrf
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="postbody">
                                            <h5>Add New Category</h5>


                                            <div class="mb-3">
                                                <label for="exampleFormControlText" class="form-label">Name</label>
                                                <input type="text" name="name"  value="{{old('name')}}"  id="name" class="form-control" placeholder="">
                                                The name is how it appears on your site.
                                            </div>
                            
                                            <div class="mb-3">
                                                <label for="exampleFormControlText" class="form-label">Slug</label>
                                                <input type="text"  id="slug"  value="{{old('slug')}}" name="slug" class="form-control" placeholder="">
                                                <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="" class="form-label">Category Type</label>
                                                <select name="category_type"  class="form-control category_type">
                                                    <option value="1">Main Category</option>
                                                    <option value="2">Sub Category</option>
                                                </select>
                                            </div>

                                            <div class="parentCategoryDiv"  style="display: none;">
                                                <label for="" class="form-label">Parent Category</label><br>
                                                <select name="parent_id"  class="form-control category_id">
                                                    <option value="" hidden>Select A Catgeory</option>
                                                    @foreach ($maincategories as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                <br> <p> You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</p>
                                            </div>

                                            <div class="mb-3 custom_serial" style="display:none;">
                                                <label for="" class="form-label">Serial</label>
                                                <input  name="custom_serial" type="text" class="form-control" id="" placeholder="">
                                            </div>
                            
                                            <div class="mb-3">
                                                <label for="" class="form-label">Description</label>
                                                <textarea name="description"  class="form-control"  rows="3">{{old('description')}}</textarea>
                                                <p>The description is not prominent by default; however, some themes may show it.</p>
                                            </div>
                                            <div class="fileinput fileinput-new mb-3" data-provides="fileinput">
                                                
                                                <div>
                                                    
                                                    <span class="btn btn-default btn-file">
                                                        <input type="file" name="photo" accept="image/*" />
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-sm btn-outline-secondary mb-5" value="Add New Category">
                                    </div>


                                    <div class="col-md-7">
                                        <div class="filter-button mt-2">
                                            <select name="bulk_action" id="filter-by-date" class="bulkActionButton btn btn-sm btn-outline-secondary">
                                                <option selected="selected" value="0">Bulk actions</option>
                                                <option value="1">Delete</option>
                                            </select>
                                            <button type="button" class="deletedAllButton btn btn-sm btn-outline-secondary">Apply</button>
                                        </div>
                                        <div class="table-responsive-sm" style="padding-top: 20px;">
                                            <table id="example" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <input class="check_all_class " type="checkbox" value="all" name="check_all" style="">    
                                                        </th>
                                                        <th scope="col">Serial</th>
                                                        <th>Image</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Slug</th>
                                                        <th scope="col">Categorie Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($categories as $item)
                                                        <tr>
                                                            <td>
                                                                <input class="check_single_class" type="checkbox"  name="checked_id[]" value="{{ $item->id }}" class="check_single_class" id="{{$item->id}}" style="box-shadow:none;">
                                                            </td>
                                                            <td>
                                                                @if ($item->main_cat == 1)
                                                                    {{$item->custom_serial}}
                                                                @else
                                                                -
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <img src="{{ asset('storage/flss-category/'.$item->photo) }}" alt="" style="width:100px; height:70px;  margin-top: 10px;">
                                                            </td>
                                                            <td>
                                                                <a href="">{!! \App\Models\User::getCatgeoryIcon($item) !!}{{$item->name}}</a>
                                                                <div class="group-link">
                                                                    <a class="editClass" data-href="{{route('admin.flss.category.edit',$item->id)}}" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                                    <a class="deleteClass" data-href="{{route('admin.flss.category.delete',$item->id)}}" href="#"> Trash</a> <span class="separetor"> | </span>
                                                                    <a class="#" href="{{$item->side_url}}" target="_blank"> View</a>
                                                                </div>
                                                            </td>
                                                            <td>{{$item->slug}}</td>
                                                            <td>{!! \App\Models\User::getCatgeoryType($item) !!}  </td>
                                                        </tr>
                                                    @endforeach


                                                    
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>
                                                            <input class="check_all_class " type="checkbox" value="all" name="check_all" style="">
                                                        </th>
                                                        <th scope="col">Serial</th>
                                                        <th>Image</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Slug</th>
                                                        <th scope="col">Type</th>
                                                       {{--  <th scope="col">Count</th> --}}
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the default category Uncategorized. The default category cannot be deleted.
                                        </div>
                                    </div>
                                </div>
                            </form>
						</div>
					</div>
					<!--end card-->
				</div>
				<!-- end page content-->
			</div>
			<!--end page content wrapper-->



            <div class="modal modalEditShow" id="modalEditShow"> </div>
            <div class="modal modalDeleteShow" id="modalDeleteShow"> </div>
            <div class="modal modalStatusShow" id="modalStatusShow"> </div>
@endsection



@push('js')
    <script>
        $(document).ready(function(){
            var category_type = $('.category_type').val();
            if(category_type == 1)
            {
                $('.parentCategoryDiv').hide(300);
                $('.custom_serial').show(300);
            }else{
                $('.parentCategoryDiv').show(300);
                $('.custom_serial').hide(300);
            }
        });
        $(document).on('change','.category_type',function(){
            var category_type = $('.category_type').val();
            if(category_type == 1)
            {
                $('.parentCategoryDiv').hide(300);
                $('.custom_serial').show(300);
            }else{
                $('.parentCategoryDiv').show(300);
                $('.custom_serial').hide(300);
            }
        });


        /* $('#name').change(function(e) {
            $.get('{{ route('admin.flss.category.make.slug') }}', 
                { 'name': $(this).val() }, 
                function( data ) {
                $('#slug').val(data.slug);
                }
            );
        }); */
        $(document).on('change','#name',function(e) {
            $.get('{{ route('admin.flss.category.make.slug') }}', 
                { 'name': $(this).val() }, 
                function( data ) {
                $('#slug').val(data.slug);
                }
            );
        });  
        $(document).on('change','#nameEdit',function(e) {
            $.get('{{ route('admin.flss.category.make.slug') }}', 
                { 'name': $(this).val() }, 
                function( data ) {
                $('#slugEdit').val(data.slug);
                }
            );
        });
    </script>
    

    

    <script>

        
        $(document).on('click','.editClass',function(e){
            e.preventDefault();
            url = $(this).data('href');
            $.ajax({
                url:url,
                success:function(response){
                    if(response.status == true)
                    {
                        $('.modalEditShow').html(response.html).modal('show');
                        existingCustomSerial();
                    }
                },
            });
        });

        function existingCustomSerial()
        {
            var category_id = $('.main_cat').val();
            if(category_id == 1)
            {
                $('.custom_serial').show(300);
                $('.parentCategoryDiv').hide(300);
            }else{
                $('.custom_serial').hide(300);
                $('.parentCategoryDiv').show(300);
            }
        }


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
                var url =  "{{ route('admin.flss.category.bulk.deleting') }}";

                if(ids.length <= 0) return ;
                let decirectUrl = "{{route('admin.flss.category.index')}}";
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