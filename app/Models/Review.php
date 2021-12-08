<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'account_id',
        'product_id',
        'review'
    ];
     //JOIN 1 - 1
     public function user()
     {
         return $this->hasOne(Account::class,'id','account_id');
     }
    // public function rating()
    // {
    //     return $this->belongsTo(Rating::class,'account_id','account_id');
    // }
}
