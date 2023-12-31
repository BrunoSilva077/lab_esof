<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Gloudemans\Shoppingcart\Facades\Cart;

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
        View::composer('*', function ($view) {
            $cartItems = Cart::instance('shopping');
            $totalPrice = 0;
            foreach ($cartItems->content() as $cartItem) {
                $totalPrice += $cartItem->options->totalPrice ;//* $cartItem->qty;
            }
            $view->with('cartItems', $cartItems)->with('totalPrice', $totalPrice);
        });
    }
}