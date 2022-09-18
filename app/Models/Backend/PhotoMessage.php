<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhotoMessage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'photo_messages';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'photo','status','created_by'
    ];


    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

}
