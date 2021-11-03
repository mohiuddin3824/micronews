<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'district_name',
        'district_slug',
    ];

    public function division(){
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function posts(){
        return $this->hasMany(Post::class)->orderByDesc('id');
    }
}
