<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
    return view('tinymce');
});
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name("auth.register");
Route::post('/register/store',[RegisterController::class,'storeUserAccount'])->name("auth.register.store");
Route::post('/login/store',[LoginController::class,'Login'])->name("auth.login.store");
Route::get('/login', [LoginController::class, 'showLoginForm'])->name("auth.login"); // Cho người dùng
Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])->name("auth.login.provider");
Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('auth.login.provider.callback');
Route::post('/logout', [LoginController::class,"logout"])->name("auth.logout");


Route::get('admin/register',[RegisterController::class,'showAdminRegistrationForm'])->name("admin.auth.register");
Route::post('admin/register/store',[RegisterController::class,'storeAdminAccount'])->name("admin.auth.register.store");
Route::get('admin/login',[LoginController::class,'showAdminLoginForm'])->name("admin.auth.login");
Route::post('admin/login',[LoginController::class,'adminLogin'])->name("admin.auth.login.store");

Route::post('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');


Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin','middleware' => ['auth:admin']], function () {
    Route::get('/',[AdminController::class,'index'])->name("admin.index");
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/',[BrandController::class,'index'])->name("admin.brand.index"); // danh sách danh mục
        Route::get('/add', [BrandController::class,'add'])->name('admin.brand.add'); // Trả về form thêm mới
        Route::post('/add', [BrandController::class,'store'])->name('admin.brand.store'); // tạo mới category
        Route::get('/edit/{id}', [BrandController::class,'edit'])->name('admin.brand.edit'); // Trả về form edit category
        Route::post('/edit/{id}', [BrandController::class,'update'])->name('admin.brand.update'); // Update category
        Route::get('/delete/{id}', [BrandController::class,'destroy'])->name('admin.brand.destroy'); // delete category
    });
    Route::group(['prefix'=>'category'],function() {
        Route::get('/{model_type}/', [CategoryController::class,'index'])->name('admin.category.index');
        Route::get('/{model_type}/add', [CategoryController::class,'add'])->name('admin.category.add');
        Route::post('/{model_type}/add', [CategoryController::class,'store'])->name('admin.category.store');
        Route::get('/{model_type}/edit/{id}', [CategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('/{model_type}/edit/{id}', [CategoryController::class,'update'])->name('admin.category.update');
        Route::get('/{model_type}/delete/{id}', [CategoryController::class,'destroy'])->name('admin.category.delete');
    });
    Route::group(['prefix' => 'post'], function (){
        Route::get('/',[PostController::class,'index'])->name("admin.post.index"); // danh sách danh mục
        Route::get('/add', [PostController::class,'add'])->name('admin.post.add'); // Trả về form thêm mới
        Route::post('/add', [PostController::class,'store'])->name('admin.post.store'); // tạo mới category
        Route::get('/edit/{id}', [PostController::class,'edit'])->name('admin.post.edit'); // Trả về form edit category
        Route::post('/edit/{id}', [PostController::class,'update'])->name('admin.post.update'); // Update category
        Route::get('/delete/{id}', [PostController::class,'destroy'])->name('admin.post.destroy'); // delete category
    });
    Route::group(['prefix' => 'product'], function (){
        Route::get('/',[ProductController::class,'index'])->name("admin.product.index"); // danh sách danh mục
        Route::get('/add', [ProductController::class,'add'])->name('admin.product.add'); // Trả về form thêm mới
        Route::post('/add', [ProductController::class,'store'])->name('admin.product.store'); // tạo mới category
        Route::get('/edit/{id}', [ProductController::class,'edit'])->name('admin.product.edit'); // Trả về form edit category
        Route::post('/edit/{id}', [ProductController::class,'update'])->name('admin.product.update'); // Update category
        Route::get('/delete/{id}', [ProductController::class,'destroy'])->name('admin.product.destroy'); // delete category
    });
    Route::get('/file-manager', function () {
        return view('admin.content.fileManager');
    })->name("admin.file.manager");
    Route::group(['prefix' => 'setting'], function (){
        Route::group(['prefix' => 'config'], function (){
            Route::get('/edit', [ConfigController::class,'edit'])->name('admin.config.edit'); // Trả về form edit category
            Route::post('/edit', [ConfigController::class,'update'])->name('admin.config.update'); // Trả về form edit category
        });
        Route::group(['prefix' => 'banner'], function (){
            Route::get('/',[BannerController::class,'index'])->name("admin.banner.index"); // danh sách danh mục
            Route::get('/add', [BannerController::class,'add'])->name('admin.banner.add'); // Trả về form thêm mới
            Route::post('/add', [BannerController::class,'store'])->name('admin.banner.store'); // tạo mới category
            Route::get('/edit/{id}', [BannerController::class,'edit'])->name('admin.banner.edit'); // Trả về form edit category
            Route::post('/edit/{id}', [BannerController::class,'update'])->name('admin.banner.update'); // Update category
            Route::get('/delete/{id}', [BannerController::class,'destroy'])->name('admin.banner.destroy'); // delete category

        });
        Route::group(['prefix' => 'shop'], function (){
            Route::get('/',[\App\Http\Controllers\Admin\ShopController::class,'index'])->name("admin.shop.index"); // danh sách danh mục
            Route::get('/add', [\App\Http\Controllers\Admin\ShopController::class,'add'])->name('admin.shop.add'); // Trả về form thêm mới
            Route::post('/add', [\App\Http\Controllers\Admin\ShopController::class,'store'])->name('admin.shop.store'); // tạo mới category
            Route::get('/edit/{id}', [\App\Http\Controllers\Admin\ShopController::class,'edit'])->name('admin.shop.edit'); // Trả về form edit category
            Route::post('/edit/{id}', [\App\Http\Controllers\Admin\ShopController::class,'update'])->name('admin.shop.update'); // Update category
            Route::get('/delete/{id}', [\App\Http\Controllers\Admin\ShopController::class,'destroy'])->name('admin.shop.destroy'); // delete category
        });
    });
});

Route::get('/detail-product/{id}', [\App\Http\Controllers\User\HomeController::class, 'detailProduct'])->name("user.product.detail");
Route::get('products/parent-category/{parentCategoryId}', [ProductController::class, 'showProductsByParentCategory']);
