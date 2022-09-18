@extends('frontend_old.layouts.landing')

@section('fronten-content')
    
 
<div class="app-contant">

    <div class="news-ticker">
        <div class="container">
            <div class="ticker-wrap">
                <!--div class="ticker-heading">Breaking News</div-->
                <div class="ticker" style="-webkit-animation-duration: {{$setting->scroll_speed}};animation-duration: {{$setting->scroll_speed}};">
                    @foreach ($scrolls as $item)
                    <div class="ticker__item"> {{$item->title}} </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="serch-box">
        <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="প্রয়োজনীয় সেবার নাম লিখুন" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text" id="search-addon">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
    <div class="mCat-box">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <p class="box-heading"> প্রয়োজনীয় অন্যান্য সেবা </p>
            </div>
            <div class="service-box">
                @foreach ($categories as $item)
                <a href="{{route('frontend.subcategory.bycategory.index',$item->slug)}}" class="box">
                    <div class="inner">
                        <img src="{{ asset('storage/category/'.$item->photo) }}" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">{{$item->name}}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="spach" style="height:30px"></div>

    <div class="second-section">
        <div class="container">
            <div class="row">
                {{-- @foreach ($medias as $item)    
                    <div class="text-center">
                        <img src="{{ asset('storage/media/'.$item->photo) }}" alt="image" style="width:100%; height: auto;" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                @endforeach --}}
                @foreach ($photoMessages as $item)    
                    <div class="text-center">
                        <img src="{{ asset('storage/photo-messages/'.$item->photo) }}" alt="image" style="width:100%; height: auto;" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="spach" style="height:30px"></div>
    
    <div class="spacial-box">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <p class="box-heading"> মৎস্য ও প্রানিসম্পদ বিশেষ সেবা </p>
            </div>
            <div class="mainbox">
                @foreach ($flsscategories as $item)
                <a href="{{route('frontend.flss.subcategory.bycategory.index',$item->slug)}}" class="content">
                    <div class="inner">
                        <img src="{{ asset('storage/flss-category/'.$item->photo) }}" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext"> {{$item->name}} </p>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="spach" style="height:30px"></div>

    <div class="important-link">
        <div class="container" style="margin-bottom: 10px;">
            <div class="d-flex align-items-center justify-content-center">
                <p class="box-heading"> গুরুর্তপূর্ন লিঙ্ক সমূহ </p>
            </div>
            <div class="two-box-inner">
                <ul class="square-style">
                    @foreach ($importantLinks as $item)
                    <li>
                        <a href="{{$item->side_url}}" target="_blank" title="{{$item->link_name}}">{{$item->link_name}}</a>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
    <div class="spach" style="height:30px"></div>
    <div class="other-services">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <p class="box-heading"> প্রয়োজনীয় অন্যান্য সেবা </p>
            </div>
            <div class="box-inner">
                @foreach ($otherServices as $item)    
                <a href="{{$item->side_url}}" target="_blank" class="box">
                    <div class="inner">
                        <img src="{{ asset('storage/other-service/'.$item->photo) }}" alt="image" class="rounded-xl shadow-l gradient-blue" />
                    </div>
                    <p class="mCattext">{{$item->title}} </p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection