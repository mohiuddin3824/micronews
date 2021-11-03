<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'divisions';
    protected $fillable = [
        'division_name',
        'division_slug',
    ];

    public function district(){
        return $this->hasMany(District::class, 'division_id');
        
    }

    public function posts(){
        return $this->hasMany(Post::class)->orderByDesc('id');
    }
}
