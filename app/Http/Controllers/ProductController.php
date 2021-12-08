<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats= Category::orderBy('name','ASC')->select('id','name')->get();
        return view("admin.product.create",compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->validate([
            'name' => 'required|unique:product|max:255',
            'status'=> 'required',
            'image' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ],
        [
            'name.required' => 'Name not null',
            'image.required' => 'Image not null',
            'price.required' => 'Price not null',
            'category_id.required' => 'Category not null',
        ]
        );
        // if($request->has('file_upload')){
        //     $file = $request->file_upload;
        //     $ext = $request->file_upload->extension();
        //     $file_name = time().'-'.'product.'.$ext;
        //     $file->move(public_path('uploads'),$file_name);
        // }
        // $request->merge(['image' => $file_name]);
        $img= str_replace(url('public/uploads').'/','',$request->image);
        $request->merge(['image' => $img]);
        $product = new  Product();
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->image_list = $request['image_list'];
        $product->category_id = $request['category_id'];
        $product->price = $request['price'];
        $product->sell_price = $request['sell_price'];
        $product->status = $request['status'];
        $product->image = $request['image'];
        $product->save();
        return redirect()->back()->with('status','Thêm product thành công ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $model = Product::find($product->id);
        return view('admin.product.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        // dd($product);
        $cats= Category::select('id','name')->get();
        return view('admin.product.edit',compact('product','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {   
        $request->validate([
            'name' => 'required|unique:product|max:255',
            'status'=> 'required',
            'image' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ],
        [
            'name.required' => 'Name not null',
            'image.required' => 'Image not null',
            'price.required' => 'Price not null',
            'category_id.required' => 'Category not null',
        ]
        );
        $img= str_replace(url('public/uploads').'/','',$request->image);
        $request->merge(['image' => $img]);
        // dd($request->all());
        // if($request->has('file_upload')){
        //     $file = $request->file_upload;
        //     $ext = $request->file_upload->extension();
        //     $file_name = time().'-'.'product.'.$ext;
        //     $file->move(public_path('uploads'),$file_name);
        //     $request->merge(['image' => $file_name]);
        // } else {
        //     $request->merge(['image' => $request->img]);
        // }
        // dd($request->all());
        $product->update($request->all());
        return redirect()->route('product.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->details->count() >0){
            return redirect()->route('product.index')->with('error','Không thể xóa sản phẩm này , sản phẩm đang có trong đơn hàng');
        } else {
            $product->delete();
            return redirect()->route('product.index')->with('success','Xóa thành công');
        }
    }
}
