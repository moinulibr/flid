<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Backend\Page;

use App\Models\Backend\Post;
use Illuminate\Http\Request;
use App\Models\Backend\Media;
use App\Models\Backend\Setting;
use App\Models\Backend\Visitor;
use App\Models\Backend\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Backend\Notification;
use App\Models\Backend\PhotoMessage;
use App\Models\Backend\ImportantLink;
use App\Traits\UserIdAdd\UserIdAddTrait;
use App\Models\Backend\NotificationVisitor;
use App\Models\Backend\ScrollingNewsTicker;
use App\Models\Backend\FLSS\Post as FlssPost;
use App\Models\Backend\NecessaryOtherService;
use App\Models\Backend\FLSS\Category as FlssCategory;
use App\Models\Backend\MediaPhoto;

class ApiController extends Controller
{
    protected $getUserIpAddress;
    protected $id;

    public function nsbPostSearching(Request $request)
    {
        if(!isset($request->searching_word))
        {
            return response()->json([
                'status'        => false,
                'code'          => 400,
                'message'       => 'Missing Parameters. [searching word id required]',
            ]);
        }
        $posts = Post::where('title','like','%'.$request->searching_word.'%')->whereNotNull('published_by')->latest()->get();
        if(count($posts) > 0)
        {
            $data['posts'] = $posts; 
            return response()->json([
                'status'    => true,
                'data'      => json_encode($data),
                'message'   => 'Success',
                'image-dir' => "storage/post"
            ]);
        }else{
            $data = [];
            return response()->json([
                'status'    => false,
                'code'      => 404,
                'data'      => json_encode($data),
                'message'   => 'Data not found',
                'image-dir' => "storage/post"
            ]);
        }
    }

    public function homePageSubCategorySearch($word)
    {
        
    }

    // view category and subcategory
    public function viewNSBCategory($catType, $limit = NULL)
    {
        $query = Category::query();
        $query->select('id','slug','name','photo','parent_id')
        ->orderBy('custom_serial')
        ->whereNull('deleted_at')
        ->where('status',1);
        if($catType == 'main')//main, sub
        {
            $query->where('main_cat',1);
        }else{
            $query->where('main_cat',NULL);
        }
        if($limit != NULL || $limit)
        {
           $data =  $query->latest()->get()->take($limit);
        }else{
           $data =  $query->latest()->get();
        }
        return response()->json([
            'status' => true,
            'code'   => 200,
            'data'  => json_encode($data),
            'message'=> 'Success',
            'image-dir' => "storage/category"
        ]);
    }
    //view single category/subcategory by slug
    public function viewNSBSingleCategoryBySlug($slug)
    {
        $data = Category::select('id','name','slug','photo','parent_id')
                        ->where('slug',$slug)
                        ->first();
        return response()->json([
            'status' => true,
            'code'   => 200,
            'data'  => json_encode($data),
            'message'=> 'Success',
            'image-dir' => "storage/category"
        ]);
    }
    
    //nsb : get subcategory by main category slug
    public function getNSBSubcategoryByMainCategorySlug($slug, $limit = NULL)
    {
        $category = Category::select('id')->where('slug',$slug)->where('main_cat',1)->first();
        if(! $category){
            return response()->json([
                'status'    => false,
                'code'      => 404,
                'data'      => json_encode([]),
                'message'   => 'Invalid parameter : slug',
            ]);
        }
        $query = Category::query();
        $query->select('id','slug','name','photo','parent_id')
        ->orderBy('custom_serial')
        ->where('parent_id',$category->id)
        ->where('status',1);
        
        if($limit != NULL || $limit)
        {
           $data =  $query->latest()->get()->take($limit);
        }else{
           $data =  $query->latest()->get();
        }
        return response()->json([
            'status' => true,
            'code'   => 200,
            'data'  => json_encode($data),
            'message'=> 'Success',
            'image-dir' => "storage/category"
        ]);
    }

