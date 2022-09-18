<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Backend\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\FLSS\Post as FLSSPost;

class AdminController extends Controller
{
    public function index()
    {
        $data['posts']      = Post::latest()->whereNotNull('published_at')->get()->take(10);
        $data['flssposts']  = FLSSPost::latest()->whereNotNull('published_at')->get()->take(10);
        $data['userPosts']  = User::select('id','photo','status','name')->where('status',1)
                                        ->withCount('postUser')
                                        ->whereNull('deleted_at')
                                        ->orderBy('post_user_count','desc') 
                                        ->having('post_user_count','>', 0) 
                                        ->get();
        return view('backend.dashboard.dashboard',$data);
    }
}
