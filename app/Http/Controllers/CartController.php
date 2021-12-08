<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Category;
use App\Models\Product;

class CartController extends Controller
{
    public function view(){
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        return view('cart',compact('category'));
    }

    public function add(CartHelper $cart,$id){
        $product = Product::find($id);
        
        $cart->add($product);
        return redirect()->back();
    }
    public function add_quantity(CartHelper $cart,$id){
        $product = Product::find($id);
        $qty = request()->quantity ? request()->quantity : 1; 
        $cart->add_quantity($product,$qty);
        return redirect()->back();
    }
    public function remove(CartHelper $cart,$id){

        $cart->remove($id);
        return redirect()->back();
    }
    public function update(CartHelper $cart,$key,$qty){
        $cart->update($key,$qty);
    }
    public function clear(CartHelper $cart){
        $cart->clear();
        return redirect()->back();
    }
}
