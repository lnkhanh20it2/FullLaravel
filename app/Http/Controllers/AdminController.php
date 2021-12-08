<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{   
    public function dashboard()
    {   
        $orders = Order::where('status',1)->paginate(10);
        $account_count = Account::count();
        $product_count = Product::count();
        $order_count = Order::count();
        $category_count = Category::count();
        return view('admin.index',compact('product_count','account_count','order_count','category_count','orders'));
    }
    public function file()
    {
        return view('admin.file');
    }
    public function login()
    {
        return view('admin.login');
    }
    public function post_login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ],[
            'email.required'=>'Email not null',
            'email.email'=>'Email not form',
            'password.required'=>'Password not null',
        ]);
        if(Auth::attempt($request->only('email','password'),$request->has('rmb'))){
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back(); 
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
