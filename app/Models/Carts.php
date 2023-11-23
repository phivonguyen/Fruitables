<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'user_id',	
        'quantity',	
        'created_at',	
        'updated_at'	
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
