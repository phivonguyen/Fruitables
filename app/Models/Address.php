<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'number',
        'street',
        'district',
        'country',
        'created_at',
        'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
