<?php

namespace App\Models;

use App\Models\User;
use App\Models\Orders;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'user_id',
        'order_id',
        'created_at',
        'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function order() {
        return $this->hasOne(Orders::class,'order_id','id');
    }
}
