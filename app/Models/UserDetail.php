<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'avatar',
        'phone',
        'status',
        'created_at',
        'updated_at'
    ];


    public function user() {
        return $this->hasOne(User::class,'user_id','id');
    }
}
