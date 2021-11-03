<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Video;

class VideoCat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_name',
        'category_slug',
    ];

    public function videos(){
        return $this->hasMany(Video::class)->orderByDesc('id');
    }
}
