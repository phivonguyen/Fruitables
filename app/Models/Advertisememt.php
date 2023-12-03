<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisememt extends Model
{
    use HasFactory;

    protected $table = 'advertisement';
    protected $fillable = [
        "image",
        "name",
        "description",
        "status",
        'created_at',
        'updated_at'
    ];
}
