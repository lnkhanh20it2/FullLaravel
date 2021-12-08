<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('created_at','DESC')->search()->paginate(10);
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|unique:category|max:255',
            'status'=> 'required',
            'prioty' => 'required',
        ],
        [
            'name.required' => 'Name not null',
            'prioty.required' => 'Prioty not null',
        ]
        );
        // $data = $request->all();
        // dd($data);
        $category = new Category();
        $category->name = $data['name'];
        $category->status=$data['status'];
        $category->prioty = $data['prioty'];
        $category->save();
        return redirect()->back()->with('status','Thêm category thành công ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255|unique:category,name,'.$category->id,
            'status'=> 'required',
            'prioty' => 'required',
        ],
        [
            'name.required' => 'Name not null',
            'prioty.required' => 'Prioty not null',
            'name.unique'=>'Name already in database',
        ]
        );
        $category->update($request->only('name','prioty','status'));
        return redirect()->route('category.index')->with('success','Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->product->count() >0){
            return redirect()->route('category.index')->with('error','Không thể xóa danh mục này');
        } else {
            $category->delete();
            return redirect()->route('category.index')->with('success','Xóa thành công');
        }
    }
}
