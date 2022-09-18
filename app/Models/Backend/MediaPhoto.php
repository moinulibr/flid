<?php

namespace App\Models\Backend;

use App\Models\Backend\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MediaPhoto extends Model
{
    use HasFactory;

    public function media()
    {
        return $this->belongsTo(Media::class,'id','media_id');
    } 
}
