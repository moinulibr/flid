<?php

namespace App\Models\Backend;

use App\Models\User; 
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;
     use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'pages';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'title','slug','description','featured_image','status','created_by'
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

}
