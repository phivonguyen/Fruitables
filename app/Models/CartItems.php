<?php

namespace App\Models;

use App\Models\Carts;
// use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'cart_id',	
        'product_id',	
        'created_at',	
        'updated_at'	
    ];
    
    public function cart() {
        return $this->belongsTo(Carts::class,'cart_id','id');
    }

    // public function product() {
    //     return $this->hasMany(Products::class,'product_id','id');
    // }
}
