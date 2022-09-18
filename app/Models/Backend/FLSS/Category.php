<?php

namespace App\Models\Backend\FLSS;

use App\Models\User; 
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\FLSS\CategoryPost;
use App\Models\Backend\FLSS\Category as subCategory; 
use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Illuminate\Database\Eloquent\SoftDeletes; 
class Category extends Model
{
    use HasFactory;
    //use SoftDeletes;
    //protected $softDelete = true;
    //protected $dates = ['deleted_at'];
    protected $table = "flss_categories";
    protected $guarded=[];
    
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function parents()
    {
        return $this->hasMany(subCategory::class,'id','parent_id');
    } 

    public function parentCategories()
    {
        return subCategory::where('parent_id',$this->id)->get();
    } 
    public function categoryPosts()
    {
        return $this->hasMany(CategoryPost::class,'category_id','id');
    }



    public function parentSubs()
    {
        return $this->hasMany(subCategory::class,'id','sub_id');
    } 

    public function parentSubSubs()
    {
        return $this->hasMany(subCategory::class,'id','sub_sub_id');
    } 

    public function parentSubSubSubs()
    {
        return $this->hasMany(subCategory::class,'id','sub_sub_sub_id');
    } 

}
