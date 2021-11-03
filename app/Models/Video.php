<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\User;

class Video extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'video_title',
        'video_slug',
        'video_desc',
        'video_link',
        'category_id',
        'video_thumbnail',
        'user_id',
    ];
    

    public function videocategory(){
        return $this->belongsTo(VideoCat::class, 'category_id');
    }
    

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
