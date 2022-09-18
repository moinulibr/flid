<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NecessaryOtherService extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'necessary_other_services';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
       'custom_serial','title','side_url','photo','status','created_by'
    ];
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

}
