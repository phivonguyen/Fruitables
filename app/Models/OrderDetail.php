<?php

namespace App\Models;

use App\Models\Orders;
// use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'created_at',
        'updated_at'
    ];

    public function order() {
        return $this->belongsTo(Orders::class,'order_id','id');
    }

    // public function product() {
    //     return $this->belongsTo(Products::class,'product_id','id');
    // }
}
