<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UCategoryController;
use App\Http\Controllers\UProductController;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Category;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'index'])->name('home');

<<<<<<< HEAD
Route::middleware(['auth'])->group(function () {


});
=======
>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371

// Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
//     Route::get('/', 'index')->name('homepage');
//     Route::get('/collections', 'categories');
//     Route::get('/collections/{category_slug}', 'products');
//     Route::get('/collections/{category_slug}/{product_slug}', 'productView');


//     Route::get('/new-arrivals', 'newArrival');
//     Route::get('/featured-products', 'featuredProducts');

//     Route::get('search', 'searchProduct');
//     Route::get('comingsoon', 'commingsoon');
// });

//Product routes-Hung's route
Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
    //product admin
    Route::get('/admin/product', 'index')->name("product/index");
    Route::get('/admin/product/create', 'create')->name("product/create");
    Route::post('/admin/product/create', 'store')->name("product/store");
    Route::get('/admin/product/delete/{id}', 'delete')->name("product/delete");
    Route::get('/admin/product/edit/{id}', 'edit')->name('product/edit');
    Route::put('/admin/product/update/{id}', 'update')->name('product/update');
});
//Product_details routes-Hung's route
Route::controller(App\Http\Controllers\Admin\ProductDetailController::class)->group(function () {
    //productDetail admin
    Route::get('/admin/product_detail', "index")->name("product_detail/index");
    Route::get('/admin/product_detail/create', "create")->name("product_detail/create");
    Route::post('/admin/product_detail/create', "store")->name("product_detail/store");
    Route::get('/admin/product_detail/delete/{id}', "delete")->name("product_detail/delete");
    Route::get('/admin/product_detail/edit/{id}', 'edit')->name('product_detail/edit');
    Route::put('/admin/product_detail/update/{id}', 'update')->name('product_detail/update');
    Route::get('/admin/product_detail/index', 'index')->name('product_detail.index');
});
//Category routes-Hung's route
Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {

    Route::get('/admin/category', "index")->name("category/index");
    Route::get('/admin/category/create', "create")->name("category/create");
    Route::post('/admin/category/create', "store")->name("category/store");
    Route::get('/admin/category/delete/{id}', 'delete')->name('category/delete');
    Route::get('/admin/category/edit/{id}', 'edit')->name('category/edit');
    Route::put('/admin/category/update/{id}', 'update')->name('category/update');
});

<<<<<<< HEAD
// Route Admin
Route::prefix('admin')->middleware('auth', 'checkAdmin')->group(function () {

});

Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
=======
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');





// Route::middleware(['auth'])->group(function () {
//     Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
//     Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
//     Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);

//     Route::get('profile',[App\Http\Controllers\Frontend\UserController::class, 'index']);
//     Route::post('profile',[App\Http\Controllers\Frontend\UserController::class, 'updateUser']);

//     Route::get('change-password',[App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
//     Route::post('change-password',[App\Http\Controllers\Frontend\UserController::class, 'passwordChange']);

// });
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index']);
//     //Category routes-Hung's route
    //Category routes-Hung's route
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/admin/category','index')->name("category/index");
        Route::get('/admin/category/create', 'create')->name("category/create");
        Route::post('/admin/category/create', 'store')->name("category/store");
        Route::get('/admin/category/delete/{id}', 'delete')->name('category/delete');
        Route::get('/admin/category/edit/{id}', 'edit')->name('category/edit');
        Route::put('/admin/category/update/{id}', 'update')->name('category/update');
    });
//Product routes-Hung's route
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        //product admin
        Route::get('/admin/product', 'index')->name("product/index");
        Route::get('/admin/product/create', 'create')->name("product/create");
        Route::post('/admin/product/create', 'store')->name("product/store");
        Route::get('/admin/product/delete/{id}', 'delete')->name("product/delete");
        Route::get('/admin/product/edit/{id}', 'edit')->name('product/edit');
        Route::put('/admin/product/update/{id}', 'update')->name('product/update');
    });
