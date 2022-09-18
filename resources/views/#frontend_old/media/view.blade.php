@extends('frontend_old.media.layouts.master')
@section('title_url')
    {{route('frontend.home.index')}}
@endsection
@section('title')
    মিডিয়া
@endsection

    @section('main-data')

    <div class="serch-box" style="margin-top:15px;">
        <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="প্রয়োজনীয় সেবার নাম লিখুন" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text" id="search-addon">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>
    <div class="mCat-box">
        <div class="container">
            @foreach ($medias as $item)
            <a href="#" class="box">
                <div class="inner">
                    <img src="{{ asset('storage/media/'.$item->photo) }}" class="rounded-xl shadow-l gradient-blue" />
                </div>
            </a>
            @endforeach
        </div>
    </div>

    @endsection