<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamp = true;
    protected $fillable =[
        'name',
        'image',
        'price',
        'sell_price',
        'description',
        'image_list',
        'status',
        'category_id',
    ];
    protected $table = 'product';
    // Lấy ra danh mục của sản phẩm
    //JOIN 1 - 1
    public function cat()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    //JOIN 1 - n
    public function details()
    {
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
    public function scopeSearch($query){
        if($key = request()->key){
                $query = $query->where('name','like','%'.$key.'%');
         }
         return $query;
        }
}
