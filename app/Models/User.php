<?php

namespace App\Models;

use App\Models\Orders;
use App\Models\Invoices;
use App\Models\Carts;
use App\Models\Address;
use App\Notifications\CustomResetPasswordNotification;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token, $this->userDetail->name));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'roles'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function order() {
        return $this->hasMany(Orders::class,'id','order_id');
    }

    public function user_detail() {
        return $this->hasOne(UserDetail::class,'user_id','id');
    }

    public function invoice() {
        return $this->hasMany(Invoices::class,'id','user_id');
    }

    public function address() {
        return $this->hasOne(Address::class,'id','user_id');
    }

    public function cart() {
        return $this->hasMany(Carts::class,'id','user_id');
    }

}
