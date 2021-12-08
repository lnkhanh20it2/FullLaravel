<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        $category_title = Category::limit(3)->where('status',1)->orderBy('created_at','DESC')->get();
        $category_product = Category::limit(3)->where('status',1)->orderBy('created_at','DESC')->get("id");
        $top_product= Product::limit(4)->orderBy('id','DESC')->get();
        //category
        $first_category=$category_title[0]->name;
        $second_category=$category_title[1]->name;
        $third_category=$category_title[2]->name;
        // Product theo category index
        $first_product=$category_product[0]->id;
        $second_product=$category_product[1]->id;
        $third_product=$category_product[2]->id;
        $product_category1 = Product::limit(4)->where('category_id',$first_product)->get();
        $product_category2 = Product::limit(4)->where('category_id',$second_product)->get();
        $product_category3 = Product::limit(4)->where('category_id',$third_product)->get();
        $sell_product1= Product::where('sell_price','>','0')->where('category_id',$first_product)->get();
        $sell_product2= Product::where('sell_price','>','0')->where('category_id',$second_product)->get();
        $sell_product3= Product::where('sell_price','>','0')->where('category_id',$third_product)->get();
        return view('home',compact('category','top_product','first_category','second_category','third_category','product_category1','product_category2','product_category3','sell_product1','sell_product2','sell_product3'));
    }
    public function shop(){
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        $top_product= Product::orderBy('id','DESC')->paginate(20);
        return view('shop',compact('category','top_product'));
    }
    public function contact(){
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        return view('contact',compact('category'));
    }
    public function post_contact(Request $request){
        Mail::send('email.contact',[
            'name'=>$request->name,
            'content'=>$request->message,
        ],function($mail) use($request){
            $mail->to('khanhpbc2001@gmail.com',$request->name);
            $mail->from($request->email);
            $mail->subject('Test Mail');
        });
    }
    public function about(){
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        return view('about',compact('category'));
    }
    public function view($id){
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        $model = Category::where('id',$id)->first();
        $product = Product::where('id',$id)->first();
        if($model){
            return view('categoryproduct',compact('model','category'));
        } else if($product){         
            $ratings = Rating::where('product_id',$id)->get();
            $rating_sum = Rating::where('product_id',$id)->sum('stars_rated');
            $reviews = Review::where('product_id',$id)->get();
            if($ratings->count()>0)
            {
                $user_rating = Rating::where('product_id',$id)->where('account_id',optional(Auth::guard('cus')->user())->id)->first();
                $rating_value = $rating_sum/$ratings->count(); 
            }else {
                $rating_value = 0;
                $user_rating = false;
            }
            return view('product-detail',['model'=>$product,'category'=>$category,
            'rating'=>$ratings,'rating_value'=>$rating_value,
            'user_rating'=>$user_rating,'reviews'=>$reviews]);
        } else {
            return view('404');
        } 
    }
    public function login(){
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        return view('login',compact('category'));
    }
    public function logout(){
        Auth::guard('cus')->logout();
            $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
            $category_title = Category::limit(3)->where('status',1)->orderBy('created_at','DESC')->get();
            $category_product = Category::limit(3)->where('status',1)->orderBy('created_at','DESC')->get("id");
            $top_product= Product::limit(4)->orderBy('id','DESC')->get();
            //category
            $first_category=$category_title[0]->name;
            $second_category=$category_title[1]->name;
            $third_category=$category_title[2]->name;
            // Product theo category index
            $first_product=$category_product[0]->id;
            $second_product=$category_product[1]->id;
            $third_product=$category_product[2]->id;
            $product_category1 = Product::limit(4)->where('category_id',$first_product)->get();
            $product_category2 = Product::limit(4)->where('category_id',$second_product)->get();
            $product_category3 = Product::limit(4)->where('category_id',$third_product)->get();
            $sell_product1= Product::where('sell_price','>','0')->where('category_id',$first_product)->get();
            $sell_product2= Product::where('sell_price','>','0')->where('category_id',$second_product)->get();
            $sell_product3= Product::where('sell_price','>','0')->where('category_id',$third_product)->get();
            session(['cart' => '']);
            return view('home',compact('category','top_product','first_category','second_category','third_category','product_category1','product_category2','product_category3','sell_product1','sell_product2','sell_product3'));
    }
    public function post_login(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'password'=>'required',
        ],[
            'email.required'=>'Email not null',
            'password.required'=>'Password not null'
        ]);
        if (Auth::guard('cus')->attempt($request->only('email','password'),$request->has('remember'))){
            $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
            $category_title = Category::limit(3)->where('status',1)->orderBy('created_at','DESC')->get();
            $category_product = Category::limit(3)->where('status',1)->orderBy('created_at','DESC')->get("id");
            $top_product= Product::limit(4)->orderBy('id','DESC')->get();
            //category
            $first_category=$category_title[0]->name;
            $second_category=$category_title[1]->name;
            $third_category=$category_title[2]->name;
            // Product theo category index
            $first_product=$category_product[0]->id;
            $second_product=$category_product[1]->id;
            $third_product=$category_product[2]->id;
            $product_category1 = Product::limit(4)->where('category_id',$first_product)->get();
            $product_category2 = Product::limit(4)->where('category_id',$second_product)->get();
            $product_category3 = Product::limit(4)->where('category_id',$third_product)->get();
            $sell_product1= Product::where('sell_price','>','0')->where('category_id',$first_product)->get();
            $sell_product2= Product::where('sell_price','>','0')->where('category_id',$second_product)->get();
            $sell_product3= Product::where('sell_price','>','0')->where('category_id',$third_product)->get();
            return view('home',compact('category','top_product','first_category','second_category','third_category','product_category1','product_category2','product_category3','sell_product1','sell_product2','sell_product3'));
        } else {
            return redirect()->back();
        }
    }
    public function create(){
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        return view('register',compact('category'));
    }
    public function post_create(Request $request){
        $data=$request->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:account',
            'password'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ],
        [
            'name.required' => 'Name not null',
            'email.required' => 'Email not null',
            'password.required' => 'Password not null',
            'email.unique' => 'Email in database',
            'email.email' => 'Email not form',
            'phone.required' => 'Phone not null',
            'address.required' => 'Address not null',
        ]
        );
        $password = bcrypt($request->password);
        $request->merge(['password' => $password]);
        $account = new  Account();
        $account->name = $request['name'];
        $account->email = $request['email'];
        $account->password = $request['password'];
        $account->phone = $request['phone'];
        $account->address = $request['address'];
        $account->save();
        $category = Category::where('status',1)->orderBy('created_at','DESC')->get();
        return redirect()->back()->with('status','Register success !');
    }
}
