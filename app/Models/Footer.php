<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    protected $fillable = [
        'footer_logo',
        'footer_ap_link1',
        'footer_ap_link2',
        'footer_disclaimer',
        'footer_info',
        'footer_menu_link1',
        'footer_menu_link2',
        'footer_menu_link3',
        'footer_font',
    ];
}
