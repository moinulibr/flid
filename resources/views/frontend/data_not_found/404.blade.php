@extends('frontend.layouts.master')

@section('main-section')
    
    <header class="fix-head">
        <nav class="navbar navbar-light navbar-expand-md py-3">
            <div class="container">
                <a href="{{route('frontend.webview.menu.list')}}">
                    <i class="bi bi-text-left"></i>
                </a>
                <span class="page-title">
                    <a href="{{route('frontend.webview.home.index')}}">
                        নোটিশ 
                    </a>
                    </span>
                <a href="{{route('frontend.webview.notification.list')}}">
                    <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bell-fill">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"></path>
                        </svg>
                    </span>
                </a>
            </div>
        </nav>
    </header>
    
    <style>
        /*======================
            404 page
        =======================*/
        .page_404 {
            padding: 40px 0;
            background: #fff;
            font-family: "Arvo", serif;
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {
            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 400px;
            background-position: center;
        }

        .four_zero_four_bg h1 {
            font-size: 80px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
        }

        .link_404 {
            color: #fff !important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;
        }
        .contant_box_404 {
            margin-top: -50px;
        }
    </style>

    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-10 col-sm-offset-1 text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center">404</h1>
                        </div>

                        <div class="contant_box_404">
                            <h3 class="h2">
                                Look like you're lost
                            </h3>

                            <p>the data you are looking for not avaible!</p>

                            <a href="{{route('frontend.webview.home.index')}}" class="link_404">Go to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    @endsection