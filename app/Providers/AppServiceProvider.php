<?php

namespace App\Providers;

use App\Shop;
use App\Message;
use App\Product;
use App\Observers\ShopObserver;
use App\Observers\WithdrawFundsObserver;
use App\WithdrawFunds;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Voyager::useModel('Category', \App\Category::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Shop::observe(ShopObserver::class);
        WithdrawFunds::observe(WithdrawFundsObserver::class);

        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        $shop = Shop::get();
        $this->shop = $shop;
        $products= Product::get();
        $categories = Category::whereNull('parent_id')->get();
        return view()->share( ['allProducts' => $products, 'categories' => $categories]);
    }

}
