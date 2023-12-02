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



//Product routes-Hung's route
Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    //Frontend product
    Route::get('/home', 'index')->name('home');
    Route::get('/collections', 'collections')->name('collections');
    // Route::get('/collections/products', 'product_detail');
    // Route::get('/collections/products/{id}', 'product_detail')->name('product_details');
    Route::get('/collections/search', 'search')->name('search');
    Route::get('/collections/search-by-price-range', 'searchByPriceRange')->name('searchByPriceRange');
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
        Route::get('/product/delete/{id}', 'delete')->name("product/delete");
        Route::get('/product/edit/{id}', 'edit')->name('product/edit');
        Route::put('/product/update/{id}', 'update')->name('product/update');
    });
    //Product_details routes-Hung's route
    Route::controller(App\Http\Controllers\Admin\ProductDetailController::class)->group(function () {
        //productDetail admin
        Route::get('/product_detail', "index")->name("product_detail/index");
        Route::get('/product_detail/create', "create")->name("product_detail/create");
        Route::post('/product_detail/create', "store")->name("product_detail/store");
        Route::get('/product_detail/delete/{id}', "delete")->name("product_detail/delete");
        Route::get('/product_detail/edit/{id}', 'edit')->name('product_detail/edit');
        Route::put('/product_detail/update/{id}', 'update')->name('product_detail/update');
        Route::get('/product_detail/index', 'index')->name('product_detail.index');
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
});
