<?php

namespace App\Models\Backend\FLSS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use App\Models\Backend\FLSS\CategoryPost; 
use Illuminate\Support\Str;
//use Illuminate\Database\Eloquent\SoftDeletes; 
class Post extends Model
{
    use HasFactory;
    protected $table = "flss_posts";
    
    //use SoftDeletes;
    //protected $softDelete = true;
    //protected $dates = ['deleted_at'];
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'title','slug','description','featured_image','status','categories','created_by','published_at','published_by'
    ];
    
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    } 



    
     /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($page) {

            $page->slug = $page->createSlug($page->title);

            $page->save();
        });
    }

    /** 
     * Write code on Method
     *
     * @return response()
     */
    private function createSlug($title)
    {
        if (static::whereSlug($slug = Str::slug($title))->exists()) {

            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');

            if (isset($max[-1]) && is_numeric($max[-1])) {

                return preg_replace_callback('/(\d+)$/', function ($mathces) {

                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

    public function cats(){

        return $this->hasMany(CategoryPost::class,'post_id');//->select('id','post_id','category_id');
    }


    public function categories(){

        return $this->belongsToMany(CategoryPost::class,'flss_category_post','post_id','category_id');
    }

    public function parents(){

        return $this->belongsToMany(CategoryPost::class,'flss_category_post','post_id','parent_id');
    }

    public function parent_subs(){

        return $this->belongsToMany(CategoryPost::class,'flss_category_post','post_id','sub_id');
    }

    public function sub_subs(){

        return $this->belongsToMany(CategoryPost::class,'flss_category_post','post_id','sub_sub_id');
    }

    public function sub_sub_subs(){

        return $this->belongsToMany(CategoryPost::class,'flss_category_post','post_id','sub_sub_sub_id');
    }


}
