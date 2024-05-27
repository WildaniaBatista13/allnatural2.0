<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class WishlistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Compartir el conteo del carrito con todas las vistas
        View::composer('*', function ($view) {
            $WishlistCount = 0;
            
            if (Auth::check()) {
                $WishlistCount = Wishlist::where('user_id', Auth::id())->count();
            }

            $view->with('WishlistCount', $WishlistCount);
        });
    }
}