    public function viewNSBCategoryWisePost($categorySlug)
    {
        $cat     = Category::where('slug',$categorySlug)->first();
        if(! $cat){
            return response()->json([
                'status'    => false,
                'code'      => 404,
                'data'      => json_encode([]),
                'message'   => 'Data not found',
                'image-dir' => "storage/post"
            ]);
        }
        $id                     = $cat ? $cat->id : NULL;
        $parentId               = $cat ? $cat->parent_id : NULL;
        /* $categoryTye            = $cat ? $cat->main_cat:false;
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
        } */
        $postIds                = [];
        $postIds                = $cat ? $cat->categoryPosts->pluck('post_id')->toArray():[];
        $data['posts']          = Post::whereIn('id',$postIds)->whereNotNull('published_by')->latest()->get();
        $data['category']       = $cat;
        return response()->json([
            'status'    => true,
            'code'      => 200,
            'data'      => json_encode($data),
            'message'   => 'Success',
            'image-dir' => "storage/post"
        ]);
    }

    public function viewNSBPostDetailsBySlug($postSlug)
    {
        $data['post']          = Post::where('slug',$postSlug)->whereNotNull('published_by')->first();
        if(! $data['post']){
            return response()->json([
                'status'    => false,
                'code'      => 404,
                'data'      => json_encode([]),
                'message'   => 'Data not found',
                'image-dir' => "storage/post"
            ]);
        }
        $catIds                 = [];
        $catIds                 = $data['post'] ? $data['post']->cats->pluck('category_id')->toArray():[];
        $data['categories']     = Category::whereIn('id',$catIds)
                                    ->select('id','main_cat','name','parent_id','slug')
                                    ->orderBy('main_cat','asc')
                                    ->get();
        //$data['redirectUrl'] = route('frontend.webview.subcategory.bycategory.index',$categoryslug);
        return response()->json([
            'status' => true,
            'code'   => 200,
            'data'  => json_encode($data),
            'message'=> 'Success',
            'image-dir' => "storage/post"
        ]);
    }


