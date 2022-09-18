@extends('backend.dashboard.layouts.admin')

@section('content')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>
                <div class="ms-auto">
                </div>
            </div>
            <!--end breadcrumb-->

            <section class="dashboard">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="postbox mb-3">
                            <div class="postbox-header">
                                <h2>Activity</h2>
                            </div>
                            <div class="postbox-body" style="overflow: hidden; overflow-x: hidden; overflow-y: auto;">
                                <div id="published-posts" class="activity-block">
                                    <h6>Recently Published</h6>
                                    <ul style="list-style: none; padding-left: 0;">
                                        @foreach ($posts as $item)
                                            @php
                                                $englishDate = date('d F Y',strtotime($item->published_at));
                                                $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ","); 
                                                $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");
                                                $bangla_convert = str_replace($search_array, $replace_array, $englishDate);   
                                            @endphp
                                        <li>
                                            <span style="padding-right: 20px;">{{$bangla_convert}}</span>
                                            <a href="#" aria-label="Edit “{{$item->title}}”">
                                                {{$item->title}}
                                            </a>
                                        </li> 
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="postbox-body" style="overflow: hidden; overflow-x: hidden; overflow-y: auto;">
                                <div id="published-posts" class="activity-block">
                                    <h6>Recently FLSS Published</h6>
                                    <ul style="list-style: none; padding-left: 0;">
                                        @foreach ($flssposts as $item)
                                            @php
                                                $englishDate = date('d F Y',strtotime($item->published_at));
                                                $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ","); 
                                                $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");
                                                $bangla_convert = str_replace($search_array, $replace_array, $englishDate);   
                                            @endphp
                                        <li>
                                            <span style="padding-right: 20px;">{{$bangla_convert}}</span>
                                            <a href="#" aria-label="Edit “{{$item->title}}”">
                                                {{$item->title}}
                                            </a>
                                        </li> 
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @AdministratorEditor
                    <div class="col-md-12 col-sm-12">
                        <div class="postbox mb-3">
                            <div class="postbox-header">
                                <h2>Top contributor</h2>
                            </div>
                            <div class="postbox-body" style="overflow: hidden; overflow-x: hidden; overflow-y: auto;">
                                <div id="top-contributor" class="activity-block">
                                    <div class="table-responsive-sm" style="padding-top: 20px;">
                                        <table id="example" class="table table-striped table-bordered" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Author Name</th>
                                                    <th scope="col">Total Post</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($userPosts as $item)
                                                <tr>
                                                    <td>
                                                        <a href="">
                                                            <span class="media-image">
                                                                <img width="60" height="50" src="{{ asset('storage/user/'.$item->photo) }}" class="attachment-60x60 size-60x60" alt="" loading="lazy" />
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#"> {{$item->name}} </a>
                                                        <div class="group-link">
                                                           {{--  <a class="#" href="#"> Edit</a> <span class="separetor"> | </span> <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                            <a class="#" href="#"> View</a> --}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#"> {{$item->post_user_count}}</a>
                                                    </td>
                                                    <td class="date column-date" data-colname="Date">
                                                        Last Published<br />
                                                        @php
                                                            $englishDate2 = date('d F Y',strtotime($item->userLatestPost()));
                                                            $search_array2= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ","); 
                                                            $replace_array2= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");
                                                            $bangla_convert2 = str_replace($search_array2, $replace_array2, $englishDate2);   
                                                        @endphp
                                                        {{$bangla_convert2}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Author Name</th>
                                                    <th scope="col">Total Post</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endAdministratorEditor
                </div>
                <!--end row-->
            </section>
        </div>
        <!-- end page content-->
    </div>
@endsection