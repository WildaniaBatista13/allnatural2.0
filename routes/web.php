<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\ViewController;

use App\Http\Controllers\UserController;

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





Route::group(['middleware' => ['auth', 'verified','admintypevalid']], function() {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    Route::get('/user/{type?}', [UserController::class, 'index'])->name('user.admin.index');

    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');

    Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

});

Route::group(['middleware' => ['auth', 'verified','usertypevalid']], function()
{

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::get('/view-page/{product}', [ViewController::class, 'index'])->name('view.page.index');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    
    Route::get('/about', function () {
        return view('about');
    })->name('about.index');
    
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact.index');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    
    Route::get('/cart/destroy/{cart?}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::put('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    Route::get('/category/{name}', [CategoryController::class, 'index'])->name('category.index');

    Route::get('/search', [SearchController::class, 'index'])->name('search.index');

    

});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


