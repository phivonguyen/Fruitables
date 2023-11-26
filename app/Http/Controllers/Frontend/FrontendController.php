<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('frontend.index', ['products' => $products,'categories' => $categories]);
    }

    public function product_detail($id)
    {
        $productDetail = ProductDetail::where('product_id', $id)->first();
        return view('frontend.collections.products.view', compact('productDetail'));
    }

    public function collections()
    {
        $products = Product::all();
        return view('frontend.collections.products.index', ['products' => $products]);
    }
}
