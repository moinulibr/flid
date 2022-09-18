<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Setting;
use Illuminate\Http\Request;

use App\Traits\Backend\FileUpload\FileUploadTrait;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Setting::count() == 0)
        {
            $data['setting'] = $this->create();
        }
        else{
            $data['setting'] = Setting::find(1);
        }
        return view('backend.settings.general',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $set = new Setting();
        $set->site_title = "site title";
        $set->save();
        return $set;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $set = new Setting();
        $set->site_title = "site title";
        $set->save();
        return $set;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $setting->site_title    = $request->site_title;
        $setting->tagline       = $request->tagline;
        $setting->created_by    = Auth::guard('web')->user()->id;
        $setting->status        = 1;
        $setting->save();
        
        if(isset($request->site_icon))
        {
            $this->destination  = 'setting/site-icon';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->site_icon;  //its mandatory
            $this->dbImageField = $setting->site_icon;  //its mandatory
            $setting->site_icon = $this->updateImage();
            $setting->save();
        }

        if(isset($request->admin_logo))
        {
            $this->destination  = 'setting/admin-logo';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->admin_logo;  //its mandatory
            $this->dbImageField = $setting->admin_logo;  //its mandatory
            $setting->admin_logo = $this->updateImage();
            $setting->save();
        }

        if(isset($request->apps_logo))
        {
            $this->destination  = 'setting/apps-logo';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->apps_logo;  //its mandatory
            $this->dbImageField = $setting->apps_logo;  //its mandatory
            $setting->apps_logo = $this->updateImage();
            $setting->save();
        }
        return back()->with('success','Data updated successfully');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function scrollUpdate(Request $request, Setting $setting)
    {
        $setting->flid_website_url          = $request->flid_website_url;
        $setting->flid_facebook_url         = $request->flid_facebook_url;
        $setting->rate_app                  = $request->rate_app;
        $setting->phone                     = $request->phone;
        $setting->facebook_messenger_url    = $request->facebook_messenger_url;
        
        $setting->scroll_speed      = $request->scroll_speed;
        $setting->scroll_color      = $request->scroll_color;
        $setting->scroll_font_size  = $request->scroll_font_size;
        $setting->save();
        return back()->with('success','Data updated successfully');
    }

    public function websiteUpdate(Request $request, Setting $setting)
    {
        $setting->flid_website_url          = $request->flid_website_url;
        $setting->flid_facebook_url         = $request->flid_facebook_url;
        $setting->rate_app                  = $request->rate_app;
        $setting->phone                     = $request->phone;
        $setting->facebook_messenger_url    = $request->facebook_messenger_url;
        $setting->save();
        return back()->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
