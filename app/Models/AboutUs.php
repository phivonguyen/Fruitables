<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $table = 'about_us';
    protected $fillable = [
        "image",
        "menu",
        "description",
        "description1",
        "description2",
        "description3",
        "image1",
        "trademark",
        "des_trademark",
        'created_at',
        'updated_at'
    ];
}
