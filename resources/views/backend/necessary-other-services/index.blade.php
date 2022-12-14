@extends('backend.dashboard.layouts.admin')

@section('content')
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">
        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"> Other services  </div>
        </div>
        <!--end breadcrumb-->

        <hr />
       

        <div class="card">

            @include('backend.dashboard.includes.message')

            <div class="successMessage" style="display: none;">
                <div class="alert alert-success alert-success-custom" role="alert">
                    <i class="fa fa-check"></i>
                    <span class="message"></span>
                </div>  
            </div>

            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-5">
                        <form action="{{route('admin.necessary.other.service.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="postbody">
                                <h5>Add New Other service</h5>
                                
                                <div class="mb-3">
                                    <label for="" class="form-label">Serial</label>
                                    <input  name="custom_serial" type="text" class="form-control" id="" placeholder="">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlText" class="form-label">Name</label>
                                    <input required name="title" type="text" class="form-control" id="exampleFormControlText" placeholder="">
                                    The name is how it appears on your site.
                                </div>
                
                                <div class="mb-3">
                                    <label for="exampleFormControlText" class="form-label">Site URL</label>
                                    <input required name="side_url" type="text" class="form-control" id="exampleFormControlText" placeholder="">
                                    <p>The ???Site URL??? is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                                </div>
                                
                                <div class="postbox-body mb-3">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <img id="blah"  />
                                        <input required name="photo" type='file'  onchange="readURL(this);" style="margin-top: 10px;" />
                                        <p>Maximum upload file size: 500 MB.</p>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Add News Other Service" class="btn btn-sm btn-outline-secondary">
                        </form>
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
                            <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">
                                            <input class="check_all_class " type="checkbox" value="all" name="check_all" style="">
                                        </th>
                                        <th style="width: 5%;">Serial</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($datas as $item)
                                        <td>
                                            <input class="check_single_class" type="checkbox"  name="checked_id[]" value="{{ $item->id }}" class="check_single_class" id="{{$item->id}}" style="box-shadow:none;">
                                        </td>
                                        <td>
                                            {{$item->custom_serial}}
                                        </td>
                                        <td>
                                            <a href="#">
                                                <span class="media-image">
                                                    @if ($item->photo)
                                                    <img width="60" height="50" src="{{ asset('storage/other-service/'.$item->photo) }}" class="attachment-60x60 size-60x60" alt="" loading="lazy">
                                                    @else
                                                    <img width="60" height="50" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy">
                                                    @endif
                                                </span> 
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{$item->side_url}}" target="_blank">
                                            {{$item->title}}
                                            </a>
                                            <div class="group-link">
                                                <a class="editClass" data-href="{{route('admin.necessary.other.service.edit',$item->id)}}" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                <a class="deleteClass" data-href="{{route('admin.necessary.other.service.delete',$item->id)}}" href="#"> Trash</a> <span class="separetor"> | </span>
                                                <a class="#" href="{{$item->side_url}}" target="_blank"> View</a>
                                            </div>
                                        </td>
                                        <td> 
                                            <a href="{{$item->side_url}}" target="_blank">
                                            {{$item->side_url}}
                                            </a>
                                            {{--  
                                                @if ($item->status == 1)
                                                <a class="statusClass btn btn-sm btn-success" data-href="{{route('admin.necessary.other.service.status',$item->id)}}" href="#" style="color:white !important;"> Active</a>
                                                    @else
                                                    <a class="statusClass btn btn-sm btn-danger" data-href="{{route('admin.necessary.other.service.status',$item->id)}}" href="#" style="color:white !important;"> Inactive</a>
                                                @endif
    
                                                <div class="group-link">
                                                    <a class="editClass" data-href="{{route('admin.necessary.other.service.edit',$item->id)}}" href="#"> Edit</a>  <span class="separetor"> | </span>
                                                    <a class="deleteClass" data-href="{{route('admin.necessary.other.service.delete',$item->id)}}" href="#"> Trash</a>
                                                </div> 
                                            --}}
                                        </td>
                                        <td>
                                            <a href="#">
                                                {{$item->createdBY?$item->createdBY->name:""}} 
                                            </a> 
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($item->created_at)->format('Y/m/d h:i:s A')}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="width: 1%;">
                                            <input class="check_all_class " type="checkbox" value="all" name="check_all" style="">
                                        </th>
                                        <th style="width: 5%;">Serial</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </tfoot>
                            </table>
                            Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the default category Uncategorized. The default category cannot be deleted.
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--end card-->

    </div>
    <!-- end page content-->
</div>


<div class="modal modalEditShow" id="modalEditShow"> </div>
<div class="modal modalDeleteShow" id="modalDeleteShow"> </div>
<div class="modal modalStatusShow" id="modalStatusShow"> </div>

@endsection

@push('js')
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
                    }
                },
            });
        });

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

         $(document).on('click','.statusClass',function(e){
            e.preventDefault();
            url = $(this).data('href');
            $.ajax({
                url:url,
                success:function(response){
                    if(response.status == true)
                    {
                        $('.modalStatusShow').html(response.html).modal('show');
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
                var url =  "{{ route('admin.necessary.other.service.bulk.deleting') }}";

                if(ids.length <= 0) return ;
                let decirectUrl = "{{route('admin.necessary.other.service.index')}}";
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