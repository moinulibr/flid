<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImportantLink extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'important_links';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'custom_serial', 'link_name','side_url','status','created_by'
    ];
    
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

}
