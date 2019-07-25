<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
  protected $fillable = [
    'recipe_id', 
    'product_id',
    'quantity',
    'unity',
];    

public function product(){
return $this->belongsTo('App\Product');
}

public function recipe(){
  return $this->belongsTo('App\Recipe');
  }

}
