<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        "image",
        "name",
        "slug",
        "origin",
        "description",
        "price",
        "original_price",
        "selling_price",
        "quantity",
        "trending",
        "featured",
        "status",
        "meta_title",
        "meta_keyword",
        "meta_description",
        "category_id",
        'created_at',
        'updated_at'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");

    }

}
