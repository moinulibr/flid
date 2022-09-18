<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Media;
use App\Models\Backend\MediaPhoto;
use Illuminate\Http\Request;

use App\Traits\Backend\FileUpload\FileUploadTrait;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
     use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['medias'] = Media::latest()->get();
        return view('backend.media.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.media.add_new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('max_execution_time', 28000);
        if(isset($request->photo))
        {
            $data = new Media();
            $data->title = $request->title;
            $data->published_at = date('Y-m-d',strtotime($request->published_at));
            $data->status = 1;
            $data->created_by = Auth::guard('web')->user()->id;
            $data->save();
            if(isset($request->featured_image))
            {
                $this->destination  = 'media';  //its mandatory;
                $this->imageWidth   = 400;  //its mandatory
                $this->imageHeight  = 400;  //its nullable
                $this->requestFile  = $request->featured_image;  //its mandatory
                $this->id           = $data->id;
                $data->featured_image = $this->storeImage();
                $data->save();
            }
            
            foreach($request->photo as $photo){
                //$data = auth()->user()->mediaUser()->create($photo);
                $mpdata = new MediaPhoto();
                $mpdata->media_id = $data->id;
                $mpdata->save();
                if(isset($photo))
                {
                    $this->destination  = 'media-photo';  //its mandatory;
                    $this->imageWidth   = 400;  //its mandatory
                    $this->imageHeight  = 400;  //its nullable
                    $this->requestFile  = $photo;  //its mandatory
                    $this->id           = $mpdata->id;
                    $mpdata->photo      = $this->storeImage();
                    $mpdata->save();
                }
            }
            return redirect()->route('admin.media.index')->with('success','Media Added Successfully');
        }
        return back()->with('error','please select media photo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        $data['media'] = $media;
        return view('backend.media.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        ini_set('max_execution_time', 28000);
        $data = $media;
        $data->title = $request->title;
        $data->published_at = date('Y-m-d',strtotime($request->published_at));
        $data->status = 1;
        //$data->created_by = Auth::guard('web')->user()->id;
        $data->save();
        if(isset($request->featured_image))
        {
            $this->destination  = 'media';  //its mandatory;
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->featured_image;  //its mandatory
            $this->dbImageField = $data->featured_image;
            $data->featured_image = $this->updateImage();
            $data->save();
        }
        
        if(isset($request->photo))
        {
            foreach($request->photo as $photo){
                //$data = auth()->user()->mediaUser()->create($photo);
                $mpdata = new MediaPhoto();
                $mpdata->media_id = $data->id;
                $mpdata->save();
                if(isset($photo))
                {
                    $this->destination  = 'media-photo';  //its mandatory;
                    $this->imageWidth   = 400;  //its mandatory
                    $this->imageHeight  = 400;  //its nullable
                    $this->requestFile  = $photo;  //its mandatory
                    $this->id           = $mpdata->id;
                    $mpdata->photo      = $this->storeImage();
                    $mpdata->save();
                }
            }
        }
        return redirect()->route('admin.media.index')->with('success','Media Updated Successfully');
    }



    public function singlePhotoDelete($id)
    {
        MediaPhoto::where('id',$id)->delete();
        return redirect()->back()->with('success','Photo deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
    }


    public function delete(Media $media)
    {
        $data['media'] = $media;
        $view =  view('backend.media.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    public function destroy(Media $media)
    {
        if($media->MediaPhotos()->count() > 0)
        {
            $media->MediaPhotos()->delete();
        }
        $media->delete();
        return redirect()->route('admin.media.index')->with('success','Media Deleted Successfully');
    }


}
