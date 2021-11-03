<?php

namespace App\Models;

use App\Models\Video;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'category_name',
        'category_slug',
        'category_desc',
        'category_title',
        'category_bg',
    ];

    public function posts(){
        return $this->hasMany(Post::class)->orderByDesc('id');
    }



}
