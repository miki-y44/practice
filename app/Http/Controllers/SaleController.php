<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;

class SaleController extends Controller
{
    //
  public function buy(Request $request){

  
  
      $productId = $request -> input('product_id');
      $quantity = $request -> input('quantity',1);
  
      $product = Product::find($productId);

      if(!$product){
        return response()->json(['message'=>'商品が存在しません'],404);
      }
      if($product->stock<$quantity){
        return response()->json(['message'=>'商品が在庫不足です'],400);
      }

      $product->stock -=$quantity;
      $product->save();

      $sale = new Sale([
        'product_id' => $productId
      ]);
      $sale->save();

      return response()->json(['message'=>'購入完了']);
  }    
}
