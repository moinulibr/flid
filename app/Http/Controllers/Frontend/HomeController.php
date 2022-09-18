<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\Page;
use Illuminate\Http\Request;
use App\Models\Backend\Media;
use App\Models\Backend\Setting;
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

class HomeController extends Controller
{
    use UserIdAddTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories']         = Category::where('main_cat',1)
                                        ->orderBy('custom_serial')
                                        ->where('status',1)
                                        ->latest()
                                        ->get()
                                        ->take(6);
        $data['scrolls']            = ScrollingNewsTicker::where('status',1)->latest()->get();
        $data['flsscategories']     = FlssCategory::where('main_cat',1)->orderBy('custom_serial')
                                        ->where('status',1)
                                        ->latest()
                                        ->get()
                                        ->take(4);
        $data['photoMessages']      = PhotoMessage::where('status',1)->latest()->get();

        $data['importantLinks']     = ImportantLink::orderBy('custom_serial')
                                        ->latest()
                                        ->get()
                                        ->take(8);

        $data['otherServices']      = NecessaryOtherService::orderBy('custom_serial')->latest()->get();
        
        $data['setting']            = Setting::findOrFail(1);
        
        $data['medias']             = Media::where('status',1)->latest()->get();
        
        $this->visitorIpdAdd();

        return view('frontend.landing.home',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allImportantLinks()
    {
        $this->visitorIpdAdd();
        $data['importantLinks'] = ImportantLink::orderBy('custom_serial')
                                ->latest()
                                ->get();
        return view('frontend.importantlinks.index',$data);
    }  
    


   
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
    public function notificationVisiting($id)
    {
        $notification = Notification::find($id);
        $visitor    = $this->visitorIpdAdd();
        $visitorId  = $visitor->id;
        $existNoticVisitor= NotificationVisitor::where('visitor_id',$visitorId)
                            ->where('status',0)
                            ->where('notification_id',$id)
                            ->first();
        if($existNoticVisitor)
        {
            $existNoticVisitor->status = 1;
            $existNoticVisitor->save();
        }
        $url = json_decode($notification->redirect_url,true);
        $posturl    = $url['url'];
        $postSlug   = $url['post_slug'];
        $cateSlug   = $url['category_slug'];
        return redirect()->route($posturl,[$postSlug,$cateSlug]);
    }
    protected function getAndSetVisitedNotification($visitorId)
    {
        $noticIds = NotificationVisitor::where('visitor_id',$visitorId)
                                        ->pluck('notification_id')
                                        ->toArray();
        $notifications = Notification::whereNotIn('id',$noticIds)->select('id','post_id')->get();
        
        foreach($notifications as $not)
        {
            $notVist = new NotificationVisitor();
            $notVist->notification_id   = $not->id;
            $notVist->post_id           = $not->post_id;
            $notVist->visitor_id        = $visitorId;
            $notVist->status            = 0;
            $notVist->save();
        }
        return true;
    }



    public function menu()
    {
        $this->visitorIpdAdd();
        $data['setting'] = Setting::findOrFail(1);
        return view('frontend.menu.index',$data);
    }


    public function media()
    {
        $this->visitorIpdAdd();
        $data['medias'] = Media::latest()
                        ->select('*',DB::raw('DATE(published_at) as date'), DB::raw('count(*) as total'))
                        ->groupBy('date')
                        ->get()
                        ->take(6);
        //return $data['medias'];
        return view('frontend.media.index',$data);
    }
    //current system. and good working
    public function mediaDateWiseDetailsPhotoByMediaId($id)
    {
        $this->visitorIpdAdd();
        $data['media'] = Media::find($id);
        $data['date'] = '';
        $data['medias'] =  MediaPhoto::where('media_id',$id)->latest()->get();
        //return $data['medias'];
        return view('frontend.media.details',$data);
    }
    //old system
    public function mediaDateWiseDetails($date)
    {
        $this->visitorIpdAdd();
        $data['date'] = $date;
        $data['medias'] =  Media::whereDate('created_at','=',date('Y-m-d',strtotime($date)))->latest()->get();
        //return $data['medias'];
        return view('frontend.media.details',$data);
    } 
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUs()
    {
        $this->visitorIpdAdd();
        $data['pages'] = Page::latest()->whereNotNull('published_at')->get();
        return view('frontend.page.index',$data);
    }
    public function aboutUsView($slug)
    {
        $this->visitorIpdAdd();
        $data['pages'] = Page::where('slug',$slug)->whereNotNull('published_at')->first();
        return view('frontend.page.details',$data);
    }

    public function dataNotFound()
    {
        $this->visitorIpdAdd();
        return view('frontend.data_not_found.404');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOld()
    {
        $data['setting']            = Setting::findOrFail(1);
        $data['scrolls']            = ScrollingNewsTicker::where('status',1)->get();
        $data['categories']         = Category::where('main_cat',1)->orderBy('custom_serial')->where('status',1)->get();
        $data['flsscategories']     = FlssCategory::where('main_cat',1)->orderBy('custom_serial')->where('status',1)->get();
        $data['importantLinks']     = ImportantLink::orderBy('custom_serial')->get();
        $data['otherServices']      = NecessaryOtherService::orderBy('custom_serial')->get();
        $data['medias']             = Media::where('status',1)->latest()->get();
        $data['photoMessages']      = PhotoMessage::where('status',1)->latest()->get();
        return view('frontend_old.landing.home',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mediaOld()
    {
        $data['medias'] = Media::latest()->get();
        return view('frontend_old.media.view',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutUsOld()
    {
        return redirect()->route('frontend.home.index');
    }
    public function aboutUsViewOld($slug)
    {
        return $slug;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['posts']              = FlssPost::where('status',1)->get();
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
