<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Post; 
use App\Models\Backend\Category; 

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'category_post';

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    } 

    public function parentCategory()
    {
        return $this->belongsTo(Category::class,'parent_id');
    } 

    public function subCategory()
    {
        return $this->belongsTo(Category::class,'sub_id');
    } 

    public function subSubCategory()
    {
        return $this->belongsTo(Category::class,'sub_sub_id');
    } 

    public function subSubSubCategory()
    {
        return $this->belongsTo(Category::class,'sub_sub_sub_id');
    } 

}
