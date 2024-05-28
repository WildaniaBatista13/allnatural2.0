<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\ViewController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\MessageController;

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





Route::group(['middleware' => ['auth', 'verified','admintypevalid'], 'prefix' => 'admin'], function() {

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    Route::get('/user/{type?}', [UserController::class, 'index'])->name('user.admin.index');

    Route::post('/user/pdf/{type?}', [UserController::class, 'generatepdf'])->name('user.admin.pdf');

    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');

    Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');

    Route::get('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::post('/product/pdf', [ProductController::class, 'generatepdf'])->name('product.admin.pdf');

    Route::get('/orders/{type?}/{state?}', [OrderController::class, 'index'])->name('order.admin.index');

    Route::post('/orders/destroy/{order}', [OrderController::class, 'destroy'])->name('order.admin.destroy');

    Route::post('/orders/pdf/{type?}', [OrderController::class, 'generatepdf'])->name('order.admin.pdf');

    Route::put('/orders/update/{order}', [OrderController::class, 'update'])->name('order.update');

    Route::get('/contact/{type?}', [MessageController::class, 'index'])->name('message.admin.index');

    Route::get('/contact/destroy/{message}', [MessageController::class, 'destroy'])->name('message.destroy');

});

Route::group(['middleware' => ['auth', 'verified','usertypevalid']], function()
{

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::get('/view-page/{product}', [ViewController::class, 'index'])->name('view.page.index');
    
    Route::get('/orders/{type?}', [OrderController::class, 'index'])->name('order.index');
    
    Route::post('/orders/store', [OrderController::class, 'store'])->name('order.store');
    
    Route::get('/about', function () {
        return view('about');
    })->name('about.index');
    
    Route::get('/contact/{type?}', [MessageController::class, 'index'])->name('message.index');

    Route::post('/contact/store', [MessageController::class, 'store'])->name('message.store');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
    
    Route::get('/cart/destroy/{cart?}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::put('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

    Route::get('/wishlist/destroy', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    Route::get('/category/{name}', [CategoryController::class, 'index'])->name('category.index');

    Route::get('/search', [ProductController::class, 'search'])->name('product.search');

    Route::get('/order/{orderId}/summary', [OrderController::class, 'showOrderSummary'])->name('order.summary');

});






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/destroy/{user}/{ruta?}', [ProfileController::class, 'admin_destroy'])->name('profile.destroy.admin');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


