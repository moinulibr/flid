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
<div class="sub-category-section">
    <div class="container">
        <hr />
        @if (count($posts) == 0)
            <div style="text-align: center">
                No Post Found!
            </div>
        @endif
        <ul>
            @foreach ($posts as $item)
            <li><a href="{{route('frontend.main.post.detail',[$item->slug,$category->slug])}}">{{$item->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@endsection