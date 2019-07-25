<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'recipe_name', 
        'technique_name',
        'preparedness',
        'pax',
    ];

    public function ingredients(){
        return $this->hasMany('App\Ingredient');
    }        
}
