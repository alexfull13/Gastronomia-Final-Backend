<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recipe;
use App\Technique;

class RecipesController extends Controller
{
    public function getRecipes(){
        $products = Recipe::all();
        return response()->json(['Recipes' => $products], 200);
    }

    public function getOne($id)
    {
        $recipe= Recipe::where('id', $id)->get();
        return response()->json(['Recipe' => $recipe], 200);

    }

    public function postRecipe(Request $request){
        $dataBodyClient = $request->json()->all();
        $dataRecipe=$dataBodyClient['Recipe'];
        $recipe= Recipe::create([
            'recipe_name'=>$dataRecipe['recipe_name'],
            'technique_name'=>$dataRecipe['technique_name'],
            'preparedness'=>$dataRecipe['preparedness'],
            'pax'=>$dataRecipe['pax']]);
            

            return $recipe;    
    }

    public function putRecipe(Request $request){
        $dataBodyClient = $request->json()->all();
        $dataRecipe = $dataBodyClient['Recipe']; 
        $recipe = Recipe::find($dataRecipe['id']);
        $response = $recipe->update([
            "recipe_name"=>$dataRecipe['recipe_name'],
            "technique_name"=>$dataRecipe['technique_name'],
            "preparedness"=>$dataRecipe['preparedness'],
            "pax"=>$dataRecipe['pax']]);

        return $recipe;
    }

    public function deleteRecipe(Request $request) {
        $dataBodyClient = $request->json()->all();
        $dataRecipe = $dataBodyClient['Recipe']; 
        $recipe = Recipe::find($dataRecipe['id']);
        $response = $recipe->delete();

        return 'Operation Sucssesfull!!';
    }
}
