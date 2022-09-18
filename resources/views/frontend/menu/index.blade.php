@extends('frontend.layouts.master')

@section('main-section') 
<header class="fix-head">
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <a href="{{route('frontend.webview.menu.list')}}">
                <i class="bi bi-text-left"></i>
            </a>
            <a href="{{route('frontend.webview.home.index')}}">
            <span class="page-title"> মেনু </span>
            </a>
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

<section class="menu">
    <div class="container">
        <div class="row" style="padding-bottom: 10px;">
            <div class="col" style="padding: 0 10px;;">
                <a href="{{$setting->flid_website_url}}" target="_blank">
                    <div class="callout">
                        <h1>FLID Website</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="row" style="padding-bottom: 10px;">
            <div class="col" style="padding: 0 10px;;">
                <a href="{{$setting->flid_facebook_url}}" target="_blank">
                    <div class="callout">
                        <h1>FLID on Facebook</h1>
                    </div>
                </a>
            </div>
        </div>
        <div class="row" style="padding-bottom: 10px;">
            <div class="col" style="padding: 0 10px;;">
                <a href="{{$setting->rate_app}}" target="_blank">
                    <div class="callout">
                        <h1>Rate this App</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="dev">
        <div class="container text-center">
            <div class="row">
                <h1>V1.0</h1>
                <p>কারিগরি সহযোগিতায়</p>
                <img class="img" src="{{asset('frontend-assets')}}/assets/img/rd-network-bd.svg">
            </div>
        </div>
    </div>
</section>

@endsection