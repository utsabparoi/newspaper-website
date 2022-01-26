<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $table = 'sub_menu';
    protected $guarded = [];
    
    function relationtomenu(){
        return $this->hasOne(Menu::class,'id','fk_menu_id');
    }
}
