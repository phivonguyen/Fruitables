<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $heroes = Hero::where('status','0')->get();
        $products = Product::paginate(9);
        $categories = Category::all();
        return view('frontend.index',
        [
            'products' => $products,
            'categories' => $categories,
            'heroes' => $heroes
        ]);
    }

    public function category(){
        $categories = Category::all();
        return view('frontend.collections.categories.index', compact('categories'));
    }

    public function product_detail($id)
    {
        $productDetail = ProductDetail::where('product_id', $id)->first();
        return view('frontend.collections.products.view', compact('productDetail'));
    }

    public function collections()
    {
        $products = Product::paginate(9);
        $categories = Category::all();
        return view('frontend.collections.products.index',
        [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function search(Request $request)
    {
        $keywords = $request->input('keywords');
        $products = Product::where('name', 'LIKE', "%$keywords%")->paginate(9);

        $categories = Category::all();

        return view('frontend.collections.products.index', compact('products', 'keywords', 'categories'));
    }

    public function searchByPriceRange(Request $request)
    {
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $order = $request->input('order', 'asc');

        $products = Product::whereBetween('price', [$minPrice, $maxPrice])
            ->orderBy('price', $order)
            ->paginate(9);

        $categories = Category::all();
        return view('frontend.collections.products.index', compact('products', 'minPrice', 'maxPrice', 'categories'));
    }


}
