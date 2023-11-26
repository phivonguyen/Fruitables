<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'product_detail';

    protected $fillable = [
        "product_id",
        "image",
        "name",
        "price",
        "description",
        'created_at',
        'updated_at'
    ];
    public function products()
    {
        return $this->belongTo(Product::class, "product_id","id");
    }

}
