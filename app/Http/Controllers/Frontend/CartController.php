<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    // Add to Cart
    public function AddToCart(Request $request, $id){
        $product = Products::findOrFail($id);

        if($product->discount_price == NULL){
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->qty, 
                'price' => $product->selling_price, 
                'weight' => 1, 
                'options' => [
                    'image' => '$product->product_thumbnail',
                    'color' => $request->color,
                    'size' => $request->size
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);

        }else{
            Cart::add([
                'id' => $id, 
                'name' => $request->product_name, 
                'qty' => $request->qty, 
                'price' => $product->discount_price, 
                'weight' => 1, 
                'options' => [
                    'image' => '$product->product_thumbnail',
                    'color' => $request->color,
                    'size' => $request->size
                ],
            ]);

            return response()->json(['success' => 'Successfully Added on Your Cart']);

        }
    }
}
