@extends('frontend_old.cat_post.layouts.master')
@section('title_url')
    {{$redirectUrl}}
@endsection
@section('title')
    {{isset($category) ? $category->name : null}}
@endsection

    @section('main-data')

    <div class="serch-box" style="margin-top:10px;">
        <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="প্রয়োজনীয় সেবার নাম লিখুন" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text" id="search-addon">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
    <div class="fisheries-section">
        <div class="container">
            <div class="items">
                <hr />

                <div class="items-body">
                    @foreach ($subcategories as $item)
                    <a href="{{route('frontend.main.post.bycategory.subcategory.index',$item->slug)}}">
                        <div class="items-body-content">
                            <span>{{$item->name}}</span>
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @endsection