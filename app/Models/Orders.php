<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'tracking_no',
        'full_name',
        'email',
        'phone',
        'pincode',
        'address',
        'status_message',
        'user_description',
        'payment_mode',
        'status',
        'created_at',
        'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }


    public function orderItem() {
        return $this->hasMany(OrderItem::class,'id','order_id');
    }
}
