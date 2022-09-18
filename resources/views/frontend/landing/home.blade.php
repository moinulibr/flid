<!DOCTYPE html>
<html lang="en">
    @php
        $setting = App\Models\Backend\Setting::find(1);
    @endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{$setting->site_title}} - {{$setting->tagline}}</title>
    <link rel="icon" href="{{asset('storage/setting/site-icon/'.$setting->site_icon)}}" sizes="32x32" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('frontend-assets')}}/assets/css/styles.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js" integrity="sha512-h9kKZlwV1xrIcr2LwAPZhjlkx+x62mNwuQK5PAu9d3D+JXMNlGx8akZbqpXvp0vA54rz+DrqYVrzUGDMhwKmwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
 
<body>
    
    <header class="fix-head">
        <nav class="navbar navbar-light navbar-expand-md py-3">
            <div class="container">
                <a href="{{route('frontend.webview.menu.list')}}">
                    <i class="bi bi-text-left"></i>
                </a>
                <img class="log-img" src="{{asset('storage/setting/apps-logo/'.$setting->apps_logo)}}" style="width: 220px; height:auto;">
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
                        <input type="search" class="form-control rounded search_field" placeholder="  প্রয়োজনীয় সেবার নাম লিখুন" aria-label="Search" aria-describedby="search-addon" style="background: rgb(0 0 0 / 7%); padding-left: 40px;">
                    </div>
                </div>
            </div>
        </section>
    </header>
    
    <!---------------------------->
    <div class="search_result"></div>
    <!---------------------------->
    
    <section class="necessary-services">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-start title ">প্রয়োজনীয় সেবা বক্স</h1>
                </div>
                <div class="col text-end" style="font-family: 'SolaimanLipi'; font-style: normal; font-weight: 400; font-size: 10px; margin-bottom: 0;">
                    <a href="{{route('frontend.webview.view.all.categories')}}" style="font-size: 14px;">সব গুলো দেখুন</a>
                </div>
            </div>
            
            <div class="row fd" style="padding-bottom: 10px;">
                @foreach ($categories as $index => $item)     
                <div class="col-6" style="padding-bottom: 10px;">
                    <a href="{{route('frontend.webview.subcategory.bycategory.index',$item->slug)}}">
                        <div class="category-box" style="background-image: linear-gradient(180deg, rgba(200, 95, 110, 0.53) 0%, #070754 100%), url({{ asset('storage/category/'.$item->photo) }});">
                            <h1>{{$item->name}}</h1>
                            <p>এখানে দেখুন</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
           
        </div>
    </section>
    
    <section class="notice">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="text-start callout" style="color: #ed4849;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-megaphone-fill">
                            <path d="M13 2.5a1.5 1.5 0 0 1 3 0v11a1.5 1.5 0 0 1-3 0v-11zm-1 .724c-2.067.95-4.539 1.481-7 1.656v6.237a25.222 25.222 0 0 1 1.088.085c2.053.204 4.038.668 5.912 1.56V3.224zm-8 7.841V4.934c-.68.027-1.399.043-2.008.053A2.02 2.02 0 0 0 0 7v2c0 1.106.896 1.996 1.994 2.009a68.14 68.14 0 0 1 .496.008 64 64 0 0 1 1.51.048zm1.39 1.081c.285.021.569.047.85.078l.253 1.69a1 1 0 0 1-.983 1.187h-.548a1 1 0 0 1-.916-.599l-1.314-2.48a65.81 65.81 0 0 1 1.692.064c.327.017.65.037.966.06z"></path>
                        </svg><strong style="font-family: 'SolaimanLipi';font-style: normal; font-size: 16px;line-height: 20px;padding-left: 10px;">বিশেষ নোটিশ </strong>
                        <div class="ticker-wrap">
                            <div class="ticker" style="font-size:0.9rem; color:#ed4849; -webkit-animation-duration: {{$setting->scroll_speed}}; animation-duration: {{$setting->scroll_speed}};">
                                @foreach ($scrolls as $item)
                                <div class="ticker__item"> {{$item->title}} </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="necessary-services">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1 class="text-start title">মৎস্য ও প্রানিসম্পদ বিশেষ সেবা</h1>
                </div>
                <div class="col-4 text-end" style="font-family: 'SolaimanLipi';font-style: normal;font-weight: 400;font-size: 10px;margin-bottom: 0;">
                    <a href="{{route('frontend.webview.flss.view.all.categories')}}" style="font-size: 14px;">সব গুলো দেখুন</a>
                </div>
            </div>

                <div class="row fd" style="padding-bottom: 10px;">
                    @foreach ($flsscategories as $item)
                    <div class="col-6" style="padding-bottom: 10px;">
                        <a href="{{route('frontend.webview.flss.subcategory.bycategory.index',$item->slug)}}">
                            <div class="category-box" style="background-image: linear-gradient(180deg, rgba(200, 95, 110, 0.53) 0%, #092F1E 100%), url({{ asset('storage/flss-category/'.$item->photo) }});">
                                <h1>  {{$item->name}} </h1>
                                <p>এখানে দেখুন</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
        </div>
    </section>

    <section class="picture-message">
        <div class="container">
            <div class="row">
                <div class="col">
               
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($photoMessages as $index => $item)
                            <div class="carousel-item @if($index == 0) active @endif" data-bs-interval="3000">
                                <img src="{{ asset('storage/photo-messages/'.$item->photo) }}" class="d-block w-100" alt="image" />
                            </div>
                            @endforeach
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </section>

    <section class="important-links">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-start title">  গুরুর্তপূর্ন লিঙ্ক সমূহ   </h1>
                </div>
                <div class="col-4 text-end" style="font-family: 'SolaimanLipi';font-style: normal;font-weight: 400;font-size: 10px;margin-bottom: 0;">
                    <a href="{{route('frontend.webview.view.all.importantlinks')}}" style="font-size: 14px;">সব গুলো দেখুন</a>
                </div>
            </div>

            
            <div class="row fd" style="padding-bottom: 10px;">
                @foreach ($importantLinks as $item)
                <div class="col-6" style="padding-bottom: 10px;">
                    <a href="{{ $item->side_url }}" target="_blank">
                        <div class="callout">
                            <p>{{ $item->link_name }}</p> 
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
           
        </div>
    </section>

    <style>
       button.slick-next.slick-arrow {
        display:none !important;
        } 
    </style>
    <section class="other-necessary-services">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-start title">প্রয়োজনীয় অন্যান্য সেবা</h1>
                </div>
            </div>
            <div class="row" style="padding-bottom: 10px;">
                <div class="fd-slick">
                    @foreach ($otherServices as $item)    
                    <div class="col">
                        <a href="{{$item->side_url}}" target="_blank">
                            <div class="category-box" style="background-image: linear-gradient(180deg, rgba(200, 95, 110, 0.53) 0%, #BCC3DC 96.87%), url({{ asset('storage/other-service/'.$item->photo) }});">
                                <h1>  {{$item->title}}  </h1>
                                <p>এখানে দেখুন</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-5">
        <div class="navigation-mobile">
            <div class="navigation-list">
                <a href="{{route('frontend.webview.about.us.list')}}" class="navigation-icon"><i class="bi bi-newspaper"></i> </a>
                <a href="{{route('frontend.webview.view.media.list')}}" class="navigation-icon"><i class="bi bi-images"></i> </a>
                <a href="{{route('frontend.webview.home.index')}}" class="navigation-icon"><i class="bi bi-house-door-fill"></i> </a>
                <a href="tel:{{$setting->phone}}" class="navigation-icon"><i class="bi bi-telephone"></i> </a>
                <a href="{{$setting->facebook_messenger_url}}" class="navigation-icon" target="_blank"><i class="bi bi-messenger"></i> </a>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <!--- Search Field --->
    <script>
        $(document).on('keyup','.search_field',function(){
            var search = $(this).val();
            if(($(this).val().length) < 1){
                $('.search_result').html("");
                return;
            } 
            $.ajax({
                url:"{{route('frontend.webview.main.post.search')}}",
                data:{search:search},
                success:function(response){
                    if(response.status == true)
                    {
                        $('.search_result').html(response.data);
                    }else{
                        $('.search_result').html("");
                    }
                },
            });
        });
        $(document).on('click','.close_search_field',function(){
            var search = $('.search_field').val('');
            $('.search_result').html("");
        });
    </script>


     <!--- Others nesessari box --->
    <script>
        $(document).ready(function(){
            $('.fd-slick').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                dots: true,
            });
        });
    </script>
</body>

</html>