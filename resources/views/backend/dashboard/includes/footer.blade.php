<style>
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 100%;
            
        }
    }
    .modal-dialog .table-bordered>:not(caption)>* {
        border-width: 0;
    }
    img.rounded-xl.shadow-l.gradient-blue {
        width: 100%;
        height: 100%;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel"> Featured image </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="media-library-tab" data-bs-toggle="tab" data-bs-target="#media-library" type="button" role="tab" aria-controls="media-library" aria-selected="true"> Media Library </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="upload-files-tab" data-bs-toggle="tab" data-bs-target="#upload-files" type="button" role="tab" aria-controls="upload-files" aria-selected="false"> Upload files </button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="media-library" role="tabpanel" aria-labelledby="media-library-tab">

                        <div class="table-responsive" style=" padding-top: 10px;">
                            <table id="post-pending" class="table table-striped table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">Filter media</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="width:25%; display: inline-block;">
                                        <td>
                                            <a href="main-category.php" class="box">
                                            <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr style="width:25%; display: inline-block;">
                                        <td>
                                            <a href="main-category.php" class="box">
                                            <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr style="width:25%; display: inline-block;">
                                        <td>
                                            <a href="main-category.php" class="box">
                                            <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr style="width:25%; display: inline-block;">
                                        <td>
                                            <a href="main-category.php" class="box">
                                            <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                            </a>
                                        </td>
                                    </tr>
                                    <tr style="width:25%; display: inline-block;">
                                        <td>
                                            <a href="main-category.php" class="box">
                                            <img src="https://akkbd.com/wp-content/uploads/2020/04/Pond_Fish_provatferi-2019-10-15-13-22-05.jpg" alt="image" class="rounded-xl shadow-l gradient-blue" />
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>

                    <div class="tab-pane fade" id="upload-files" role="tabpanel" aria-labelledby="upload-files-tab">
                        
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="postbox mb-5">
                                    <div class="postbox-body">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <p>Drop files to upload or</p>
                                            <img id="blah"  />
                                            <input type='file' onchange="readURL(this);" style="margin-top: 10px;" />
                                            <p>Maximum upload file size: 500 MB.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                        
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Set featured image</button>
            </div>
        </div>
    </div>
</div>








<!--start footer-->
<footer class="footer">
    <div class="footer-text">
        <p class="mb-0"> কারিগরি সহযোগিতায়   <a href="https://rdnetworkbd.com">RD Network BD, LLC</a></p>
    </div>
</footer>
<!--end footer-->

<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top">
    <ion-icon name="arrow-up-outline"></ion-icon>
</a>
<!--End Back To Top Button-->

<!--start overlay-->
<div class="overlay nav-toggle-icon"></div>
<!--end overlay-->