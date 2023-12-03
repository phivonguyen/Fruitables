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
    Route::get('/collections/category', 'category')->name('collections/category');

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
});
