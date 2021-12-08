<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('cus');
    }
    public function form()
    {
        $category = Category::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('checkout', compact('category'));
    }
    public function success()
    {
        $category = Category::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('checkout_success', compact('category'));
    }
    public function submit_form(Request $request, CartHelper $cart)
    {
        $c_id = Auth::guard('cus')->user()->id;
        $data = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Name not null',
                'email.required' => 'Email not null',
                'phone.required' => 'Phone not null',
                'address.required' => 'Address not null',
            ]
        );
        $email = $request->email;
        if ($order = Order::create([
            'account_id' => $c_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note
        ])) {
            $order_id = $order->id;
            $c_email= $request->email;
            $c_name= $request->name;
            foreach ($cart->items as $product_id => $item) {
                $quantity = $item['quantity'];
                $price = $item['price'];
                OrderDetail::create([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'price' => $price,
                    'quantity' => $quantity
                ]);
            }
            Mail::send('email.order',[
                'c_name'=> $c_name,
                'order'=>$order,
                'items'=>$cart->items,
            ],function($mail) use($c_email,$c_name){
                $mail->to($c_email,$c_name);
                $mail->from('khanhpbc2001@gmail.com');
                $mail->subject('Email ordered');
            });



            session(['cart' => '']);
            $category = Category::where('status', 1)->orderBy('created_at', 'DESC')->get();
            return view('checkout_success', compact('email','category'));
        } else {
            return redirect()->back()->with('error', 'Order failed !');
        }
    }
}
