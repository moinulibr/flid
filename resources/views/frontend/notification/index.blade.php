@extends('frontend.layouts.master')

@section('main-section')

 
<header class="fix-head">
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <a href="{{route('frontend.webview.menu.list')}}">
                <i class="bi bi-text-left"></i>
            </a>
            <a href="{{route('frontend.webview.home.index')}}">
            <span class="page-title"> নোটিশ </span>
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


<section class="notice">
    <div class="container">
        @foreach ($notifications as $item)
        <div class="row">
            {{-- @php
                $url = json_decode($item->redirect_url,true);
                $posturl    = $url['url'];
                $postSlug   = $url['post_slug'];
                $cateSlug   = $url['category_slug'];
            @endphp --}}
            <a href="{{route('frontend.webview.notification.visiting',$item->id)}}">
                <div class="col">
                    <div class="text-start callout" style="color: black;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-megaphone-fill">
                            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"></path>
                        </svg><strong style="font-family: 'SolaimanLipi';font-style: normal; font-size: 16px;line-height: 20px;padding-left: 10px;">বিশেষ নোটিশ </strong>
                        <p style="font-family: 'SolaimanLipi';font-style: normal;font-weight: 400;font-size: 16px;line-height: 20px;">{{$item->title}}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>


@endsection