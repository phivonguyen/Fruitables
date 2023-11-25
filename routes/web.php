<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);

    Route::get('profile',[App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile',[App\Http\Controllers\Frontend\UserController::class, 'updateUser']);

    Route::get('change-password',[App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('change-password',[App\Http\Controllers\Frontend\UserController::class, 'passwordChange']);

});


// Route Admin
Route::prefix('admin')->middleware('auth', 'checkAdmin')->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index','getOrdersChartData'])->name('dashboard');
});
