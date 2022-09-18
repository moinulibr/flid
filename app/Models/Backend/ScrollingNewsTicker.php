<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ScrollingNewsTicker extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $softDelete = true;
    protected $dates = ['deleted_at'];

    protected $table = 'scrolling_news_tickers';
    //protected $primaryKey = 'GROUP_ROLE_ID';
    protected $fillable = [
        'title','status','created_by'
    ];

    public function createdBY()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
