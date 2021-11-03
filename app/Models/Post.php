<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Division;
use App\Models\District;
use App\Models\Category;
use App\Models\Tags;
use App\Models\User;

class Post extends Model
{
   
    use SoftDeletes;
    protected $with = ['category', 'division', 'district', 'tags'];
   
    protected $fillable = [
        'user_id',
        'post_uper_title',
        'post_title',
        'post_sub_title',
        'post_details',
        // 'post_tags',
        'post_slug',
        'seo_title',
        'seo_descp',
        'lead',
        'lead2',
        'featured',
        'repoter_name',
        'division_id',
        'district_id',
        'category_id',
        'post_thumbnail',
        'thumbnail_caption',
        'thumbnail_alt'
    ];

    public function division(){
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function district(){
        return $this->belongsTo(District::class, 'district_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function tags(){
        return $this->belongsToMany(Tags::class, 'post_tag', 'post_id', 'tag_id');
    }
    

    
}
