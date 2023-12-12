<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UCategoryController;
use App\Http\Controllers\UProductController;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Product routes - Hung's route
Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    //Frontend product Phi-routes
    Route::get('/home', 'index')->name('home');
    Route::get('/collections', 'collections')->name('collections');
    Route::get('/collections/category', 'category')->name('collections/category');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    Route::get('/appreciation', 'appreciation')->name('appreciation');

    //Hung-routes
    Route::get('/aboutUs', 'aboutUs')->name('aboutUs');
    Route::get('/contactUs', 'contact')->name('contactUs');
    Route::post('/send', 'send')->name('send.email');
    Route::get('/contact', 'showContactForm')->name('contact.form');

    Route::get('/new-arrivals', 'newArrival');
    Route::get('/featured-products', 'featuredProducts');
    Route::get('search', 'searchProduct');
    Route::get('comingsoon', 'commingsoon');

    // Route::get('/collections/products', 'product_detail');
    // Route::get('/collections/products/{id}', 'product_detail')->name('product_details');
    Route::get('/collections/search', 'search')->name('search');
    Route::get('/collections/search-by-price-range', 'searchByPriceRange')->name('searchByPriceRange');
});

// User's routes  - Phi's routes
Route::middleware(['auth'])->group(function () {

    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('carts', [App\Http\Controllers\Frontend\CartsController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'detail']);

    Route::get('profile', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUser']);

    Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('change-password', [App\Http\Controllers\Frontend\UserController::class, 'passwordChange']);
});

// Route Admin
Route::prefix('admin')->middleware(['auth', 'checkAdmin'])->group(function () {
    //Admin dashboard index
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    //Product routes-Hung's route
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        //product admin
        Route::get('/product', 'index')->name("product/index");
        Route::get('/product/create', 'create')->name("product/create");
        Route::post('/product/create', 'store')->name("product/store");
        Route::get('/product/{id}/delete', 'destroy')->name("product/delete");
        Route::get('/product/{id}/edit', 'edit')->name('product/edit');
        Route::put('/product/{id}', 'update')->name('product/update');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage')->name('product/deleteImage');
    });
    //Category routes-Hung's route
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {

        Route::get('/category', "index")->name("category/index");
        Route::get('/category/create', "create")->name("category/create");
        Route::post('/category/create', "store")->name("category/store");
        Route::get('/category/delete/{id}', 'delete')->name('category/delete');
        Route::get('/category/edit/{id}', 'edit')->name('category/edit');
        Route::put('/category/update/{id}', 'update')->name('category/update');
    });

    //Hero header routes by Phi
    Route::controller(App\Http\Controllers\Admin\HeroController::class)->group(function () {
        Route::get('hero', 'index')->name('hero.index');
        Route::get('hero/create', 'create')->name('hero/create');
        Route::post('hero/create', 'store')->name('hero/store');
        Route::get('hero/{hero}/edit', 'edit');
        Route::put('hero/{hero}', 'update');
        Route::get('hero/{hero}/delete', 'delete');
    });

    Route::get('/origin', App\Livewire\Admin\Origin\Index::class)->name('originIndex');

    //Product routes-Hung's route
    Route::controller(App\Http\Controllers\Admin\AdvertisementController::class)->group(function () {
        //product admin
        Route::get('/advertisement', 'index')->name("advertisement/index");
        Route::get('/advertisement/create', 'create')->name("advertisement/create");
        Route::post('/advertisement/create', 'store')->name("advertisement/store");
        Route::get('/advertisement/delete/{id}', 'delete')->name("advertisement/delete");
        Route::get('/advertisement/edit/{id}', 'edit')->name('advertisement/edit');
        Route::put('/advertisement/update/{id}', 'update')->name('advertisement/update');
    });
    //Product routes-Hung's route
    Route::controller(App\Http\Controllers\Admin\AboutController::class)->group(function () {
        //product admin
        Route::get('/about', 'index')->name("about/index");
        Route::get('/about/create', 'create')->name("about/create");
        Route::post('/about/create', 'store')->name("about/store");
        Route::get('/about/delete/{id}', 'delete')->name("about/delete");
        Route::get('/about/edit/{id}', 'edit')->name('about/edit');
        Route::put('/about/update/{id}', 'update')->name('about/update');
        Route::get(
            '/about/update-status/{id}/{status}',
            [App\Http\Controllers\Admin\AdvertisementController::class, 'updateStatus']
        )->name('about/update-status');
    });

    //Orders-admin routes-Phi's routes
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');


        Route::get('/invoice/{orderId}', 'viewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
    });

    //Contact routes-Hung's route
    Route::controller(App\Http\Controllers\Admin\ContactController::class)->group(function () {
        //contact admin
        Route::get('/contact', 'index')->name("contact/index");
        Route::get('/contact/delete/{id}', 'delete')->name("contact/delete");
        Route::get('/contact/reply/{id}', 'reply')->name("contact/reply");

    });



});
