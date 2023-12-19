<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImage;
use App\Models\About;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUs;
use App\Http\Controllers\Controller;
use App\Models\Advertisememt;
use App\Models\Hero;
use Illuminate\Http\Request;
use App\Models\Origin;
use App\Models\Wishlist;
use App\Models\User;

class FrontendController extends Controller
{
    //
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalOrigins = Origin::count();
        $totalUsers = User::count();
        $heroes = Hero::where('status', '0')->get();
        $products = Product::get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(15)->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(15)->get();
        $newestProducts = Product::with('productImage')->orderBy('created_at', 'desc')->take(8)->get();
        $categories = Category::all();
        $about = About::all();
        $about = DB::table('about')->where('status', 'presently')->get();
        $advertisement = Advertisememt::all();
        $advertisement = DB::table('advertisement')->where('status', 'presently')->get();
        // $trendingProducts = Product::where('trending','1')->latest()->take(15)->get();
        // $newestProducts = Product::with('productImages')->orderBy('created_at', 'desc')->take(8)->get();
        return view(
            'frontend.index',
            [
                'products' => $products,
                'categories' => $categories,
                'heroes' => $heroes,
                'about' => $about,
                'advertisement' => $advertisement,
                'trendingProducts' => $trendingProducts,
                'newestProducts' => $newestProducts,
                'featuredProducts' => $featuredProducts,
                'totalProducts' => $totalProducts,
                'totalCategories' => $totalCategories,
                'totalOrigins' => $totalOrigins,
                'totalUsers' => $totalUsers,
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
        $featuredProducts = Product::where('featured', '1')->latest()->take(3)->get();
        $products = Product::paginate(9);
        $categories = Category::all();
        return view(
            'frontend.collections.products.all',
            [
                'products' => $products,
                'categories' => $categories,
                'listCat' => $listCat,
                'featuredProducts' => $featuredProducts
            ]
        );
    }

    public function products($category_slug)
    {
        $listCat = Category::all();
        $featuredProducts = Product::where('featured', '1')->latest()->take(3)->get();
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->products()->get();
            return view('frontend.collections.products.index', [
                'products' => $products,
                'category' => $category,
                'listCat' => $listCat,
                'featuredProducts' => $featuredProducts
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function productView(string  $category_slug,  string $product_slug)
    {
        $listCat = Category::all();
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            $product_id = Product::where('slug', $product_slug)->first()->id;
            if (auth()->user()) {
                $checkWishlist = Wishlist::where('user_id', auth()->user()->id)->where('product_id', $product_id)->exists();
                session()->put('checkWishlist', $checkWishlist);
            }
            if ($product) {
                return view('frontend.collections.products.view',
                [
                    'product' => $product,
                    'category' => $category,
                    'listCat'=> $listCat
                ]);
            } else {
                return redirect()->back();
            }
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

    public function appreciation()
    {
        return view('frontend.appreciation.index');
    }
    public function contact()
    {
        $contacts = ContactUs::all();
        return view('frontend.collections.contactUs.contact', compact('contacts'));
    }
    public function aboutUs()
    {
        $aboutUs = AboutUs::all();
        return view('frontend.collections.aboutUs.index', compact('aboutUs'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        // Check if the email already exists
        // $existingContact = ContactUs::where('email', $request->input('email'))->first();

        // if ($existingContact) {
        //     return redirect()->back()->withErrors(['email' => 'The email has just been sent, please try again in 10 minutes.']);
        // }

        $recipientEmail = $request->has('customer_email') ? $request->input('customer_email') : 'fruitable2023@gmail.com';

        $existingEmail = ContactUs::where('email', $request->input('email'))->exists();

        if ($existingEmail) {
            ContactUs::where('email', $request->input('email'))->update([
                'name' => $request->input('name'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
                'replied' => true, // Đảm bảo cập nhật trạng thái replied
            ]);
        } else {
            ContactUs::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
                'replied' => false, // Mặc định là false khi tạo mới
            ]);
        }
        if ($this->isOnline()) {
            $mail_data = [
                'recipient' => $recipientEmail,
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'body' => $request->message,
            ];

            Mail::send('frontend.collections.contactUs.email-template', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['email'], $mail_data['name'])
                    ->subject($mail_data['subject']);
            });


            return redirect()->back()->with('success', 'Email sent successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Please check your connection');
        }
    }

    public function isOnline($site = "https://youtube.com/")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }

    public function searchProduct(Request $request)
    {
        if ($request->search) {

            $search = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(10);
            return view('frontend.pages.search', compact('search'));
        } else {
            return redirect()->back()->with('messsage', 'There are no products available');
        }
    }
}
