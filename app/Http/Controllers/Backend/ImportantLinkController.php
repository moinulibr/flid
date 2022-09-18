<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ImportantLink;
use Illuminate\Http\Request;

class ImportantLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['datas'] = ImportantLink::orderBy('custom_serial','ASC')
                                        ->orderBy('id','DESC')
                                        ->get();  
        return view('backend.important-link.index',$data);
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
        auth()->user()->importantLinkUser()->create($request->all());
        return redirect()->route('admin.important.link.index')->with('success','Important Link Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\ImportantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function show(ImportantLink $importantLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\ImportantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function edit(ImportantLink $importantLink)
    {
        $data['inportLink'] = $importantLink;
        $view =  view('backend.important-link.edit',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\ImportantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImportantLink $importantLink)
    {
        $importantLink->custom_serial   = $request->custom_serial;
        $importantLink->link_name       = $request->link_name;
        $importantLink->side_url        = $request->side_url;
        $importantLink->save();
        return redirect()->route('admin.important.link.index')->with('success','Important Link Updated Successfully');
    }

    
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\ImportantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function delete(ImportantLink $importantLink)
    {
        $data['inportLink'] = $importantLink;
        $view =  view('backend.important-link.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\ImportantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImportantLink $importantLink)
    {
        $importantLink->deleted_at = date('Y/m/d h:i:s');
        $importantLink->save();
        return redirect()->route('admin.important.link.index')->with('success','Important Link Deleted Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\ImportantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        ImportantLink::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s')
        ]);
        return response()->json([
            'status' => true,
            'mess' => "Important Link Deleted Successfully"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\ImportantLink  $importantLink
     * @return \Illuminate\Http\Response
     */
    public function status(ImportantLink $importantLink)
    {
        $data['inportLink'] = $importantLink;
        $view =  view('backend.important-link.status',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    public function statusChanging(Request $request ,ImportantLink $importantLink)
    {
        $importantLink->status = $request->status;
        $importantLink->save();
        return redirect()->route('admin.important.link.index')->with('success','Important Link Status Changed Successfully');
    }

}
