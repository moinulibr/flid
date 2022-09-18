@extends('frontend_old.flss_cat_post.layouts.master')
@section('title_url')
    {{$redirectUrl}}
@endsection
@section('title')
    @if (isset($post))
    @php
        $postTitle = $post->title;
        if(strlen($post->title) > 40)
        {
            $len = substr($post->title,0,40);
            if(str_word_count($len) > 1)
            {
                $postTitle = implode(" ",(explode(' ',$len,-1)));
            }else{
                $postTitle = $len;
            }
            $postTitle = $postTitle ."...";
        }
        @endphp
        {{ $postTitle}}
    @endif
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

<div class="app-contant">
    <div class="fisheries-section">
        <div class="container">
            <div class="entry clearfix">
                <div class="entry-title">
                    <h2>{{$post->title}}</h2>
                </div>

                <div class="entry-meta">
                    <ul>
                        <li>
                            @php
                                $englishDate = date('d F Y',strtotime($post->published_at));
                                $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December", ":", ","); 
                                $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০", "জানুয়ারী", "ফেব্রুয়ারী", "মার্চ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগষ্ট", "সেপ্টেম্বার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার", ":", ",");
                                // convert all bangle char to English char 
                                $bangla_convert = str_replace($search_array, $replace_array, $englishDate);   
                                
                                // remove unwanted char       
                                //$date =  preg_replace('/[^A-Za-z0-9:\-]/', ' ', $bangla_convert);
                                // convert date
                                //$bangla_date = date("Y-m-d", strtotime($end_date));        
                                //echo $bangla_date;
                            @endphp
                            
                            <i class="fa fa-calendar"></i> <a href="#"> {{$bangla_convert}}{{-- {{date('d F Y',strtotime($post->published_at))}} --}} </a>
                        </li>
                        <li>
                            <i class="fa fa-user"></i> <a href="#"> {{$post->createdBY->name}} </a>
                        </li>
                        <li>
                            <i class="fa fa-folder-open"></i> 
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($categories->where('main_cat',1) as $item)
                            <a href="#"> {{ $item->name }}  </a>
                                @if (($i) < (count($categories->where('main_cat',1))))
                                   ,
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endforeach


                            @if (count($categories->whereNull('main_cat'))>0)
                                {
                                    @php
                                        $ii = 0;
                                    @endphp
                                @foreach ($categories->whereNull('main_cat') as  $item)
                                <a href="#"> {{$item->name}} </a>
                                    @if (($ii) < count($categories->whereNull('main_cat')))
                                    ,
                                    @endif
                                    @php
                                        $ii++;
                                    @endphp
                                @endforeach
                                }
                            @endif
                        </li>
                    </ul>
                </div>

                <div class="entry-image">
                    <a href="#"><img src="{{ asset('storage/post/'.$post->featured_image) }}" alt="Blog Single" /></a>
                </div>

                <div class="entry-content mt-0">
                    <p>
                        {!! $post->description !!}
                    </p>
                   
                </div>
            </div>
        </div>
    </div>
</div>


@endsection