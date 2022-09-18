<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Notification;
use App\Models\Backend\Post;
use Illuminate\Http\Request;
use App\Traits\Backend\FileUpload\FileUploadTrait;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pty = NULL)
    {
        if(strtolower($pty) == 'published'){
            $status = 1;
        }
        else if(strtolower($pty) == 'draft'){
            $status = 2;
        } 
        else if(strtolower($pty) == 'pending'){
            $status = 0;
        }else if(strtolower($pty) == 'reqtopub'){
            $status = 3;
        }else{
            $status = "all";
        }
        
        $query = Post::query();
        if(($status <= 3  || $status == 0) && $status !="all")
        {
            $query->where('status',$status);
        }
        if(Auth::guard('web')->user()->user_role_id == 2)
        {
            $data['posts']          = $query->with('cats')->whereNull('deleted_at')->where('created_by',Auth::guard('web')->user()->id)->latest()->get();
            $data['postCountables'] = Post::whereNull('deleted_at')->where('created_by',Auth::guard('web')->user()->id)->latest()->get();
            $data['ptyUrl']         = $pty;
            return view('backend.post.index',$data);
        }else{
            $data['posts']          = $query->with('cats')->whereNull('deleted_at')->latest()->get();
            $data['postCountables'] = Post::whereNull('deleted_at')->latest()->get();
            $data['ptyUrl']         = $pty;
            return view('backend.post.index',$data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::orderBy('main_cat','DESC')
                                        ->orderBy('id','DESC')
                                        ->get();
        return view('backend.post.add_new',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($request->category_id)) {
            return redirect()->back()->with('error','Please select minimum one category');
        }

        $post = auth()->user()->postUser()->create(['title'=>$request->title]); 
        
        $description = $request->input('description');
    
        $status = 0;
        if($request->page_status == 'Save Draft')
        {
            $status = 2;
        }
        else if($request->page_status == 'Publish')
        {
            $status = 1;
            $post->published_by  = Auth::guard('web')->user()->id;
            $post->published_at  = date('d-m-Y h:i:s A');
        }
        else if($request->page_status == 'Request To Publish')
        {
            $status = 3;
        }
        $post->description  = $description;
        $post->status       = $status;
        $post->save();

        if (isset($request->category_id)) {
            $post->categories()->attach($request->input('category_id'));
        }

        /* if (isset($request->parent_id)) {
            $post->parents()->attach($request->input('parent_id'));
        }

        if (isset($request->sub_id)) {
            $post->parent_subs()->attach($request->input('sub_id'));
        }

        if (isset($request->sub_sub_id)) {
            $post->sub_subs()->attach($request->input('sub_sub_id'));
        }

        if (isset($request->sub_sub_sub_id)) {
            $post->sub_sub_subs()->attach($request->input('sub_sub_sub_id'));
        } */


        if(isset($request->featured_image))
        {
            $this->destination  = 'post';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->featured_image;  //its mandatory
            $post->featured_image = $this->storeImage();
            $post->save();
        }
        if($post->published_at)
        {
            $this->setNotification($post);
        }
        return redirect()->route('admin.post.index')->with('success','Post added successfully');
    }

    private function setNotification($post)
    {
        if($existing = Notification::where('title',$post->title)->whereNull('deleted_at')->first())
        {
            if($post->status != 1)
            {
                $existing->deleted_at = date('Y-m-d h:i:s');
                $existing->save();
            }
            return 1;
        }else{
            $catIds                 = [];
            $catIds                 = $post ? $post->cats->pluck('category_id')->toArray():[];
            $category               = Category::whereIn('id',$catIds)
                                        ->select('id','slug')
                                        ->first();
            $catslug                = $category ? $category->slug:NULL;
            $notic                  = new Notification();
            $notic->post_id         = $post->id;
            $notic->post_type       = 1;
            $notic->title           = $post->title;
            $notic->created_by      = Auth::guard('web')->user()->id;
            $redirect = [
                'url'           => 'frontend.webview.main.post.detail',
                'post_slug'     => $post->slug, 
                'category_slug' => $catslug
                ];
            $notic->redirect_url = json_encode($redirect);
            $notic->save();
            return $notic;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['post']           = Post::with('cats')->find($id);
        $data['categories']     = Category::orderBy('main_cat','DESC')
                                    ->orderBy('id','DESC')
                                    ->get();
        return view('backend.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (!isset($request->category_id)) {
            return redirect()->back()->with('error','Please select minimum one category');
        }

        $post->title = $request->title;
        $status = 0;
        if($request->page_status == 'Save Draft')
        {
            $status = 2;
            $post->published_by  = NULL;
            $post->published_at  = NULL;
        }
        else if($request->page_status == 'Publish')
        {
            $status = 1;
            $post->published_by  = Auth::guard('web')->user()->id;
            $post->published_at  = date('d-m-Y h:i:s A');
        }
        else if($request->page_status == 'Request To Publish')
        {
            $status = 3;
            $post->published_by  = NULL;
            $post->published_at  = NULL;
        }
        $post->status  = $status;
        
        $post->description  = $request->description;
        $post->save();

        if ($post->cats()->count()) {
            $post->cats()->delete();
        }
        if (isset($request->category_id)) {
            $post->categories()->attach($request->input('category_id'));
        }

        /* if (isset($request->parent_id)) {
            $post->parents()->attach($request->input('parent_id'));
        }

        if (isset($request->sub_id)) {
            $post->parent_subs()->attach($request->input('sub_id'));
        }

        if (isset($request->sub_sub_id)) {
            $post->sub_subs()->attach($request->input('sub_sub_id'));
        }

        if (isset($request->sub_sub_sub_id)) {
            $post->sub_sub_subs()->attach($request->input('sub_sub_sub_id'));
        } */

        if(isset($request->featured_image))
        {
            $this->destination  = 'post';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->featured_image;  //its mandatory
            $this->dbImageField = $post->featured_image; 
            $post->featured_image = $this->updateImage();
            $post->save();
        }
    
        $this->setNotification($post);
        
        return redirect()->route('admin.post.index')->with('success','Post updated successfully');
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        Post::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s'),
            'status'    => 4
        ]);
        return response()->json([
            'status' => true,
            'mess' => "Post Deleted Successfully"
        ]);
    }

    public function delete(Post $post)
    {
        $data['post'] = $post;
        $view =  view('backend.post.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /*  $post->deleted_at   = date('Y/m/d h:i:s');
        $post->status       = 4;
        $post->save(); */
        if ($post->cats()->count()) {
            $post->cats()->delete();
        } 
        if ($post->post_notification()->count()) {
            $post->post_notification()->delete();
        }
        $post->delete();
        return redirect()->route('admin.post.index')->with('success','Post Deleted Successfully');
    }

    
    public function imageUpload(Request $request){

        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }

    }
}
