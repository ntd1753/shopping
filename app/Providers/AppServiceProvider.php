<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Shop;
use Darryldecode\Cart\Cart;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $productCategories = Category::where('model_type','=', 'product')->where('parent_id','=',0)->get();
        $postCategories = Category::where('model_type','=', 'post')->where('parent_id','=',0)->with('subCategories')->get();
        $shops=Shop::all();
        $countCartItem=count(\Cart::getContent()->toArray());

        view()->share('countCartItem', $countCartItem);

        view()->share('productCategories', $productCategories);
        view()->share('postCategories', $postCategories);
        view()->share('shops', $shops);
    }
}
