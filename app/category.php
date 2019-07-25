<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'category_name',
        'category_state'
        ];


Public function products() {
    return $this->hasMany('App\Product');
} 

}
