<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\ScrollingNewsTicker;
use Illuminate\Http\Request;

class ScrollingNewsTickerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['datas'] = ScrollingNewsTicker::latest()->get(); 
        //return view('backend.news_ticker',$data);
        return view('backend.scrolling-news-ticker.index',$data);
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
        auth()->user()->scrollingNewsTickerUser()->create($request->all());
        return redirect()->route('admin.scrolling.news.ticker.index')->with('success','Scrolling News Ticker Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\ScrollingNewsTicker  $scrollingNewsTicker
     * @return \Illuminate\Http\Response
     */
    public function show(ScrollingNewsTicker $scrollingNewsTicker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\ScrollingNewsTicker  $scrollingNewsTicker
     * @return \Illuminate\Http\Response
     */
    public function edit(ScrollingNewsTicker $scrollingNewsTicker)
    {
        //$scrollingNewsTicker;
        $data['scroll'] = $scrollingNewsTicker;
        $view =  view('backend.scrolling-news-ticker.edit',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\ScrollingNewsTicker  $scrollingNewsTicker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScrollingNewsTicker $scrollingNewsTicker)
    {
        $scrollingNewsTicker->title = $request->title;
        $scrollingNewsTicker->status = $request->status;
        $scrollingNewsTicker->save();
        return redirect()->route('admin.scrolling.news.ticker.index')->with('success','Scrolling News Ticker Updated Successfully');
    }



     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\ScrollingNewsTicker  $scrollingNewsTicker
     * @return \Illuminate\Http\Response
     */
    public function delete(ScrollingNewsTicker $scrollingNewsTicker)
    {
        $data['scroll'] = $scrollingNewsTicker;
        $view =  view('backend.scrolling-news-ticker.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\ScrollingNewsTicker  $scrollingNewsTicker
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScrollingNewsTicker $scrollingNewsTicker)
    {
        $scrollingNewsTicker->deleted_at = date('Y/m/d h:i:s');
        $scrollingNewsTicker->save();
        return redirect()->route('admin.scrolling.news.ticker.index')->with('success','Scrolling News Ticker Deleted Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\ScrollingNewsTicker  $scrollingNewsTicker
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        ScrollingNewsTicker::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s')
        ]);
        return response()->json([
            'status' => true,
            'mess' => "Scrolling News Ticker Deleted Successfully"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\ScrollingNewsTicker  $scrollingNewsTicker
     * @return \Illuminate\Http\Response
     */
    public function status(ScrollingNewsTicker $scrollingNewsTicker)
    {
        $data['scroll'] = $scrollingNewsTicker;
        $view =  view('backend.scrolling-news-ticker.status',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    public function statusChanging(Request $request ,ScrollingNewsTicker $scrollingNewsTicker)
    {
        $scrollingNewsTicker->status = $request->status;
        $scrollingNewsTicker->save();
        return redirect()->route('admin.scrolling.news.ticker.index')->with('success','Scrolling News Ticker Status Changed Successfully');
    }

}
