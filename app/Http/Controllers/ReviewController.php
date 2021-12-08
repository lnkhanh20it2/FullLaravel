<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('cus');
    }
    public function add(Request $request){
            $product_id = $request->product_id;
            $product = Product::where('id',$product_id)->where('status','1')->first();
            if($product){
                $verified_purchase = Order::where('order.account_id',Auth::guard('cus')->user()->id)
                ->join('order_detail','order.id','order_detail.order_id'
                )->where('order_detail.product_id',$product_id)->get();
     
                if($verified_purchase->count() > 0)
                {    
                    $review = $request->review;
                    $new_review =  Review::create([
                         'account_id' =>Auth::guard('cus')->user()->id,
                         'product_id' =>$product_id,
                         'review' =>$request->review
                     ]);
                     if($new_review){
                        return redirect()->back()->with('status_review',"Thank you for writing a review this product");
                     }
                } else {
                    return redirect()->back()->with('status_review',"You cannot review a product without purchase");
                }
            } else {
                 return redirect()->back()->with('status_review',"The link you followed was broken");
         }
    }
}
