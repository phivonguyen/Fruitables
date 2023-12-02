<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $table = 'hero_tables';
    protected $fillable = [
        "title",
        "image",
        "description",
        "status",
        "href",
        'created_at',
        'updated_at'
    ];
}
