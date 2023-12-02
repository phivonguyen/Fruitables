<?php

namespace App\Models;

use App\Models\Origin;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        "name",
        "slug",
        "description",
        "image",
        "meta_title",
        "meta_keyword",
        "meta_description",
        "status",
        "created_at",
        "updated_at"
    ];
    public function products()
    {

        return $this->hasMany(Product::class,"category_id", "id");
    }
    public function origins()
    {
        return $this->hasMany(Origin::class, 'category_id', 'id')->where('status', '0');
    }
    public function relatedProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->latest();
    }

}
