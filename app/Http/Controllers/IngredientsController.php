<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Product;
use App\Recipe;
use Illuminate\Http\Request;
use DB;

class IngredientsController extends Controller
{
    public function getIngredients(){
        $ingredients = Ingredient::all();
        return response()->json(['Ingredients' => $ingredients], 200);
    }

    public function getProductById(Request $request){
        $dataBodyClient = $request->json()->all();
        $dataProduct = $dataBodyClient['']; 
        $product = Product::where('product_name', '=',$dataProduct['product_name'])->get();
        return response()->json(['Product'=>$ $product],200);     
    } 

public function postIngredient(Request $request){
    $dataBodyClient = $request->json()->all();
    $dataProduct=$dataBodyClient['Ingredient'];
    $ingredient= Ingredient::create([
        'recipe_id'=>$dataProduct['recipe_id'],
        'product_id'=>$dataProduct['product_id'],
        'quantity'=>$dataProduct['quantity'],
        'unity'=>$dataProduct['unity']]);
    return $ingredient;     
}

public function putIngredient(Request $request){
    $dataBodyClient = $request->json()->all();
    $dataIngredient = $dataBodyClient['Ingredient']; 
    $ingredient = Ingredient::find($dataIngredient['id']);
    $response = $ingredient->update([
        "product_id"=>$dataIngredient['product_id'],
        "recipe_id"=>$dataIngredient['recipe_id'],
        "quantity"=>$dataIngredient['quantity'],
        "unity"=>$dataIngredient['unity']]);

    return $ingredient;
}

public function deleteIngredient(Request $request) {
    $dataBodyClient = $request->json()->all();
    $dataIngredient = $dataBodyClient['Ingredient']; 
    $ingredient = Ingredient::find($dataIngredient['id']);
    $response = $ingredient->delete();

    return 'Operation Sucssesfull!!';
}

public function inner(){
    $inner = Ingredient::with('product', 'recipe')->get();
    
    return $inner;
}

public function last(){
    $last= DB::table('recipes')->take(1)
    ->orderBy('id','desc','Limit 1')
    ->get("id");
    return response()->json( $last, 200);
}

public function innerfinal2($id){
    $inner = Ingredient::with('product', 'recipe')
    ->where('recipes.id', '=', $id)->get();
    
    return $inner;
}

public function innerfinal($id){
    $inner = DB::table('ingredients')
    ->select('*')
    ->join('products', 'products.id', '=', 'ingredients.product_id')
    ->join('recipes', 'recipes.id', '=', 'ingredients.recipe_id')
    ->where('recipes.id', '=', $id)
    ->get();
    
    return $inner;
}

}
