<?php

namespace App\Models;

use App\Models\Backend\Category;
use App\Models\Backend\ImportantLink;
use App\Models\Backend\Media;
use App\Models\Backend\NecessaryOtherService;
use App\Models\Backend\Page;
use App\Models\Backend\PhotoMessage;
use App\Models\Backend\Post;
use App\Models\Backend\FLSS\Post as FlssPost;
use App\Models\Backend\ScrollingNewsTicker;
use App\Models\Backend\Setting;
use App\Models\Backend\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'avatar', 'provider_id', 'provider',
        'access_token','phone',
        'verified','send_user_notification','status','user_role_id','photo','designation','office_address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scrollingNewsTickerUser()
    {
        return $this->hasMany(ScrollingNewsTicker::class,'created_by','id');
    }

    public function photoMessagerUser()
    {
        return $this->hasMany(PhotoMessage::class,'created_by','id');
    }

    public function importantLinkUser()
    {
        return $this->hasMany(ImportantLink::class,'created_by','id');
    }

    public function necessaryOtherServiceUser()
    {
        return $this->hasMany(NecessaryOtherService::class,'created_by','id');
    }


    public function settingUser()
    {
        return $this->hasMany(Setting::class,'created_by','id');
    }
    public function CategoryUser()
    {
        return $this->hasMany(Category::class,'created_by','id');
    }
    public function postUser()
    {
        return $this->hasMany(Post::class,'created_by','id');
    }
   
    public function userLatestPost()
    {
        return Post::select('created_at','published_at')->where('created_by',$this->id)->latest()->first()->published_at;
    }


    
    public function pageUser()
    {
        return $this->hasMany(Page::class,'created_by','id');
    }
    public function mediaUser()
    {
        return $this->hasMany(Media::class,'created_by','id');
    }
    public function userRoleUser()
    {
        return $this->hasMany(UserRole::class,'created_by','id');
    }


    public function userRoles()
    {
        return $this->belongsTo(UserRole::class,'user_role_id','id');
    }


    public function flssPostUser()
    {
        return $this->hasMany(FlssPost::class,'created_by','id');
    }

    public static function getCatgeoryIcon($category){

        $tag='';
        if ($category->parent_id) {
            $tag='<span>— </span>';
        }else if($category->sub_id){
            $tag='<span>— </span> <span>— </span>';
        }else if($category->sub_sub_id){
            $tag='<span>— </span> <span>— </span> <span>— </span>';
        }else if($category->sub_sub_sub_id){
            $tag='<span>— </span> <span>— </span> <span>— </span><span>— </span>';
        }

        return $tag;
    }

    public static function getCatgeoryType($category){

        $tag='Main Category';
        if ($category->parent_id) {
            $tag='Sub Category';
        }else if($category->sub_id){
            $tag='Sub Sub';
        }else if($category->sub_sub_id){
            $tag='Sub Sub Sub';
        }else if($category->sub_sub_sub_id){
            $tag='Sub Sub Sub Sub';
        }

        return $tag;
    }

}
