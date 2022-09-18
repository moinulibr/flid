<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Setting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'settings';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'site_title','tagline','site_icon','admin_logo','apps_logo','scroll_speed','scroll_color','scroll_font_size','status','created_by','flid_website_url','flid_facebook_url','rate_app','phone','facebook_messenger_url'
    ];
    
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

}
