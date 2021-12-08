<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order';

    protected $fillable = ['name','email','phone','address','account_id','note'];
      //JOIN 1 - n
      public function details()
      {
          return $this->hasMany(OrderDetail::class,'order_id','id');
      }

      public function cus()
    {
        return $this->hasOne(Account::class,'id','account_id');
    }
}
