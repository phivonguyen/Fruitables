<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImage;
use App\Models\About;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Advertisememt;
use App\Models\Hero;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $heroes = Hero::where('status', '0')->get();
        $products = Product::paginate(9);
        $categories = Category::all();
        $about = About::all();
        $about = DB::table('about')->where('status', 'presently')->get();
        $advertisement = Advertisememt::all();
        $advertisement = DB::table('advertisement')->where('status', 'presently')->get();
        // $trendingProducts = Product::where('trending','1')->latest()->take(15)->get();
        // $newestProducts = Product::with('productImages')->orderBy('created_at', 'desc')->take(8)->get();
        return view('frontend.index',
            [
                'products' => $products,
                'categories' => $categories,
                'heroes' => $heroes,
                'about' => $about,
                'advertisement' => $advertisement,
                // 'trendingProducts' => $trendingProducts,
                // 'newestProducts' => $newestProducts
            ]
        );
    }

    public function category()
    {
        $categories = Category::all();
        return view('frontend.collections.categories.index', compact('categories'));
    }

    public function product_detail($id)
    {
        $productDetail = Product::where('product_id', $id)->first();
        return view('frontend.collections.products.view', compact('productDetail'));
    }

    public function collections()
    {
        $listCat = Category::all();
        $featuredProducts = Product::where('featured','1')->latest()->take(3)->get();
        $products = Product::paginate(9);
        $categories = Category::all();
        return view('frontend.collections.products.all',
            [
                'products' => $products,
                'categories' => $categories,
                'listCat' => $listCat,
                'featuredProducts'=> $featuredProducts
            ]
        );
    }

    public function products($category_slug)
    {
        $listCat = Category::all();
        $featuredProducts = Product::where('featured','1')->latest()->take(3)->get();
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->products()->get();
            return view('frontend.collections.products.index', [
                'products'=> $products,
                'category' => $category,
                'listCat' => $listCat,
                'featuredProducts'=> $featuredProducts
            ]);
        } else {
            return redirect()->back();
        }
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
