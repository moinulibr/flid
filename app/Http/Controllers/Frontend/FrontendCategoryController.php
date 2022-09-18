<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Post;
use App\Models\Backend\FLSS\Category as FlssCategory;
use App\Models\Backend\FLSS\Post as FlssPost;
use Illuminate\Http\Request;

class FrontendCategoryController extends Controller
{

    public function allCategory()
    {
        $data['categories']         = Category::where('main_cat',1)
                                    ->orderBy('custom_serial')
                                    ->where('status',1)
                                    ->get();
        return view('frontend.cat_post.category.index',$data);
    }
   
    public function mainCategory($slug)
    {   
        $cat                    = Category::where('slug',$slug)->first();
        if(! $cat){
            return redirect()->route('frontend.webview.data.not.found');
        }
        $postIds                = [];
        $postIds                = $cat ? $cat->categoryPosts->pluck('post_id')->toArray():[];
        $data['posts']          = Post::whereIn('id',$postIds)->whereNotNull('published_by')->latest()->get();

        $id                     = $cat ? $cat->id : NULL;
        $sucateoryId            = $cat ? $cat->parent_id : NULL;
        $categoryTye            = $cat ? $cat->main_cat:false;
        if($categoryTye == 1)
        {
            $data['category']       = $cat;
            $data['subcategories']  = Category::where('parent_id',$id)->latest()->get();
            if(count($data['subcategories']) > 0)
            {
                $data['redirectUrl'] = route('frontend.webview.view.all.categories');
                return view('frontend.cat_post.category.subcategory',$data);
            }else{
                return redirect()->route('frontend.webview.main.post.bycategory.subcategory.index',$slug);
            }
        }else{
            $data['category']       = Category::where('id',$sucateoryId)->first();
            $data['subcategories']  = Category::where('parent_id',$data['category']->id)->latest()->get();
            if(count($data['subcategories']) > 0)
            {
                $data['redirectUrl'] = route('frontend.webview.view.all.categories');
                return view('frontend.cat_post.category.subcategory',$data);
            }else{
                return redirect()->route('frontend.webview.view.all.categories');
            }
            return redirect()->route('frontend.webview.view.all.categories');
        }
    }




    public function flssAllCategory()
    {
        $data['categories']         = FlssCategory::where('main_cat',1)
                                    ->orderBy('custom_serial')
                                    ->where('status',1)
                                    ->get();
        return view('frontend.flss_cat_post.category.index',$data);
    }

    public function flssCategory($slug)
    {   
        $cat                    = FlssCategory::where('slug',$slug)->first();
        if(! $cat){
            return redirect()->route('frontend.webview.data.not.found');
        }
        $postIds                = [];
        $postIds                = $cat ? $cat->categoryPosts->pluck('post_id')->toArray():[];
        $data['posts']          = FlssPost::whereIn('id',$postIds)->whereNotNull('published_by')->latest()->get();

        $id                     = $cat ? $cat->id : NULL;
        $sucateoryId            = $cat ? $cat->parent_id : NULL;
        $categoryTye            = $cat ? $cat->main_cat:false;
        if($categoryTye == 1)
        {
            $data['category']       = $cat;
            $data['subcategories']  = FlssCategory::where('parent_id',$id)->latest()->get();
            if(count($data['subcategories']) > 0)
            {
                $data['redirectUrl'] = route('frontend.webview.flss.view.all.categories');
                return view('frontend.flss_cat_post.category.subcategory',$data);
            }else{
                return redirect()->route('frontend.webview.flss.post.bycategory.subcategory.index',$slug);
            }
        }else{
            $data['category']       = FlssCategory::where('id',$sucateoryId)->first();
            $data['subcategories']  = FlssCategory::where('parent_id',$data['category']->id)->latest()->get();
            if(count($data['subcategories']) > 0)
            {
                $data['redirectUrl'] = route('frontend.webview.flss.view.all.categories');
                return view('frontend.flss_cat_post.category.subcategory',$data);
            }else{
                return redirect()->route('frontend.webview.flss.view.all.categories');
            }
            return redirect()->route('frontend.webview.flss.view.all.categories');
        }
    }
    
    
    



    //------------------------- old ----------------------------
    //------------------------------------------------------------
    
    public function mainCategoryOld($slug)
    {   
        $cat                    = Category::where('slug',$slug)->first();
        $id                     = $cat ? $cat->id : NULL;
        $sucateoryId            = $cat ? $cat->parent_id : NULL;
        $categoryTye            = $cat ? $cat->main_cat:false;
        if($categoryTye == 1)
        {
            $data['category']       = $cat;
            $data['subcategories']  = Category::where('parent_id',$id)->latest()->get();
            if(count($data['subcategories']) > 0)
            {
                $data['redirectUrl'] = route('frontend.home.index');
                return view('frontend_old.cat_post.category.subcategory',$data);
            }else{
                return redirect()->route('frontend.main.post.bycategory.subcategory.index',$slug);
            }
        }else{
            $data['category']       = Category::where('id',$sucateoryId)->first();
            $data['subcategories']  = Category::where('parent_id',$data['category']->id)->latest()->get();
            if(count($data['subcategories']) > 0)
            {
                $data['redirectUrl'] = route('frontend.home.index');
                return view('frontend_old.cat_post.category.subcategory',$data);
            }else{
                return redirect()->route('frontend.home.index');
            }
            return redirect()->route('frontend.home.index');
        }
        
    }



    public function flssCategoryOld($slug)
    {   
        $cat                    = FlssCategory::where('slug',$slug)->first();
        $id                     = $cat ? $cat->id : NULL;
        $sucateoryId            = $cat ? $cat->parent_id : NULL;
        $categoryTye            = $cat ? $cat->main_cat:false;
        if($categoryTye == 1)
        {
            $data['category']       = $cat;
            $data['subcategories']  = FlssCategory::where('parent_id',$id)->latest()->get();
            if(count($data['subcategories']) > 0)
            {
                $data['redirectUrl'] = route('frontend.home.index');
                return view('frontend_old.flss_cat_post.category.subcategory',$data);
            }else{
                return redirect()->route('frontend.flss.post.bycategory.subcategory.index',$slug);
            }
        }else{
            $data['category']       = FlssCategory::where('id',$sucateoryId)->first();
            $data['subcategories']  = FlssCategory::where('parent_id',$data['category']->id)->latest()->get();
            if(count($data['subcategories']) > 0)
            {
                $data['redirectUrl'] = route('frontend.home.index');
                return view('frontend_old.flss_cat_post.category.subcategory',$data);
            }else{
                return redirect()->route('frontend.home.index');
            }
            return redirect()->route('frontend.home.index');
        }
        
    }
}
