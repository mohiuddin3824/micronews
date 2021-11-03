<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    protected $fillable = [
            'role',
            'post',
            'category',
            'division',
            'district',
            'menu',
            'photo_gallery',
            'video',
            'seo',
            'general_setting',
            'header',
            'footer',
            'ads',
    ];

    public function users(){
        return $this->hasMany(User::class, 'id')->orderByDesc('id');
    }
}
