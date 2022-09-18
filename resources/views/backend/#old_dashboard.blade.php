@extends('backend.dashboard.layouts.admin')

@section('content')
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">
            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dashboard</div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-dark">Settings</button>
                        <button type="button" class="btn btn-outline-dark split-bg-dark dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span></button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                            <a class="dropdown-item" href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                    </div>
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
                                        <li>
                                            <span style="padding-right: 20px;">Mar 23rd, 4:55 pm</span>
                                            <a href="https://motshoprani.org/wp-admin/post.php?post=2198&amp;action=edit" aria-label="Edit “বিচারহীনতার সংস্কৃতি দূর করেছেন প্রধানমন্ত্রী শেখ হাসিনা  -শ ম রেজাউল করিম”">
                                                বিচারহীনতার সংস্কৃতি দূর করেছেন প্রধানমন্ত্রী শেখ হাসিনা -শ ম রেজাউল করিম
                                            </a>
                                        </li>
                                        <li>
                                            <span style="padding-right: 20px;">Mar 20th, 3:10 pm</span>
                                            <a href="https://motshoprani.org/wp-admin/post.php?post=2190&amp;action=edit" aria-label="Edit “৩১ মার্চ থেকে ৬ এপ্রিল পর্যন্ত উদযাপন হবে জাটকা সংরক্ষণ সপ্তাহ ২০২২”">
                                                ৩১ মার্চ থেকে ৬ এপ্রিল পর্যন্ত উদযাপন হবে জাটকা সংরক্ষণ সপ্তাহ ২০২২
                                            </a>
                                        </li>
                                        <li>
                                            <span style="padding-right: 20px;">Mar 19th, 3:18 pm</span>
                                            <a href="https://motshoprani.org/wp-admin/post.php?post=2181&amp;action=edit" aria-label="Edit “সাবেক রাষ্ট্রপতি সাহাবুদ্দীন আহমদের মৃত্যুতে মৎস্য ও প্রাণিসম্পদ মন্ত্রীর শোক”">
                                                সাবেক রাষ্ট্রপতি সাহাবুদ্দীন আহমদের মৃত্যুতে মৎস্য ও প্রাণিসম্পদ মন্ত্রীর শোক
                                            </a>
                                        </li>
                                        <li>
                                            <span style="padding-right: 20px;">Mar 17th, 3:15 pm</span>
                                            <a href="https://motshoprani.org/wp-admin/post.php?post=2177&amp;action=edit" aria-label="Edit ““বঙ্গবন্ধু ও বাংলাদেশ অবিচ্ছেদ্য সত্তা——-মৎস্য ও প্রাণিসম্পদ মন্ত্রী”">
                                                “বঙ্গবন্ধু ও বাংলাদেশ অবিচ্ছেদ্য সত্তা——-মৎস্য ও প্রাণিসম্পদ মন্ত্রী
                                            </a>
                                        </li>
                                        <li>
                                            <span style="padding-right: 20px;">Mar 15th, 3:27 pm</span>
                                            <a
                                                href="https://motshoprani.org/wp-admin/post.php?post=2174&amp;action=edit"
                                                aria-label="Edit “আন্তর্জাতিক বাজারের চাহিদা অনুযায়ী গুণগতমানের মৎস্য রপ্তানির পদক্ষেপ নিয়েছে সরকার -মৎস্য ও প্রাণিসম্পদ মন্ত্রী”"
                                            >
                                                আন্তর্জাতিক বাজারের চাহিদা অনুযায়ী গুণগতমানের মৎস্য রপ্তানির পদক্ষেপ নিয়েছে সরকার -মৎস্য ও প্রাণিসম্পদ মন্ত্রী
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <tr>
                                                    <td>
                                                        <a href="">
                                                            <span class="media-image">
                                                                <img width="60" height="50" src="https://motshoprani.org/wp-content/uploads/2022/03/received_297835542392423.jpeg" class="attachment-60x60 size-60x60" alt="" loading="lazy" />
                                                            </span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#"> Moinul </a>
                                                        <div class="group-link">
                                                            <a class="#" href="#"> Edit</a> <span class="separetor"> | </span> <a class="#" href="#"> Trash</a> <span class="separetor"> | </span>
                                                            <a class="#" href="#"> View</a>
                                                        </div>
                                                    </td>
                                                    <td><a href="">5</a></td>
                                                    <td class="date column-date" data-colname="Date">
                                                        Last Published<br />
                                                        2022/03/17 at 3:15 pm
                                                    </td>
                                                </tr>
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
                </div>
                <!--end row-->
            </section>
        </div>
        <!-- end page content-->
    </div>
@endsection