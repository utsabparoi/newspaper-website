<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $guarded = [];


    function subcategories()
    {
        return $this->hasMany(SubCategory::class,'fk_category_id');
    }




    function blogs()
    {
        return $this->hasMany(Blog::class,'id');
    }
















    function sub_categories()
    {
        return $this->hasMany(SubCategory::class,'id');
    }

}
