<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;

class ProductsController extends Controller
{
    public function getProducts(){
        $products = Product::get();
        return response()->json(['Products' => $products], 200);
    }

    public function getProductByName(Request $request){
        $dataBodyClient = $request->json()->all();
        $dataProduct = $dataBodyClient['Product']; 
        $product = Product::where('product_name', '=',$dataProduct['product_name'])->get();
        return response()->json(['Product'=>$product],200);     
    } 

    
 


    public function postProduct(Request $request){
        $dataBodyClient = $request->json()->all();
        $dataProduct=$dataBodyClient['Product'];
        $category= Product::create([
            'product_name'=>$dataProduct['product_name'],
            'category_name'=>$dataProduct['category_name'],
            'cost'=>$dataProduct['cost']]);

            return $category;     
    } 

    public function putProduct(Request $request){
        $dataBodyClient = $request->json()->all();
        $dataProduct = $dataBodyClient['Product']; 
        $product = Product::find($dataProduct['id']);
        $response = $product->update([
            "product_name"=>$dataProduct['product_name'],
            "category_name"=>$dataProduct['category_name'],
            "cost"=>$dataProduct['cost']]);

        return $product ;
    }

    public function deleteProduct(Request $request) {
        $dataBodyClient = $request->json()->all();
        $dataProduct = $dataBodyClient['Product']; 
        $product = Product::find($dataProduct['id']);
        $response = $product->delete();

        return 'Operation Sucssesfull!!';
    }
    
    
    public function inner(){
        $inner= DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->select('*')
        ->get();
        return response()->json(['Inner'=> $inner],200);
}


}
