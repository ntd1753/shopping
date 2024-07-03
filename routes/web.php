<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\PayController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\SearchController;
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

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');

Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name("auth.register");
Route::post('/register/store',[RegisterController::class,'storeUserAccount'])->name("auth.register.store");
Route::post('/login/store',[LoginController::class,'Login'])->name("auth.login.store");
Route::get('/login', [LoginController::class, 'showLoginForm'])->name("auth.login"); // Cho người dùng
Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])->name("auth.login.provider");
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('auth.login.provider.callback');
Route::post('/logout', [LoginController::class,"logout"])->name("auth.logout");


Route::get('/detail-product/{id}', [HomeController::class, 'detailProduct'])->name("user.product.detail");
Route::get('product/{slug}', [ProductController::class, 'index'])->name('user.product.category');
Route::get('all-product', [ProductController::class, 'allProduct'])->name('user.product.all');

Route::group(['prefix'=>'cart','middleware'=>'auth:web'],function(){
    Route::get('/', [CartController::class, 'index'])->name('user.cart.index');
    Route::post('add', [CartController::class, 'store'])->name('user.cart.store');
    Route::post('update', [CartController::class, 'update'])->name('user.cart.update');
    Route::post('delete', [CartController::class, 'destroy'])->name('user.cart.delete');
    Route::get('getCartItem', [CartController::class, 'getCartItems'])->name('user.cart.getItem');
});

Route::get('checkout', [OrderController::class, 'index'])->name('user.order.index');
Route::post('checkout',[OrderController::class, 'placeOrder'])->name('user.order.checkout');
Route::post('/pay-vnpay',[PayController::class, 'createVnPay'])->name('user.payment.vnpay');

Route::group(['prefix'=>'post'],function(){
    Route::get('/', [PostController::class, 'index'])->name('user.post.index');
    Route::get('detail/{id}', [PostController::class, 'detail'])->name('user.post.detail');
});

Route::get('/search', [SearchController::class, 'search'])->name('user.search.index');
