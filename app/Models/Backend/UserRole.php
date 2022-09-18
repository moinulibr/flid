<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes; 
class UserRole extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'user_roles';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'name','description','status','created_by'
    ];
    
    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
