<!DOCTYPE html>
<html lang="en" class="semi-dark">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="shortcut icon" href="https://flid.org/img/favicon.ico" type="image/x-icon" />

        

        <!-- CSS Files -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <!--Theme Styles-->
        <link href="https://flid.org/assets/css/semi-dark.css" rel="stylesheet" />
        <style>
          .radius-10 {
              border-radius: 10px !important;
          }
          .radius-30 {
              border-radius: 30px;
          }
          .seperator-2 {
              background-color: #ffffff;
              left: 45%;
              padding: 0px 10px;
          }
          .login-bg-overlay {
              width: 100%;
              height: 420px;
              position: absolute;
              top: 0;
              right: 0;
              left: 0;
              background-color: #1a1a1a;
              background-image: linear-gradient(310deg, #7928ca, #ff0080);
          }
          .au-sign-in-basic {
              background-image: url(https://flid.org/rd/assets/img/bg/au-sign-up-basic.png);
              background-position: center;
              background-size: cover;
              filter: grayscale(1);
          }
        </style>

        <title>FLID - মৎস্য ও প্রাণিসম্পদ তথ্য ভাণ্ডার</title>
    </head>

    <body>
        <div class="login-bg-overlay au-sign-in-basic"></div>

        <!--start wrapper-->
        <div class="wrapper">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-white p-3">
                    <div class="container">
                        <a href="javascript:;"><img src="https://flid.org/img/logo-black.png" width="240" alt="" /></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3 login-menu-2">
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:;"> ইউজার গাইডলাইন </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:;"> ভিডিও টিউটোরিয়াল </a>
                                </li>
                            </ul>
                            <form class="d-flex">
                                <a href="javascript:;" class="btn btn-sm btn-dark px-4 radius-30">সাপোর্ট সংক্রান্তে ফোন করুন: 01787-882277</a>
                            </form>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="container">
                @yield('content')
            </div>
            <footer class="my-5">
                <div class="container">
                    <div class="text-center">
                        <p class="mb-0"> কারিগরি সহযোগিতায়   <a href="https://rdnetworkbd.com">RD Network BD, LLC</a></p>
                    </div>
                </div>
            </footer>
        </div>
        <!--end wrapper-->

        <!-- JS Files-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
