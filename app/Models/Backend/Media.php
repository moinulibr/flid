<?php

namespace App\Models\Backend;

use App\Models\User;
use App\Models\Backend\MediaPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;
    use HasFactory;
   /*  use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at']; */

    protected $table = 'medias';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'title','status','created_by','featured_image','published_at'
    ];
    
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    } 

    public function MediaPhotos()
    {
        return $this->hasMany(MediaPhoto::class,'media_id','id');
    }
}
