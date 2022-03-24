<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubMenu extends Model
{
    use HasFactory;

    protected $table = 'sub_sub_menu';
    protected $guarded = [];

    
    function relationtoSubMenu(){
        return $this->hasOne(SubMenu::class,'id','fk_sub_menu_id');
    }

}
