
<section class="sub-category">
    <div class="container">
        @foreach ($posts as $item)
        <div class="row" style="padding-bottom: 10px;">
            <div class="col" style="padding-left: 0; padding-right: 0;">
                @php
                    $catIds     = [];
                    $catIds     = $item ? $item->cats->pluck('category_id')->toArray():[];
                    $category   = App\Models\Backend\Category::whereIn('id',$catIds)
                                                ->select('id','slug')
                                                ->orderBy('main_cat','asc')
                                                ->first();
                @endphp
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
