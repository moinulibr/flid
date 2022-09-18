
<!DOCTYPE html>
<html lang="bn" style=" background: aliceblue; ">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="{{asset('frontend/cat_post')}}/css/style.css" rel="stylesheet" type="text/css" />

        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <title>FLID Android App</title>
    </head>
    <body>
        <div class="mobile-size">
           
            @include('frontend_old.flss_cat_post.layouts.header')


            
            <div class="app-contant">
                
                @yield('main-data')

            </div>





            
            @include('frontend_old.flss_cat_post.layouts.footer')


        </div>
        
        
    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">03 Notifiacations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="item-content">
                            <div class="media">
                                <div class="media-body space-sm">
                                    <div class="post-title"><a href="post-details.php">        মাছ চাষ            </a>  </div>
                                    <span>1 Mins ago</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body space-sm">
                                    <div class="post-title"><a href="post-details.php">         ভ্রাম্যমান মৎস্য হাসপাতাল       </a>     </div>
                                    <span>20 Mins ago</span>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body space-sm">
                                    <div class="post-title"><a href="post-details.php">        মাছের রোগ ও চিকিৎসা                      </a> </div>
                                    <span>45 Mins ago</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!-- Optional JavaScript; choose one of the two! -->
        
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