//Category routes-Hung's route
    Route::controller(App\Http\Controllers\Admin\ProductDetailController::class)->group(function () {
        //productDetail admin
        Route::get('/admin/product_detail', "index")->name("product_detail/index");
        Route::get('/admin/product_detail/create', "create")->name("product_detail/create");
        Route::post('/admin/product_detail/create', "store")->name("product_detail/store");
        Route::get('/admin/product_detail/delete/{id}', "delete")->name("product_detail/delete");
        Route::get('/admin/product_detail/edit/{id}', 'edit')->name('product_detail/edit');
        Route::put('/admin/product_detail/update/{id}', 'update')->name('product_detail/update');
        Route::get('/admin/product_detail/index', 'index')->name('product_detail.index');
    });

// // Route Admin
// Route::prefix('admin')->middleware('auth', 'checkAdmin')->group(function () {
//     Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index', 'getOrdersChartData'])->name('dashboard');
//     //Category routes-Hung's route
//     Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
//         Route::get('/admin/category')->name("category/index");
//         Route::get('/admin/category/create', 'create')->name("category/create");
//         Route::post('/admin/category/create', 'store')->name("category/store");
//         Route::get('/admin/category/delete/{id}', 'delete')->name('category/delete');
//         Route::get('/admin/category/edit/{id}', 'edit')->name('category/edit');
//         Route::put('/admin/category/update/{id}', 'update')->name('category/update');
//     });
// //Product routes-Hung's route
//     Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
//         //product admin
//         Route::get('/admin/product', 'index')->name("product/index");
//         Route::get('/admin/product/create', 'create')->name("product/create");
//         Route::post('/admin/product/create', 'store')->name("product/store");
//         Route::get('/admin/product/delete/{id}', 'delete')->name("product/delete");
//         Route::get('/admin/product/edit/{id}', 'edit')->name('product/edit');
//         Route::put('/admin/product/update/{id}', 'update')->name('product/update');
//     });
// //Category routes-Hung's route
//     Route::controller(App\Http\Controllers\Admin\ProductDetailController::class)->group(function () {
//         //productDetail admin
//         Route::get('/admin/product_detail', "index")->name("product_detail/index");
//         Route::get('/admin/product_detail/create', "create")->name("product_detail/create");
//         Route::post('/admin/product_detail/create', "store")->name("product_detail/store");
//         Route::get('/admin/product_detail/delete/{id}', "delete")->name("product_detail/delete");
//         Route::get('/admin/product_detail/edit/{id}', 'edit')->name('product_detail/edit');
//         Route::put('/admin/product_detail/update/{id}', 'update')->name('product_detail/update');
//         Route::get('/admin/product_detail/index', 'index')->name('product_detail.index');
//     });

// });
>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371



// //detail
// Route::get('/products/{id}', [UProductController::class, 'chitiet'])->name('chitiet');

<<<<<<< HEAD

=======
// //đỗ dữ liệu
// Route::get('/home', function () {
//     $products = Product::all();
//     return view('home', [
//         'products' => $products
//     ]);
// });
>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
// Route::get('/products', [UProductController::class, 'index']);

// //đỗ dữ liệu
// Route::get('/shop', function () {
//     $products = Product::all();
//     return view('shop', [
//         'products' => $products
//     ]);
// });
// Route::get('/products', [UProductController::class, 'index']);
// Route::get('/shop', [UProductController::class, 'index3'])->name('shop');

// //đỗ dữ liệu
// Route::get('/chitiet', function () {
//     $product_detail = ProductDetail::all();
//     return view('chitiet', [
//         'product_detail' => $product_detail
//     ]);
// });
// Route::get('/product_detail', [ProductDetailController::class, 'index']);
<<<<<<< HEAD
=======

// Route::get('/shop', function() {
//     $categories = Category::all();
//     return view('shop', [
//         'categories' => $categories
//     ]);
// });
// Route::get('/categories', [UCategoryController::class, 'index']);
>>>>>>> 665727581f8d1104c805a8af26a380a45cd2c371
