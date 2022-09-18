<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\NecessaryOtherService;
use Illuminate\Http\Request;
use App\Traits\Backend\FileUpload\FileUploadTrait;
class NecessaryOtherServiceController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['datas'] = NecessaryOtherService::orderBy('custom_serial','ASC')
                                                ->orderBy('id','DESC')
                                                ->get(); 
        return view('backend.necessary-other-services.index',$data);
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
        $data = auth()->user()->necessaryOtherServiceUser()->create($request->all());
        if(isset($request->photo))
        {
            $this->destination  = 'other-service';  //its mandatory;
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $this->id           = $data->id;
            $data->photo = $this->storeImage();
            $data->save();
        }
        return redirect()->route('admin.necessary.other.service.index')->with('success','Other Service Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\NecessaryOtherService  $necessaryOtherService
     * @return \Illuminate\Http\Response
     */
    public function show(NecessaryOtherService $necessaryOtherService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\NecessaryOtherService  $necessaryOtherService
     * @return \Illuminate\Http\Response
     */
    public function edit(NecessaryOtherService $necessaryOtherService)
    {
        $data['otherService'] = $necessaryOtherService;
        $view =  view('backend.necessary-other-services.edit',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\NecessaryOtherService  $necessaryOtherService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NecessaryOtherService $necessaryOtherService)
    {
        $necessaryOtherService->custom_serial   = $request->custom_serial;
        $necessaryOtherService->title           = $request->title;
        $necessaryOtherService->side_url        = $request->side_url;
        $necessaryOtherService->save();
        if(isset($request->photo))
        {
            $this->destination  = 'other-service';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $this->dbImageField = $necessaryOtherService->photo;  //its mandatory
            $necessaryOtherService->photo = $this->updateImage();
            $necessaryOtherService->save();
        }
        return redirect()->route('admin.necessary.other.service.index')->with('success','Other Services Updated Successfully');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\NecessaryOtherService  $necessaryOtherService
     * @return \Illuminate\Http\Response
     */
    public function delete(NecessaryOtherService $necessaryOtherService)
    {
        $data['otherService'] = $necessaryOtherService;
        $view =  view('backend.necessary-other-services.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\NecessaryOtherService  $necessaryOtherService
     * @return \Illuminate\Http\Response
     */
    public function destroy(NecessaryOtherService $necessaryOtherService)
    {
        $necessaryOtherService->deleted_at = date('Y/m/d h:i:s');
        $necessaryOtherService->save();
        return redirect()->route('admin.necessary.other.service.index')->with('success','Other Services Deleted Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\NecessaryOtherService  $necessaryOtherService
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        NecessaryOtherService::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s')
        ]);
        return response()->json([
            'status' => true,
            'mess' => "Other Services Deleted Successfully"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\NecessaryOtherService  $necessaryOtherService
     * @return \Illuminate\Http\Response
     */
    public function status(NecessaryOtherService $necessaryOtherService)
    {
        $data['otherService'] = $necessaryOtherService;
        $view =  view('backend.necessary-other-services.status',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    public function statusChanging(Request $request ,NecessaryOtherService $necessaryOtherService)
    {
        $necessaryOtherService->status = $request->status;
        $necessaryOtherService->save();
        return redirect()->route('admin.necessary.other.service.index')->with('success','Other Services Status Changed Successfully');
    }

}