    //get notic : scrolling_news_tickers
    public function viewExclusiveNotice()
    {
        $data  = ScrollingNewsTicker::select('id','title')->where('status',1)->latest()->get();
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => ""
        ]);
    }

 

    //মৎস্য ও প্রানিসম্পদ বিশেষ সেবা :
    public function viewFLSSCategory($catType, $limit = NULL)
    {
        $query = FlssCategory::query();
        $query->select('id','slug','name','photo')
            ->orderBy('custom_serial')
            ->whereNull('deleted_at')
            ->where('status',1);
        if($catType == 'main')//main, sub
        {
            $query->where('main_cat',1);
        }else{
            $query->where('main_cat',NULL);
        }
        if($limit != NULL || $limit)
        {
           $data =  $query->latest()->get()->take($limit);
        }else{
           $data =  $query->latest()->get();
        }
        return response()->json([
            'status' => true,
            'code'   => 200,
            'data'  => json_encode($data),
            'message'=> 'Success',
            'image-dir' => "storage/flss-category"
        ]);
    }

    public function viewFLSSSingleCategoryBySlug($slug)
    {
        $data = FlssCategory::select('id','name','slug','photo','parent_id')
                ->where('slug',$slug)
                ->first();
        return response()->json([
            'status'    => true,
            'code'      => 200,
            'data'      => json_encode($data),
            'message'   => 'Success',
            'image-dir' => "storage/flss-category"
        ]); 
    }
    

    //nsb : get subcategory by main category slug
    public function getFLSSSubcategoryByMainCategorySlug($slug, $limit = NULL)
    {
        $category = FlssCategory::select('id')->where('slug',$slug)->where('main_cat',1)->first();
        if(! $category){
            return response()->json([
                'status'    => false,
                'code'      => 404,
                'data'      => json_encode([]),
                'message'   => 'Invalid parameter : slug',
            ]);
        }
        $query = FlssCategory::query();
        $query->select('id','slug','name','photo','parent_id')
        ->orderBy('custom_serial')
        ->where('parent_id',$category->id)
        ->where('status',1);
        
        if($limit != NULL || $limit)
        {
            $data =  $query->latest()->get()->take($limit);
        }else{
            $data =  $query->latest()->get();
        }
        return response()->json([
            'status' => true,
            'code'   => 200,
            'data'  => json_encode($data),
            'message'=> 'Success',
            'image-dir' => "storage/flss-category"
        ]);
    }
 

    public function viewFLSSCategoryWisePost($categorySlug)
    {
        $cat     = FlssCategory::where('slug',$categorySlug)->first();
        if(! $cat){
            return response()->json([
                'status'    => false,
                'code'      => 404,
                'data'      => json_encode([]),
                'message'   => 'Data not found',
                'image-dir' => "storage/flss-post"
            ]);
        }
        $id                     = $cat ? $cat->id : NULL;
        $parentId               = $cat ? $cat->parent_id : NULL;
        /* $categoryTye            = $cat ? $cat->main_cat:false;
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
        } */
        $postIds                = [];
        $postIds                = $cat ? $cat->categoryPosts->pluck('post_id')->toArray():[];
        $data['posts']          = FlssPost::whereIn('id',$postIds)->whereNotNull('published_by')->latest()->get();
        $data['category']       = $cat;
        return response()->json([
            'status'    => true,
            'code'      => 200,
            'data'      => json_encode($data),
            'message'   => 'Success',
            'image-dir' => "storage/flss-post"
        ]);
    }

    public function viewFLSSPostDetailsBySlug($postSlug)
    {
        $data['post']          = FlssPost::where('slug',$postSlug)->whereNotNull('published_by')->first();
        if(! $data['post']){
            return response()->json([
                'status'    => false,
                'code'      => 404,
                'data'      => json_encode([]),
                'message'   => 'Data not found',
                'image-dir' => "storage/flss-post"
            ]);
        }
        $catIds             = [];
        $catIds             = $data['post'] ? $data['post']->cats->pluck('category_id')->toArray():[];
        $data['categories'] = FlssCategory::whereIn('id',$catIds)
                                ->select('id','main_cat','name','parent_id','slug')
                                ->orderBy('main_cat','asc')
                                ->get();
        //$data['redirectUrl'] = route('frontend.webview.flss.subcategory.bycategory.index',$categoryslug); 

        return response()->json([
            'status'    => true,
            'code'      => 200,
            'data'      => json_encode($data),
            'message'   => 'Success',
            'image-dir' => "storage/flss-post"
        ]);
    }
    //end মৎস্য ও প্রানিসম্পদ বিশেষ সেবা :



    //গুরুর্তপূর্ন লিঙ্ক সমূহ :
    public function getImportantLink($limit)
    {
        $data = ImportantLink::select('id','link_name','side_url as site_url')
                ->orderBy('custom_serial')
                ->latest()
                ->get()
                ->take($limit);
                
        return response()->json([
            'status'    => true,
            'code'      => 200,
            'data'      => json_encode($data),
            'message'   => 'Success',
            'image-dir' => NULL
        ]); 
    }  

    public function getAllImportantLink()
    {
        $data = ImportantLink::select('id','link_name','side_url as site_url')
                ->orderBy('custom_serial')
                ->latest()
                ->get();
        return response()->json([
            'status'    => true,
            'code'      => 200,
            'data'      => json_encode($data),
            'message'   => 'Success',
            'image-dir' => NULL
        ]); 
    }
    //end গুরুর্তপূর্ন লিঙ্ক সমূহ :


    //প্রয়োজনীয় অন্যান্য সেবা:
    public function otherNecessaryService()
    {
        $data = NecessaryOtherService::select('id','title','side_url as site_url','photo')
                            ->orderBy('custom_serial')
                            ->latest()
                            ->get();
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => "storage/other-service"
        ]);
    }
    //end প্রয়োজনীয় অন্যান্য সেবা:


    //image slider : photo message
    public function imageSlider()
    {
        $data = PhotoMessage::select('id','photo')->where('status',1)->latest()->get();
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => "storage/photo-messages"
        ]);
    }
    //end image slider


    //মিডিয়া:
    public function getMedia($limit = NULL)
    {
        $data = Media::latest()
        ->select('id','featured_image','status','published_at','title'
            ,DB::raw('DATE(published_at) as date'), DB::raw('count(*) as total'))
        ->groupBy('date')
        ->get()
        ->take($limit);
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => "storage/media"
        ]);
    } 
    public function dateWiseMediaViewByMediaId($id)
    {
        $media =  Media::select('id','title','featured_image','published_at')->find($id);
        $data['date'] = $media->published_at;
        $data['medias'] =  MediaPhoto::select('id','media_id','photo')
                        ->where('media_id',$id)
                        ->latest()
                        ->get();
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => "storage/media-photo"
        ]);
    } 
    public function dateWiseMediaView($date)
    {
        $data['date'] = $date;
        $data['medias'] =  Media::select('id','status')
                        ->whereDate('created_at','=',date('Y-m-d',strtotime($date)))
                        ->latest()
                        ->get();
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => "storage/media-photo"
        ]);
    }
    //end মিডিয়া::


    //সমস্ত পৃষ্ঠা::
    public function getPage($limit = NULL)
    {
        $data = Page::select('id','title','slug','description','featured_image','published_at')
                        ->latest()
                        ->whereNotNull('published_at')
                        ->get()
                        ->take($limit);
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => "storage/page"
        ]);
    } 
    public function PageDetailsBySlug($slug)
    {
        $data = Page::select('id','title','slug','description','featured_image','published_at')
                ->where('slug',$slug)
                ->whereNotNull('published_at')
                ->first();
        return response()->json([
        'status'        => true,
        'code'          => 200,
        'data'          => json_encode($data),
        'message'       => 'Success',
        'image-dir'     => "storage/page"
        ]);
    }
    //end সমস্ত পৃষ্ঠা:::
        
    
    // flid app logo
    public function flidLogo()
    {
        $data    = Setting::select('apps_logo')->findOrFail(1);
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => "storage/setting/apps-logo"
        ]);
    }
    //get phone number
    public function getPhoneNumber()
    {
        $data    = Setting::select('phone as phone_number')->findOrFail(1);
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => NULL
        ]);
    }

    //get messenger
    public function getMessengerLink()
    {
        $data    = Setting::select('facebook_messenger_url')->findOrFail(1);
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => NULL
        ]);
    }

    //get menu
    public function getMenu()
    {
        $data    = Setting::select('flid_website_url','flid_facebook_url','rate_app')->findOrFail(1);
        return response()->json([
            'status'        => true,
            'code'          => 200,
            'data'          => json_encode($data),
            'message'       => 'Success',
            'image-dir'     => ""
        ]);
    }


   //get user details by user id
    public function getUserDetailByUserId($id)
    {
        $user     = User::findOrFail($id);
        if(! $user){
            return response()->json([
                'status'    => false,
                'code'      => 404,
                'data'      => json_encode([]),
                'message'   => 'Data not found',
                'image-dir' => "user"
            ]);
        }
        $data = $user;
        return response()->json([
            'status'    => true,
            'code'      => 200,
            'data'      => json_encode($data),
            'message'   => 'Success',
            'image-dir' => "storage/user"
        ]);
    }




  
    /*
    |-----------------------------------------------------------------------
    | Notification
    |--------------------------------------------------------------------
    */
        public function viewNSBNotification($user_unique_id = NULL)
        {
            if(!$user_unique_id)
            {
                return response()->json([
                    'status'        => false,
                    'code'          => 400,
                    'message'       => 'Missing Parameters. [user unique id required]',
                ]);
            }
            //$userUniqueId = $request->user_unique_id;
            $this->getUserIpAddress = $user_unique_id;

            $visitor    = $this->visitorIpdAdd();
            $visitorId  = $visitor->id;
            $this->getAndSetVisitedNotification($visitorId);

            $noticVisIds = NotificationVisitor::where('visitor_id',$visitorId)
                                            ->where('status',0)
                                            ->pluck('notification_id')
                                            ->toArray();

            $data = Notification::select('id','post_id','title')
                                ->whereIn('id',$noticVisIds)
                                ->whereNull('deleted_at')
                                ->latest()
                                ->get();
            return response()->json([
                'status'        => true,
                'code'          => 200,
                'data'          => json_encode($data),
                'message'       => 'Success',
                'image-dir'     => ""
            ]);
        }

        public function visitingNSBNotification($id,$user_unique_id = NULL)
        {
            if(!$id)
            {
                return response()->json([
                    'status'        => false,
                    'code'          => 400,
                    'message'       => 'Missing Parameters. [notification id required]',
                ]);
            } 
            if(!$user_unique_id)
            {
                return response()->json([
                    'status'        => false,
                    'code'          => 400,
                    'message'       => 'Missing Parameters. [user unique id required]',
                ]);
            }
            $notification       = Notification::find($id);
            $this->getUserIpAddress = $user_unique_id;
            $visitor            = $this->visitorIpdAdd();
            $visitorId          = $visitor->id;
            $existNoticVisitor  = NotificationVisitor::where('visitor_id',$visitorId)
                                ->where('status',0)
                                ->where('notification_id',$id)
                                ->first();
            if($existNoticVisitor)
            {
                $existNoticVisitor->status = 1;
                $existNoticVisitor->save();
            }
            $url = json_decode($notification->redirect_url,true);
            //$posturl    = $url['url'];
            $data['post_slug']   = $url['post_slug'];
            $data['cat_slug']    = $url['category_slug'];
            return response()->json([
                'status'        => true,
                'code'          => 200,
                'data'          => json_encode($data),
                'message'       => 'Success',
                'image-dir'     => "",
                'note'          => "please call the post details api [by post slug]"
            ]);
            //return redirect()->route($posturl,[$postSlug,$cateSlug]);
        }

        protected function getAndSetVisitedNotification($visitorId)
        {
            $noticeIds      = NotificationVisitor::where('visitor_id',$visitorId)
                                            ->pluck('notification_id')
                                            ->toArray();
            $notifications  = Notification::whereNotIn('id',$noticeIds)->select('id','post_id')->get();
            
            foreach($notifications as $notv)
            {
                $notVist = new NotificationVisitor();
                $notVist->notification_id   = $notv->id;
                $notVist->post_id           = $notv->post_id;
                $notVist->visitor_id        = $visitorId;
                $notVist->status            = 0;
                $notVist->save();
            }
            return true;
        }
    

        protected function visitorIpdAdd()
        { 
            $unique_id = $this->getUserIpAddress;//$this->getUserIpAddr();
            if($visit = Visitor::where('unique_id',$unique_id)->first())
            {
                return $visit;
            }else{
                $visitor   = new Visitor();
                $visitor->unique_id = $unique_id;
                $visitor->status    = 1;
                $visitor->save();
                return $visitor;
            }
        }

        //not using this for mobile api
        protected function getUserIpAddr()
        {
            $ipaddress = '';
            if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';    
            return $ipaddress;
        }
        //not using this
        public function notification()
        {
            $visitor    = $this->visitorIpdAdd();
            $visitorId  = $visitor->id;
            $this->getAndSetVisitedNotification($visitorId);

            $noticVisIds = NotificationVisitor::where('visitor_id',$visitorId)
                                            ->where('status',0)
                                            ->pluck('notification_id')
                                            ->toArray();

            $data['notifications'] = Notification::whereIn('id',$noticVisIds)->whereNull('deleted_at')->latest()->get();
            return view('frontend.notification.index',$data);
        }
    /*
    |-----------------------------------------------------------------------
    | Notification
    |--------------------------------------------------------------------
    */

    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
