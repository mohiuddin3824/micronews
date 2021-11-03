<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $table = 'sub_menus';
    protected $fillable = [
        'name',
        'menu_item_id',
        'link',
        'status',
        'position',
    ];

    public function menu(){
        return $this->belongsTo(Menu::class, 'menu_item_id');
    }

}
