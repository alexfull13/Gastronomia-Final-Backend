<?php

Route::get('/', function () {
    return view('welcome');
});

/*--------------------------------PRODUCT CONTROLLER--------------------------------*/ 
Route::get('/products', 'ProductsController@getProducts');
Route::get('/products/filtredByName', 'ProductsController@getProductByName');
Route::get('/products/filtredById', 'ProductsController@getProductById');
Route::post('/products', 'ProductsController@postProduct');
Route::put('/products', 'ProductsController@putProduct');
Route::delete('/products', 'ProductsController@deleteProduct');

/*--------------------------------INGREDIENT CONTROLLER--------------------------------*/ 
Route::get('/ingredients', 'IngredientsController@getIngredients');
Route::get('/ingredient/{id}', 'IngredientsController@getIngredientById');
Route::post('/ingredients', 'IngredientsController@postIngredient');
Route::put('/ingredients', 'IngredientsController@putIngredient');
Route::delete('/ingredients', 'IngredientsController@deleteIngredient');

/*--------------------------------RECIPE CONTROLLER--------------------------------*/ 
Route::get('/recipes', 'RecipesController@getRecipes');
Route::get('/recipe/{id}', 'RecipesController@getOne');
Route::post('/recipes', 'RecipesController@postRecipe');
Route::put('/recipes', 'RecipesController@putRecipe');
Route::delete('/recipes', 'RecipesController@deleteRecipe');

/*--------------------------------INNER JOIN--------------------------------*/
Route::get('/inner', 'IngredientsController@inner');
Route::get('/last', 'IngredientsController@last');
Route::get('/innerfinal/{id}', 'IngredientsController@innerfinal');

