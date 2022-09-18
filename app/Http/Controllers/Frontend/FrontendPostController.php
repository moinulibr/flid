<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\Post;
use App\Models\Backend\FLSS\Category as FlssCategory;
use App\Models\Backend\FLSS\Post as FlssPost;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class FrontendPostController extends Controller
{

    public function mainPost($slug)
    {
        $cat                    = Category::where('slug',$slug)->first();
        if(! $cat){
            return redirect()->route('frontend.webview.data.not.found');
        }
        $id                     = $cat ? $cat->id : NULL;
        $parentId               = $cat ? $cat->parent_id : NULL;
        $categoryTye            = $cat ? $cat->main_cat:false;
        $data['redirectUrl'] = route('frontend.webview.view.all.categories');
        if($categoryTye == 1)
        {
            $data['redirectUrl'] = route('frontend.webview.view.all.categories');
        }else{
            if($parentId)
            {
                $mainCategory = Category::find($parentId);
                $data['redirectUrl'] = route('frontend.webview.subcategory.bycategory.index',$mainCategory->slug);
            }else{
                $data['redirectUrl'] = route('frontend.webview.view.all.categories');
            }
        }
        $postIds                = [];
        $postIds                = $cat ? $cat->categoryPosts->pluck('post_id')->toArray():[];
        $data['posts']          = Post::whereIn('id',$postIds)->whereNotNull('published_by')->latest()->get();
        $data['category']       = $cat;
        return view('frontend.cat_post.post.index',$data);
    }

    public function mainPostDetail($slug,$categoryslug)
    {
        $data['post']          = Post::where('slug',$slug)->whereNotNull('published_by')->first();
        if(! $data['post']){
            return redirect()->route('frontend.webview.data.not.found');
        }
        $catIds                 = [];
        $catIds                 = $data['post'] ? $data['post']->cats->pluck('category_id')->toArray():[];
        $data['categories']     = Category::whereIn('id',$catIds)
                                    ->select('id','main_cat','name','parent_id')
                                    ->orderBy('main_cat','asc')
                                    ->get();
        $data['redirectUrl'] = route('frontend.webview.subcategory.bycategory.index',$categoryslug);
        return view('frontend.cat_post.post.details',$data);
    }



    //search
    public function search(Request $request)
    {
        $posts = Post::where('title','like','%'.$request->search.'%')->whereNotNull('published_by')->latest()->get();
        if(count($posts) > 0)
        {
            $data['posts'] = $posts; 
            $view = view('frontend.cat_post.post.search.search_result',$data)->render();
            return response()->json([
                'status'    => true,
                'data'      => $view
            ]);
        }else{
            return response()->json([
                'status'    => false,
                'data'      => []
            ]);
        }
    }



    public function flssPost($slug)
    {
        $cat                    = FlssCategory::where('slug',$slug)->first();
        if(! $cat){
            return redirect()->route('frontend.webview.data.not.found');
        }
        $id                     = $cat ? $cat->id : NULL;
        $parentId               = $cat ? $cat->parent_id : NULL;
        $categoryTye            = $cat ? $cat->main_cat:false;
        $data['redirectUrl'] = route('frontend.webview.flss.view.all.categories');
        if($categoryTye == 1)
        {
            $data['redirectUrl'] = route('frontend.webview.flss.view.all.categories');
        }else{
            if($parentId)
            {
                $mainCategory = FlssCategory::find($parentId);
                $data['redirectUrl'] = route('frontend.webview.flss.subcategory.bycategory.index',$mainCategory->slug);
            }else{
                $data['redirectUrl'] = route('frontend.webview.flss.view.all.categories');
            }
        }
        $postIds                = [];
        $postIds                = $cat ? $cat->categoryPosts->pluck('post_id')->toArray():[];
        $data['posts']          = FlssPost::whereIn('id',$postIds)->whereNotNull('published_by')->latest()->get();
        $data['category']       = $cat;
        return view('frontend.flss_cat_post.post.index',$data);
    }

    public function flssPostDetail($slug,$categoryslug)
    {
        $data['post']          = FlssPost::where('slug',$slug)->whereNotNull('published_by')->first();
        if(! $data['post']){
            return redirect()->route('frontend.webview.data.not.found');
        }
        $catIds                 = [];
        $catIds                 = $data['post'] ? $data['post']->cats->pluck('category_id')->toArray():[];
        $data['categories']     = FlssCategory::whereIn('id',$catIds)
                                    ->select('id','main_cat','name','parent_id')
                                    ->orderBy('main_cat','asc')
                                    ->get();
        $data['redirectUrl'] = route('frontend.webview.flss.subcategory.bycategory.index',$categoryslug);
        return view('frontend.flss_cat_post.post.details',$data);
    }












    //------------------------- old ----------------------------
    //------------------------------------------------------------

    public function mainPostOld($slug)
    {
        $cat                    = Category::where('slug',$slug)->first();
        $id                     = $cat ? $cat->id : NULL;
        $parentId               = $cat ? $cat->parent_id : NULL;
        $categoryTye            = $cat ? $cat->main_cat:false;
        $data['redirectUrl'] = route('frontend.home.index');
        if($categoryTye == 1)
        {
            $data['redirectUrl'] = route('frontend.home.index');
        }else{
            if($parentId)
            {
                $mainCategory = Category::find($parentId);
                $data['redirectUrl'] = route('frontend.subcategory.bycategory.index',$mainCategory->slug);
            }else{
                $data['redirectUrl'] = route('frontend.home.index');
            }
        }
        $postIds                = [];
        $postIds                = $cat ? $cat->categoryPosts->pluck('post_id')->toArray():[];
        $data['posts']          = Post::whereIn('id',$postIds)->where('published_at',null)->latest()->get();
        $data['category']       = $cat;
        return view('frontend_old.cat_post.post.post',$data);
       
    }

    public function mainPostDetailOld($slug,$categoryslug)
    {
        $data['post']          = Post::where('slug',$slug)->first();
        $catIds                 = [];
        $catIds                 = $data['post'] ? $data['post']->cats->pluck('category_id')->toArray():[];
        $data['categories']     = Category::whereIn('id',$catIds)
                                    ->select('id','main_cat','name','parent_id')
                                    ->orderBy('main_cat','asc')
                                    ->get();
        $data['redirectUrl'] = route('frontend.subcategory.bycategory.index',$categoryslug);
        return view('frontend_old.cat_post.post.post_details',$data);
    }





    public function flssPostOld($slug)
    {
        $cat                    = FlssCategory::where('slug',$slug)->first();
        $id                     = $cat ? $cat->id : NULL;
        $parentId               = $cat ? $cat->parent_id : NULL;
        $categoryTye            = $cat ? $cat->main_cat:false;
        $data['redirectUrl'] = route('frontend.home.index');
        if($categoryTye == 1)
        {
            $data['redirectUrl'] = route('frontend.home.index');
        }else{
            if($parentId)
            {
                $mainCategory = FlssCategory::find($parentId);
                $data['redirectUrl'] = route('frontend.flss.subcategory.bycategory.index',$mainCategory->slug);
            }else{
                $data['redirectUrl'] = route('frontend.home.index');
            }
        }
        
        $postIds                = [];
        $postIds                = $cat ? $cat->categoryPosts->pluck('post_id')->toArray():[];
        $data['posts']          = FlssPost::whereIn('id',$postIds)->where('published_at',null)->latest()->get();
        $data['category']       = $cat;
        return view('frontend_old.flss_cat_post.post.post',$data);
       
    }

    public function flssPostDetailOld($slug,$categoryslug)
    {
        $data['post']          = FlssPost::where('slug',$slug)->first();
        $catIds                 = [];
        $catIds                 = $data['post'] ? $data['post']->cats->pluck('category_id')->toArray():[];
        $data['categories']     = Category::whereIn('id',$catIds)
                                    ->select('id','main_cat','name','parent_id')
                                    ->orderBy('main_cat','asc')
                                    ->get();
        $data['redirectUrl'] = route('frontend.flss.subcategory.bycategory.index',$categoryslug);
        return view('frontend_old.flss_cat_post.post.post_details',$data);
    }


}
