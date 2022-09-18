@extends('frontend.layouts.master')

@section('main-section')
    
     
<header class="fix-head">
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <a href="{{route('frontend.webview.menu.list')}}">
                <i class="bi bi-text-left"></i>
            </a>
            <span class="page-title">
                <a href="{{$redirectUrl}}">
                {{isset($category) ? $category->name : null}}
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
    <section class="search">
        <div class="container">
            <div class="row">
                <div class="input-group rounded">
                    <span class="input-group-text" id="search-addon" style="margin-right: -40px; background: transparent; border: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-search">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                        </svg>
                    </span>
                    <input type="search" class="form-control rounded" placeholder="  প্রয়োজনীয় সেবার নাম লিখুন" aria-label="Search" aria-describedby="search-addon" style="background: rgb(0 0 0 / 13%); padding-left: 40px;">
                </div>
            </div>
        </div>
    </section>
</header>

<section class="sub-category">
    <div class="container">
        @foreach ($posts as $item)
        <div class="row" style="padding-bottom: 10px;">
            <div class="col" style="padding-left: 0; padding-right: 0;">
                <a href="{{route('frontend.webview.main.post.detail',[$item->slug,$category->slug])}}">
                    <div class="pos-list">
                        <span style="float:left;width: 75px;height: 75px;background-image: url({{ asset('storage/post/'.$item->featured_image) }});background-size: cover;background-position: center center;border-radius: 16px;">
                        </span>
                        <span style="text-align: left;">
                            <h1>{{$item->title}} এর বিস্তারিত </h1>
                            <p>বিস্তারিত দেখুন </p> 
                        </span>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</section>


@endsection