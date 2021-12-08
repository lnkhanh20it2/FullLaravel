<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamp = true;
    protected $fillable =[
        'name','status','prioty'
    ];
    protected $table= 'category';

    // lấy  ra danh sách sản phẩm theo danh mục
    //JOIN 1 - n
    public function product()
    {
        return $this->hasMany(Product::class,'category_id','id')->where('status',1);
    }
    //them localScope
    public function scopeSearch($query){
    if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
     
     }
     return $query;
    }
    //globalScope
}
