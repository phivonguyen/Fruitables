<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        "image",
        "name",
        "description",
        "price",
        "category_id",
        'created_at',
        'updated_at'
    ];
    public function category()
    {
        return $this->hasOne(Category::class,"category_id","id");
    }
    public function productdetail()
    {
        return $this->hasMany(ProductDetail::class,"id","product_id");
    }

}
