<?php

namespace App\Models;

use App\Models\User;
use App\Models\Carts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'cart_id',
        'user_description',
        'received_address',
        'payment_mode',
        'status',
        'created_at',
        'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function cart() {
        return $this->hasOne(Carts::class,'cart_id','id');
    }

    public function orderDetail() {
        return $this->hasMany(OrderDetail::class,'id','order_id');
    }
}
