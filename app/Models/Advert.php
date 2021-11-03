<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;
    protected $fillable = [
        'ad_name',
        'ad_link',
        'ad_image',
        'ad_code',
        'status',
    ];
}
