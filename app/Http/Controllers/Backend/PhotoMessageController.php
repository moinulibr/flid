<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\PhotoMessage;
use Illuminate\Http\Request;
use App\Traits\Backend\FileUpload\FileUploadTrait;
class PhotoMessageController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['datas'] = PhotoMessage::latest()->get(); 
        return view('backend.photo-message.index',$data);
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
        $data =auth()->user()->photoMessagerUser()->create($request->all());

        if(isset($request->photo))
        {
            $this->destination  = 'photo-messages';  //its mandatory;
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $this->id           = $data->id;
            $data->photo        = $this->storeImage();
            $data->save();
        }
        return redirect()->route('admin.photo.message.index')->with('success','Image Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\PhotoMessage  $photoMessage
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoMessage $photoMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\PhotoMessage  $photoMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoMessage $photoMessage)
    {
        $data['photoMess'] = $photoMessage;
        $view =  view('backend.photo-message.edit',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\PhotoMessage  $photoMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoMessage $photoMessage)
    {
        $photoMessage->status = $request->status;
        $photoMessage->save();
        if(isset($request->photo))
        {
            $this->destination  = 'photo-messages';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $this->dbImageField = $photoMessage->photo;  //its mandatory
            $photoMessage->photo = $this->updateImage();
            $photoMessage->save();
        }
        return redirect()->route('admin.photo.message.index')->with('success','Image Updated Successfully');
    }
    
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\PhotoMessage  $photoMessage
     * @return \Illuminate\Http\Response
     */
    public function delete(PhotoMessage $photoMessage)
    {
        $data['photoMess'] = $photoMessage;
        $view =  view('backend.photo-message.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\PhotoMessage  $photoMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoMessage $photoMessage)
    {
        $photoMessage->deleted_at = date('Y/m/d h:i:s');
        $photoMessage->save();
        return redirect()->route('admin.photo.message.index')->with('success','Image Deleted Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\PhotoMessage  $photoMessage
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        PhotoMessage::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s')
        ]);
        return response()->json([
            'status' => true,
            'mess' => "Image Deleted Successfully"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\PhotoMessage  $photoMessage
     * @return \Illuminate\Http\Response
     */
    public function status(PhotoMessage $photoMessage)
    {
        $data['photoMess'] = $photoMessage;
        $view =  view('backend.photo-message.status',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    public function statusChanging(Request $request ,PhotoMessage $photoMessage)
    {
        $photoMessage->status = $request->status;
        $photoMessage->save();
        return redirect()->route('admin.photo.message.index')->with('success','Image Status Changed Successfully');
    }



}
